<?php
/**
 * AdmFormsAq_users_historyフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_users_history extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_users_history',
  'b' => 'Adm.Tables.Aq_users'
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.USER_ID = b.USER_ID',
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
  'title'               => 'ユーザーアクション履歴',
  'default_sort'        => array (
  0 => 'a.USERS_HISTORY_ID.DESC',
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
  'USERS_HISTORY_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'アクション履歴ID',
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
  'ACTION_DATE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'アクション日付',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 2,
    'sort_detail' => 2,
  ),
  'USER_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'ユーザーID',
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'USER_NAME',
      'value' => 'USER_ID'
    ),
    'options' => array(
      '' => '-- 選択してください --'
    ),
    'validate' => array (),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'ACTION_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'アクションタイプ',
    'options' => array(
      ''  => '-- 選択してください --',
      '1' => 'ログインOK',
      '2' => 'ログインエラー',
      '3' => 'ログアウト'
    ),
    'validate' => array (),
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
  'IP_ADDRESS' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'IPアドレス',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 5,
    'sort_detail' => 5,
  ),
  'USER_AGENT' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'ユーザーエージェント',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => array (),
    'sort_list' => 6,
    'sort_detail' => 6,
  ),

);

}

?>
