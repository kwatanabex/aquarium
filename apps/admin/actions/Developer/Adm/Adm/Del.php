<?php
SyL_Loader::fw('Adm.Flow.Del');

/**
 * AdmFormsAq_adm_validationフォーム削除クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Adm_Del extends SyL_AdmFlowDel
{
    /**
     * アクションフォームクラス名
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_adm';
    
    /**
     * 削除実行
     *
     * @access public
     * @param object ADMオブジェクト
     */
    function delete(&$adm)
    {
        return parent::delete($adm);
    }
}

?>
