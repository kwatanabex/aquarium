<?php
/**
 * AdmTablesAq_adm_element_validationテーブルクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmTablesAq_adm_element_validation extends SyL_DBDaoTable
{
/**
 * テーブル名
 * 
 * @access protected
 * @var string
 */
var $table = 'aq_adm_element_validation';
/**
 * プライマリキーカラム
 * 
 * @access protected
 * @var array
 */
var $primary = array (
  0 => 'ELEMENT_VALIDATION_ID',
);
/**
 * 一意キーカラム
 * 
 * @access protected
 * @var array
 */
var $uniques = array (
  0 => 
  array (
    0 => 'VALIDATION_ID',
    1 => 'ELEMENT_ID',
  ),
);
/**
 * 外部キーカラム
 * 
 * @access protected
 * @var array
 */
var $foreigns = array (
  'aq_adm_validation' => 
  array (
    'VALIDATION_ID' => 'VALIDATION_ID',
  ),
  'aq_adm_element' => 
  array (
    'ELEMENT_ID' => 'ELEMENT_ID',
  ),
);
/**
 * カラム定義
 * 
 * @access protected
 * @var array
 */
var $columns = array (
  'ELEMENT_VALIDATION_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
      ),
      'numeric' => 
      array (
        'message' => '{name}は数値で入力してください',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}は{min}以上で入力してください',
          'max_error_message' => '{name}は{max}以下で入力してください',
        ),
      ),
    ),
  ),
  'ELEMENT_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
      ),
      'numeric' => 
      array (
        'message' => '{name}は数値で入力してください',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}は{min}以上で入力してください',
          'max_error_message' => '{name}は{max}以下で入力してください',
        ),
      ),
    ),
  ),
  'VALIDATION_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
      ),
      'numeric' => 
      array (
        'message' => '{name}は数値で入力してください',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}は{min}以上で入力してください',
          'max_error_message' => '{name}は{max}以下で入力してください',
        ),
      ),
    ),
  ),
  'ERROR_MESSAGE' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '250',
        ),
      ),
    ),
  ),
);

}

?>
