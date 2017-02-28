<?php
/**
 * AdmFormsAq_authority_menuフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_authority_menu extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_authority_menu',
  'b' => 'Adm.Tables.Aq_menu'
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '+, a.MENU_ID = b.MENU_ID',
);
/**
 * メインメンテナンステーブル名
 * 
 * @access protected
 * @var string
 */
var $maintenance_table = 'a';
/**
 * 関連リンクURL
 * 
 * @access protected
 * @var array
 */
var $related_links = array();
/**
 * 構成定義設定配列
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => '権限メニュー管理',
  'default_sort'        => array (
  0 => 'a.AUTHORITY_ID.ASC',
  1 => 'a.MENU_ID.ASC',
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
    'validate' => 
    array (
    ),
    'sort_list' => 1,
    'sort_detail' => 1,
  ),
  'MENU_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'メニュー名',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'MENU_NAME',
      'value' => 'MENU_ID'
    ),
    'options' => array(
      '' => '-- 選択してください --'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'LOWER_PERMISSION' => 
  array (
    'alias' => 'a',
    'type' => 'radio',
    'name' => '下階層アクセス許可フラグ',
    'options' => array(
      '0' => '不可',
      '1' => '許可'
    ),
    'default' => '0',
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
);

}

?>
