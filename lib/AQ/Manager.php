<?php
/**
 * DB���饹
 */
SyL_Loader::lib('DB');
/**
 * DB�ǡ��������������饹
 */
SyL_Loader::lib('DB.Dao');
SyL_Loader::lib('DB.Dao.Table');

/**
 * AQUARIM�ޥ͡����㥯�饹
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQManager
{
    /**
     * DAO���֥�������
     *
     * @access private
     * @var object
     */
    var $dao = null;

    /**
     * ���󥹥ȥ饯��
     *
     * @access public
     * @param object DB���֥�������
     */
    function AQManager(&$conn)
    {
        if (!is_a($conn, 'SyL_DB')) {
            SyL_Error::trigger("[AQ error] Connection object not extends `SyL_DB' class");
        }
        $this->dao =& new SyL_DBDao($conn);
    }

    /**
     * DB�ޥ͡����㥯�饹�Υե����ȥ꡼
     *
     * @static
     * @access public
     * @param object ���ͥ�����󥪥֥�������
     * @param string �ޥ͡�����̾
     */
    function &factory(&$conn, $name, $force=false)
    {
        static $managers = array();
        if (!isset($managers[$name]) || $force) {
            $classname = "AQ.Manager.{$name}";
            SyL_Loader::lib($classname);
            $classname = str_replace('.', '', $classname);
            $managers[$name] =& new $classname($conn);
        }
        return $managers[$name];
    }

    /**
     * ��³������������
     *
     * @access public
     * @return array ��³����
     */
    function getDsnInfo()
    {
        $conn =& $this->dao->getConnection();
        $dsn = $conn->getDsnInfo();
        $dsn['driver'] = $conn->getType();
        return $dsn;
    }
}

?>
