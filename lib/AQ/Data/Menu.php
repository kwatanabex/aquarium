<?php
/**
 * AQUARIM����ƥ�ĥ�˥塼���إ��饹
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
     * ��˥塼ID
     * 
     * @access private
     * @var string
     */
    var $id = '';
    /**
     * �ƥ�˥塼ID
     * 
     * @access private
     * @var string
     */
    var $parent_id = '';
    /**
     * ��˥塼̾��
     * 
     * @access private
     * @var string
     */
    var $name = '';
    /**
     * URL̾��
     * 
     * @access private
     * @var string
     */
    var $url_name = '';
    /**
     * ��˥塼������
     * 
     * @access private
     * @var string
     */
    var $description = '';
    /**
     * ������쥯��URL
     * 
     * @access private
     * @var string
     */
    var $redirect_url = '';
    /**
     * ��˥塼ɽ���ե饰
     * 
     * @access private
     * @var bool
     */
    var $is_display = true;
    /**
     * ���������ĥե饰
     * 
     * @access private
     * @var string
     */
    var $is_access = false;
    /**
     * ������̵���¥��������ĥե饰
     * 
     * @access private
     * @var string
     */
    var $is_lower_access = false;
    /**
     * ADM������
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
     * ��˥塼ɽ����
     * 
     * @access private
     * @var int
     */
    var $order = 0;
    /**
     * �����ǳ�Ǽ����
     * 
     * @access private
     * @var array
     */
    var $menus = array();

    /**
     * ���󥹥ȥ饯��
     *
     * @access public
     * @param string ��˥塼ID
     * @param string �ƥ�˥塼ID
     * @param string URL̾��
     * @param string ��˥塼̾��
     * @param string ��˥塼������
     * @param string ������쥯��URL
     * @param bool ��˥塼ɽ���ե饰
     * @param bool ���������ĥե饰
     * @param bool ������̵���¥��������ĥե饰
     * @param string ADM������
     * @param int ADM ID
     * @param int ��˥塼ɽ����
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
     * ��˥塼ID�����
     *
     * @access public
     * @return string ��˥塼ID
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * �ƥ�˥塼ID�����
     *
     * @access public
     * @return string �ƥ�˥塼ID
     */
    function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * ��˥塼̾�Τ����
     *
     * @access public
     * @return string ̾��
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * URL̾�Τ����
     *
     * @access public
     * @return string ̾��
     */
    function getUrlName()
    {
        return $this->url_name;
    }

    /**
     * ��˥塼���������
     *
     * @access public
     * @return string ��˥塼����
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * ������쥯��URL�����
     *
     * @access public
     * @return string ������쥯��URL
     */
    function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * ��˥塼ɽ��Ƚ��
     *
     * @access public
     * @return bool ��˥塼ɽ��Ƚ��
     */
    function isDisplay()
    {
        return $this->is_display;
    }

    /**
     * ��������Ƚ��
     *
     * @access public
     * @return bool ��������Ƚ��
     */
    function isAccess()
    {
        return $this->is_access;
    }

    /**
     * ������̵���¥�������Ƚ��
     *
     * @access public
     * @return bool ������̵���¥�������Ƚ��
     */
    function isLowerAccess()
    {
        return $this->is_lower_access;
    }

    /**
     * ��ưADMȽ�꤫Ƚ�ꤹ��
     *
     * @access public
     * @return bool ��ưADMȽ��
     */
    function isAutoAdm()
    {
        return ($this->adm_type == '1');
    }

    /**
     * ADM ID���������
     *
     * @access public
     * @return int ADM ID
     */
    function getAdmId()
    {
        return $this->adm_id;
    }

    /**
     * ��˥塼ɽ��������
     *
     * @access public
     * @return int ��˥塼ɽ����
     */
    function getOrder()
    {
        return $this->order;
    }

    /**
     * �����Ǥ��ɲä���
     *
     * @access public
     * @param object ������
     */
    function add($menu)
    {
        $this->menus[] = $menu;
    }

    /**
     * �ҥ�˥塼¸�߳�ǧ
     *
     * @access public
     * @return bool true: �ҥ�˥塼¸�ߤ���, false: �ҥ�˥塼¸�ߤ��ʤ�
     */
    function hasChildMenu()
    {
        return (count($this->menus) > 0);
    }

    /**
     * �ҥ�˥塼�����
     *
     * @access public
     * @return array �ҥ�˥塼
     */
    function &getChildMenus()
    {
        return $this->menus;
    }

    /**
     * ��˥塼���Ȥθ��¥����å�
     *
     * @access public
     * @param array ��˥塼����
     * @param int ����
     * @return bool true: ���¤���, false: ���¤ʤ�
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
            // �롼�ȳ��ؤ�OK
            return true;
        }
    }

    /**
     * �����ȤΥ�˥塼���֥������Ȥ��������
     *
     * @access public
     * @param array ��˥塼����
     * @return object �����ȤΥ�˥塼���֥�������
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
