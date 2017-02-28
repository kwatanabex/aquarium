<?php
/**
 * AQUARIM�ޥ͡����㥯�饹
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DB�ǡ���������饹
 */
SyL_Loader::lib('Adm.Tables.Aq_adm');
SyL_Loader::lib('Adm.Tables.Aq_adm_relation');
SyL_Loader::lib('Adm.Tables.Aq_adm_table');
SyL_Loader::lib('Adm.Tables.Aq_adm_element');
SyL_Loader::lib('Adm.Tables.Aq_adm_element_validation');
SyL_Loader::lib('Adm.Tables.Aq_adm_element_validation_p');

/**
 * AQUARIM ADM�ɥᥤ��ޥ͡����㥯�饹
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQManagerAdm extends AQManager
{
    // -------------------------------------------
    // ADM�ơ��֥����
    // -------------------------------------------

    /**
     * ADM�ơ��֥������������
     *
     * @access public
     * @param int ADM ID
     * @return array ADM�ơ��֥����
     */
    function getAdm($adm_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm(), array('ADM_ID' => $adm_id));
    }

    /**
     * ADM�������������
     *
     * @access public
     * @return array ADM�ơ��֥����
     */
    function getAdms()
    {
        return $this->dao->getRecords(new AdmTablesAq_adm(), array(), array('ADM_NAME'));
    }

    /**
     * ADM�ơ��֥��MAX ID���������
     *
     * @access public
     * @return int MAX ID
     */
    function getAdmMaxId()
    {
        return $this->dao->getMaxId(new AdmTablesAq_adm(), 'ADM_ID');
    }

    /**
     * ADM����Ͽ����
     *
     * @access public
     * @param string ADM̾
     * @return bool ��Ͽ���
     */
    function addAdm($adm_name)
    {
        $table =& new AdmTablesAq_adm();
        $table->addColumn('ADM_NAME', $adm_name);
        $table->addColumn('DEFAULT_SORT', 'a');
        $table->addColumn('DEFAULT_SEARCH_VIEW', '0');
        $table->addColumn('PAGE_RECORDS', 20);
        $table->addColumn('LINK_RANGE',   9);
        $table->addColumn('KEY_NAME',     'key');
        $table->addColumn('VIEW_CONFIRM', '1');
        $table->addColumn('VIEW_FIN',     '1');
        $table->addColumn('VIEW_ALERT',   '1');
        $table->addColumn('ENABLE_LST',   '1');
        $table->addColumn('ENABLE_NEW',   '1');
        $table->addColumn('ENABLE_UPD',   '1');
        $table->addColumn('ENABLE_DEL',   '1');
        $table->addColumn('ENABLE_VEW',   '1');
        $table->addColumn('ENABLE_SCH',   '1');
        return $this->dao->insert($table);
    }


    // -------------------------------------------
    // ADM��Ϣ�ơ��֥����
    // -------------------------------------------

    /**
     * ADM��Ϣ����������������
     *
     * @access public
     * @param int ADM ID
     * @return array ADM��Ϣ����
     */
    function getAdmRelations($adm_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_relation(), array('ADM_ID' => $adm_id), array('RELATION_TYPE', 'RELATION_ID'));
    }

    /**
     * ADM��Ϣ�������Ͽ����
     *
     * @access public
     * @param int ADM ID
     * @param int �ơ��֥�ID
     * @param string ��Ϣ������
     * @param string ��Ϣ�����
     * @return bool ��Ͽ���
     */
    function addAdmRelation($adm_id, $table_id, $type, $join_columns=null)
    {
        $relation =& new AdmTablesAq_adm_relation();
        $relation->addColumn('ADM_ID',        $adm_id);
        $relation->addColumn('TABLE_ID',      $table_id);
        $relation->addColumn('RELATION_TYPE', $type);
        if ($join_columns) {
            $relation->addColumn('JOIN_COLUMNS', $join_columns);
        }
        return $this->dao->insert($relation);
    }

    /**
     * ADM��Ϣ�����MAX ID���������
     *
     * @access public
     * @return int MAX ID
     */
    function getAdmRelationMaxId()
    {
        return $this->dao->getMaxId(new AdmTablesAq_adm_relation(), 'RELATION_ID');
    }


    // -------------------------------------------
    // ADM���ǥơ��֥����
    // -------------------------------------------

    /**
     * ADM���Ǿ���������������
     *
     * @access public
     * @param int ADM��ϢID
     * @return array ADM���Ǿ������
     */
    function getAdmElements($relation_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_element(), array('RELATION_ID' => $relation_id), array('ELEMENT_ID'));
    }

    /**
     * ADM��Ϣ�ơ��֥��MAX �����¤ӽ���������
     *
     * @access public
     * @param int ADM��ϢID
     * @return int MAX �����¤ӽ�
     */
    function getAdmElementMaxOrderId($relation_id)
    {
        return $this->dao->getMaxId(new AdmTablesAq_adm_element(), 'SORT_LIST_NUM', array('RELATION_ID' => $relation_id));
    }

    /**
     * ADM���ǥǡ�������Ͽ����
     *
     * @access public
     * @param int ADM��ϢID
     * @param int ����ǥå����ʽ����
     * @return bool ��Ͽ���
     */
    function addAdmElement($relation_id, $index=10)
    {
        $r = $this->dao->createRelation();

        $relation =& new AdmTablesAq_adm_relation();
        $relation->setDefaultAll(false);
        $condition = $this->dao->createCondition();
        $condition->addEqual('RELATION_ID', $relation_id);
        $relation->setConditions($condition);

        $table =& new AdmTablesAq_adm_table();
        $table->setDefaultAll(false);
        $r->addInnerJoin($relation, $table, array($relation->getAliasName() . '.TABLE_ID = ' . $table->getAliasName() . '.TABLE_ID'));

        $table_column =& new AdmTablesAq_adm_table_column();
        $table_column->addColumn('COLUMN_NAME');
        $r->addInnerJoin($table, $table_column, array($table->getAliasName() . '.TABLE_ID = ' . $table_column->getAliasName() . '.TABLE_ID'));

        $result = $this->dao->select(array($relation, $table, $table_column), $r);
        foreach ($result as $i => $row) {
            $element =& new AdmTablesAq_adm_element();
            $element->addColumn('RELATION_ID',  $relation_id);
            $element->addColumn('ELEMENT_NAME', $row['COLUMN_NAME']);
            $element->addColumn('DISPLAY_NAME', $row['COLUMN_NAME']);
            $element->addColumn('ELEMENT_TYPE', 'text');
            $element->addColumn('ELEMENT_ATTRIBUTES', 'size=30');
            $element->addColumn('ELEMENT_OPTIONS', '');
            $element->addColumn('DATA_SOURCE',  '');
            $element->addColumn('SORT_LIST_NUM',   $index);
            $element->addColumn('SORT_DETAIL_NUM', $index);
            $element->addColumn('READ_ONLY_NEW',  '0');
            $element->addColumn('READ_ONLY_UPD',  '0');
            $element->addColumn('DISPLAY_LIST',   '1');
            $element->addColumn('DISPLAY_DETAIL', '1');
            $element->addColumn('ELEMENT_SEARCH', '0');
            if (!$this->dao->insert($element)) {
                return false;
            }
            $index += 10;
        }

        return true;
    }


    // -------------------------------------------
    // ADM���ǥХ�ǡ������ơ��֥����
    // -------------------------------------------

    /**
     * ADM���ǥХ�ǡ���������������������
     *
     * @access public
     * @param int ����ID
     * @return array ADM���ǥХ�ǡ������������
     */
    function getElementValidations($element_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_element_validation(), array('ELEMENT_ID' => $element_id), array('VALIDATION_ID'));
    }


    // -------------------------------------------
    // ADM���ǥХ�ǡ������ѥ�᡼���ơ��֥����
    // -------------------------------------------

    /**
     * ADM���ǥХ�ǡ������ѥ�᡼���ơ��֥����������������
     *
     * @access public
     * @param int ����ID
     * @return array ADM���ǥХ�ǡ������������
     */
    function getElementValidationParameters($element_validation_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_element_validation_p(), array('ELEMENT_VALIDATION_ID' => $element_validation_id), array('VALIDATION_P_ID'));
    }


    // -------------------------------------------
    // ADM���󥤥�ݡ���
    // -------------------------------------------

    /**
     * ADM�ơ��֥��ADM�����ѥǡ����Ȥ�����Ͽ����
     *
     * @access public
     * @param string ADM̾
     * @param int �ơ��֥�ID
     * @param array ���ơ��֥����
     * [0] => array (
     *    'table_id'      => ...
     *    'relation_type' => ...
     *    'join_columns'  => ...
     * ),
     * ...
     * @return bool ��ϿOK: true, ��Ͽ���顼: false
     */
    function importAdmTables($adm_name, $table_id, $relations=array())
    {
        // ADM����Ͽ
        if (!$this->addAdm($adm_name)) {
            return false;
        }
        // ��ϿID����
        $adm_id = $this->getAdmMaxId();

        // ADM��Ϣ��Ͽ
        if (!$this->addAdmRelation($adm_id, $table_id, '0')) {
            return false;
        }
        // ADM������Ͽ
        if (!$this->addAdmElement($this->getAdmRelationMaxId())) {
            return false;
        }

        if (count($relations) > 0) {
            foreach ($relations as $relation) {
                $relation_id = $this->getAdmRelationMaxId();
                // ADM��Ϣ��Ͽ
                if (!$this->addAdmRelation($adm_id, $relation['table_id'], $relation['relation_type'], $relation['join_columns'])) {
                    return false;
                }
                // ���������Ƚ����
                $sort_index  = $this->getAdmElementMaxOrderId($relation_id);
                $sort_index  = $sort_index ? $sort_index + 10 : 10;

                // ADM������Ͽ
                if (!$this->addAdmElement($this->getAdmRelationMaxId(), $sort_index)) {
                    return false;
                }
            }
        }

        return true;
    }


    /**
     * ADM�ե����९�饹���������
     *
     * @access public
     * @param int ADM ID
     * @param string ���饹̾
     * @param array ADM�ơ��֥륯�饹
     * @return string �ơ��֥륯�饹
     */
    function createAdmClass($adm_id, $class_name, $table_classes)
    {
        // ADM�ơ��֥�ޥ͡��������
        $admtable_manager =& AQManager::factory($this->dao->getConnection(), 'AdmTable');
        // ADM�Х�ǡ������ޥ͡��������
        $admvalidation_manager =& AQManager::factory($this->dao->getConnection(), 'AdmValidation');

        // ��ϢID���
        $table_ids = array();
        foreach ($table_classes as $i => $table_class) {
            if (preg_match('/.+_([0-9]+)$/', $table_class, $matches)) {
                $table_ids[$i] = $matches[1];
            }
        }

        // ADM�������
        $adm_info = $this->getAdm($adm_id);

        $structs_config = array();
        $structs_config['title']        = $adm_info['ADM_NAME'];
        $structs_config['default_sort'] = array ();
        $structs_config['default_search_view'] = (bool)$adm_info['DEFAULT_SEARCH_VIEW'];
        $structs_config['page_records'] = (int)$adm_info['PAGE_RECORDS'];
        $structs_config['link_range']   = (int)$adm_info['LINK_RANGE'];
        $structs_config['key_name']     = $adm_info['KEY_NAME'];
        $structs_config['view_confirm'] = (bool)$adm_info['VIEW_CONFIRM'];
        $structs_config['view_fin']     = (bool)$adm_info['VIEW_FIN'];
        $structs_config['view_alert']   = (bool)$adm_info['VIEW_ALERT'];
        $structs_config['enable_lst']   = (bool)$adm_info['ENABLE_LST'];
        $structs_config['enable_new']   = (bool)$adm_info['ENABLE_NEW'];
        $structs_config['enable_upd']   = (bool)$adm_info['ENABLE_UPD'];
        $structs_config['enable_del']   = (bool)$adm_info['ENABLE_DEL'];
        $structs_config['enable_vew']   = (bool)$adm_info['ENABLE_VEW'];
        $structs_config['enable_sch']   = (bool)$adm_info['ENABLE_SCH'];

        $table_relations = array();
        $adm_elements    = array();
        foreach ($this->getAdmRelations($adm_id) as $adm_relation) {
            // ��������
            $relation_type = '';
            switch ($adm_relation['RELATION_TYPE']) {
            case '1': $relation_type = '='; break;
            case '2': $relation_type = '+'; break;
            }

            if ($relation_type != '') {
                $relations = array();
                $columns = array_map('trim', explode('=', $adm_relation['JOIN_COLUMNS'], 2));
                foreach ($columns as $column) {
                    list($table_name, $column_name) = explode('.', $column, 2);
                    $table_info = $admtable_manager->getTableFromName($table_name);
                    $alias = array_search($table_info['TABLE_ID'], $table_ids);
                    if ($alias !== false) {
                        $relations[] = $alias . '.' . $column_name;
                    }
                }
                $table_relations[] = $relation_type . ', ' . implode(' = ', $relations);
            }

            // ���Ǽ���
            $alias = array_search($adm_relation['TABLE_ID'], $table_ids);
            foreach ($this->getAdmElements($adm_relation['RELATION_ID']) as $elements) {
                $element_name = $elements['ELEMENT_NAME'];
                $attributes = array();
                $attributes_tmp = preg_split('/(\r\n|\n|\r)/', $elements['ELEMENT_ATTRIBUTES']);
                foreach ($attributes_tmp as $attribute_tmp) {
                    $attribute_tmp = array_map('trim', explode('=', $attribute_tmp, 2));
                    $attributes[$attribute_tmp[0]] = isset($attribute_tmp[1]) ? $attribute_tmp[1] : null;
                }

                $validations = array();
                foreach ($this->getElementValidations($elements['ELEMENT_ID']) as $element_validation) {
                    $validation = $admvalidation_manager->getValidation($element_validation['VALIDATION_ID']);
                    $parameters = array();
                    foreach ($this->getElementValidationParameters($element_validation['ELEMENT_VALIDATION_ID']) as $validation_parameter) {
                        $validation_parameter += $admvalidation_manager->getValidationParameter($validation_parameter['VALIDATION_P_ID']);
                        $parameters[$validation_parameter['VALIDATION_P_TYPE']] = $validation_parameter['VALIDATION_P_VALUE'];
                    }
                    $validations[$validation['VALIDATION_TYPE']] = array();
                    $validations[$validation['VALIDATION_TYPE']]['message'] = $element_validation['ERROR_MESSAGE'] ? $element_validation['ERROR_MESSAGE'] : $validation['ERROR_MESSAGE'];
                    $validations[$validation['VALIDATION_TYPE']]['parameters'] = $parameters;
                }

                $adm_elements[$element_name] = array();
                $adm_elements[$element_name]['alias'] = $alias;
                $adm_elements[$element_name]['type']  = $elements['ELEMENT_TYPE'];
                $adm_elements[$element_name]['name']  = $elements['DISPLAY_NAME'];
                $adm_elements[$element_name]['attributes'] = $attributes;
                $adm_elements[$element_name]['validate']   = $validations;
                $adm_elements[$element_name]['sort_list']      = (int)$elements['SORT_LIST_NUM'];
                $adm_elements[$element_name]['sort_detail']    = (int)$elements['SORT_DETAIL_NUM'];
                $adm_elements[$element_name]['read_only_new']  = (bool)$elements['READ_ONLY_NEW'];
                $adm_elements[$element_name]['read_only_upd']  = (bool)$elements['READ_ONLY_UPD'];
                $adm_elements[$element_name]['display_list']   = (bool)$elements['DISPLAY_LIST'];
                $adm_elements[$element_name]['display_detail'] = (bool)$elements['DISPLAY_DETAIL'];
                $adm_elements[$element_name]['search']         = (bool)$elements['ELEMENT_SEARCH'];
            }
        }

        return $this->createAdmClassFromTemplate($class_name, $table_classes, $structs_config, $adm_elements, $table_relations, array());
    }

    /**
     * ADM�ե����९�饹��ƥ�ץ졼�Ȥ����������
     *
     * @access private
     * @param string ���饹̾
     * @param string �ơ��֥�̾
     * @param array ���������
     * @param array �祭������
     * @param array ��ե�������
     * @param array ������������
     * @return string �ơ��֥륯�饹
     */
    function createAdmClassFromTemplate($class_name, $table_classes, $structs_config, $elements_config, $table_relations=array(), $related_links=array())
    {
        if (is_array($table_classes)) {
            $table_classes = var_export($table_classes, true);
        }
        if (is_array($structs_config)) {
            $structs_config = var_export($structs_config, true);
        }
        if (is_array($elements_config)) {
            $elements_config = var_export($elements_config, true);
        }

        if (is_array($table_relations)) {
            $table_relations = var_export($table_relations, true);
        }
        if (is_array($related_links)) {
            $related_links = var_export($related_links, true);
        }

        return <<<__GENERATE_CLASS__
<?php
class {$class_name} extends SyL_AdmActionForm
{
var \$table_classes = {$table_classes};
var \$table_relations = {$table_relations};
var \$maintenance_table = 'a';
var \$related_links = {$related_links};
var \$structs_config = {$structs_config};
var \$elements_config = {$elements_config};
}
?>
__GENERATE_CLASS__;
    }
}

?>
