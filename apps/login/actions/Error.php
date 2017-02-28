<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 */

/**
 * AQUARIUM���顼�����ѥ��饹
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Error extends AppAction
{
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
        $error = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

        $error_title   = '';
        $error_message = '';
        switch ($error) {
        case 'menu_error':
            $error_title   = '��˥塼�������顼';
            $error_message = '������������URL���Ф����˥塼����Ͽ����Ƥ��ޤ���';
            break;
        case 'auth_error':
            $error_title   = '���¥��顼';
            $error_message = '������������URL���Ф��븢�¤�����ޤ���';
            break;
        default:
            // �������Ƚ���
            $context->doLogout();
            // ��������̤�����
            SyL_Response::redirect('/aquarium/login.php');
        }

        $data->set('error_title',   $error_title);
        $data->set('error_message', $error_message);
    }
}

?>
