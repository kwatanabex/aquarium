<?php
/**
 * AdmFormsAq_adm_table�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_table extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_table',
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
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Keyro/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/validationro/'
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'aq_adm_table����',
  'default_sort'        => array (
  0 => 'a.TABLE_ID.ASC',
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
    'sort_list' => 1,
    'sort_detail' => 1,
  ),
  'TABLE_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'ADM�ơ��֥�̾',
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
  'TABLE_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '������',
    'validate' => 
    array (
    ),
    'options' => array(
      'T' => '�ơ��֥�',
      'V' => '�ӥ塼'
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
);

}

?>
