<?php
/**
 * AdmFormsAq_adm_element_validation_pフォームクラス
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmFormsAq_adm_element_validation_pro extends SyL_AdmActionForm
{
/**
 * テーブルクラスの配列
 * 
 * @access protected
 * @var array
 */
var $table_classes = array (
  'a' => 'Adm.Tables.Aq_adm_element_validation_p',
  'b' => 'Adm.Tables.Aq_adm_element_validation',
  'c' => 'Adm.Tables.Aq_adm_validation_p',
);
/**
 * テーブルクラスの関連配列
 * 
 * @access protected
 * @var array
 */
var $table_relations = array(
  '=, a.ELEMENT_VALIDATION_ID = b.ELEMENT_VALIDATION_ID',
  '=, a.VALIDATION_P_ID = c.VALIDATION_P_ID'
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
  'title'               => 'ADM要素バリデーションパラメータ管理',
  'default_sort'        => array (
  0 => 'a.ELEMENT_VALIDATION_ID.ASC',
  1 => 'a.VALIDATION_P_ID.ASC',
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
  ),
  'VALIDATION_P_ID' => 
  array (
    'alias' => 'a',
    'type' => 'select',
    'name' => 'バリデーションパラメータID',
    'attributes' => array (),
    'data_source' => array(
      'alias' => 'c',
      'name'  => 'VALIDATION_P_NAME',
      'value' => 'VALIDATION_P_ID'
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
  'VALIDATION_P_VALUE' => 
  array (
    'alias' => 'a',
    'type' => 'text',
    'name' => 'パラメータ値',
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
  'ELEMENT_ID' => 
  array (
    'alias' => 'b',
    'type' => 'text',
    'name' => '要素ID',
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
);

}

?>
