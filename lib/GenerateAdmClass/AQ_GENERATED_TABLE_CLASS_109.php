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
        'message' => '{name}��ɬ�ܤǤ�',
        'parameters' => 
        array (
        ),
      ),
      'numeric' => 
      array (
        'message' => '{name}��Ⱦ�ѿ��ͤ����Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'dot' => '',
          'min' => '-9223372036854775808',
          'max' => '9223372036854775807',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
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
        'message' => '{name}��ɬ�ܤǤ�',
        'parameters' => 
        array (
        ),
      ),
      'date' => 
      array (
        'message' => '{name}������������ޤ���',
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
        'message' => '{name}��ɬ�ܤǤ�',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��ɬ�ܤǤ�',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��ɬ�ܤǤ�',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��ɬ�ܤǤ�',
        'parameters' => 
        array (
        ),
      ),
      'length' => 
      array (
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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