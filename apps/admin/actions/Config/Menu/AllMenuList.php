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
class Config_Menu_AllMenuList extends AppAction
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
        $key_name = $data->get('kn');

        // ログインユーザーオブジェクト取得
        $user =& $context->getUser();
        // DBオブジェクト取得
        $conn =& $context->getDB();

        // メニューマネージャ生成
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
