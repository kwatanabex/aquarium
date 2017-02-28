<?php
/**
 * AdmFormsAq_adm_validation�ե����९�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_validation extends SyL_AdmActionForm
{
/**
 * �ơ��֥륯�饹������
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_validation',
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
  '/aquarium/admin.php/Developer/Adm/Admvalidation/Parameter/'
);
/**
 * ���������������
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM�Х�ǡ���������',
  'default_sort'        => array (
  0 => 'a.VALIDATION_ID.ASC',
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
  'VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�Х�ǡ������ID',
    'attributes' => 
    array (
      'size' => '10',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 1,
    'sort_detail' => 1,
  ),
  'VALIDATION_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�Х�ǡ�����󥿥���',
    'attributes' => 
    array (
      'size' => '20',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'VALIDATION_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '�Х�ǡ������̾',
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
  'CUSTOM_DIR' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '��������Х�ǡ������ǥ��쥯�ȥ�',
    'attributes' => 
    array (
      'size' => '40',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
    'display_list' => false
  ),
  'ERROR_MESSAGE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '���顼��å������ƥ�ץ졼��',
    'attributes' => 
    array (
      'size' => '40',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 5,
    'sort_detail' => 5,
  ),
);

}

?>
