<?php
/**
 * AdmFormsAq_adm_relation�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_relation extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_relation',
  'b' => 'Adm.Tables.Aq_adm',
  'c' => 'Adm.Tables.Aq_adm_table'
);
/**
 * �ơ��֥륯�饹�δ�Ϣ����
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.ADM_ID = b.ADM_ID',
  '=, a.TABLE_ID = c.TABLE_ID'
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
var $related_links = array(
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Element/',
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Element/Validationro/'
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM��Ϣ����',
  'default_sort'        => array (
  0 => 'a.RELATION_ID.ASC',
),
  'default_search_view' => false,
  'page_records'        => 20,
  'link_range'          => 9,
  'key_name'            => 'key',
  'view_confirm'        => true,
  'view_fin'            => true,
  'view_alert'          => false,
  'enable_lst'          => true,
  'enable_new'          => true,
  'enable_upd'          => true,
  'enable_del'          => true,
  'enable_vew'          => true,
  'enable_sch'          => true
);
/**
 * �ե����������������
 * 
 * @access protected
 * @var array
 */
var $elements_config = array (
  'RELATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '��ϢID',
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
  'ADM_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'ADM ID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'ADM_NAME',
      'value' => 'ADM_ID'
    ),
    'options' => array(
      ''  => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'TABLE_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '�ơ��֥�ID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'c',
      'name'  => 'TABLE_NAME',
      'value' => 'TABLE_ID'
    ),
    'options' => array(
      ''  => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'RELATION_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '��Ϣ������',
    'attributes' => array(),
    'options' => array(
      '0' => '�ʤ�',
      '1' => '�������',
      '2' => '�������'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
  'JOIN_COLUMNS' => 
  array (
    'alias' => 'a',
    'type' => 'textarea',
    'name' => '��祫���',
    'attributes' => 
    array (
      'rows' => '4',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 5,
    'sort_detail' => 5,
    'display_list' => false,
    'cols' => 2
  ),
);

}

?>
