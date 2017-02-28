<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * AQUARIUM メニュー初期化クラス
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Aq_clear extends AppAction
{
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
        // ユーザーオブジェクト取得
        $user =& $context->getUser();
        // メニュー初期化
        $user->initMenu();
        // ユーザーオブジェクト保存
        $context->setUser($user);
        // TOP画面へ遷移
        SyL_Response::redirect($context->getScriptName());
    }

}

?>
