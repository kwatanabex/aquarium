<?php
/**
 * ファイルシステムクラス
 */
SyL_Loader::lib('Filesystem');

/**
 * AdmFormsAq_adm_tableフォーム一覧表示クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_Prenew extends AppAction
{
    /**
     * アクション処理
     *
     * @access public
     * @param object リクエストオブジェクト
     * @param object データ管理オブジェクト
     */
    function execute(&$data, &$context)
    {
        // ログインユーザーオブジェクト取得
        $user =& $context->getUser();
        // メニューマネージャ生成
        $menu_manager =& AQManager::factory($conn, 'Menu');
        $menu_list = $menu_manager->getMenuIndex($user->isAdmin(), $user->getAuthorityId());

        $data->set('url_script', $context->getScriptName());
        $data->set('menu_list',  $menu_list);
    }

}

?>
