<?php
/**
 * AQUARIM�ޥ͡����㥯�饹
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DB�ǡ���������饹
 */
SyL_Loader::lib('Adm.Tables.Aq_adm_table');
SyL_Loader::lib('Adm.Tables.Aq_adm_table_column');
SyL_Loader::lib('Adm.Tables.Aq_adm_table_key');
SyL_Loader::lib('Adm.Tables.Aq_adm_column_validation');
SyL_Loader::lib('Adm.Tables.Aq_adm_column_validation_p');

/**
 * AQUARIM ADM�ơ��֥�ɥᥤ��ޥ͡����㥯�饹
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id:$
 * @link      http://www.syl.jp/
 */
class AQManagerAdmTable extends AQManager
{
    // -------------------------------------------
    // �ơ��֥�᥿�ǡ�������
    // -------------------------------------------

    /**
     * �᥿�ǡ����ơ��֥�������������
     *
     * @access public
     * @return array �᥿�ǡ����ơ��֥����
     */
    function getMetaTables()
    {
        $schema =& $this->dao->getSchema();
        $tables = array();
        foreach ($schema->getTables() as $table) {
            switch (substr($table['name'], 0, 3)) {
            case 'aq_':
            case 'AQ_':
                break;
            default:
                $tables[] = $table;
            }
        }
        return $tables;
    }


    // -------------------------------------------
    // ADM�ơ��֥����
    // -------------------------------------------

