<?php
/**
 * AdmFormsAq_adm_elementフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_elementro extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_element',
  'b' => 'Adm.Tables.Aq_adm_relation',
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.RELATION_ID = b.RELATION_ID',
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
  'title'               => 'ADM要素管理',
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
  'enable_new'          => false,
  'enable_upd'          => false,
  'enable_del'          => false,
  'enable_vew'          => false,
  'enable_sch'          => true
);
/**
 * フォーム定義要素配列
 * 
 * @access protected
 * @var array
 */
var $elements_config = array (
  'ELEMENT_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '要素ID',
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
    'name' => '関連ID',
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
    'name' => '要素名',
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
  'DISPLAY_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '要素表示名',
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
    'name' => '要素タイプ',
    'attributes' => array(),
    'options' => array(
      ''         => '-- 選択してください --',
      'text'     => 'テキストボックス（text）',
      'password' => 'パスワードボックス（password）',
      'textarea' => 'テキストエリア（textarea）',
      'select'   => 'プルダウン（select）',
      'selectm'  => 'リストボックス（select-multiple）',
      'radio'    => 'ラジオボタン（radio）',
      'checkbox' => 'チェックボックス（checkbox）',
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
    'type' => 'text',
    'name' => '要素属性',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'display_list'  => false,
    'sort_list' => 6,
    'sort_detail' => 6,
  ),
  'ELEMENT_OPTIONS' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '要素オプション',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'display_list'  => false,
    'sort_list' => 7,
    'sort_detail' => 7,
  ),
  'DATA_SOURCE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'データソース',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'display_list'  => false,
    'sort_list' => 8,
    'sort_detail' => 8,
  ),
  'SORT_LIST_NUM' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '一覧表示順序',
    'attributes' => 
    array (
      'size' => '30',
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
    'name' => '詳細表示順序',
    'attributes' => 
    array (
      'size' => '30',
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
    'name' => '新規登録表示',
    'attributes' => array(),
    'options' => array(
      '0' => '登録可能',
      '1' => '表示のみ',
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
    'name' => '更新表示',
    'attributes' => array(),
    'options' => array(
      '0' => '更新可能',
      '1' => '表示のみ',
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
    'name' => '一覧表示',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない',
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
    'name' => '詳細表示',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない',
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
    'name' => '検索表示',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない',
    ),
    'default' => '1',
    'validate' => 
    array (
    ),
    'sort_list' => 15,
    'sort_detail' => 15,
  ),
  'ADM_ID' => 
  array (
    'alias' => 'b',
    'type' => 'text',
    'name' => 'ADM ID',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 16,
    'sort_detail' => 16,
    'read_only_new'  => true,
    'read_only_upd'  => true,
    'display_list'   => false,
    'display_detail' => false,
  ),
);

}

?>
