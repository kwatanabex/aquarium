<?php
/**
 * AdmFormsAq_adm_table_columnフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_table_column extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_table_column',
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
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Key/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Validation/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Validation/Parameterro/'
);
/**
 * 構成定義設定配列
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADMテーブルカラム管理',
  'default_sort'        => array (
  0 => 'a.COLUMN_ID.ASC',
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
  'COLUMN_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'カラムID',
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
  'TABLE_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'テーブルID',
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
  'COLUMN_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'カラム名',
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
  'COLUMN_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'カラムタイプ',
    'options' => array(
      ''   => '-- 選択してください --',
      'S'  => '文字列型',
      'I'  => '整数型',
      'F'  => '浮動小数点型',
      'D'  => '日付型',
      'T'  => '時間型',
      'DT' => '日付時間型'
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 4,
    'sort_detail' => 4,
  ),
);

}

?>
