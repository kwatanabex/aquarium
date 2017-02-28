<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * ��˥塼Index
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Config_Menu_Index extends AppAction
{
    /**
     * ���������᥽�åɼ¹����˼¹Ԥ����᥽�å�
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function preExecute(&$data, &$context)
    {
    }

    /**
     * �ǥե���ȥ�����������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȴ������֥�������
     * @return void
     */
    function execute(&$data, &$context)
    {
        include_once 'Lst.php';
        $action =& new Config_Menu_Lst();
        $action->preExecute($data, $context);
        $action->execute($data, $context);
        $action->postExecute($data, $context);
        $context->setTemplateFile('/Config/Menu/Lst.html');
    }

    /**
     * ���������᥽�åɼ¹Ը�˼¹Ԥ����᥽�å�
     * 
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function postExecute(&$data, &$context)
    {
    }
}

?>
