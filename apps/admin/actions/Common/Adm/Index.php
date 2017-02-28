<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * �桼������ϿIndex
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Common_Adm_Index extends AppAction
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
        $action =& new Common_Adm_Lst();
        $action->preExecute($data, $context);
        $action->execute($data, $context);
        $action->postExecute($data, $context);
        $context->setTemplateFile('/Common/Adm/Lst.html');
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
