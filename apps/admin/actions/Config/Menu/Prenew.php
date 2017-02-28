<?php
/**
 * �ե����륷���ƥ९�饹
 */
SyL_Loader::lib('Filesystem');

/**
 * AdmFormsAq_adm_table�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_Prenew extends AppAction
{
    /**
     * ������������
     *
     * @access public
     * @param object �ꥯ�����ȥ��֥�������
     * @param object �ǡ����������֥�������
     */
    function execute(&$data, &$context)
    {
        // ������桼�������֥������ȼ���
        $user =& $context->getUser();
        // ��˥塼�ޥ͡���������
        $menu_manager =& AQManager::factory($conn, 'Menu');
        $menu_list = $menu_manager->getMenuIndex($user->isAdmin(), $user->getAuthorityId());

        $data->set('url_script', $context->getScriptName());
        $data->set('menu_list',  $menu_list);
    }

}

?>
