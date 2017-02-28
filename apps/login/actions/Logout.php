<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 */

// 認証クラス
SyL_Loader::fw('Auth');

/*
 * AQUARIUMログアウトクラス
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Logout extends AppAction
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
        // ログアウト処理
        $context->doLogout();
    }
}

?>
