<?php
/**
 * AdmFormsAq_adm_table_column�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_table_column extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_table_column',
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
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Key/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Validation/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Validation/Parameterro/'
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM�ơ��֥륫������',
  'default_sort'        => array (
  0 => 'a.COLUMN_ID.ASC',
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
  'COLUMN_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�����ID',
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
  'TABLE_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�ơ��֥�ID',
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
  'COLUMN_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�����̾',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'COLUMN_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '����ॿ����',
    'options' => array(
      ''   => '-- ���򤷤Ƥ������� --',
      'S'  => 'ʸ����',
      'I'  => '������',
      'F'  => '��ư��������',
      'D'  => '���շ�',
      'T'  => '���ַ�',
      'DT' => '���ջ��ַ�'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
);

}

?>
