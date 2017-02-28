<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 */

// 認証クラス
SyL_Loader::fw('Auth');

/**
 * AQUARIUMログイン認証クラス
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Ajax_Login extends AppAction
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
        $login = null;
        if ($context->isPost()) {
            // 認証オブジェクト作成
            $auth =& SyL_Auth::singleton();
            // 認証実行
            if ($auth->doLogin()) {
                $login = true;
                SyL_Response::redirect('/aquarium/admin.php');
            } else {
                $login = false;
            }
        }

        $user = $context->getUser();
        $data->set('login_id_name', $user->getUserIdParamaterName());
        $data->set('password_name', $user->getPasswordParamaterName());
        $data->set('login_id', $data->get($user->getUserIdParamaterName()));
        $data->set('login',    $login);

        $user = null;
        $context->setUser($user);
    }
}

?>
