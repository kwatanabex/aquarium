<?php
/**
 * AdmFormsAq_menu�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_menu extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_menu',
  'b' => 'Adm.Tables.Aq_menu',
  'c' => 'Adm.Tables.Aq_adm',
);
/**
 * �ơ��֥륯�饹�δ�Ϣ����
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '+, a.MENU_PARENT_ID = b.MENU_ID',
  '+, a.ADM_ID = c.ADM_ID',
);
/**
 * �ᥤ����ƥʥ󥹥ơ��֥�̾
 * 
 * @access protected
 * @var string
 */
var $maintenance_table = 'a';
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'aq_menu����',
  'default_sort'        => array (
  0 => 'a.MENU_ID.ASC',
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
  'MENU_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '��˥塼ID',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array(),
    'sort_list' => 1,
    'sort_detail' => 1,
    'read_only_new'  => true,
    'read_only_upd'  => true,
  ),
  'MENU_PARENT_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '�ƥ�˥塼̾',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'MENU_NAME',
      'value' => 'MENU_ID'
    ),
    'options' => array(
      ''  => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => array (),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'MENU_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '��˥塼̾',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'MENU_URL_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'URL̾',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'note' => '��URL�ΰ����Ȥʤ�ޤ��� ��� /aquarium/admin.php/Config/<span style="color: #CC0000;">Menu</span>/<br />��Ⱦ�ѱѿ��ȡ�_�פΤ߻��Ѳ�ǽ����Ƭ�ϼ�ưŪ����ʸ�����Ѵ�����ޤ���',
    'validate' => array (
      'regex' => array(
        'message'    => '{name}�˻��ѤǤ���ʸ���ϡ�Ⱦ�ѱѿ����ȡ�_�פΤߤǤ�',
        'parameters' => array('format'=> '/^[a-zA-Z0-9_]+$/')
      )
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
  'MENU_ORDER' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�¤ӽ�',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'default' => '100',
    'validate' => array (),
    'sort_list' => 5,
    'sort_detail' => 5,
  ),

  'MENU_DESCRIPTION' => 
  array (
    'alias' => 'a',
    'type' => 'textarea',
    'cols' => '2',
    'name' => '����',
    'attributes' => 
    array (
      'rows' => '4',
    ),
    'validate' => array (),
    'sort_list' => 6,
    'sort_detail' => 6,
    'display_list'   => false,
  ),
  'REDIRECT_FLAG' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '������쥯��',
    'options' => array(
      '0' => '̵��',
      '1' => 'ͭ��'
    ),
    'default' => '0',
    'validate' => array (),
    'sort_list' => 7,
    'sort_detail' => 7,
    'display_list'   => false,
  ),
  'REDIRECT_URL' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '������쥯��URL',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 8,
    'sort_detail' => 8,
    'display_list'   => false,
  ),
  'DISPLAY_FLAG' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => 'ɽ���ե饰',
    'options' => array(
      '1' => 'ɽ��',
      '0' => '��ɽ��'
    ),
    'default' => '1',
    'validate' => array (),
    'sort_list' => 9,
    'sort_detail' => 9,
  ),
  'ADM_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => 'ADM���楿����',
    'options' => array(
      '1' => '��ưADM����Ѥ���',
      '0' => 'ADM����Ѥ��ʤ�',
    ),
    'default' => '0',
    'validate' => array (),
    'sort_list' => 10,
    'sort_detail' => 10,
    'display_detail'  => false,
  ),
  'ADM_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'ADM̾',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'c',
      'name'  => 'ADM_NAME',
      'value' => 'ADM_ID'
    ),
    'options' => array(
      ''  => '-- ���򤷤Ƥ������� --'
    ),
    'validate' => array(),
    'sort_list' => 11,
    'sort_detail' => 11,
    'display_list'   => false,
    'display_detail'  => false,
  ),
);

}

?>
