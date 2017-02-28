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
class Index extends AppAction
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

        // 認証オブジェクト作成
        $auth =& SyL_Auth::singleton();

        if ($context->isPost()) {
            // 認証実行
            if ($auth->doLogin()) {
                $login = true;
                SyL_Response::redirect('/aquarium/admin.php');
            } else {
                $login = false;
            }
        }

        $user = $context->getUser();
        $data->set('login',          $login);
        $data->set('login_id_name',  $user->getUserIdParamName());
        $data->set('password_name',  $user->getPasswordParamName());
        $data->set('login_id',       $data->get($user->getUserIdParamName()));
        $data->set('challenge_code', $auth->createChallengeCode());

        $user = null;
        $context->setUser($user);
    }
}

?>
