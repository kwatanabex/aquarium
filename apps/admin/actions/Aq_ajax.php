<?php
/**
 * ---------------------------------------------------------
 *  Copyright 2007 AQUARIUM Project. All rights reserved.
 * ---------------------------------------------------------
 *
 * AQUARIUM Ajax������ץȽ��ϥ��饹
 *
 * @access    public
 * @package   aquarium
 * @author    Koki Wwatanabe <k.watanabe@syl.jp>
 * @copyright 2007 AQUARIUM Project. All rights reserved.
 * @version   $Id:$
 */
class Aq_ajax extends AppAction
{
    /**
     * �ǥե���ȥ�����������
     *
     * @access public
     * @param object �ǡ����������֥�������
     * @param object ����ƥ����ȴ������֥�������
     * @return void
     */
    function execute(&$data, &$context)
    {
        $context->setViewType('js.default');
        $data->addImport('ajax');
    }

}

?>
