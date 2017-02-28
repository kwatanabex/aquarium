<?php
/**
 * テーブルカラム取得 Ajax-Jsonクラス
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id$
 * @link      http://www.syl.jp/
 */
class Developer_Adm_Adm_Import_AjaxTableColumn extends AppAction
{
    /**
     * デフォルトアクション
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキスト管理オブジェクト
     */
    function execute(&$data, &$context)
    {
        $data->apply('mb_convert_encoding', SYL_ENCODE_INTERNAL, SYL_ENCODE_JS);

        $tid  = $data->get('tid');
        $name = $data->get('name');
        $tids = array();
        if (is_numeric($tid)) {
            $conn =& $context->getDB();

            // ADMテーブルマネージャ生成
            $admtable_manager =& AQManager::factory($conn, 'AdmTable');
            foreach ($admtable_manager->getTableColumns($tid) as $column) {
                $tids[$column['COLUMN_ID']] = $column['COLUMN_NAME'];
            }
        }
        $data->set('tids', $tids);
        $data->set('name', $name);

        $data->apply('mb_convert_encoding', SYL_ENCODE_JS, SYL_ENCODE_INTERNAL);
        $context->setViewType('json');
    }
}

?>
