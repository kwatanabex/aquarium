<?php
/**
 * �ե����륷���ƥ९�饹
 */
SyL_Loader::lib('Filesystem');
/**
 * �¹ԴĶ����饹
 */
SyL_Loader::lib('Util.Env');

/**
 * �ե�����ޥ͡����㥢������󥯥饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Popup_Filemanager_Index extends AppAction
{
    var $script_name = '';
    var $etc_parameters = array();
    // �ե�����ޥ͡�����롼�ȥǥ��쥯�ȥ�
    var $root_dir = AQ_FILEMANAGER_ROOT_DIR;

    /**
     * ������������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȥ��֥�������
     */
    function execute(&$data, &$context)
    {
        // �롼�Ȥ���Υǥ��쥯�ȥ�ѥ�
        $current_dir = $data->get('cd');
        // ��������󥿥���
        $action_types = $data->get('at');
        // JavaScript������Хå��ؿ�
        $js_callback = $data->get('cb');
        // AQ_FILEMANAGER_ROOT_DIR �����ɽ����ǽ�Υǥ��쥯�ȥ�ѥ�
        $app_root_dir = $data->get('rd');

        // �ǥ��쥯�ȥ�������������
        $action_nd = $data->get('action_nd');
        // �ǥ��쥯�ȥ����̾
        $new_dir   = $data->get('nd');

        // ��������󥿥���Ƚ�̽���
        $is_select    = false;
        $is_view_file = true;
        $is_view_dir  = true;
        foreach (explode(',', $action_types) as $action_type) {
            switch ($action_type) {
            case 'select':
                $is_select = true;
                if (!preg_match('/^[\w]+$/', $js_callback)) {
                    trigger_error("[Aq error] Invalid javascript callback parameter", E_USER_ERROR);
                }
                $this->etc_parameters['cb'] = $js_callback;
                break;
            case 'dironly':
                $is_view_file = false;
                break;
            case 'fileonly':
                $is_view_dir = false;
                break;
            }
        }

        $this->root_dir = realpath($this->root_dir) . '/';

        if (substr($current_dir, 0, 1) == '/') {
            $current_dir =  substr($current_dir, 1);
        }

        if ($app_root_dir !== null) {
            if (substr($app_root_dir, 0, 1) == '/') {
                $app_root_dir =  substr($app_root_dir, 1);
            }
            if (substr($app_root_dir, -1) != '/') {
                $app_root_dir .= '/';
            }
            $this->root_dir .= $app_root_dir;
            $this->etc_parameters['rd'] = $app_root_dir;
        }

        // �ǥ��쥯�ȥ�����å�
        if (!is_dir($this->root_dir . $current_dir)) {
            trigger_error("[AQ error] Directory not found ({$this->root_dir}{$current_dir})", E_USER_ERROR);
        }

        // �ǥ��쥯�ȥ곬�إ����å�
        if (!preg_match('/^' . preg_quote($this->root_dir, '/') . '/', realpath($this->root_dir . $current_dir) . '/')) {
            trigger_error("[AQ error] Invalid Directory ({$this->root_dir}{$current_dir}). check constant `AQ_FILEMANAGER_ROOT_DIR'", E_USER_ERROR);
        }

        if ($action_types) {
            $this->etc_parameters['at'] = $action_types;
        }

        $this->script_name = $context->getScriptName() . '/Popup/Filemanager/';

        $current_dirs      = array();
        $current_dirs_link = array();
        $tmp_link = '';
        foreach (preg_split('/(\\\\|\/)/', $current_dir) as $tmp_dir) {
            if ($tmp_dir !== '') {
                $tmp_link .= '/' . $tmp_dir;
                $current_dirs[] = $tmp_dir;
                $current_dirs_link[] = array(
                  'name' => $tmp_dir,
                  'link' => $this->script_name . '?cd=' . urlencode($tmp_link) . $this->getParameterForGet()
                );
            }
        }

        // �ǥ��쥯�ȥ�����ѥ��֥�������
        $dir =& SyL_Filesystem::factory($this->root_dir);
        // �ǥ��쥯�ȥ��������
        $result_dirs = array();
        $this->getDirectories($dir, $result_dirs, $current_dirs);

        $dir =& SyL_Filesystem::factory(realpath($this->root_dir . $current_dir));
        // ���ꥢ����������
        if ($context->isPost()) {
            // �ǥ��쥯�ȥ����
            if ($action_nd) {
                if (($new_dir === '') || !is_string($new_dir)) {
                    trigger_error("[AQ error] Create directory name not found", E_USER_ERROR);
                }
                $dir->createDirectory($new_dir);
            }
        }

        $dir->createTree(1);

        // �ǥ��쥯�ȥ������
        $result_files = array();
        foreach ($dir->getList() as $list) {
            if ($list->isDir()) {
                if (!$is_view_dir) continue;
            } else {
                if (!$is_view_file) continue;
            }
            $result_files[] = array(
              'name'  => $list->getName(true),
              'path'  => '/' . preg_replace('/^(' . preg_quote($this->root_dir, '/') . ')/', '', $list->getName()),
              'type'  => $list->getType(),
              'perm'  => $list->getPermission(false),
              'owner' => $list->getOwner(),
              'size'  => SyL_Filesystem::formatSize($list->getSize()),
              'mtime' => $list->getMtime()
            );
        }

        $data->set('is_select',   $is_select);
        $data->set('js_callback', $js_callback);
        $data->set('is_writable', $dir->isWritable());

        $data->set('etc_parameters', $this->etc_parameters);

        $data->set('process_user',  SyL_UtilEnv::getProcessUser());
        $data->set('current_dirs_link', $current_dirs_link);

        $data->set('result_dirs',  $result_dirs);
        $data->set('result_files', $result_files);
    }

    /**
     * �ǥ��쥯�ȥ���������
     *
     * @access private
     * @param object SyL�ǥ��쥯�ȥꥪ�֥�������
     * @param array �����������
     * @param array �����ȥǥ��쥯�ȥ�����
     * @param int �ƥǥ��쥯�ȥ�����󥤥�ǥå���
     */
    function getDirectories(&$dir, &$result, $current_dirs, $parent_index=0)
    {
        if ($parent_index == 0) {
            $result = array();
            $result[] = array(-1, $dir->getName(), $this->script_name . '?' . $this->getParameterForGet(), 'true');
        }

        $dir->createTree(1);

        $current_dir = array_shift($current_dirs);

        foreach ($dir->getList() as $list) {
            if ($list->isDir()) {
                $name = $list->getName(true);
                $base_dir = preg_replace('/^(' . preg_quote($this->root_dir, '/') . ')/', '', $list->getName());
                if ($name == $current_dir) {
                    $result[] = array($parent_index, $name, $this->script_name . '?cd=' . urlencode($base_dir) . $this->getParameterForGet(), 'true');
                    $this->getDirectories($list, $result, $current_dirs, count($result)-1);
                } else {
                    $result[] = array($parent_index, $name, $this->script_name . '?cd=' . urlencode($base_dir) . $this->getParameterForGet(), 'false');
                }
            }
        }
    }
    
    /**
     * �������ȥ�ѥ�᡼����GET�ѥ�᡼���Ѥ��Ѵ�����
     *
     * @access private
     * @return string GET�ѥ�᡼���ѥѥ�᡼��
     */
    function getParameterForGet()
    {
        $etc_parameter = '';
        foreach ($this->etc_parameters as $name => $value) {
            $etc_parameter .= '&' . $name . '=' . urlencode($value);
        }
        return $etc_parameter;
    }
}

?>
