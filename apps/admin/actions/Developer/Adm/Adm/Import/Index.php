<?php
/**
 * フォームクラス
 */
SyL_Loader::lib('Form');
/**
 * バリデーションマネージャクラス
 */
SyL_Loader::lib('ValidationManager');

/**
 * AdmFormsAq_adm_tableフォーム一覧表示クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Adm_Import_Index extends AppAction
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
        $tables = array();
        $tables[''] = '-- 選択してください --';
        foreach ($admtable_manager->getTables() as $row) {
            $tables[$row['TABLE_ID']] = $row['TABLE_NAME'];
        }
        $cnt = count($tables) - 1;

        // バリデーション基本パターン作成
        $v_require1 =& SyL_Validator::create('require', '{name}を入力してください');
        $v_require2 =& SyL_Validator::create('require', '{name}を選択してください');
        $v_numeric  =& SyL_Validator::create('numeric', '{name}が正しくありません');
        $v_length1  =& SyL_Validator::create('length',  '{name}は{max}文字（バイト）以内で入力してください', array('max'=> 50));

        $form =& new SyL_Form();

        // ADM名
        $element =& $form->createElement('text', 'an', 'ADM名', array(), array('size' => '40'));
        $vs =& SyL_Validators::create();
        $vs->add($v_require1);
        $vs->add($v_length1);
        $form->addElement($element, $vs);

        // メインメンテナンステーブル
        $element =& $form->createElement('select', 'mt', 'メンテナンスADMテーブル', $tables, array('onChange' => 'SyL_AjaxRequest.sendAsyncPost(\'' . $context->getScriptName() . '/Developer/Adm/Adm/Import/AjaxTableColumn.html\', \'\', setTableColumnList, null, {\'tid\': this.options[this.selectedIndex].value, \'name\': this.name});'));
        $vs =& SyL_Validators::create();
        $vs->add($v_require2);
        $vs->add($v_numeric);
        $form->addElement($element, $vs);

        if ($context->isPost() && $form->validate()) {
            $adm_name = $data->get('an');
            $table_id = $data->geta('mt');
            $relations = array();
            $i = 0;
            while (++$i) {
                if (!$data->get('rt' . $i)) {
                    break;
                }
                $relation_table_id = $data->get('rt'    . $i);
                $relation_type     = $data->get('rtp'   . $i);
                $join_columns      = $data->get('rtcth' . $i);
                $relations[] = array(
                  'table_id'      => $relation_table_id,
                  'relation_type' => $relation_type,
                  'join_columns'  => $join_columns
                );
            }

            // トランザクション開始
            $conn->beginTransaction();
            // ADMマネージャ生成
            $adm_manager =& AQManager::factory($conn, 'Adm');
            if ($adm_manager->importAdmTables($adm_name, $table_id[0], $relations)) {
                // トランザクション確定
                $conn->commit();
            } else {
                // トランザクション破棄
                $conn->rollback();
                SyL_Error::trigger("[Aquarium error] ADMテーブルインポート時にエラーが発生しました。詳細は、ログを確認してください", E_USER_ERROR);
            }

            SyL_Response::redirect($context->getScriptName() . '/Developer/Adm/Adm/');
            // -- exit --
        }

        $forms =& $form->getResultArray();

        $data->set('url_script', $context->getScriptName());
        $data->set('cnt',    $cnt);
        $data->set('form',   $forms);
        $data->set('tables', $tables);
    }

}

?>
