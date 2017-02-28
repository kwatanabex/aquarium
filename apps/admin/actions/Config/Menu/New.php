<?php
SyL_Loader::fw('Adm.Flow.New');

/**
 * AdmFormsAq_menuフォーム新規作成クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_New extends SyL_AdmFlowNew
{
    /**
     * アクションフォームクラス名
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_menu';

    /**
     * バリデーション実行
     *
     * @access public
     * @param object ADMオブジェクト
     * @return bool true: バリデーションOK、false: バリデーションエラー
     */
    function validate(&$adm)
    {
        // フォーム取得
        $form =& $this->getForm();
        $element =& $form->getElement('MENU_URL_NAME');
        $value = $element->getValue();
        $element->setValue(ucfirst($value));
        return $adm->validate();
    }

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
        $context->setTemplateFile('/Common/Adm/New.html');
    }
}

?>
