<?php
/**
 * AdmFormsAq_adm_element�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_element extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_element',
  'b' => 'Adm.Tables.Aq_adm_relation',
);
/**
 * �ơ��֥륯�饹�δ�Ϣ����
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.RELATION_ID = b.RELATION_ID',
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
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Element/Validation/',
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Element/Validation/Parameterro/'
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM���Ǵ���',
  'default_sort'        => array (
  0 => 'a.ELEMENT_ID.ASC',
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
  'ELEMENT_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '����ID',
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
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'ELEMENT_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '����̾',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
    'read_only_upd'  => true,
  ),
  'DISPLAY_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '����ɽ��̾',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
  'ELEMENT_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '���ǥ�����',
    'attributes' => array(),
    'options' => array(
      ''         => '-- ���򤷤Ƥ������� --',
      'text'     => '�ƥ����ȥܥå�����text��',
      'password' => '�ѥ���ɥܥå�����password��',
      'textarea' => '�ƥ����ȥ��ꥢ��textarea��',
      'select'   => '�ץ�������select��',
      'selectm'  => '�ꥹ�ȥܥå�����select-multiple��',
      'radio'    => '�饸���ܥ����radio��',
      'checkbox' => '�����å��ܥå�����checkbox��',
    ),
    'default' => '0',
    'validate' => 
    array (
    ),
    'sort_list' => 5,
    'sort_detail' => 5,
  ),
  'ELEMENT_ATTRIBUTES' => 
  array (
    'alias' => 'a',
    'type' => 'textarea',
    'name' => '����°��',
    'attributes' => 
    array (
      'rows' => '4',
    ),
    'validate' => 
    array (
    ),
    'note' => '����°��̾=�͡פΤ褦�˵��Ҥ��Ƥ���������ʣ��°��������ϡ�ʣ���Ԥǵ��Ҥ��Ƥ�����������1°��1�ԡ�',
    'display_list'  => false,
    'sort_list' => 6,
    'sort_detail' => 6,
    'cols' => '2',
  ),
  'ELEMENT_OPTIONS' => 
  array (
    'alias' => 'a',
    'type' => 'textarea',
    'name' => '���ǥ��ץ����',
    'attributes' => 
    array (
      'rows' => '4',
    ),
    'validate' => 
    array (
    ),
    'cols' => '2',
    'display_list'  => false,
    'sort_list' => 7,
    'sort_detail' => 7,
  ),
  'DATA_SOURCE' => 
  array (
    'alias' => 'a',
    'type' => 'textarea',
    'name' => '�ǡ���������',
    'attributes' => 
    array (
      'rows' => '4',
    ),
    'validate' => 
    array (
    ),
    'display_list'  => false,
    'cols' => '2',
    'sort_list' => 8,
    'sort_detail' => 8,
  ),
  'SORT_LIST_NUM' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '����ɽ�����',
    'attributes' => 
    array (
      'size' => '8',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 9,
    'sort_detail' => 9,
  ),
  'SORT_DETAIL_NUM' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�ܺ�ɽ�����',
    'attributes' => 
    array (
      'size' => '8',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 10,
    'sort_detail' => 10,
  ),
  'READ_ONLY_NEW' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '������Ͽɽ��',
    'attributes' => array(),
    'options' => array(
      '0' => '��Ͽ��ǽ',
      '1' => 'ɽ���Τ�',
    ),
    'default' => '0',
    'validate' => 
    array (
    ),
    'sort_list' => 11,
    'sort_detail' => 11,
  ),
  'READ_ONLY_UPD' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '����ɽ��',
    'attributes' => array(),
    'options' => array(
      '0' => '������ǽ',
      '1' => 'ɽ���Τ�',
    ),
    'default' => '0',
    'validate' => 
    array (
    ),
    'sort_list' => 12,
    'sort_detail' => 12,
  ),
  'DISPLAY_LIST' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '����ɽ��',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�',
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 13,
    'sort_detail' => 13,
  ),
  'DISPLAY_DETAIL' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '�ܺ�ɽ��',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�',
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 14,
    'sort_detail' => 14,
  ),
  'ELEMENT_SEARCH' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '����ɽ��',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�',
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 15,
    'sort_detail' => 15,
  ),
);

}

?>
