<?php
/**
 * AdmFormsAq_menuフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_menu extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
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
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '+, a.MENU_PARENT_ID = b.MENU_ID',
  '+, a.ADM_ID = c.ADM_ID',
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
  'title'               => 'aq_menu管理',
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
 * フォーム定義要素配列
 * 
 * @access protected
 * @var array
 */
var $elements_config = array (
  'MENU_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'メニューID',
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
    'name' => '親メニュー名',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'MENU_NAME',
      'value' => 'MENU_ID'
    ),
    'options' => array(
      ''  => '-- 選択してください --'
    ),
    'validate' => array (),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'MENU_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'メニュー名',
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
    'name' => 'URL名',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'note' => '※URLの一部となります。 例） /aquarium/admin.php/Config/<span style="color: #CC0000;">Menu</span>/<br />※半角英数と「_」のみ使用可能。先頭は自動的に大文字に変換されます。',
    'validate' => array (
      'regex' => array(
        'message'    => '{name}に使用できる文字は、半角英数字と「_」のみです',
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
    'name' => '並び順',
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
    'name' => '説明',
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
    'name' => 'リダイレクト',
    'options' => array(
      '0' => '無効',
      '1' => '有効'
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
    'name' => 'リダイレクトURL',
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
    'name' => '表示フラグ',
    'options' => array(
      '1' => '表示',
      '0' => '非表示'
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
    'name' => 'ADM制御タイプ',
    'options' => array(
      '1' => '自動ADMを使用する',
      '0' => 'ADMを使用しない',
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
    'name' => 'ADM名',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'c',
      'name'  => 'ADM_NAME',
      'value' => 'ADM_ID'
    ),
    'options' => array(
      ''  => '-- 選択してください --'
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
