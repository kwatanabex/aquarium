<?php
/**
 * AdmFormsAq_adm_tableフォーム一覧表示クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Admtable_Import_Index extends AppAction
{
    /**
     * アクション処理
     *
     * @access public
     * @param object リクエストオブジェクト
     * @param object データ管理オブジェクト
     */
    function execute(&$data, &$context)
    {
        $conn =& $context->getDB();
        // ADMテーブルマネージャ生成
        $admtable_manager =& AQManager::factory($conn, 'AdmTable');

        if ($context->isPost()) {
            $tables = $data->geta('table');
            if (is_array($tables)) {
                // トランザクション開始
                $conn->beginTransaction();
                $result = true;
                // 登録ループ
                foreach ($tables as $table) {
                    if (substr_count($table, '.') == 1) {
                        list($type, $table) = explode('.', $table, 2);
                        if (!$admtable_manager->importTable($table, $type)) {
                            $result = false;
                            break;
                        }
                    }
                }
                if ($result) {
                    // トランザクション確定
                    $conn->commit();
                } else {
                    // トランザクション破棄
                    $conn->rollback();
                    SyL_Error::trigger("[Aquarium error] テーブルインポート時にエラーが発生しました。詳細は、ログを確認してください", E_USER_ERROR);
                }
            }
            SyL_Response::redirect($context->getScriptName() . '/Developer/Adm/Admtable/');

        } else {
            $adm_tables  = $admtable_manager->getTables();
            $meta_tables = $admtable_manager->getMetaTables();
            $dsn         = $admtable_manager->getDsnInfo();

            $tables = array();
            $all_registed = true;
            foreach ($meta_tables as $meta_table) {
                $regist = false;
                foreach ($adm_tables as $adm_table) {
                    if ($meta_table['name'] == $adm_table['TABLE_NAME']) {
                        $regist = true;
                    }
                }
                if (!$regist) {
                    $all_registed = false;
                }

                $tables[] = array(
                  'name' => $meta_table['name'],
                  'view' => $meta_table['view'],
                  'regist' => $regist
                );
            }

            $data->set('url_script', $context->getScriptName());
            $data->set('dsn',    $dsn);
            $data->set('all_registed', $all_registed);
            $data->set('tables', $tables);
        }
    }

}

?>
