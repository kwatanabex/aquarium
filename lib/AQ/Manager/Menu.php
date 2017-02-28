<?php
/**
 * AQUARIMマネージャクラス
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DBデータ定義クラス
 */
SyL_Loader::lib('Adm.Tables.Aq_menu');
SyL_Loader::lib('Adm.Tables.Aq_authority_menu');
/**
 * AQUARIMコンテンツクラス
 */
SyL_Loader::lib('AQ.Data.Menu');

/**
 * AQUARIMメニュードメインマネージャクラス
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQManagerMenu extends AQManager
{
    /**
     * メニュー情報を取得する
     *
     * @access public
     * @param int メニューID
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @return array メニュー情報
     */
    function getMenu($menu_id, $is_admin, $auth_id)
    {
        $table =& new AdmTablesAq_menu();
        $condition = $this->dao->createCondition();
        $condition->addEqual('MENU_ID', $menu_id);
        $table->setConditions($condition);
        $result = $this->dao->select($table);
        if (count($result) > 0) {
            $result = $result[0];
        } else {
            return array();
        }

        $menu_parent_id = $result['MENU_PARENT_ID'];
        $menu_url       = '/' . $result['MENU_URL_NAME'] . '/';

        while (is_numeric($menu_parent_id)) {
            $table =& new AdmTablesAq_menu();
            $condition = $this->dao->createCondition();
            $condition->addEqual('MENU_ID', $menu_parent_id);
            $table->setConditions($condition);
            $result1 = $this->dao->select($table);
            if (count($result1) == 0) {
                break;
            }
            $menu_parent_id = $result1[0]['MENU_PARENT_ID'];
            $menu_url       = '/' . $result1[0]['MENU_URL_NAME'] . $menu_url;
        }

        $result['MENU_URL'] = $menu_url;
        return $result;
    }

    /**
     * メニュー情報を更新する
     *
     * @access public
     * @param int メニューID
     * @param array メニュー配列
     */
    function updateMenu($menu_id, $menus)
    {
        $table =& new AdmTablesAq_menu();
        foreach ($menus as $name => $value) {
            $table->addColumn($name, $value);
        }
        $condition = $this->dao->createCondition();
        $condition->addEqual('MENU_ID', $menu_id);
        $table->setConditions($condition);
        return $this->dao->update($table);
    }

    /**
     * メニューオブジェクトの情報を更新する
     *
     * @access public
     * @param object メニューオブジェクト
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @param array メニュー階層
     */
    function updateMenuObject(&$menus_obj, $is_admin, $auth_id, $menus)
    {
        $is_lower_access = false;
        $name = array_shift($menus);
        if ($name) {
            // 下階層アクセス判定
            if (!$is_lower_access) {
                $is_lower_access = $menus_obj->isLowerAccess();
            }
            $menus_child_obj =& $menus_obj->getCurrentMenu(array($name));
            if (is_object($menus_child_obj)) {
                // 子メニューを既に持っている
            } else {
                // 子メニューを持っていないので取得
                $menus_tmp =& $this->getChildMenus($menus_obj->getId(), $is_admin, $auth_id, $is_lower_access, true);
                if (count($menus_tmp) == 0) {
                    SyL_Loggers::notice("[AQ_MENU] Unable to get child menu (menu_id: " . $menus_obj->getId() . ")");
                    return;
                }

                $find = false;
                foreach ($menus_tmp as $menu_tmp) {
                    if ($menu_tmp->getUrlName() == $name) {
                        $find = true;
                        break;
                    }
                }

                if (!$find) {
                    SyL_Loggers::notice("[AQ_MENU] Menu url not found in DB ({$name})");
                    return;
                }

                for ($i=0; $i<count($menus_tmp); $i++) {
                    $menus_obj->add($menus_tmp[$i]);
                }
                $menus_child_obj =& $menus_obj->getCurrentMenu(array($name));
            }
            $this->updateMenuObject($menus_child_obj, $is_admin, $auth_id, $menus);
        } else {
            if (!$menus_obj->hasChildMenu()) {
                // 子メニューを持っていなければ取得
                $menus_tmp =& $this->getChildMenus($menus_obj->getId(), $is_admin, $auth_id, $is_lower_access, true);
                for ($i=0; $i<count($menus_tmp); $i++) {
                    $menus_obj->add($menus_tmp[$i]);
                }
            }
        }
    }

    /**
     * 子メニューオブジェクトを取得する
     *
     * @access private
     * @param string メニューID
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @param bool 下階層アクセスフラグ
     * @param bool 非表示オブジェクト取得フラグ
     * @return array 子メニューオブジェクト配列
     */
    function &getChildMenus($menu_id, $is_admin, $auth_id, $is_lower_access=false, $display_hidden=true)
    {
        // ルートメニューを取得
        $tables = array();
        $tables[0] =& new AdmTablesAq_menu();
        $condition = $this->dao->createCondition();
        if ($menu_id > 0) {
            // 指定階層
            $condition->addEqual('MENU_PARENT_ID', $menu_id);
        } else {
            // 最上位階層
            $condition->addNull('MENU_PARENT_ID');
        }
        if (!$display_hidden) {
            $condition->addEqual('DISPLAY_FLAG', '1');
        }
        $tables[0]->setConditions($condition);
        $tables[0]->addSort('MENU_ORDER');
        $tables[0]->addSort('MENU_ID');

        $relation = null;
        if (!$is_admin && !$is_lower_access) {
            $tables[1] =& new AdmTablesAq_authority_menu();
            $tables[1]->addColumn('LOWER_PERMISSION');

            $condition2 = $this->dao->createCondition();
            $condition2->addEqual('AUTHORITY_ID', $auth_id);

            $relation = $this->dao->createRelation();
            $relation->addLeftJoin($tables[0], $tables[1], array('aq_menu.MENU_ID = aq_authority_menu.MENU_ID'), $condition2);
        }

        $menus = array();
        foreach ($this->dao->select($tables, $relation) as $row) {
            $redirect_url = $row['REDIRECT_FLAG'] ? $row['REDIRECT_URL'] : '';
            if ($is_admin || $is_lower_access) {
                $permission       = true;
                $lower_permission = true;
            } else {
                $permission = is_numeric($row['LOWER_PERMISSION']);
                $lower_permission = (bool)$row['LOWER_PERMISSION'];
            }
            $menus[] =& new AQDataMenu($row['MENU_ID'], $row['MENU_PARENT_ID'], $row['MENU_URL_NAME'], $row['MENU_NAME'], $row['MENU_DESCRIPTION'], $redirect_url, (bool)$row['DISPLAY_FLAG'], $permission, $lower_permission, $row['ADM_TYPE'], $row['ADM_ID'], $row['MENU_ORDER']);
        }
        return $menus;
    }

    /**
     * メニュー階層を配列で取得する（主にJS用）
     *
     * @access public
     * @param object メニューオブジェクト
     * @param array メニュー階層
     * @param int 階層
     * @param string ベースURL
     * @param bool 下階層アクセスフラグ
     * @return array メニュー階層
     */
    function convertToArray(&$menu, $urls, $index=-1, $base_url='', $is_lower_access=false)
    {
        if (!$menu->isDisplay()) {
            return array();
        }

        $parent_id = $menu->getParentId();
        if ($parent_id == '') {
            $parent_id = '0';
        }
        $url_name  = $menu->getUrlName();
        if (!$base_url) {
            $base_url = $_SERVER['SCRIPT_NAME'] . '/';
        }
        if ($url_name !== '') {
            $base_url .= $url_name . '/';
        }

        $open_dir = 'false';
        if ($index > -1) {
            $open_dir = (isset($urls[$index]) && ($urls[$index] == $url_name)) ? 'true' : 'false';
        }
        $index++;

        $menus = array();
        $menus[] = array($menu->getId(), $parent_id, $menu->getName(), $base_url, $menu->getDescription(), $open_dir);

        $cmenus =& $menu->getChildMenus();
        foreach (array_keys($cmenus) as $i) {
            if ($is_lower_access) {
                $menus = array_merge($menus, $this->convertToArray($cmenus[$i], $urls, $index, $base_url, true));
            } else if ($cmenus[$i]->isAccess()) {
                $menus = array_merge($menus, $this->convertToArray($cmenus[$i], $urls, $index, $base_url, $cmenus[$i]->isLowerAccess()));
            }
        }
        return $menus;
    }

    /**
     * パンクズ用のメニューを取得する
     *
     * @access public
     * @param object メニューオブジェクト
     * @param array メニュー階層
     * @param int 階層
     * @return array パンクズ用のデータ
     */
    function getPankuzuList(&$menu, $urls, $base_url='', $index=0)
    {
        if (!$base_url) {
            $base_url = $_SERVER['SCRIPT_NAME'] . '/';
        }
        $url_name = $menu->getUrlName();
        if ($url_name !== '') {
            $base_url .= $url_name . '/';
        }

        $pankuzus   = array();
        $pankuzus[] = array($menu->getName(), $base_url);

        if (count($urls) > 0) {
            $cmenus =& $menu->getChildMenus();
            foreach (array_keys($cmenus) as $i) {
                if ($cmenus[$i]->getUrlName() == $urls[$index]) {
                    if (isset($urls[$index+1])) {
                        $pankuzus = array_merge($pankuzus, $this->getPankuzuList($cmenus[$i], $urls, $base_url, $index+1));
                    } else {
                        $pankuzus = array_merge($pankuzus, array(array($cmenus[$i]->getName(), $base_url . $cmenus[$i]->getUrlName() . '/')));
                    }
                }
            }
        }
        return $pankuzus;
    }

    /**
     * サイトマップ用一覧リストを取得する
     *
     * @access public
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @param string ベースURL
     * @return array サイトマップ用一覧リスト
     */
    function getSitemapIndex($is_admin, $auth_id, $base_url='')
    {
        if (!$base_url) {
            $base_url = $_SERVER['SCRIPT_NAME'] . '/';
        }

        $menu =& new AQDataMenu('0', '-1', '', AQ_MENU_ROOT_NAME, '', '', true, true);
        return $this->getSitemapIndexRecursive($menu, $base_url, -1, $is_admin, $auth_id);
    }

    /**
     * 再帰的にサイトマップ用リストを取得する
     *
     * @access private
     * @param object メニューオブジェクト
     * @param string ベースURL
     * @param int 階層
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @param bool 下階層アクセスフラグ
     * @return array サイトマップ用リスト
     */
    function getSitemapIndexRecursive(&$menu, $base_url, $depth, $is_admin, $auth_id, $is_lower_access=false)
    {
        if (!$menu->isDisplay()) {
            return array();
        }
        $url_name = $menu->getUrlName();
        if ($url_name !== '') {
            $base_url .= $url_name . '/';
        }

        $menus = array();
        // 0 - 階層
        // 1 - メニュー名
        // 2 - URL
        // 3 - 説明文
        $menus[] = array($depth, $menu->getName(), $base_url, $menu->getDescription());

        $depth++;

        $cmenus =& $this->getChildMenus($menu->getId(), $is_admin, $auth_id, $is_lower_access, false);
        foreach (array_keys($cmenus) as $i) {
            if ($is_lower_access) {
                $menus = array_merge($menus, $this->getSitemapIndexRecursive($cmenus[$i], $base_url, $depth, $is_admin, $auth_id, true));
            } else if ($cmenus[$i]->isAccess()) {
                $menus = array_merge($menus, $this->getSitemapIndexRecursive($cmenus[$i], $base_url, $depth, $is_admin, $auth_id, $cmenus[$i]->isLowerAccess()));
            }
        }
        return $menus;
    }

    /**
     * 階層化メニューリストを取得する
     *
     * @access public
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @param string ベースURL
     * @return array サイトマップ用一覧リスト
     */
    function getMenuIndex($is_admin, $auth_id, $base_url='')
    {
        $menu =& new AQDataMenu('0', '-1', '', AQ_MENU_ROOT_NAME);
        return $this->getMenuIndexRecursive($menu, $is_admin, $auth_id);
    }

    /**
     * 再帰的に階層化メニューリストを取得する
     *
     * @access private
     * @param object メニューオブジェクト
     * @param string ベースURL
     * @param bool 管理者フラグ
     * @param int 権限ID
     * @param bool 下階層アクセスフラグ
     * @return array サイトマップ用リスト
     */
    function getMenuIndexRecursive(&$menu, $is_admin, $auth_id, $menu_url='', $is_lower_access=false)
    {
        $parent_id = $menu->getParentId();
        if ($parent_id == '') {
            $parent_id = '0';
        }

        $menu_url .= $menu->getUrlName() . '/';

        $menus = array();
        // 0 - メニューID
        // 1 - 親メニューID
        // 2 - メニュー名
        // 3 - 表示フラグ
        // 4 - URL
        $menus[] = array($menu->getId(), $parent_id, $menu->getName(), $menu->isDisplay(), $menu_url, $menu->getOrder());

        $cmenus =& $this->getChildMenus($menu->getId(), $is_admin, $auth_id, $is_lower_access, true);
        foreach (array_keys($cmenus) as $i) {
            if ($is_lower_access) {
                $menus = array_merge($menus, $this->getMenuIndexRecursive($cmenus[$i], $is_admin, $auth_id, $menu_url, true));
            } else if ($cmenus[$i]->isAccess()) {
                $menus = array_merge($menus, $this->getMenuIndexRecursive($cmenus[$i], $is_admin, $auth_id, $menu_url, $cmenus[$i]->isLowerAccess()));
            }
        }
        return $menus;
    }
}

?>
