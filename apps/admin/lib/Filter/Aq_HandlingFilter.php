<?php
/**
 * フィルタクラス
 */
SyL_Loader::fw('Filter');
/**
 * AQUARIMマネージャクラス
 */
SyL_Loader::lib('AQ.Manager');

/**
 * メニューハンドリングフィルタクラス
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
     * メニューに関する前処理を行う
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function preAction(&$data, &$context)
    {
        $conn =& $context->getDB();
        $user =& $context->getUser();
        $menu =& $user->getMenu();
        $urls =  array_map('ucfirst', $context->getUrlNames());

        // メニューマネージャ生成
        $menu_manager =& AQManager::factory($conn, 'Menu');
        // メニューオブジェクトに参照でセット
        $menu_manager->updateMenuObject($menu, $user->isAdmin(), $user->getAuthorityId(), $urls);

        // カレントのメニュー取得
        $current_menu =& $menu->getCurrentMenu($urls);
        // メニューが登録されているかチェック
        if ($current_menu == null) {
            SyL_Response::redirect('/aquarium/login.php/error.html?menu_error');
        }
        // メニューアクセス権限チェック
        if (!$user->isAdmin() && !$menu->isAuthMenu($urls)) {
            SyL_Response::redirect('/aquarium/login.php/error.html?auth_error');
        }

        // ユーザーオブジェクト保存
        $context->setUser($user);

        // メニューリダイレクト
        $redirect_url = $current_menu->getRedirectUrl();
        if ($redirect_url) {
            SyL_Response::redirect($redirect_url);
        }

        // ADM判定
        if ($current_menu->isAutoAdm()) {
            $base_name = basename($context->getActionFile(), '.php');

            // アクションとテンプレートファイルを自動ADM用に変更
            $context->setActionFile("/Common/Adm/{$base_name}.php");
            $context->setClassName("Common_Adm_{$base_name}");
            $context->setTemplateFile("/Common/Adm/{$base_name}" . SYL_ROUTER_URL_EXT);
        }

        // タイトル名
        $data->set('aq_title', $current_menu->getName());
        // ユーザー名
        $data->set('aq_login_user_name', $user->getName());
        // 年
        $data->set('aq_Y', date('Y'));

        // パンクズ配列
        $data->set('aq_menu_pankuzu', $menu_manager->getPankuzuList($menu, $urls));
        // JS DTree用データ配列
        $data->set('aq_menu_dtree', $menu_manager->convertToArray($menu, $urls));
        // カレントメニューID
        $data->set('aq_menu_current_id', $current_menu->getId());
    }

    /**
     * メニューに関する後処理を行う
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function postAction(&$data, &$context)
    {
        if (!preg_match('/^js\./i', $context->getViewType())) {
            $template_dir  = $context->getTemplateDir();
            $template_file = $context->getTemplateFile(false);

            // テンプレートファイルが無い場合、
            // 子メニューがあればメニューインデックスを表示する
            if (!is_file($template_dir . $template_file)) {
                $menu_index = array();
                $menu_current_id = $data->get('aq_menu_current_id');
                foreach ($data->get('aq_menu_dtree') as $menu) {
                    if ($menu_current_id == $menu[1]) {
                        $menu_index[] = $menu;
                    }
                }
                // 子メニュー数判定
                if (count($menu_index) > 0) {
                    // 子メニュー配列
                    $data->set('aq_menu_index', $menu_index);
                    // メニューインデックス用テンプレートセット
                    $context->setTemplateFile('/Common/menu_index.html');
                }
            }
        }
    }
}

?>
