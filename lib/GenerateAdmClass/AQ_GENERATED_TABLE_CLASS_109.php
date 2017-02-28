<?php
class GenerateAdmClassAQ_GENERATED_TABLE_CLASS_109 extends SyL_DBDaoTable
{
var $table = 'syl_access_log';
var $primary = array (
  0 => 'ACCESS_LOG_ID',
);
var $uniques = array (
);
var $foreigns = array (
);
var $columns = array (
  'ACCESS_LOG_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
        'parameters' => 
        array (
        ),
      ),
      'numeric' => 
      array (
        'message' => '{name}は半角数値で入力してください',
        'parameters' => 
        array (
          'dot' => '',
          'min' => '-9223372036854775808',
          'max' => '9223372036854775807',
          'min_error_message' => '{name}は{min}以上で入力してください',
          'max_error_message' => '{name}は{max}以下で入力してください',
        ),
      ),
    ),
  ),
  'ACCESS_DATE' => 
  array (
    'type' => 'DT',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
        'parameters' => 
        array (
        ),
      ),
      'date' => 
      array (
        'message' => '{name}が正しくありません',
        'parameters' => 
        array (
        ),
      ),
    ),
  ),
  'IP_ADDRESS' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '15',
        ),
      ),
    ),
  ),
  'DOMAIN_NAME' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '100',
        ),
      ),
    ),
  ),
  'METHOD' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '10',
        ),
      ),
    ),
  ),
  'URL' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
        'parameters' => 
        array (
        ),
      ),
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
  'STATUS' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}は必須です',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}は{max}文字（バイト）以内で入力してください',
        'parameters' => 
        array (
          'max' => '3',
        ),
      ),
    ),
  ),
  'REFERRER' => 
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
  'USER_AGENT' => 
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