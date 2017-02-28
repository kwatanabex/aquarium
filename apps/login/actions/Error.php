<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 */

/**
 * AQUARIUMエラー画面用クラス
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Error extends AppAction
{
    /**
     * デフォルトアクション処理
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキスト管理オブジェクト
     * @return void
     */
    function execute(&$data, &$context)
    {
        $error = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

        $error_title   = '';
        $error_message = '';
        switch ($error) {
        case 'menu_error':
            $error_title   = 'メニュー取得エラー';
            $error_message = 'アクセスしたURLに対するメニューが登録されていません';
            break;
        case 'auth_error':
            $error_title   = '権限エラー';
            $error_message = 'アクセスしたURLに対する権限がありません。';
            break;
        default:
            // ログアウト処理
            $context->doLogout();
            // ログイン画面へ遷移
            SyL_Response::redirect('/aquarium/login.php');
        }

        $data->set('error_title',   $error_title);
        $data->set('error_message', $error_message);
    }
}

?>
