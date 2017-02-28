<?php
/**
 * AdmFormsAq_adm_tableフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_table extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_table',
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
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/Keyro/',
  '/aquarium/admin.php/Developer/Adm/Admtable/Column/validationro/'
);
/**
 * 構成定義設定配列
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'aq_adm_table管理',
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
 * フォーム定義要素配列
 * 
 * @access protected
 * @var array
 */
var $elements_config = array (
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
    'sort_list' => 1,
    'sort_detail' => 1,
  ),
  'TABLE_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'ADMテーブル名',
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
    'name' => 'タイプ',
    'validate' => 
    array (
    ),
    'options' => array(
      'T' => 'テーブル',
      'V' => 'ビュー'
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
);

}

?>
