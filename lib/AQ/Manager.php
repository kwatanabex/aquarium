<?php
/**
 * DBクラス
 */
SyL_Loader::lib('DB');
/**
 * DBデータアクセスクラス
 */
SyL_Loader::lib('DB.Dao');
SyL_Loader::lib('DB.Dao.Table');

/**
 * AQUARIMマネージャクラス
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
     * DAOオブジェクト
     *
     * @access private
     * @var object
     */
    var $dao = null;

    /**
     * コンストラクタ
     *
     * @access public
     * @param object DBオブジェクト
     */
    function AQManager(&$conn)
    {
        if (!is_a($conn, 'SyL_DB')) {
            SyL_Error::trigger("[AQ error] Connection object not extends `SyL_DB' class");
        }
        $this->dao =& new SyL_DBDao($conn);
    }

    /**
     * DBマネージャクラスのファクトリー
     *
     * @static
     * @access public
     * @param object コネクションオブジェクト
     * @param string マネージャ名
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
     * 接続情報を取得する
     *
     * @access public
     * @return array 接続情報
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
