<?php
SyL_Loader::fw('Adm.Flow.New');

/**
 * AdmFormsAq_usersフォーム新規作成クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Common_Adm_New extends SyL_AdmFlowNew
{
    /**
     * アクションメソッド実行前に実行されるメソッド
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function preExecute(&$data, &$context)
    {
        parent::preExecute($data, $context);

        $user =& $context->getUser();
        $menu =& $user->getMenu();
        // カレントのメニュー取得
        $current_menu =& $menu->getCurrentMenu($context->getUrlNames());

        $adm_id = $current_menu->getAdmId();
        // 自動Adm用クラス名に変更
        $this->classname = AQ_ADM_GENERATE_PACKAGE . '.' . str_replace('{ADM_ID}', $adm_id, AQ_GENERATED_ADM_CLASS_PREFIX);

        // 作成ファイルチェック
        $class_file = AQ_ADM_GENERATE_CLASS_DIR . '/' . str_replace('{ADM_ID}', $adm_id, AQ_GENERATED_ADM_CLASS_PREFIX) . '.php';
        if (!is_file($class_file)) {
            SyL_Error::trigger('ADMファイルが作成されていません。<a href="' . $context->getScriptName() . '/Config/Menu/">メニュー管理</a>からADMを作成してください');
        }
    }
}

?>
