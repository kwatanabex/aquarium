<?php
/**
 * AdmFormsAq_adm_validation_pフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_validation_p extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_validation_p',
  'b' => 'Adm.Tables.Aq_adm_validation'
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.VALIDATION_ID = b.VALIDATION_ID',
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
  'title'               => 'ADMバリデーションパラメータ管理',
  'default_sort'        => array (
  0 => 'a.VALIDATION_P_ID.ASC',
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
  'VALIDATION_P_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'パラメータID',
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
  'VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'バリデーションID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'VALIDATION_NAME',
      'value' => 'VALIDATION_ID'
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
  'VALIDATION_P_TYPE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'パラメータタイプ',
    'attributes' => 
    array (
      'size' => '20',
    ),
    'validate' => 
    array (
    ),
    'sort_list' => 3,
    'sort_detail' => 3,
  ),
  'VALIDATION_P_NAME' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'パラメータ名',
    'attributes' => 
    array (
      'size' => '40',
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
