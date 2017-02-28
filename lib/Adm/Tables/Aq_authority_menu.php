<?php
/**
 * AdmTablesAq_authority_menu�ơ��֥륯�饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class AdmTablesAq_authority_menu extends SyL_DBDaoTable
{
/**
 * �ơ��֥�̾
 * 
 * @access protected
 * @var string
 */
var $table = 'aq_authority_menu';
/**
 * �ץ饤�ޥꥭ�������
 * 
 * @access protected
 * @var array
 */
var $primary = array (
  0 => 'AUTHORITY_ID',
  1 => 'MENU_ID',
);
/**
 * ��ե��������
 * 
 * @access protected
 * @var array
 */
var $uniques = array (
);
/**
 * �������������
 * 
 * @access protected
 * @var array
 */
var $foreigns = array (
  'aq_authority' => 
  array (
    'AUTHORITY_ID' => 'AUTHORITY_ID',
  ),
  'aq_menu' => 
  array (
    'MENU_ID' => 'MENU_ID',
  ),
);
/**
 * ��������
 * 
 * @access protected
 * @var array
 */
var $columns = array (
  'AUTHORITY_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'numeric' => 
      array (
        'message' => '{name}�Ͽ��ͤ����Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
        ),
      ),
    ),
  ),
  'MENU_ID' => 
  array (
    'type' => 'I',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'numeric' => 
      array (
        'message' => '{name}�Ͽ��ͤ����Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'dot' => false,
          'min' => '-2147483648',
          'max' => '2147483647',
          'min_error_message' => '{name}��{min}�ʾ�����Ϥ��Ƥ�������',
          'max_error_message' => '{name}��{max}�ʲ������Ϥ��Ƥ�������',
        ),
      ),
    ),
  ),
  'LOWER_PERMISSION' => 
  array (
    'type' => 'S',
    'validate' => 
    array (
      'require' => 
      array (
        'message' => '{name}��ɬ�ܤǤ�',
      ),
      'length' => 
      array (
        'message' => '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������',
        'parameters' => 
        array (
          'max' => '1',
        ),
      ),
    ),
  ),
);

}

?>
