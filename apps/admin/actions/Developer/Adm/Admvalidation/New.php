<?php
SyL_Loader::fw('Adm.Flow.New');

/**
 * AdmFormsAq_adm_validation�ե����࿷���������饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Admvalidation_New extends SyL_AdmFlowNew
{
    /**
     * ���������ե����९�饹̾
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_adm_validation';

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