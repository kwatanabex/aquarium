<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * AQUARIUM ��˥塼��������饹
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
     * �ǥե���ȥ�����������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȴ������֥�������
     * @return void
     */
    function execute(&$data, &$context)
    {
        // �桼�������֥������ȼ���
        $user =& $context->getUser();
        // ��˥塼�����
        $user->initMenu();
        // �桼�������֥���������¸
        $context->setUser($user);
        // TOP���̤�����
        SyL_Response::redirect($context->getScriptName());
    }

}

?>
