<?php
SyL_Loader::fw('Adm.Flow.Upd');

/**
 * AdmFormsAq_authority_menuフォーム更新クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Authority_Menu_Upd extends SyL_AdmFlowUpd
{
    /**
     * アクションフォームクラス名
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_authority_menu';

    /**
     * アクションメソッド実行後に実行されるメソッド
     * 
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function postExecute(&$data, &$context)
    {
        parent::postExecute($data, $context);
        $context->setTemplateFile('/Common/Adm/Upd.html');
    }
}

?>
