<?php
SyL_Loader::fw('Adm.Flow.New');

/**
 * AdmFormsAq_menu�ե����࿷���������饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_New extends SyL_AdmFlowNew
{
    /**
     * ���������ե����९�饹̾
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_menu';

    /**
     * �Х�ǡ������¹�
     *
     * @access public
     * @param object ADM���֥�������
     * @return bool true: �Х�ǡ������OK��false: �Х�ǡ�����󥨥顼
     */
    function validate(&$adm)
    {
        // �ե��������
        $form =& $this->getForm();
        $element =& $form->getElement('MENU_URL_NAME');
        $value = $element->getValue();
        $element->setValue(ucfirst($value));
        return $adm->validate();
    }

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