    /**
     * ADM�ơ��֥������������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @return array ADM�ơ��֥����
     */
    function getTable($table_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table(), array('TABLE_ID' => $table_id));
    }

    /**
     * ADM�ơ��֥�����ơ��֥�̾�����������
     *
     * @access public
     * @param string �ơ��֥�̾
     * @return array ADM�ơ��֥����
     */
    function getTableFromName($table_name)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table(), array('TABLE_NAME' => $table_name));
    }

    /**
     * ADM�ơ��֥�������������
     *
     * @access public
     * @return array ADM�ơ��֥����
     */
    function getTables()
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_table(), array(), array('TABLE_NAME', 'TABLE_ID'));
    }

    /**
     * ADM�ơ��֥����Ͽ����
     *
     * @access public
     * @param string �ơ��֥�̾
     * @param string ������ (T: �ơ��֥롢V: �ӥ塼��
     * @return bool ��Ͽ���
     */
    function addTable($table_name, $type)
    {
        $table =& new AdmTablesAq_adm_table();
        $table->addColumn('TABLE_NAME', $table_name);
        $table->addColumn('TABLE_TYPE', $type);
        return $this->dao->insert($table);
    }

    /**
     * ADM�ơ��֥�����MAX ID���������
     *
     * @access public
     * @param string �ơ��֥�̾
     * @return int ADM�ơ��֥�����MAX ID
     */
    function getTableMaxId()
    {
        return $this->dao->getMaxId(new AdmTablesAq_adm_table(), 'TABLE_ID');
    }


    // -------------------------------------------
    // ADM�����ơ��֥����
    // -------------------------------------------

    /**
     * ����Υ���������������
     *
     * @access public
     * @param int �����ID
     * @return array ��������
     */
    function getTableColumn($column_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table_column(), array('COLUMN_ID' => $column_id));
    }


    /**
     * ����Υ�������򥫥��̾�����������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @param string �����̾
     * @return array ��������
     */
    function getTableColumnFromName($table_id, $column_name)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table_column(), array('TABLE_ID' => $table_id, 'COLUMN_NAME' => strtoupper($column_name)));
    }

    /**
     * ADM�ơ��֥륫���������������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @param string �����̾
     * @return array ��������
     */
    function getTableColumns($table_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_table_column(), array('TABLE_ID' => $table_id), array('COLUMN_ID'));
    }

    /**
     * ADM��������Ͽ����
     *
     * @access public
     * @param int �ơ��֥�ID
     * @param string �����̾
     * @param string ����ॿ����
     * @return bool ��Ͽ���
     */
    function addTableColumn($table_id, $column_name, $column_type)
    {
        $column =& new AdmTablesAq_adm_table_column();
        $column->addColumn('TABLE_ID',    $table_id);
        $column->addColumn('COLUMN_NAME', strtoupper($column_name));
        $column->addColumn('COLUMN_TYPE', $column_type);
        return $this->dao->insert($column);
    }


    // -------------------------------------------
    // ADM����७���ơ��֥����
    // -------------------------------------------

    /**
     * ADM����७�����������
     *
     * @access public
     * @param int �����ID
     * @return array ADM����७������
     */
    function getTableColumnKeys($column_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_table_key(), array('COLUMN_ID' => $column_id), array('COLUMN_ID'));
    }

    /**
     * ADM����७������Ͽ����
     *
     * @access public
     * @param int �����ID
     * @param string ����������
     * @param int ���롼��No
     * @param int �������������ID
     * @return bool ��Ͽ���
     */
    function addTableColumnKey($column_id, $key_type, $group_num=null, $column_id_fk=null)
    {
        $key =& new AdmTablesAq_adm_table_key();
        $key->addColumn('COLUMN_ID', $column_id);
        $key->addColumn('KEY_TYPE',  $key_type);
        if ($group_num !== null) {
            $key->addColumn('GROUP_NUM', $group_num);
        }
        if ($column_id_fk !== null) {
            $key->addColumn('COLUMN_ID_FK', $column_id_fk);
        }
        return $this->dao->insert($key);
    }


    // -------------------------------------------
    // ADM�����Х�ǡ������ơ��֥����
    // -------------------------------------------

    /**
     * �����Х�ǡ�����������������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @param string �����̾
     * @return array ��������
     */
    function getColumnValidation($column_id, $validation_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_column_validation(), array('COLUMN_ID' => $column_id, 'VALIDATION_ID' => $validation_id));
    }

    /**
     * �����Х�ǡ���������������������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @return array ��������
     */
    function getColumnValidations($column_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_column_validation(), array('COLUMN_ID' => $column_id), array('VALIDATION_ID'));
    }

    /**
     * ADM�����Х�ǡ������������Ͽ����
     *
     * @access public
     * @param int �����ID
     * @param string ����������
     * @param int ���롼��No
     * @param int �������������ID
     * @return bool ��Ͽ���
     */
    function addColumnValidation($column_id, $validation_id, $error_message=null)
    {
        $column_validation =& new AdmTablesAq_adm_column_validation();
        $column_validation->addColumn('COLUMN_ID',     $column_id);
        $column_validation->addColumn('VALIDATION_ID', $validation_id);
        if ($error_message !== null) {
            $column_validation->addColumn('ERROR_MESSAGE', $error_message);
        }
        return $this->dao->insert($column_validation);
    }


    // -------------------------------------------
    // ADM�����Х�ǡ������ѥ�᡼���ơ��֥����
    // -------------------------------------------

    /**
     * �����Х�ǡ�����������������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @param string �����̾
     * @return array ��������
     */
    function getColumnValidationParameters($column_validation_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_column_validation_p(), array('COLUMN_VALIDATION_ID' => $column_validation_id), array('VALIDATION_P_ID'));
    }

    /**
     * ADM�����Х�ǡ������ѥ�᡼���������Ͽ����
     *
     * @access public
     * @param int �����Х�ǡ������ID
     * @param int �Х�ǡ������ѥ�᡼��ID
     * @param string �ѥ�᡼����
     * @return bool ��Ͽ���
     */
    function addColumnValidationParameter($column_validation_id, $validation_p_id, $validation_p_value)
    {
        $column_validation_p =& new AdmTablesAq_adm_column_validation_p();
        $column_validation_p->addColumn('COLUMN_VALIDATION_ID', $column_validation_id);
        $column_validation_p->addColumn('VALIDATION_P_ID',      $validation_p_id);
        $column_validation_p->addColumn('VALIDATION_P_VALUE',   $validation_p_value);
        return $this->dao->insert($column_validation_p);
    }


    // -------------------------------------------
    // �ơ��֥�᥿�ǡ�������ݡ���
    // -------------------------------------------

    /**
     * �������ޤ�ADM�ơ��֥�Ȥ�����Ͽ����
     *
     * @access public
     * @param string ��������̾
     * @param string ������ (T: �ơ��֥롢V: �ӥ塼��
     * @return bool ��ϿOK: true, ��Ͽ���顼: false
     */
    function importTable($table_name, $type)
    {
        // �ơ��֥�᥿�ǡ�������
        $schema =& $this->dao->getSchema();
        $table_columns  = $schema->getColumns($table_name);
        $table_primary  = $schema->getPrimary($table_name);
        $table_uniques  = $schema->getUniques($table_name);
        $table_foreigns = $schema->getForeigns($table_name);

        // �ơ��֥����Ͽ
        if (!$this->addTable($table_name, $type)) {
            return false;
        }
        // ��Ͽ�����ơ��֥�ID�����
        $table_id = $this->getTableMaxId();
        // ��������Ͽ
        foreach ($table_columns as $name => $column) {
            if (!$this->addTableColumn($table_id, $name, $column['type'])) {
                return false;
            }
        }
        // �祭����Ͽ
        foreach ($table_primary as $primary) {
            $column_info = $this->getTableColumnFromName($table_id, $primary);
            if (count($column_info) == 0) {
                SyL_Loggers::warn("�ȥ�󥶥���������ADM�������󤬼����Ǥ��ޤ���Ǥ�����({$primary})");
                return false;
            }
            if (!$this->addTableColumnKey($column_info['COLUMN_ID'], 'P')) {
                SyL_Loggers::warn("�祭���Υ���ݡ��Ȥ��Ǥ��ޤ���Ǥ�����");
                return false;
            }
        }
        // ��ե�����Ͽ
        foreach ($table_uniques as $index => $uniques) {
            foreach ($uniques as $unique) {
                $column_info = $this->getTableColumnFromName($table_id, $unique);
                if (count($column_info) == 0) {
                    SyL_Loggers::warn("�ȥ�󥶥���������ADM�������󤬼����Ǥ��ޤ���Ǥ�����({$unique})");
                    return false;
                }
                if (!$this->addTableColumnKey($column_info['COLUMN_ID'], 'U', $index+1)) {
                    SyL_Loggers::warn("��ե����Υ���ݡ��Ȥ��Ǥ��ޤ���Ǥ�����");
                    return false;
                }
            }
        }
        // ����������Ͽ
        $index = 0;
        foreach ($table_foreigns as $table_name => $foreigns) {
            $index++;
            $table_info = $this->getTableFromName($table_name);
            if (count($table_info) == 0) {
                SyL_Loggers::warn("�����������б�����ޥ����ơ��֥�({$table_name})�����Ĥ���ޤ���Ǥ������ޥ����ơ��֥뤫����˥���ݡ��Ȥ��Ƥ���������");
                return false;
            }
            foreach ($foreigns as $column1 => $column2) {
                $column1_info = $this->getTableColumnFromName($table_id, $column1);
                if (count($column1_info) == 0) {
                    return false;
                }
                $column2_info = $this->getTableColumnFromName($table_info['TABLE_ID'], $column2);
                if (count($column2_info) == 0) {
                    return false;
                }
                if (!$this->addTableColumnKey($column1_info['COLUMN_ID'], 'F', $index, $column2_info['COLUMN_ID'])) {
                    return false;
                }
            }
        }

        // �Х�ǡ��������Ͽ
        $admvalidation_manager =& AQManager::factory($this->dao->getConnection(), 'AdmValidation');
        foreach ($table_columns as $name => $column) {
            $column_info = $this->getTableColumnFromName($table_id, $name);
            if (count($column_info) == 0) {
                return false;
            }
            foreach ($this->getValidateDefinition($column) as $name => $parameters) {
                $validation = $admvalidation_manager->getValidationFromType($name);
                if (count($validation) == 0) {
                    return false;
                }
                if (!$this->addColumnValidation($column_info['COLUMN_ID'], $validation['VALIDATION_ID'])) {
                    return false;
                }
                $column_validation = $this->getColumnValidation($column_info['COLUMN_ID'], $validation['VALIDATION_ID']);
                if (count($column_validation) == 0) {
                    return false;
                }
                foreach ($parameters as $name_p => $value_p) {
                    $validation_p = $admvalidation_manager->getValidationParameterFromType($validation['VALIDATION_ID'], $name_p);
                    if (count($validation_p) == 0) {
                        return false;
                    }
                    if (!$this->addColumnValidationParameter($column_validation['COLUMN_VALIDATION_ID'], $validation_p['VALIDATION_P_ID'], $value_p)) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * ����෿����Х�ǡ��������������
     *
     * @access private
     * @param array °������
     * @param array �Х�ǡ������
     */
    function getValidateDefinition($column)
    {
        $validate = array();
        // ɬ�ܥ����å�
        if ($column['not_null']) {
            $validate['require'] = array();
        }
        switch ($column['type']) {
        // ������
        case 'I':
            $validate['numeric'] = array(
              'dot' => false,
              'min' => $column['min'],
              'max' => $column['max'],
              'min_error_message' =>  '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
              'max_error_message' =>  '{name}��{max}�ʲ������Ϥ��Ƥ�������'
            );
            break;

        // ��ư��������
        case 'F':
            $validate['numeric'] = array(
              'dot' => true
            );
            break;

        // ���������ͷ�
        case 'N':
            $validate['numeric'] = array(
              'dot' => true,
              'min' => $column['min'],
              'max' => $column['max'],
              'min_error_message' =>  '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
              'max_error_message' =>  '{name}��{max}�ʲ������Ϥ��Ƥ�������'
            );
            break;

        // ���շ�
        case 'D':
        case 'DT':
            $validate['date'] = array();
            break;

        // ���ַ�
        case 'T':
            $validate['regex'] = array(
              'format' => '/^([0-1][0-9]|2[0-3]):?([0-5][0-9]):?([0-5][0-9])$/'
            );
            break;

        // ʸ����
        case 'S':
            $validate['length'] = array(
              'max' => $column['max']
            );
            break;
        }
        return $validate;
    }


    // -------------------------------------------
    // �ơ��֥륯�饹����
    // -------------------------------------------

    /**
     * �ơ��֥륯�饹���������
     *
     * @access public
     * @param int �ơ��֥�ID
     * @param string ���饹̾
     * @return string �ơ��֥륯�饹
     */
    function createTableClass($table_id, $class_name)
    {
        // ADM�Х�ǡ������ޥ͡��������
        $admvalidation_manager =& AQManager::factory($this->dao->getConnection(), 'AdmValidation');

        $table_info = $this->getTable($table_id);

        $primary  = array();
        $uniques  = array();
        $foreigns = array();
        $columns  = array();
        foreach ($this->getTableColumns($table_id) as $column) {
            // �Х�ǡ�������Ϣ
            $validations = array();
            foreach ($this->getColumnValidations($column['COLUMN_ID']) as $column_validation) {
                $validation = $admvalidation_manager->getValidation($column_validation['VALIDATION_ID']);
                $parameters = array();
                foreach ($this->getColumnValidationParameters($column_validation['COLUMN_VALIDATION_ID']) as $validation_parameter) {
                    $validation_parameter += $admvalidation_manager->getValidationParameter($validation_parameter['VALIDATION_P_ID']);
                    $parameters[$validation_parameter['VALIDATION_P_TYPE']] = $validation_parameter['VALIDATION_P_VALUE'];
                }
                $validations[$validation['VALIDATION_TYPE']] = array();
                $validations[$validation['VALIDATION_TYPE']]['message'] = $column_validation['ERROR_MESSAGE'] ? $column_validation['ERROR_MESSAGE'] : $validation['ERROR_MESSAGE'];
                $validations[$validation['VALIDATION_TYPE']]['parameters'] = $parameters;
            }

            // ������Ϣ
            $column_name = $column['COLUMN_NAME'];
            $columns[$column_name]['type'] = $column['COLUMN_TYPE'];
            $columns[$column_name]['validate'] = $validations;

            // ������Ϣ
            foreach ($this->getTableColumnKeys($column['COLUMN_ID']) as $column_key) {
                switch ($column_key['KEY_TYPE']) {
                case 'P':
                    $primary[] = $column['COLUMN_NAME'];
                    break;
                case 'U':
                    $index = $column_key['GROUP_NUM'] - 1;
                    if (!isset($uniques[$index])) {
                        $uniques[$index] = array();
                    }
                    $uniques[$index][] = $column['COLUMN_NAME'];
                    break;
                case 'F':
                    $index         = $column_key['GROUP_NUM'] - 1;
                    $column_id_fk  = $column_key['COLUMN_ID_FK'];
                    $column_fk     = $this->getTableColumn($column_id_fk);
                    $table_info_fk = $this->getTable($column_fk['TABLE_ID']);
                    $table_name_fk = $table_info_fk['TABLE_NAME'];
                    if (!isset($foreigns[$table_name_fk])) {
                        $foreigns[$table_name_fk] = array();
                    }
                    $foreigns[$table_name_fk][$column['COLUMN_NAME']] = $column_fk['COLUMN_NAME'];
                    break;
                }
            }
        }

        return $this->createTableClassFromTemplate($class_name, $table_info['TABLE_NAME'], $columns, $primary, $uniques, $foreigns);
    }

    /**
     * �ơ��֥륯�饹��ƥ�ץ졼�Ȥ����������
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
    function createTableClassFromTemplate($class_name, $table_name, $columns, $primary, $uniques=array(), $foreigns=array())
    {
        if (is_array($columns)) {
            $columns = var_export($columns, true);
        }
        if (is_array($primary)) {
            $primary = var_export($primary, true);
        }
        if (is_array($uniques)) {
            $uniques = var_export($uniques, true);
        }
        if (is_array($foreigns)) {
            $foreigns = var_export($foreigns, true);
        }

        return <<<__GENERATE_CLASS__
<?php
class {$class_name} extends SyL_DBDaoTable
{
var \$table = '{$table_name}';
var \$primary = {$primary};
var \$uniques = {$uniques};
var \$foreigns = {$foreigns};
var \$columns = {$columns};
}
?>
__GENERATE_CLASS__;
    }

}

?>
