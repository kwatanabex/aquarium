<?php
/**
 * AQUARIM マネージャクラス
 */
SyL_Loader::lib('AQ.Manager');
/**
 * AQUARIM コンテンツクラス
 */
SyL_Loader::lib('AQ.Data.Menu');

/**
 * アプリケーションレベルの共通ユーザークラス
 *
 * @access    public
 * @package   {APP_NAME}
 * @author    {author}
 * @copyright {copyright}
 * @version   $Id:$
 */
class AppUser extends SyL_User
{
    /**
     * ユーザーIDパラメータ名
     * 
     * @access protected
     * @var string
     */
    var $userid_param_name = 'aq_login_username';
    /**
     * パスワードパラメータ名
     * 
     * @access protected
     * @var string
     */
    var $password_param_name = 'aq_login_password';
    /**
     * ログイン認証時のパスワードハッシュ方法
     * array(CLIENT側のHASH化方法, SERVER側のHASH化方法)
     * 
     * @access protected
     * @var string
     */
    //var $password_hash = array('md5','md5');
    var $password_hash = array(null,null);

    /**
     * ユーザー名
     *
     * @access private
     * @var string
     */
     var $user_name = '';
    /**
     * 権限ID
     *
     * @access private
     * @var string
     */
     var $authority_id = '';
    /**
     * 管理者フラグ
     *
     * @access private
     * @var string
     */
     var $admin_flag = '0';
    /**
     * AQUARIMメニュー階層オブジェクト
     *
     * @access private
     * @var array
     */
     var $menu = null;

    /**
     * コンストラクタ
     * 
     * @access public
     */
    function AppUser()
    {
        parent::SyL_User();
        $this->initMenu();
    }

    /**
     * ユーザー名を取得する
     * 
     * @access public
     * @return string ユーザー名
     */
    function getName()
    {
        return $this->user_name;
    }

    /**
     * 権限IDを取得する
     * 
     * @access public
     * @return string 権限ID
     */
    function getAuthorityId()
    {
        return $this->authority_id;
    }

    /**
     * 管理者判定を行う
     * 
     * @access public
     * @return bool true: 管理者、false: 通常ユーザー
     */
    function isAdmin()
    {
        return ($this->admin_flag == '1');
    }

    /**
     * メニュー階層オブジェクトを取得する
     * 
     * @access public
     * @return object メニュー階層オブジェクト
     */
    function &getMenu()
    {
        return $this->menu;
    }

    /**
     * メニューオブジェクトを初期化
     * 
     * @access public
     */
    function initMenu()
    {
        $this->menu = null;
        $this->menu =& new AQDataMenu('0', '-1', '', AQ_MENU_ROOT_NAME);
    }

    /**
     * ログイン成功時に起動されるイベント
     * 
     * @access public
     * @param string ユーザーID
     */
    function triggerLoginSuccess($user_id)
    {
        $user_manager =& AQManager::factory($this->getDB(), 'User');
        // ユーザーデータの取得
        $user_data = $user_manager->getUserData($user_id);
        $this->user_name    = $user_data['USER_NAME'];
        $this->admin_flag   = $user_data['ADMIN_FLAG'];
        $this->authority_id = $user_data['AUTHORITY_ID'];
        // ログイン成功ログ
        $user_manager->addUserHistory('1', $user_id);
    }

    /**
     * ログインエラー時に起動されるイベント
     * 
     * @access public
     * @param string ユーザーID
     */
    function triggerLoginFailed($user_id)
    {
        $user_manager =& AQManager::factory($this->getDB(), 'User');
        // ログインエラーログ
        $user_manager->addUserHistory('2', $user_id);
    }

    /**
     * ログアウト時に起動されるイベント
     * 
     * @access public
     * @param string ユーザーID
     */
    function triggerLogout($user_id)
    {
        $user_manager =& AQManager::factory($this->getDB(), 'User');
        // ログアウトログ
        $user_manager->addUserHistory('3', $user_id);
    }

    /**
     * DBコネクションオブジェクトを取得する
     * 
     * @access private
     * @return object DBコネクションオブジェクト
     */
    function &getDB()
    {
        return SyL_DB::getConnection();
    }
}

?>
