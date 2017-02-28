<?php
class GenerateAdmClassAQ_GENERATED_TABLE_CLASS_101 extends SyL_DBDaoTable
{
var $table = 'syl_mail_form';
var $primary = array (
  0 => 'MAIL_FORM_ID',
);
var $uniques = array (
);
var $foreigns = array (
);
var $columns = array (
  'MAIL_FORM_ID' => 
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
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}は{min}以上で入力してください',
          'max_error_message' => '{name}は{max}以下で入力してください',
        ),
      ),
    ),
  ),
  'NAME' => 
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
  'MAIL_ADDRESS' => 
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
  'MESSAGE' => 
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
          'max' => NULL,
        ),
      ),
    ),
  ),
  'REMOTE_ADDR' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
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
  'REMOTE_HOST' => 
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
  'HTTP_REFERER' => 
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
  'SEND_DATE' => 
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
);
}
?>