<?php
/**
 * AdmFormsAq_adm_column_validationフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_column_validationro extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_column_validation',
  'b' => 'Adm.Tables.Aq_adm_table_column',
  'c' => 'Adm.Tables.Aq_adm_validation',
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.COLUMN_ID = b.COLUMN_ID',
  '=, a.VALIDATION_ID = c.VALIDATION_ID'
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
  'title'               => 'ADMカラムバリデーション管理',
  'default_sort'        => array (
  0 => 'a.COLUMN_VALIDATION_ID.ASC',
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
  'COLUMN_VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'カラムバリデーションID',
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
  'COLUMN_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'カラムID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'COLUMN_NAME',
      'value' => 'COLUMN_ID'
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
  'VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'バリデーションID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'c',
      'name'  => 'VALIDATION_NAME',
      'value' => 'VALIDATION_ID'
    ),
    'options' => array(
      '' => '-- 選択してください --'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'ERROR_MESSAGE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'エラーメッセージ',
    'attributes' => 
    array (
      'size' => '30',
    ),
    'validate' => 
    array (
    ),
    'note' => '※未入力の場合、バリデーションマスタのエラーメッセージが使用されます',
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
  'TABLE_ID' => 
  array (
    'alias' => 'b',
    'type' => 'text',
    'name' => 'テーブルID',
    'attributes' => array(),
    'validate' => 
    array (
    ),
    'sort_list' => 5,
    'sort_detail' => 5,
    'read_only_new'  => true,
    'read_only_upd'  => true,
  ),
);

}

?>
