<?php
/**
 * AdmFormsAq_authorityフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_authority extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_authority',
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array();
/**
 * 関連リンクURL
 * 
 * @access protected
 * @var array
 */
var $related_links = array(
  '/aquarium/admin.php/Config/Authority/Menu/'
);
/**
 * メインメンテナンステーブル名
 * 
 * @access protected
 * @var string
 */
var $maintenance_table = 'a';
/**
 * 構成定義設定配列
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'aq_authority管理',
  'default_sort'        => array (
  0 => 'a.AUTHORITY_ID.ASC',
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
 * フォーム定義要素配列
 * 
 * @access protected
 * @var array
 */
var $elements_config = array (
  'AUTHORITY_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '権限ID',
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
  'AUTHORITY_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '権限名',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
);

}

?>
