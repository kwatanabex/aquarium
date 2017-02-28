<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * ユーザー登録Index
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Common_Adm_Index extends AppAction
{
    /**
     * アクションメソッド実行前に実行されるメソッド
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function preExecute(&$data, &$context)
    {
    }

    /**
     * デフォルトアクション処理
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキスト管理オブジェクト
     * @return void
     */
    function execute(&$data, &$context)
    {
        include_once 'Lst.php';
        $action =& new Common_Adm_Lst();
        $action->preExecute($data, $context);
        $action->execute($data, $context);
        $action->postExecute($data, $context);
        $context->setTemplateFile('/Common/Adm/Lst.html');
    }

    /**
     * アクションメソッド実行後に実行されるメソッド
     * 
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function postExecute(&$data, &$context)
    {
    }
}

?>
