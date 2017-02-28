<?php
/**
 * AdmFormsAq_adm_element_validationフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_element_validation extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_element_validation',
  'b' => 'Adm.Tables.Aq_adm_element',
  'c' => 'Adm.Tables.Aq_adm_validation',
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.ELEMENT_ID = b.ELEMENT_ID',
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
var $related_links = array(
  '/aquarium/admin.php/Developer/Adm/Adm/Relation/Element/Validation/Parameter/'
);
/**
 * 構成定義設定配列
 * 
 * @access protected
 * @var array
 */
var $structs_config = array(
  'title'               => 'ADM要素バリデーション管理',
  'default_sort'        => array (
  0 => 'a.ELEMENT_VALIDATION_ID.ASC',
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
  'ELEMENT_VALIDATION_ID' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => '要素バリデーションID',
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
  'ELEMENT_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => '要素ID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'b',
      'name'  => 'ELEMENT_NAME',
      'value' => 'ELEMENT_ID'
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
);

}

?>
