<?php
/**
 * AdmFormsAq_adm_column_validation�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_column_validationro extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_column_validation',
  'b' => 'Adm.Tables.Aq_adm_table_column',
  'c' => 'Adm.Tables.Aq_adm_validation',
);
/**
 * �ơ��֥륯�饹�δ�Ϣ����
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.COLUMN_ID = b.COLUMN_ID',
  '=, a.VALIDATION_ID = c.VALIDATION_ID'
);
/**
 * �ᥤ����ƥʥ󥹥ơ��֥�̾
 * 
 * @access protected
 * @var string
 */
var $maintenance_table = 'a';
/**
 * ��Ϣ���URL
 * 
 * @access protected
 * @var array
 */
var $related_links = array();
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM�����Х�ǡ���������',
  'default_sort'        => array (
  0 => 'a.COLUMN_VALIDATION_ID.ASC',
),
  'default_search_view' => false,
  'page_records'        => 20,
  'link_range'          => 9,
  'key_name'            => 'key',
  'view_confirm'        => true,
  'view_fin'            => true,
  'view_alert'          => false,
  'enable_lst'          => true,
  'enable_new'          => false,
  'enable_upd'          => false,
  'enable_del'          => false,
  'enable_vew'          => false,
  'enable_sch'          => true
);
/**
 * �ե����������������
 * 
 * @access protected
 * @var array
 */
var $elements_config = array (
  'COLUMN_VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�����Х�ǡ������ID',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 1,
    'sort_detail' => 1,
    'read_only_new'  => true,
    'read_only_upd'  => true,
  ),
  'COLUMN_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '�����ID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'COLUMN_NAME',
      'value' => 'COLUMN_ID'
    ),
    'options' => array(
      '' => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '�Х�ǡ������ID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'c',
      'name'  => 'VALIDATION_NAME',
      'value' => 'VALIDATION_ID'
    ),
    'options' => array(
      '' => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'ERROR_MESSAGE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '���顼��å�����',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'note' => '��̤���Ϥξ�硢�Х�ǡ������ޥ����Υ��顼��å����������Ѥ���ޤ�',
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
  'TABLE_ID' => 
  array (
    'alias' => 'b',
    'type' => 'text',
    'name' => '�ơ��֥�ID',
    'attributes' => array(),
    'validate' => 
    array (
    ),
    'sort_list' => 5,
    'sort_detail' => 5,
    'read_only_new'  => true,
    'read_only_upd'  => true,
  ),
);

}

?>
