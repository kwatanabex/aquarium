<?php
/**
 * AdmFormsAq_users�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_users extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_users',
  'b' => 'Adm.Tables.Aq_authority'
);
/**
 * �ơ��֥륯�饹�δ�Ϣ����
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '+, a.AUTHORITY_ID = b.AUTHORITY_ID',
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
  '/aquarium/admin.php/Config/User/Action/'
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'aq_users����',
  'default_sort'        => array (
  0 => 'a.USER_ID.ASC',
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
  'USER_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�桼����ID',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 1,
    'sort_detail' => 1,
    'read_only_new'  => true,
    'read_only_upd'  => true,
  ),
  'USER_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�桼����̾',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'LOGIN_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '������ID',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 3,
    'sort_detail' => 3,
    'search' => true
  ),
  'LOGIN_PASSWORD' => 
  array (
    'alias' => 'a',
    'type' => 'password',
    'name' => '�ѥ����',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 4,
    'sort_detail' => 4,
    'display_list'   => false,
    'display_detail' => true,
  ),
  'AUTHORITY_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '����̾', // = ����ID
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'AUTHORITY_NAME',
      'value' => 'AUTHORITY_ID'
    ),
    'options' => array(
      '' => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => array (),
    'sort_list' => 6,
    'sort_detail' => 5,
    'display_list'   => true,
    'display_detail' => true
  ),
  'EMAIL_ADDRESS' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�᡼�륢�ɥ쥹',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array(),
    'sort_list' => 7,
    'sort_detail' => 6,
    'display_list' => false,
  ),
  'ADMIN_FLAG' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '�����ԥե饰',
    'options' => array(
      '0' => '�̾�桼����',
      '1' => '������'
    ),
    'default' => '0',
    'validate' => array (),
    'sort_list' => 5,
    'sort_detail' => 7,
  ),
  'INVALID_FLAG' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '̵���ե饰',
    'options' => array(
      '0' => 'ͭ��',
      '1' => '̵��'
    ),
    'default' => '0',
    'validate' => array (),
    'sort_list' => 8,
    'sort_detail' => 8,
  ),
  'CREATE_DATE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '��Ͽ��',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list'   => 9,
    'sort_detail' => 9,
    'display_list'   => false,
    'display_detail' => true,
    'read_only_new'  => true,
    'read_only_upd'  => true,
    'default_new'    => array('eval', 'date("Y-m-d H:i:s")')
  ),
  'UPDATE_DATE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '������',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 10,
    'sort_detail' => 10,
    'read_only_new'  => true,
    'read_only_upd'  => true,
    'default_new'    => array('eval', 'date("Y-m-d H:i:s")'),
    'default_upd'    => array('eval', 'date("Y-m-d H:i:s")')
  ),
);

}

?>
