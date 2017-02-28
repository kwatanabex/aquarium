<?php
/**
 * AdmFormsAq_admフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm',
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array();
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
var $related_links = array(
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/',
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Elementro/',
);
/**
 * 構成定義設定配列
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM管理',
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
 * フォーム定義要素配列
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
    'name' => 'ADM名',
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
    'name' => 'デフォルトソート',
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
    'name' => 'デフォルト検索ビュー',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない'
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
    'name' => '1ページの表示件数',
    'attributes' => array(),
    'options' => array(
      '10' => '10件',
      '20' => '20件',
      '30' => '30件',
      '40' => '40件',
      '50' => '50件'
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
    'name' => 'ページリンクの表示数',
    'attributes' => array(),
    'options' => array(
      '' => '-- 選択してください --',
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
    'name' => '主キーパラメータ名',
    'note' => '※半角英数と「_」のみ使用可能',
    'attributes' => 
    array (
      'size' => '20',
    ),
    'validate' => array (
      'regex' => array(
        'message'    => '{name}に使用できる文字は、半角英数字と「_」のみです',
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
    'name' => '確認画面表示フラグ',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない'
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
    'name' => '完了画面表示フラグ',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない'
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
    'name' => '確認アラート表示フラグ',
    'attributes' => array(),
    'options' => array(
      '1' => '表示する',
      '0' => '表示しない'
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
    'name' => '一覧表示',
    'attributes' => array(),
    'options' => array(
      '1' => '使用する',
      '0' => '使用しない'
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
    'name' => '新規登録',
    'attributes' => array(),
    'options' => array(
      '1' => '使用する',
      '0' => '使用しない'
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
    'name' => '更新',
    'attributes' => array(),
    'options' => array(
      '1' => '使用する',
      '0' => '使用しない'
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
    'name' => '削除',
    'attributes' => array(),
    'options' => array(
      '1' => '使用する',
      '0' => '使用しない'
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
    'name' => '詳細表示',
    'attributes' => array(),
    'options' => array(
      '1' => '使用する',
      '0' => '使用しない'
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
    'name' => '検索',
    'attributes' => array(),
    'options' => array(
      '1' => '使用する',
      '0' => '使用しない'
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
