<?php
/**
 * AdmFormsAq_adm�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm',
);
/**
 * �ơ��֥륯�饹�δ�Ϣ����
 * 
 * @access protected
 * @var array
 */
var $table_relations = array();
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
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/',
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Elementro/',
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM����',
  'default_sort'        => array (
  0 => 'a.ADM_ID.ASC',
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
  'ADM_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'ADM ID',
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
  'ADM_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'ADM̾',
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
  'DEFAULT_SORT' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�ǥե���ȥ�����',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
    'display_list' => false
  ),
  'DEFAULT_SEARCH_VIEW' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '�ǥե���ȸ����ӥ塼',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�'
    ),
    'default' => '0',
    'validate' => 
    array (
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
    'display_list' => false
  ),
  'PAGE_RECORDS' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '1�ڡ�����ɽ�����',
    'attributes' => array(),
    'options' => array(
      '10' => '10��',
      '20' => '20��',
      '30' => '30��',
      '40' => '40��',
      '50' => '50��'
    ),
    'default' => '20',
    'validate' => 
    array (
    ),
    'sort_list' => 5,
    'sort_detail' => 5,
  ),
  'LINK_RANGE' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '�ڡ�����󥯤�ɽ����',
    'attributes' => array(),
    'options' => array(
      '' => '-- ���򤷤Ƥ������� --',
      '3' => '3',
      '5' => '5',
      '7' => '7',
      '9' => '9',
      '11' => '11',
      '13' => '13',
      '15' => '15',
      '17' => '17',
      '19' => '19'
    ),
    'default' => '9',
    'validate' => 
    array (
    ),
    'sort_list' => 6,
    'sort_detail' => 6,
    'display_list' => false
  ),
  'KEY_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�祭���ѥ�᡼��̾',
    'note' => '��Ⱦ�ѱѿ��ȡ�_�פΤ߻��Ѳ�ǽ',
    'attributes' => 
    array (
      'size' => '20',
    ),
    'validate' => array (
      'regex' => array(
        'message'    => '{name}�˻��ѤǤ���ʸ���ϡ�Ⱦ�ѱѿ����ȡ�_�פΤߤǤ�',
        'parameters' => array('format'=> '/^[a-zA-Z0-9_]+$/')
      )
    ),
    'default' => 'key',
    'display_list' => false,
    'sort_list' => 7,
    'sort_detail' => 7,
  ),
  'VIEW_CONFIRM' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '��ǧ����ɽ���ե饰',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 8,
    'sort_detail' => 8,
    'display_list' => false
  ),
  'VIEW_FIN' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '��λ����ɽ���ե饰',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 9,
    'sort_detail' => 9,
    'display_list' => false
  ),
  'VIEW_ALERT' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '��ǧ���顼��ɽ���ե饰',
    'attributes' => array(),
    'options' => array(
      '1' => 'ɽ������',
      '0' => 'ɽ�����ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 10,
    'sort_detail' => 10,
    'display_list' => false
  ),
  'ENABLE_LST' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '����ɽ��',
    'attributes' => array(),
    'options' => array(
      '1' => '���Ѥ���',
      '0' => '���Ѥ��ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 11,
    'sort_detail' => 11,
  ),
  'ENABLE_NEW' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '������Ͽ',
    'attributes' => array(),
    'options' => array(
      '1' => '���Ѥ���',
      '0' => '���Ѥ��ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 12,
    'sort_detail' => 12,
  ),
  'ENABLE_UPD' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '����',
    'attributes' => array(),
    'options' => array(
      '1' => '���Ѥ���',
      '0' => '���Ѥ��ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 13,
    'sort_detail' => 13,
  ),
  'ENABLE_DEL' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '���',
    'attributes' => array(),
    'options' => array(
      '1' => '���Ѥ���',
      '0' => '���Ѥ��ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 14,
    'sort_detail' => 14,
  ),
  'ENABLE_VEW' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '�ܺ�ɽ��',
    'attributes' => array(),
    'options' => array(
      '1' => '���Ѥ���',
      '0' => '���Ѥ��ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 15,
    'sort_detail' => 15,
  ),
  'ENABLE_SCH' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '����',
    'attributes' => array(),
    'options' => array(
      '1' => '���Ѥ���',
      '0' => '���Ѥ��ʤ�'
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 16,
    'sort_detail' => 16,
  ),
);

}

?>
