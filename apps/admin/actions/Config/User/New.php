<?php
SyL_Loader::fw('Adm.Flow.New');

/**
 * AdmFormsAq_users�ե����࿷���������饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_User_New extends SyL_AdmFlowNew
{
    /**
     * ���������ե����९�饹̾
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_users';

    /**
     * ���������᥽�åɼ¹Ը�˼¹Ԥ����᥽�å�
     * 
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function postExecute(&$data, &$context)
    {
        parent::postExecute($data, $context);
        $context->setTemplateFile('/Common/Adm/New.html');
    }
}

?>
