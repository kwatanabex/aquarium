<?php
/**
 * �ե��륿���饹
 */
SyL_Loader::fw('Filter');
/**
 * AQUARIM�ޥ͡����㥯�饹
 */
SyL_Loader::lib('AQ.Manager');

/**
 * ��˥塼�ϥ�ɥ�󥰥ե��륿���饹
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class Aq_HandlingFilter extends SyL_Filter
{
    /**
     * ��˥塼�˴ؤ�����������Ԥ�
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function preAction(&$data, &$context)
    {
        $conn =& $context->getDB();
        $user =& $context->getUser();
        $menu =& $user->getMenu();
        $urls =  array_map('ucfirst', $context->getUrlNames());

        // ��˥塼�ޥ͡���������
        $menu_manager =& AQManager::factory($conn, 'Menu');
        // ��˥塼���֥������Ȥ˻��Ȥǥ��å�
        $menu_manager->updateMenuObject($menu, $user->isAdmin(), $user->getAuthorityId(), $urls);

        // �����ȤΥ�˥塼����
        $current_menu =& $menu->getCurrentMenu($urls);
        // ��˥塼����Ͽ����Ƥ��뤫�����å�
        if ($current_menu == null) {
            SyL_Response::redirect('/aquarium/login.php/error.html?menu_error');
        }
        // ��˥塼�����������¥����å�
        if (!$user->isAdmin() && !$menu->isAuthMenu($urls)) {
            SyL_Response::redirect('/aquarium/login.php/error.html?auth_error');
        }

        // �桼�������֥���������¸
        $context->setUser($user);

        // ��˥塼������쥯��
        $redirect_url = $current_menu->getRedirectUrl();
        if ($redirect_url) {
            SyL_Response::redirect($redirect_url);
        }

        // ADMȽ��
        if ($current_menu->isAutoAdm()) {
            $base_name = basename($context->getActionFile(), '.php');

            // ���������ȥƥ�ץ졼�ȥե������ưADM�Ѥ��ѹ�
            $context->setActionFile("/Common/Adm/{$base_name}.php");
            $context->setClassName("Common_Adm_{$base_name}");
            $context->setTemplateFile("/Common/Adm/{$base_name}" . SYL_ROUTER_URL_EXT);
        }

        // �����ȥ�̾
        $data->set('aq_title', $current_menu->getName());
        // �桼����̾
        $data->set('aq_login_user_name', $user->getName());
        // ǯ
        $data->set('aq_Y', date('Y'));

        // �ѥ󥯥�����
        $data->set('aq_menu_pankuzu', $menu_manager->getPankuzuList($menu, $urls));
        // JS DTree�ѥǡ�������
        $data->set('aq_menu_dtree', $menu_manager->convertToArray($menu, $urls));
        // �����ȥ�˥塼ID
        $data->set('aq_menu_current_id', $current_menu->getId());
    }

    /**
     * ��˥塼�˴ؤ���������Ԥ�
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function postAction(&$data, &$context)
    {
        if (!preg_match('/^js\./i', $context->getViewType())) {
            $template_dir  = $context->getTemplateDir();
            $template_file = $context->getTemplateFile(false);

            // �ƥ�ץ졼�ȥե����뤬̵����硢
            // �ҥ�˥塼������Х�˥塼����ǥå�����ɽ������
            if (!is_file($template_dir . $template_file)) {
                $menu_index = array();
                $menu_current_id = $data->get('aq_menu_current_id');
                foreach ($data->get('aq_menu_dtree') as $menu) {
                    if ($menu_current_id == $menu[1]) {
                        $menu_index[] = $menu;
                    }
                }
                // �ҥ�˥塼��Ƚ��
                if (count($menu_index) > 0) {
                    // �ҥ�˥塼����
                    $data->set('aq_menu_index', $menu_index);
                    // ��˥塼����ǥå����ѥƥ�ץ졼�ȥ��å�
                    $context->setTemplateFile('/Common/menu_index.html');
                }
            }
        }
    }
}

?>
