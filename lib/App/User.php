<?php
/**
 * AQUARIM �ޥ͡����㥯�饹
 */
SyL_Loader::lib('AQ.Manager');
/**
 * AQUARIM ����ƥ�ĥ��饹
 */
SyL_Loader::lib('AQ.Data.Menu');

/**
 * ���ץꥱ��������٥�ζ��̥桼�������饹
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
     * �桼����ID�ѥ�᡼��̾
     * 
     * @access protected
     * @var string
     */
    var $userid_param_name = 'aq_login_username';
    /**
     * �ѥ���ɥѥ�᡼��̾
     * 
     * @access protected
     * @var string
     */
    var $password_param_name = 'aq_login_password';
    /**
     * ������ǧ�ڻ��Υѥ���ɥϥå�����ˡ
     * array(CLIENT¦��HASH����ˡ, SERVER¦��HASH����ˡ)
     * 
     * @access protected
     * @var string
     */
    //var $password_hash = array('md5','md5');
    var $password_hash = array(null,null);

    /**
     * �桼����̾
     *
     * @access private
     * @var string
     */
     var $user_name = '';
    /**
     * ����ID
     *
     * @access private
     * @var string
     */
     var $authority_id = '';
    /**
     * �����ԥե饰
     *
     * @access private
     * @var string
     */
     var $admin_flag = '0';
    /**
     * AQUARIM��˥塼���إ��֥�������
     *
     * @access private
     * @var array
     */
     var $menu = null;

    /**
     * ���󥹥ȥ饯��
     * 
     * @access public
     */
    function AppUser()
    {
        parent::SyL_User();
        $this->initMenu();
    }

    /**
     * �桼����̾���������
     * 
     * @access public
     * @return string �桼����̾
     */
    function getName()
    {
        return $this->user_name;
    }

    /**
     * ����ID���������
     * 
     * @access public
     * @return string ����ID
     */
    function getAuthorityId()
    {
        return $this->authority_id;
    }

    /**
     * ������Ƚ���Ԥ�
     * 
     * @access public
     * @return bool true: �����ԡ�false: �̾�桼����
     */
    function isAdmin()
    {
        return ($this->admin_flag == '1');
    }

    /**
     * ��˥塼���إ��֥������Ȥ��������
     * 
     * @access public
     * @return object ��˥塼���إ��֥�������
     */
    function &getMenu()
    {
        return $this->menu;
    }

    /**
     * ��˥塼���֥������Ȥ�����
     * 
     * @access public
     */
    function initMenu()
    {
        $this->menu = null;
        $this->menu =& new AQDataMenu('0', '-1', '', AQ_MENU_ROOT_NAME);
    }

    /**
     * �������������˵�ư����륤�٥��
     * 
     * @access public
     * @param string �桼����ID
     */
    function triggerLoginSuccess($user_id)
    {
        $user_manager =& AQManager::factory($this->getDB(), 'User');
        // �桼�����ǡ����μ���
        $user_data = $user_manager->getUserData($user_id);
        $this->user_name    = $user_data['USER_NAME'];
        $this->admin_flag   = $user_data['ADMIN_FLAG'];
        $this->authority_id = $user_data['AUTHORITY_ID'];
        // ������������
        $user_manager->addUserHistory('1', $user_id);
    }

    /**
     * �����󥨥顼���˵�ư����륤�٥��
     * 
     * @access public
     * @param string �桼����ID
     */
    function triggerLoginFailed($user_id)
    {
        $user_manager =& AQManager::factory($this->getDB(), 'User');
        // �����󥨥顼��
        $user_manager->addUserHistory('2', $user_id);
    }

    /**
     * �������Ȼ��˵�ư����륤�٥��
     * 
     * @access public
     * @param string �桼����ID
     */
    function triggerLogout($user_id)
    {
        $user_manager =& AQManager::factory($this->getDB(), 'User');
        // �������ȥ�
        $user_manager->addUserHistory('3', $user_id);
    }

    /**
     * DB���ͥ�����󥪥֥������Ȥ��������
     * 
     * @access private
     * @return object DB���ͥ�����󥪥֥�������
     */
    function &getDB()
    {
        return SyL_DB::getConnection();
    }
}

?>
