<?php
/**
 * �ե����९�饹
 */
SyL_Loader::lib('Form');
/**
 * �Х�ǡ������ޥ͡����㥯�饹
 */
SyL_Loader::lib('ValidationManager');

/**
 * AdmFormsAq_adm_table�ե��������ɽ�����饹
 *
 * @access    public
 * @package   aquarium
 * @author    {author}
 * @version   $Id:$
 */
class Developer_Adm_Adm_Import_Index extends AppAction
{
    /**
     * ������������
     *
     * @access public
     * @param object �ꥯ�����ȥ��֥�������
     * @param object �ǡ����������֥�������
     */
    function execute(&$data, &$context)
    {
        $conn =& $context->getDB();

        // ADM�ơ��֥�ޥ͡���������
        $admtable_manager =& AQManager::factory($conn, 'AdmTable');
        $tables = array();
        $tables[''] = '-- ���򤷤Ƥ������� --';
        foreach ($admtable_manager->getTables() as $row) {
            $tables[$row['TABLE_ID']] = $row['TABLE_NAME'];
        }
        $cnt = count($tables) - 1;

        // �Х�ǡ��������ܥѥ��������
        $v_require1 =& SyL_Validator::create('require', '{name}�����Ϥ��Ƥ�������');
        $v_require2 =& SyL_Validator::create('require', '{name}�����򤷤Ƥ�������');
        $v_numeric  =& SyL_Validator::create('numeric', '{name}������������ޤ���');
        $v_length1  =& SyL_Validator::create('length',  '{name}��{max}ʸ���ʥХ��ȡ˰�������Ϥ��Ƥ�������', array('max'=> 50));

        $form =& new SyL_Form();

        // ADM̾
        $element =& $form->createElement('text', 'an', 'ADM̾', array(), array('size' => '40'));
        $vs =& SyL_Validators::create();
        $vs->add($v_require1);
        $vs->add($v_length1);
        $form->addElement($element, $vs);

        // �ᥤ����ƥʥ󥹥ơ��֥�
        $element =& $form->createElement('select', 'mt', '���ƥʥ�ADM�ơ��֥�', $tables, array('onChange' => 'SyL_AjaxRequest.sendAsyncPost(\'' . $context->getScriptName() . '/Developer/Adm/Adm/Import/AjaxTableColumn.html\', \'\', setTableColumnList, null, {\'tid\': this.options[this.selectedIndex].value, \'name\': this.name});'));
        $vs =& SyL_Validators::create();
        $vs->add($v_require2);
        $vs->add($v_numeric);
        $form->addElement($element, $vs);

        if ($context->isPost() && $form->validate()) {
            $adm_name = $data->get('an');
            $table_id = $data->geta('mt');
            $relations = array();
            $i = 0;
            while (++$i) {
                if (!$data->get('rt' . $i)) {
                    break;
                }
                $relation_table_id = $data->get('rt'    . $i);
                $relation_type     = $data->get('rtp'   . $i);
                $join_columns      = $data->get('rtcth' . $i);
                $relations[] = array(
                  'table_id'      => $relation_table_id,
                  'relation_type' => $relation_type,
                  'join_columns'  => $join_columns
                );
            }

            // �ȥ�󥶥�����󳫻�
            $conn->beginTransaction();
            // ADM�ޥ͡���������
            $adm_manager =& AQManager::factory($conn, 'Adm');
            if ($adm_manager->importAdmTables($adm_name, $table_id[0], $relations)) {
                // �ȥ�󥶥���������
                $conn->commit();
            } else {
                // �ȥ�󥶥�������˴�
                $conn->rollback();
                SyL_Error::trigger("[Aquarium error] ADM�ơ��֥륤��ݡ��Ȼ��˥��顼��ȯ�����ޤ������ܺ٤ϡ������ǧ���Ƥ�������", E_USER_ERROR);
            }

            SyL_Response::redirect($context->getScriptName() . '/Developer/Adm/Adm/');
            // -- exit --
        }

        $forms =& $form->getResultArray();

        $data->set('url_script', $context->getScriptName());
        $data->set('cnt',    $cnt);
        $data->set('form',   $forms);
        $data->set('tables', $tables);
    }

}

?>
