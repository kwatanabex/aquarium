<?php
SyL_Loader::fw('Adm.Flow.Lst');

/**
 * AdmFormsAq_menu�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_Lst extends SyL_AdmFlowLst
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
        $data->set('url_script', $context->getScriptName());
        $context->setTemplateFile('/Config/Menu/Lst.html');
    }
}

?>
