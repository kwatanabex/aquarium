<?php
/**
 * SQL実行 Ajax-Jsonクラス
 *
 * @package   SyL
 * @author    Koki Watanabe <k.watanabe@syl.jp>
 * @copyright 2006-2007 k.watanabe
 * @license   http://www.opensource.org/licenses/lgpl-license.php
 * @version   CVS: $Id$
 * @link      http://www.syl.jp/
 */
class Developer_Sql_AjaxSql extends AppAction
{
    /**
     * デフォルトアクション
     *
     * @access public
     * @param object データ管理オブジェクト
     * @param object コンテキスト管理オブジェクト
     */
    function execute(&$data, &$context)
    {
        $data->apply('mb_convert_encoding', SYL_ENCODE_INTERNAL, SYL_ENCODE_JS);

        $sql = $data->get('sql');

        $result = null;
        $error  = true;
        $error_message  = 'SQL実行中にエラーが発生しました。詳細はログを確認してください。';

        // エラーハンドリング用に事前にエラー情報をセット
        $data->set('result', $result);
        $data->set('error',  $error);
        $data->set('error_message', $error_message);

        if ($sql) {
            $conn =& $context->getDB();
            $conn->beginTransaction();
            $result = $conn->query($sql);
            if ($conn->isError()) {
                $conn->rollback();
                $error = true;
                $error_message = $conn->errorInfo();
            } else {
                $error = false;
                $conn->commit();

                // 更新系の場合
                if (is_numeric($result)) {
                    $result = true;
                }
            }
            $context->closeDB($conn);
        }

        $data->set('result', $result);
        $data->set('error',  $error);
        $data->set('error_message', $error_message);

        $data->apply('mb_convert_encoding', SYL_ENCODE_JS, SYL_ENCODE_INTERNAL);
        $context->setViewType('json');
    }
}

?>
