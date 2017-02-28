<?php
/**
 * SQL�¹� Ajax-Json���饹
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id$
 * @link      http://www.syl.jp/
 */
class Developer_Sql_AjaxSql extends AppAction
{
    /**
     * �ǥե���ȥ��������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȴ������֥�������
     */
    function execute(&$data, &$context)
    {
        $data->apply('mb_convert_encoding', SYL_ENCODE_INTERNAL, SYL_ENCODE_JS);

        $sql = $data->get('sql');

        $result = null;
        $error  = true;
        $error_message  = 'SQL�¹���˥��顼��ȯ�����ޤ������ܺ٤ϥ����ǧ���Ƥ���������';

        // ���顼�ϥ�ɥ���Ѥ˻����˥��顼����򥻥å�
        $data->set('result', $result);
        $data->set('error',  $error);
        $data->set('error_message', $error_message);

        if ($sql) {
            $conn =& $context->getDB();
            $conn->beginTransaction();
            $result = $conn->query($sql);
            if ($conn->isError()) {
                $conn->rollback();
                $error = true;
                $error_message = $conn->errorInfo();
            } else {
                $error = false;
                $conn->commit();

                // �����Ϥξ��
                if (is_numeric($result)) {
                    $result = true;
                }
            }
            $context->closeDB($conn);
        }

        $data->set('result', $result);
        $data->set('error',  $error);
        $data->set('error_message', $error_message);

        $data->apply('mb_convert_encoding', SYL_ENCODE_JS, SYL_ENCODE_INTERNAL);
        $context->setViewType('json');
    }
}

?>
