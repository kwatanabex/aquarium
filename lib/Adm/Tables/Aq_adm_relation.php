<?php
/**
 * AdmTablesAq_adm_relation�ơ��֥륯�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmTablesAq_adm_relation extends SyL_DBDaoTable
{
/**
 * �ơ��֥�̾
 * 
 * @access protected
 * @var string
 */
var $table = 'aq_adm_relation';
/**
 * �ץ饤�ޥꥭ�������
 * 
 * @access protected
 * @var array
 */
var $primary = array (
  0 => 'RELATION_ID',
);
/**
 * ��ե��������
 * 
 * @access protected
 * @var array
 */
var $uniques = array ();
/**
 * �������������
 * 
 * @access protected
 * @var array
 */
var $foreigns = array (
  'aq_adm' => 
  array (
    'ADM_ID' => 'ADM_ID',
  ),
  'aq_adm_table' => 
  array (
    'TABLE_ID' => 'TABLE_ID',
  ),
);
/**
 * ��������
 * 
 * @access protected
 * @var array
 */
var $columns = array (
  'RELATION_ID' => 
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
  'ADM_ID' => 
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
  'TABLE_ID' => 
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
  'RELATION_TYPE' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'length' => 
      array (
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'max' => '1',
        ),
      ),
    ),
  ),
  'JOIN_COLUMNS' => 
  array (
    'type' => 'S',
    'validate' => array (),
  ),
);

}

?>
