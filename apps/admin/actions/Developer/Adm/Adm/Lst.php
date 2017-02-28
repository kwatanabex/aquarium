<?php
SyL_Loader::fw('Adm.Flow.Lst');

/**
 * AdmFormsAq_adm_validationフォーム一覧表示クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Adm_Lst extends SyL_AdmFlowLst
{
    /**
     * アクションフォームクラス名
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_adm';

    /**
     * アクションメソッド実行後に実行されるメソッド
     * 
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function postExecute(&$data, &$context)
    {
        $data->set('url_script', $context->getScriptName());

        parent::postExecute($data, $context);
        $context->setTemplateFile('/Developer/Adm/Adm/Lst.html');
    }
}

?>
