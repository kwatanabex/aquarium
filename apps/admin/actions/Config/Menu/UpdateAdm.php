<?php
/**
 * �ե����륯�饹
 */
SyL_Loader::lib('File');

/**
 * AdmFormsAq_adm_table�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Config_Menu_UpdateAdm extends AppAction
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
        $id = explode('=', $data->get('id'), 2);
        if (!isset($id[1]) || !is_numeric($id[1])) {
            SyL_Response::redirect($context->getScriptName() . '/Config/Menu/');
        }
        $id = $id[1];

        // ������桼�������֥������ȼ���
        $user =& $context->getUser();
        // DB���֥������ȼ���
        $conn =& $context->getDB();

        // ��˥塼�ޥ͡���������
        $menu_manager =& AQManager::factory($conn, 'Menu');

        if ($context->isPost()) {
            $adm_type = $data->get('at');
            $adm_id   = $data->get('adm');

            if ($adm_type === '0') {
                $adm_id = is_numeric($adm_id) ? $adm_id : null;
            } else if ($adm_type === '1') {
                if (!is_numeric($adm_id)) {
                    SyL_Error::trigger("[Aquarium error] �ѥ�᡼���������Ǥ�");
                }

                // ADM�ޥ͡��������
                $adm_manager =& AQManager::factory($conn, 'Adm');
                // ADM�ơ��֥�ޥ͡��������
                $admtable_manager =& AQManager::factory($conn, 'AdmTable');

                // ADM��Ϣ�������
                $adm_relations = $adm_manager->getAdmRelations($adm_id);
                if (count($adm_relations) == 0) {
                    SyL_Error::trigger("[Aquarium error] ADM��Ϣ������Ͽ����Ƥ��ޤ��� (ID: {$adm_id})");
                }

                // �ơ��֥륯�饹����
                $table_classes = array();
                $adm_tables    = array();
                $adm_packege_name = str_replace('.', '', AQ_ADM_GENERATE_PACKAGE);
                foreach ($adm_relations as $i => $adm_relation) {
                    $table_classes[$i]['name']  = str_replace('{TABLE_ID}', $adm_relation['TABLE_ID'], AQ_GENERATED_TABLE_CLASS_PREFIX);
                    $table_classes[$i]['class'] = $admtable_manager->createTableClass($adm_relation['TABLE_ID'], $adm_packege_name . $table_classes[$i]['name']);
                    $adm_tables[chr($i+97)] = AQ_ADM_GENERATE_PACKAGE . '.' . $table_classes[$i]['name'];
                }

                // ADM���饹����
                $adm_class_name = str_replace('{ADM_ID}', $adm_id, AQ_GENERATED_ADM_CLASS_PREFIX);
                $adm_class = $adm_manager->createAdmClass($adm_id, $adm_packege_name . $adm_class_name, $adm_tables);

                // �ơ��֥륯�饹��¸
                foreach ($table_classes as $table_class) {
                    $class_file = AQ_ADM_GENERATE_CLASS_DIR . '/' . $table_class['name'] . '.php';
                    $file =& SyL_File::factory('w', $class_file);
                    $file->setPermission(0777);
                    $file->process($table_class['class']);
                }

                // ADM���饹��¸
                $class_file = AQ_ADM_GENERATE_CLASS_DIR . '/' . $adm_class_name . '.php';
                $file =& SyL_File::factory('w', $class_file);
                $file->setPermission(0777);
                $file->process($adm_class);

            } else {
                SyL_Error::trigger("[Aquarium error] �ѥ�᡼���������Ǥ�");
            }

            $menus = array();
            $menus['ADM_TYPE'] = $adm_type;
            $menus['ADM_ID']   = $adm_id;

            if ($menu_manager->updateMenu($id, $menus)) {
                SyL_Response::redirect($context->getScriptName() . '/Config/Menu/');
            } else {
                SyL_Error::trigger("[Aquarium error] �������˥��顼��ȯ�����ޤ���", E_USER_ERROR);
            }
            // -- exit
        } else {
            $menus = $menu_manager->getMenu($id, $user->isAdmin(), $user->getAuthorityId());
        }

        // ADM�ޥ͡���������
        $adm_manager =& AQManager::factory($conn, 'Adm');
        $adms = $adm_manager->getAdms();

        $context->closeDB($conn);

        $data->set('menus', $menus);
        $data->set('adms',  $adms);
        $data->set('url_script',   $context->getScriptName());
    }

}

?>
