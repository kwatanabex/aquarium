<?php
/**
 * ファイルシステムクラス
 */
SyL_Loader::lib('Filesystem');
/**
 * 実行環境クラス
 */
SyL_Loader::lib('Util.Env');

/**
 * ファイルマネージャアクションクラス
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
    // ファイルマネージャルートディレクトリ
    var $root_dir = AQ_FILEMANAGER_ROOT_DIR;

    /**
     * アクション処理
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキストオブジェクト
     */
    function execute(&$data, &$context)
    {
        // ルートからのディレクトリパス
        $current_dir = $data->get('cd');
        // アクションタイプ
        $action_types = $data->get('at');
        // JavaScriptコールバック関数
        $js_callback = $data->get('cb');
        // AQ_FILEMANAGER_ROOT_DIR からの表示可能のディレクトリパス
        $app_root_dir = $data->get('rd');

        // ディレクトリ作成アクション
        $action_nd = $data->get('action_nd');
        // ディレクトリ作成名
        $new_dir   = $data->get('nd');

        // アクションタイプ判別処理
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

        // ディレクトリチェック
        if (!is_dir($this->root_dir . $current_dir)) {
            trigger_error("[AQ error] Directory not found ({$this->root_dir}{$current_dir})", E_USER_ERROR);
        }

        // ディレクトリ階層チェック
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

        // ディレクトリ一覧用オブジェクト
        $dir =& SyL_Filesystem::factory($this->root_dir);
        // ディレクトリ一覧取得
        $result_dirs = array();
        $this->getDirectories($dir, $result_dirs, $current_dirs);

        $dir =& SyL_Filesystem::factory(realpath($this->root_dir . $current_dir));
        // 指定アクション処理
        if ($context->isPost()) {
            // ディレクトリ作成
            if ($action_nd) {
                if (($new_dir === '') || !is_string($new_dir)) {
                    trigger_error("[AQ error] Create directory name not found", E_USER_ERROR);
                }
                $dir->createDirectory($new_dir);
            }
        }

        $dir->createTree(1);

        // ディレクトリ内取得
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
     * ディレクトリ一覧を取得
     *
     * @access private
     * @param object SyLディレクトリオブジェクト
     * @param array 取得結果配列
     * @param array カレントディレクトリ配列
     * @param int 親ディレクトリの配列インデックス
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
     * エキストラパラメータをGETパラメータ用に変換する
     *
     * @access private
     * @return string GETパラメータ用パラメータ
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
