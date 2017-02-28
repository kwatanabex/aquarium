<?php
/**
 * AQUARIMマネージャクラス
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DBデータ定義クラス
 */
SyL_Loader::lib('Adm.Tables.Aq_adm_validation');
SyL_Loader::lib('Adm.Tables.Aq_adm_validation_p');

/**
 * AQUARIM ADMバリデーションドメインマネージャクラス
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQManagerAdmValidation extends AQManager
{
    // -------------------------------------------
    // バリデーションテーブル情報
    // -------------------------------------------

    /**
     * バリデーション情報を取得する
     *
     * @access public
     * @param int バリデーションID
     * @return array バリデーション情報
     */
    function getValidation($validation_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation(), array('VALIDATION_ID' => $validation_id));
    }

    /**
     * バリデーション情報をタイプから取得する
     *
     * @access public
     * @param string バリデーション名
     * @return array バリデーション情報
     */
    function getValidationFromType($validation_type)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation(), array('VALIDATION_TYPE' => $validation_type));
    }


    // -------------------------------------------
    // バリデーションパラメータテーブル情報
    // -------------------------------------------

    /**
     * バリデーションパラメータ情報を取得する
     *
     * @access public
     * @param int バリデーションパラメータID
     * @return array バリデーションパラメータ情報
     */
    function getValidationParameter($validation_p_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation_p(), array('VALIDATION_P_ID' => $validation_p_id));
    }

    /**
     * バリデーションパラメータ情報をパラメータタイプから取得する
     *
     * @access public
     * @param int バリデーションID
     * @param string バリデーションパラメータタイプ
     * @return array バリデーションパラメータ情報
     */
    function getValidationParameterFromType($validation_id, $validation_p_type)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation_p(), array('VALIDATION_ID' => $validation_id, 'VALIDATION_P_TYPE' => $validation_p_type));
    }

}

?>
