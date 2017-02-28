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
class Config_Menu_AllMenuList extends AppAction
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
        $key_name = $data->get('kn');

        // ������桼�������֥������ȼ���
        $user =& $context->getUser();
        // DB���֥������ȼ���
        $conn =& $context->getDB();

        // ��˥塼�ޥ͡���������
        $menu_manager =& AQManager::factory($conn, 'Menu');
        $results = $menu_manager->getMenuIndex($user->isAdmin(), $user->getAuthorityId());

        $context->closeDB($conn);

        $data->set('url_script', $context->getScriptName());
        $data->set('results',    $results);

        $data->set('url_upd_base', "/Config/Menu/upd.html?{$key_name}=MENU_ID%3D");
        $data->set('url_vew_base', "/Config/Menu/vew.html?{$key_name}=MENU_ID%3D");
        $data->set('url_adm_base', "/Config/Menu/UpdateAdm.html?id=MENU_ID%3D");
    }

}

?>
