<?php
/**
 * AQUARIMマネージャクラス
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DBデータ定義クラス
 */
SyL_Loader::lib('Adm.Tables.Aq_users');
SyL_Loader::lib('Adm.Tables.Aq_users_history');

/**
 * AQUARIMユーザードメインマネージャクラス
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQManagerUser extends AQManager
{
    /**
     * ユーザーデータを取得する
     *
     * @access public
     * @param string ログインID
     */
    function getUserData($login_id)
    {
        $table =& new AdmTablesAq_users();
        $condition = $this->dao->createCondition();
        $condition->addEqual('LOGIN_ID', $login_id);
        $table->setConditions($condition);
        $result = $this->dao->select($table);
        if (count($result) > 0) {
            return $result[0];
        } else {
            SyL_Loggers::notice("[AQ_USER] user data not found. ({$login_id})");
            return array();
        }
    }

    /**
     * ユーザー履歴テーブルに登録する
     * ただし、ユーザーテーブルに存在するユーザーIDのみ
     *
     * @access public
     * @param string 実行タイプ
     * @param string ログインID
     */
    function addUserHistory($action_type, $login_id)
    {
        $table =& new AdmTablesAq_users();
        $condition = $this->dao->createCondition();
        $condition->addEqual('LOGIN_ID', $login_id);
        $table->setConditions($condition);
        $result = $this->dao->select($table);
        if (count($result) > 0) {
            $table =& new AdmTablesAq_users_history();
            $table->addColumn('USER_ID', $result[0]['USER_ID']);
            $table->addColumn('ACTION_TYPE', $action_type);
            $table->addColumn('IP_ADDRESS', isset($_SERVER['REMOTE_ADDR'])     ? $_SERVER['REMOTE_ADDR'] : null);
            $table->addColumn('USER_AGENT', isset($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 250) : null);
            $table->addColumn('ACTION_DATE', date('Y-m-d H:i:s'));
            $this->dao->insert($table);
        } else {
            SyL_Loggers::notice("[AQ_USER] Invalid Access ? `LOGIN_ID' not found. ({$login_id})");
        }
    }

}

?>
