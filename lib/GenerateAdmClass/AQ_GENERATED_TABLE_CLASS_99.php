<?php
class GenerateAdmClassAQ_GENERATED_TABLE_CLASS_99 extends SyL_DBDaoTable
{
var $table = 'syl_prefecture';
var $primary = array (
  0 => 'PREFECTURE_CODE',
);
var $uniques = array (
);
var $foreigns = array (
);
var $columns = array (
  'PREFECTURE_CODE' => 
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
          'max' => '2',
        ),
      ),
    ),
  ),
  'PREFECTURE_NAME' => 
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
          'max' => '8',
        ),
      ),
    ),
  ),
);
}
?>