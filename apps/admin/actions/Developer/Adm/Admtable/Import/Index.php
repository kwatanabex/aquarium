<?php
/**
 * AdmFormsAq_adm_table�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Admtable_Import_Index extends AppAction
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
        // ADM�ơ��֥�ޥ͡���������
        $admtable_manager =& AQManager::factory($conn, 'AdmTable');

        if ($context->isPost()) {
            $tables = $data->geta('table');
            if (is_array($tables)) {
                // �ȥ�󥶥�����󳫻�
                $conn->beginTransaction();
                $result = true;
                // ��Ͽ�롼��
                foreach ($tables as $table) {
                    if (substr_count($table, '.') == 1) {
                        list($type, $table) = explode('.', $table, 2);
                        if (!$admtable_manager->importTable($table, $type)) {
                            $result = false;
                            break;
                        }
                    }
                }
                if ($result) {
                    // �ȥ�󥶥���������
                    $conn->commit();
                } else {
                    // �ȥ�󥶥�������˴�
                    $conn->rollback();
                    SyL_Error::trigger("[Aquarium error] �ơ��֥륤��ݡ��Ȼ��˥��顼��ȯ�����ޤ������ܺ٤ϡ������ǧ���Ƥ�������", E_USER_ERROR);
                }
            }
            SyL_Response::redirect($context->getScriptName() . '/Developer/Adm/Admtable/');

        } else {
            $adm_tables  = $admtable_manager->getTables();
            $meta_tables = $admtable_manager->getMetaTables();
            $dsn         = $admtable_manager->getDsnInfo();

            $tables = array();
            $all_registed = true;
            foreach ($meta_tables as $meta_table) {
                $regist = false;
                foreach ($adm_tables as $adm_table) {
                    if ($meta_table['name'] == $adm_table['TABLE_NAME']) {
                        $regist = true;
                    }
                }
                if (!$regist) {
                    $all_registed = false;
                }

                $tables[] = array(
                  'name' => $meta_table['name'],
                  'view' => $meta_table['view'],
                  'regist' => $regist
                );
            }

            $data->set('url_script', $context->getScriptName());
            $data->set('dsn',    $dsn);
            $data->set('all_registed', $all_registed);
            $data->set('tables', $tables);
        }
    }

}

?>
