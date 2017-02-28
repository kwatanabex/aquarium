<?php
/**
 * AQUARIMマネージャクラス
 */
SyL_Loader::lib('AQ.Manager');
/**
 * DBデータ定義クラス
 */
SyL_Loader::lib('Adm.Tables.Aq_adm_table');
SyL_Loader::lib('Adm.Tables.Aq_adm_table_column');
SyL_Loader::lib('Adm.Tables.Aq_adm_table_key');
SyL_Loader::lib('Adm.Tables.Aq_adm_column_validation');
SyL_Loader::lib('Adm.Tables.Aq_adm_column_validation_p');

/**
 * AQUARIM ADMテーブルドメインマネージャクラス
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
    // テーブルメタデータ情報
    // -------------------------------------------

    /**
     * メタデータテーブル一覧を取得する
     *
     * @access public
     * @return array メタデータテーブル一覧
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
    // ADMテーブル情報
    // -------------------------------------------

    /**
     * ADMテーブル情報を取得する
     *
     * @access public
     * @param int テーブルID
     * @return array ADMテーブル情報
     */
    function getTable($table_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table(), array('TABLE_ID' => $table_id));
    }

    /**
     * ADMテーブル情報をテーブル名から取得する
     *
     * @access public
     * @param string テーブル名
     * @return array ADMテーブル情報
     */
    function getTableFromName($table_name)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table(), array('TABLE_NAME' => $table_name));
    }

    /**
     * ADMテーブル一覧を取得する
     *
     * @access public
     * @return array ADMテーブル一覧
     */
    function getTables()
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_table(), array(), array('TABLE_NAME', 'TABLE_ID'));
    }

    /**
     * ADMテーブルを登録する
     *
     * @access public
     * @param string テーブル名
     * @param string タイプ (T: テーブル、V: ビュー）
     * @return bool 登録結果
     */
    function addTable($table_name, $type)
    {
        $table =& new AdmTablesAq_adm_table();
        $table->addColumn('TABLE_NAME', $table_name);
        $table->addColumn('TABLE_TYPE', $type);
        return $this->dao->insert($table);
    }

    /**
     * ADMテーブル情報のMAX IDを取得する
     *
     * @access public
     * @param string テーブル名
     * @return int ADMテーブル情報のMAX ID
     */
    function getTableMaxId()
    {
        return $this->dao->getMaxId(new AdmTablesAq_adm_table(), 'TABLE_ID');
    }


    // -------------------------------------------
    // ADMカラムテーブル情報
    // -------------------------------------------

    /**
     * 指定のカラム情報を取得する
     *
     * @access public
     * @param int カラムID
     * @return array カラム情報
     */
    function getTableColumn($column_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table_column(), array('COLUMN_ID' => $column_id));
    }


    /**
     * 指定のカラム情報をカラム名から取得する
     *
     * @access public
     * @param int テーブルID
     * @param string カラム名
     * @return array カラム情報
     */
    function getTableColumnFromName($table_id, $column_name)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_table_column(), array('TABLE_ID' => $table_id, 'COLUMN_NAME' => strtoupper($column_name)));
    }

    /**
     * ADMテーブルカラム一覧を取得する
     *
     * @access public
     * @param int テーブルID
     * @param string カラム名
     * @return array カラム情報
     */
    function getTableColumns($table_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_table_column(), array('TABLE_ID' => $table_id), array('COLUMN_ID'));
    }

    /**
     * ADMカラムを登録する
     *
     * @access public
     * @param int テーブルID
     * @param string カラム名
     * @param string カラムタイプ
     * @return bool 登録結果
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
    // ADMカラムキーテーブル情報
    // -------------------------------------------

    /**
     * ADMカラムキーを取得する
     *
     * @access public
     * @param int カラムID
     * @return array ADMカラムキー情報
     */
    function getTableColumnKeys($column_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_table_key(), array('COLUMN_ID' => $column_id), array('COLUMN_ID'));
    }

    /**
     * ADMカラムキーを登録する
     *
     * @access public
     * @param int カラムID
     * @param string キータイプ
     * @param int グループNo
     * @param int 外部キーカラムID
     * @return bool 登録結果
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
    // ADMカラムバリデーションテーブル情報
    // -------------------------------------------

    /**
     * カラムバリデーション情報を取得する
     *
     * @access public
     * @param int テーブルID
     * @param string カラム名
     * @return array カラム情報
     */
    function getColumnValidation($column_id, $validation_id)
    {
        return $this->dao->getRecord(new AdmTablesAq_adm_column_validation(), array('COLUMN_ID' => $column_id, 'VALIDATION_ID' => $validation_id));
    }

    /**
     * カラムバリデーション情報一覧を取得する
     *
     * @access public
     * @param int テーブルID
     * @return array カラム情報
     */
    function getColumnValidations($column_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_column_validation(), array('COLUMN_ID' => $column_id), array('VALIDATION_ID'));
    }

    /**
     * ADMカラムバリデーション情報を登録する
     *
     * @access public
     * @param int カラムID
     * @param string キータイプ
     * @param int グループNo
     * @param int 外部キーカラムID
     * @return bool 登録結果
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
    // ADMカラムバリデーションパラメータテーブル情報
    // -------------------------------------------

    /**
     * カラムバリデーション情報を取得する
     *
     * @access public
     * @param int テーブルID
     * @param string カラム名
     * @return array カラム情報
     */
    function getColumnValidationParameters($column_validation_id)
    {
        return $this->dao->getRecords(new AdmTablesAq_adm_column_validation_p(), array('COLUMN_VALIDATION_ID' => $column_validation_id), array('VALIDATION_P_ID'));
    }

    /**
     * ADMカラムバリデーションパラメータ情報を登録する
     *
     * @access public
     * @param int カラムバリデーションID
     * @param int バリデーションパラメータID
     * @param string パラメータ値
     * @return bool 登録結果
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
    // テーブルメタデータインポート
    // -------------------------------------------

    /**
     * スキーマをADMテーブルとして登録する
     *
     * @access public
     * @param string スキーマ名
     * @param string タイプ (T: テーブル、V: ビュー）
     * @return bool 登録OK: true, 登録エラー: false
     */
    function importTable($table_name, $type)
    {
        // テーブルメタデータ取得
        $schema =& $this->dao->getSchema();
        $table_columns  = $schema->getColumns($table_name);
        $table_primary  = $schema->getPrimary($table_name);
        $table_uniques  = $schema->getUniques($table_name);
        $table_foreigns = $schema->getForeigns($table_name);

        // テーブルを登録
        if (!$this->addTable($table_name, $type)) {
            return false;
        }
        // 登録したテーブルIDを取得
        $table_id = $this->getTableMaxId();
        // カラムを登録
        foreach ($table_columns as $name => $column) {
            if (!$this->addTableColumn($table_id, $name, $column['type'])) {
                return false;
            }
        }
        // 主キー登録
        foreach ($table_primary as $primary) {
            $column_info = $this->getTableColumnFromName($table_id, $primary);
            if (count($column_info) == 0) {
                SyL_Loggers::warn("トランザクション中にADMカラム情報が取得できませんでした。({$primary})");
                return false;
            }
            if (!$this->addTableColumnKey($column_info['COLUMN_ID'], 'P')) {
                SyL_Loggers::warn("主キーのインポートができませんでした。");
                return false;
            }
        }
        // 一意キー登録
        foreach ($table_uniques as $index => $uniques) {
            foreach ($uniques as $unique) {
                $column_info = $this->getTableColumnFromName($table_id, $unique);
                if (count($column_info) == 0) {
                    SyL_Loggers::warn("トランザクション中にADMカラム情報が取得できませんでした。({$unique})");
                    return false;
                }
                if (!$this->addTableColumnKey($column_info['COLUMN_ID'], 'U', $index+1)) {
                    SyL_Loggers::warn("一意キーのインポートができませんでした。");
                    return false;
                }
            }
        }
        // 外部キー登録
        $index = 0;
        foreach ($table_foreigns as $table_name => $foreigns) {
            $index++;
            $table_info = $this->getTableFromName($table_name);
            if (count($table_info) == 0) {
                SyL_Loggers::warn("外部キーに対応するマスタテーブル({$table_name})が見つかりませんでした。マスタテーブルから先にインポートしてください。");
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

        // バリデーション登録
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
     * カラム型からバリデーションを取得する
     *
     * @access private
     * @param array 属性配列
     * @param array バリデーション
     */
    function getValidateDefinition($column)
    {
        $validate = array();
        // 必須チェック
        if ($column['not_null']) {
            $validate['require'] = array();
        }
        switch ($column['type']) {
        // 整数型
        case 'I':
            $validate['numeric'] = array(
              'dot' => false,
              'min' => $column['min'],
              'max' => $column['max'],
              'min_error_message' =>  '{name}は{min}以上で入力してください',
              'max_error_message' =>  '{name}は{max}以下で入力してください'
            );
            break;

        // 浮動小数点型
        case 'F':
            $validate['numeric'] = array(
              'dot' => true
            );
            break;

        // 桁数固定数値型
        case 'N':
            $validate['numeric'] = array(
              'dot' => true,
              'min' => $column['min'],
              'max' => $column['max'],
              'min_error_message' =>  '{name}は{min}以上で入力してください',
              'max_error_message' =>  '{name}は{max}以下で入力してください'
            );
            break;

        // 日付型
        case 'D':
        case 'DT':
            $validate['date'] = array();
            break;

        // 時間型
        case 'T':
            $validate['regex'] = array(
              'format' => '/^([0-1][0-9]|2[0-3]):?([0-5][0-9]):?([0-5][0-9])$/'
            );
            break;

        // 文字列型
        case 'S':
            $validate['length'] = array(
              'max' => $column['max']
            );
            break;
        }
        return $validate;
    }


    // -------------------------------------------
    // テーブルクラス作成
    // -------------------------------------------

    /**
     * テーブルクラスを作成する
     *
     * @access public
     * @param int テーブルID
     * @param string クラス名
     * @return string テーブルクラス
     */
    function createTableClass($table_id, $class_name)
    {
        // ADMバリデーションマネージャ取得
        $admvalidation_manager =& AQManager::factory($this->dao->getConnection(), 'AdmValidation');

        $table_info = $this->getTable($table_id);

        $primary  = array();
        $uniques  = array();
        $foreigns = array();
        $columns  = array();
        foreach ($this->getTableColumns($table_id) as $column) {
            // バリデーション関連
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

            // カラム関連
            $column_name = $column['COLUMN_NAME'];
            $columns[$column_name]['type'] = $column['COLUMN_TYPE'];
            $columns[$column_name]['validate'] = $validations;

            // キー関連
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
     * テーブルクラスをテンプレートから作成する
     *
     * @access private
     * @param string クラス名
     * @param string テーブル名
     * @param array カラム配列
     * @param array 主キー配列
     * @param array 一意キー配列
     * @param array 外部キー配列
     * @return string テーブルクラス
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
