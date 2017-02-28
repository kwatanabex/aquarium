<?php
SyL_Loader::fw('Adm.Flow.Del');

/**
 * Aq_users_historyフォーム削除クラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Authority_Del extends SyL_AdmFlowDel
{
    /**
     * アクションフォームクラス名
     *
     * @access protected
     * @var string
     */
    var $classname = 'Adm.Forms.Aq_authority';
}

?>
