<?php
/**
 * AdmTablesAq_authority_menuテーブルクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmTablesAq_authority_menu extends SyL_DBDaoTable
{
/**
 * テーブル名
 * 
 * @access protected
 * @var string
 */
var $table = 'aq_authority_menu';
/**
 * プライマリキーカラム
 * 
 * @access protected
 * @var array
 */
var $primary = array (
  0 => 'AUTHORITY_ID',
  1 => 'MENU_ID',
);
/**
 * 一意キーカラム
 * 
 * @access protected
 * @var array
 */
var $uniques = array (
);
/**
 * 外部キーカラム
 * 
 * @access protected
 * @var array
 */
var $foreigns = array (
  'aq_authority' => 
  array (
    'AUTHORITY_ID' => 'AUTHORITY_ID',
  ),
  'aq_menu' => 
  array (
    'MENU_ID' => 'MENU_ID',
  ),
);
/**
 * カラム定義
 * 
 * @access protected
 * @var array
 */
var $columns = array (
  'AUTHORITY_ID' => 
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
  'MENU_ID' => 
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
  'LOWER_PERMISSION' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
      ),
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '1',
        ),
      ),
    ),
  ),
);

}

?>
