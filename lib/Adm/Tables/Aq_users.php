<?php
/**
 * AdmTablesAq_usersテーブルクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmTablesAq_users extends SyL_DBDaoTable
{
/**
 * テーブル名
 * 
 * @access protected
 * @var string
 */
var $table = 'aq_users';
/**
 * プライマリキーカラム
 * 
 * @access protected
 * @var array
 */
var $primary = array (
  0 => 'USER_ID',
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
    0 => 'LOGIN_ID',
  ),
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
);
/**
 * カラム定義
 * 
 * @access protected
 * @var array
 */
var $columns = array (
  'USER_ID' => 
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
  'USER_NAME' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '30',
        ),
      ),
    ),
  ),
  'LOGIN_ID' => 
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
          'max' => '32',
        ),
      ),
    ),
  ),
  'LOGIN_PASSWORD' => 
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
          'max' => '32',
        ),
      ),
    ),
  ),
  'AUTHORITY_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
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
  'EMAIL_ADDRESS' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '200',
        ),
      ),
    ),
  ),
  'ADMIN_FLAG' => 
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
  'INVALID_FLAG' => 
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
  'CREATE_DATE' => 
  array (
    'type' => 'D',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
      ),
      'date' => 
      array (
        'message' => '{name}は日付で入力してください',
      ),
    ),
  ),
  'UPDATE_DATE' => 
  array (
    'type' => 'D',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
      ),
      'date' => 
      array (
        'message' => '{name}は日付で入力してください',
      ),
    ),
  ),
);

}

?>
