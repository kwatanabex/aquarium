<?php
SyL_Loader::fw('Adm.Flow.Upd');

/**
 * AdmFormsAq_menu�ե����๹�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_Upd extends SyL_AdmFlowUpd
{
    /**
     * ���������ե����९�饹̾
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_menu';

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
        $context->setTemplateFile('/Common/Adm/Upd.html');
    }
}

?>
