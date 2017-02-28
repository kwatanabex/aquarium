<?php
/**
 * AQUARIMコンテンツメニュー階層クラス
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQDataMenu
{
    /**
     * メニューID
     * 
     * @access private
     * @var string
     */
    var $id = '';
    /**
     * 親メニューID
     * 
     * @access private
     * @var string
     */
    var $parent_id = '';
    /**
     * メニュー名称
     * 
     * @access private
     * @var string
     */
    var $name = '';
    /**
     * URL名称
     * 
     * @access private
     * @var string
     */
    var $url_name = '';
    /**
     * メニューの説明
     * 
     * @access private
     * @var string
     */
    var $description = '';
    /**
     * リダイレクトURL
     * 
     * @access private
     * @var string
     */
    var $redirect_url = '';
    /**
     * メニュー表示フラグ
     * 
     * @access private
     * @var bool
     */
    var $is_display = true;
    /**
     * アクセス可フラグ
     * 
     * @access private
     * @var string
     */
    var $is_access = false;
    /**
     * 下階層無制限アクセス可フラグ
     * 
     * @access private
     * @var string
     */
    var $is_lower_access = false;
    /**
     * ADMタイプ
     * 
     * @access private
     * @var string
     */
    var $adm_type = '0';
    /**
     * ADM ID
     * 
     * @access private
     * @var int
     */
    var $adm_id = '';
    /**
     * メニュー表示順
     * 
     * @access private
     * @var int
     */
    var $order = 0;
    /**
     * 子要素格納配列
     * 
     * @access private
     * @var array
     */
    var $menus = array();

    /**
     * コンストラクタ
     *
     * @access public
     * @param string メニューID
     * @param string 親メニューID
     * @param string URL名称
     * @param string メニュー名称
     * @param string メニューの説明
     * @param string リダイレクトURL
     * @param bool メニュー表示フラグ
     * @param bool アクセス可フラグ
     * @param bool 下階層無制限アクセス可フラグ
     * @param string ADMタイプ
     * @param int ADM ID
     * @param int メニュー表示順
     */
    function AQDataMenu($id, $parent_id, $url_name, $name, $description='', $redirect_url='', $display_flag=true, $is_access=false, $is_lower_access=false, $adm_type='0', $adm_id='', $order=0)
    {
        $this->id           = $id;
        $this->parent_id    = $parent_id;
        $this->url_name     = $url_name;
        $this->name         = $name;
        $this->description  = $description;
        $this->redirect_url = $redirect_url;
        $this->is_display   = $display_flag;
        $this->is_access    = $is_access;
        $this->is_lower_access = $is_lower_access;
        $this->adm_type     = $adm_type;
        $this->adm_id       = $adm_id;
        $this->order        = $order;
    }

    /**
     * メニューIDを取得
     *
     * @access public
     * @return string メニューID
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * 親メニューIDを取得
     *
     * @access public
     * @return string 親メニューID
     */
    function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * メニュー名称を取得
     *
     * @access public
     * @return string 名称
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * URL名称を取得
     *
     * @access public
     * @return string 名称
     */
    function getUrlName()
    {
        return $this->url_name;
    }

    /**
     * メニュー説明を取得
     *
     * @access public
     * @return string メニュー説明
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * リダイレクトURLを取得
     *
     * @access public
     * @return string リダイレクトURL
     */
    function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * メニュー表示判定
     *
     * @access public
     * @return bool メニュー表示判定
     */
    function isDisplay()
    {
        return $this->is_display;
    }

    /**
     * アクセス判定
     *
     * @access public
     * @return bool アクセス判定
     */
    function isAccess()
    {
        return $this->is_access;
    }

    /**
     * 下階層無制限アクセス判定
     *
     * @access public
     * @return bool 下階層無制限アクセス判定
     */
    function isLowerAccess()
    {
        return $this->is_lower_access;
    }

    /**
     * 自動ADM判定か判定する
     *
     * @access public
     * @return bool 自動ADM判定
     */
    function isAutoAdm()
    {
        return ($this->adm_type == '1');
    }

    /**
     * ADM IDを取得する
     *
     * @access public
     * @return int ADM ID
     */
    function getAdmId()
    {
        return $this->adm_id;
    }

    /**
     * メニュー表示順を取得
     *
     * @access public
     * @return int メニュー表示順
     */
    function getOrder()
    {
        return $this->order;
    }

    /**
     * 子要素を追加する
     *
     * @access public
     * @param object 子要素
     */
    function add($menu)
    {
        $this->menus[] = $menu;
    }

    /**
     * 子メニュー存在確認
     *
     * @access public
     * @return bool true: 子メニュー存在する, false: 子メニュー存在しない
     */
    function hasChildMenu()
    {
        return (count($this->menus) > 0);
    }

    /**
     * 子メニューを取得
     *
     * @access public
     * @return array 子メニュー
     */
    function &getChildMenus()
    {
        return $this->menus;
    }

    /**
     * メニューごとの権限チェック
     *
     * @access public
     * @param array メニュー階層
     * @param int 階層
     * @return bool true: 権限あり, false: 権限なし
     */
    function isAuthMenu($urls, $index=0)
    {
        if (count($urls) > 0) {
            foreach (array_keys($this->menus) as $i) {
                if ($this->menus[$i]->getUrlName() == $urls[$index]) {
                    $index++;
                    if (isset($urls[$index])) {
                        if ($this->menus[$i]->isLowerAccess()) {
                            return true;
                        } else {
                            return $this->menus[$i]->isAuthMenu($urls, $index);
                        }
                    } else {
                        return $this->menus[$i]->isAccess();
                    }
                }
            }
            return false;
        } else {
            // ルート階層はOK
            return true;
        }
    }

    /**
     * カレントのメニューオブジェクトを取得する
     *
     * @access public
     * @param array メニュー階層
     * @return object カレントのメニューオブジェクト
     */
    function &getCurrentMenu($urls, $index=0)
    {
        if (count($urls) > 0) {
            foreach (array_keys($this->menus) as $i) {
                if ($this->menus[$i]->getUrlName() == $urls[$index]) {
                    if ($index >= (count($urls) - 1)) {
                        return $this->menus[$i];
                    } else {
                        return $this->menus[$i]->getCurrentMenu($urls, $index + 1);
                    }
                }
            }
            $menu = null;
            return $menu;
        } else {
            return $this;
        }
    }

}

?>
