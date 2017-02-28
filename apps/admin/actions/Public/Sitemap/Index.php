<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * AQUARIUM �����ȥޥåץ��饹
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Public_Sitemap_Index extends AppAction
{
    /**
     * ���󥹥ȥ饯��
     *
     * @access public
     */
    function Public_Sitemap_Index()
    {
    }

    /**
     * �ǥե���ȥ�����������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȴ������֥�������
     * @return void
     */
    function execute(&$data, &$context)
    {
        // ���������ǥ��쥯�ȥ����
        $urls = $context->getUrlNames();
        // ������桼�������֥������ȼ���
        $user =& $context->getUser();
        // DB���֥������ȼ���
        $conn =& $context->getDB();
        // ��˥塼�ޥ͡���������
        $menu_manager =& AQManager::factory($conn, 'Menu');
        $menus = $menu_manager->getSitemapIndex($user->isAdmin(), $user->getAuthorityId());

        // �����ȥޥå��ѥ�˥塼�򥻥å�
        $data->setRef('sitemap_index', $menus);
    }

}

?>
