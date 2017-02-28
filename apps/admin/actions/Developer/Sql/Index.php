<?php
/**
 * AdmFormsAq_adm_table�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Sql_Index extends AppAction
{
    /**
     * ������������
     *
     * @access public
     * @param object �ꥯ�����ȥ��֥�������
     * @param object �ǡ����������֥�������
     */
    function execute(&$data, &$context)
    {
        $conn =& $context->getDB();
        $dsn = $conn->getDsnInfo();
        $dsn['driver'] = $conn->getType();
        $context->closeDB($conn);

        $data->set('dsn', $dsn);
        $data->set('url_script', $context->getScriptName());
    }

}

?>
