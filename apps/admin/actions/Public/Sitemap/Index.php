<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * AQUARIUM サイトマップクラス
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
     * コンストラクタ
     *
     * @access public
     */
    function Public_Sitemap_Index()
    {
    }

    /**
     * デフォルトアクション処理
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキスト管理オブジェクト
     * @return void
     */
    function execute(&$data, &$context)
    {
        // アクションディレクトリ取得
        $urls = $context->getUrlNames();
        // ログインユーザーオブジェクト取得
        $user =& $context->getUser();
        // DBオブジェクト取得
        $conn =& $context->getDB();
        // メニューマネージャ生成
        $menu_manager =& AQManager::factory($conn, 'Menu');
        $menus = $menu_manager->getSitemapIndex($user->isAdmin(), $user->getAuthorityId());

        // サイトマップ用メニューをセット
        $data->setRef('sitemap_index', $menus);
    }

}

?>
