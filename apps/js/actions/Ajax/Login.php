<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 */

// ǧ�ڥ��饹
SyL_Loader::fw('Auth');

/**
 * AQUARIUM������ǧ�ڥ��饹
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
     * �ǥե���ȥ�����������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȴ������֥�������
     * @return void
     */
    function execute(&$data, &$context)
    {
        $login = null;
        if ($context->isPost()) {
            // ǧ�ڥ��֥������Ⱥ���
            $auth =& SyL_Auth::singleton();
            // ǧ�ڼ¹�
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
