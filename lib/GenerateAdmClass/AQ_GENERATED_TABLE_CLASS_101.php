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
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
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
);
}
?>