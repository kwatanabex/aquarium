<?php
/**
 * AdmFormsAq_adm_tableフォーム一覧表示クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Sql_Index extends AppAction
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
        $dsn = $conn->getDsnInfo();
        $dsn['driver'] = $conn->getType();
        $context->closeDB($conn);

        $data->set('dsn', $dsn);
        $data->set('url_script', $context->getScriptName());
    }

}

?>
