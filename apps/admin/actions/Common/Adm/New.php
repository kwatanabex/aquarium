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
class Common_Adm_New extends SyL_AdmFlowNew
{
    /**
     * ���������᥽�åɼ¹����˼¹Ԥ����᥽�å�
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function preExecute(&$data, &$context)
    {
        parent::preExecute($data, $context);

        $user =& $context->getUser();
        $menu =& $user->getMenu();
        // �����ȤΥ�˥塼����
        $current_menu =& $menu->getCurrentMenu($context->getUrlNames());

        $adm_id = $current_menu->getAdmId();
        // ��ưAdm�ѥ��饹̾���ѹ�
        $this->classname = AQ_ADM_GENERATE_PACKAGE . '.' . str_replace('{ADM_ID}', $adm_id, AQ_GENERATED_ADM_CLASS_PREFIX);

        // �����ե���������å�
        $class_file = AQ_ADM_GENERATE_CLASS_DIR . '/' . str_replace('{ADM_ID}', $adm_id, AQ_GENERATED_ADM_CLASS_PREFIX) . '.php';
        if (!is_file($class_file)) {
            SyL_Error::trigger('ADM�ե����뤬��������Ƥ��ޤ���<a href="' . $context->getScriptName() . '/Config/Menu/">��˥塼����</a>����ADM��������Ƥ�������');
        }
    }
}

?>
