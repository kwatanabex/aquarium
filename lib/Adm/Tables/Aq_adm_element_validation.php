<?php
/**
 * AdmTablesAq_adm_element_validation�ơ��֥륯�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmTablesAq_adm_element_validation extends SyL_DBDaoTable
{
/**
 * �ơ��֥�̾
 * 
 * @access protected
 * @var string
 */
var $table = 'aq_adm_element_validation';
/**
 * �ץ饤�ޥꥭ�������
 * 
 * @access protected
 * @var array
 */
var $primary = array (
  0 => 'ELEMENT_VALIDATION_ID',
);
/**
 * ��ե��������
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
 * �������������
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
 * ��������
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
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'numeric' => 
      array (
        'message' => '{name}�Ͽ��ͤ����Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
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
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'numeric' => 
      array (
        'message' => '{name}�Ͽ��ͤ����Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
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
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'numeric' => 
      array (
        'message' => '{name}�Ͽ��ͤ����Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
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
