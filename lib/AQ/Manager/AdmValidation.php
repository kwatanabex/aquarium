<?php
/**
 * AQUARIM�ޥ͡����㥯�饹
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DB�ǡ���������饹
 */
SyL_Loader::lib('Adm.Tables.Aq_adm_validation');
SyL_Loader::lib('Adm.Tables.Aq_adm_validation_p');

/**
 * AQUARIM ADM�Х�ǡ������ɥᥤ��ޥ͡����㥯�饹
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
    // �Х�ǡ������ơ��֥����
    // -------------------------------------------

    /**
     * �Х�ǡ�����������������
     *
     * @access public
     * @param int �Х�ǡ������ID
     * @return array �Х�ǡ���������
     */
    function getValidation($validation_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation(), array('VALIDATION_ID' => $validation_id));
    }

    /**
     * �Х�ǡ���������򥿥��פ����������
     *
     * @access public
     * @param string �Х�ǡ������̾
     * @return array �Х�ǡ���������
     */
    function getValidationFromType($validation_type)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation(), array('VALIDATION_TYPE' => $validation_type));
    }


    // -------------------------------------------
    // �Х�ǡ������ѥ�᡼���ơ��֥����
    // -------------------------------------------

    /**
     * �Х�ǡ������ѥ�᡼��������������
     *
     * @access public
     * @param int �Х�ǡ������ѥ�᡼��ID
     * @return array �Х�ǡ������ѥ�᡼������
     */
    function getValidationParameter($validation_p_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation_p(), array('VALIDATION_P_ID' => $validation_p_id));
    }

    /**
     * �Х�ǡ������ѥ�᡼�������ѥ�᡼�������פ����������
     *
     * @access public
     * @param int �Х�ǡ������ID
     * @param string �Х�ǡ������ѥ�᡼��������
     * @return array �Х�ǡ������ѥ�᡼������
     */
    function getValidationParameterFromType($validation_id, $validation_p_type)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_validation_p(), array('VALIDATION_ID' => $validation_id, 'VALIDATION_P_TYPE' => $validation_p_type));
    }

}

?>
