<?php
SyL_Loader::fw('Adm.Flow.Lst');

/**
 * AdmFormsAq_adm_column_validation_p�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Admtable_Column_Validation_Parameter_Lst extends SyL_AdmFlowLst
{
    /**
     * ���������ե����९�饹̾
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_adm_column_validation_p';

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
        $context->setTemplateFile('/Common/Adm/Lst.html');
    }
}

?>
