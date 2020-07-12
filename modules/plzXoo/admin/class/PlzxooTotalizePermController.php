<?php
/**
@version $Id: TotalizePermController.php,v 1.3 2005/03/12 10:01:11 minahito Exp $
\section using �Ȥ���
*/

require_once "exController/Controller.php";

// Form ���ɤ߹���
require_once "exForm/PermForm.php";

// ����ݡ��ͥ��
require_once "exComponent/Input.php";
//require_once "exComponent/input/render/PermInputRender.php";
require_once XOOPS_ROOT_PATH."/modules/plzXoo/admin/class/PlzxooPermInputRender.php"; // GIJ

// Form ���ɤ߹���
require_once "exComponent/Preview.php";

// Session �����������ɬ��
require_once "exForm/PermForm.php";
require_once XOOPS_ROOT_PATH."/kernel/group.php";

// ���Ѥ��륳��ݡ��ͥ��
require_once "exComponent/confirm/TypicalConfirm.php";	// ����ݡ��ͥ������
//require_once "exComponent/confirm/render/PermConfirmModelRender.php";	// Perm �ѥ�����
require_once XOOPS_ROOT_PATH."/modules/plzXoo/admin/class/PlzxooPermConfirmModelRender.php";	// Perm �ѥ����� // GIJ
require_once "exComponent/confirm/processor/PermTypicalConfirmUpdateProcessor.php";	// Perm �ѥץ��å���

// �ե���ɥ���ե���
require_once "exConfig/ForwardConfig.php";

// session_start
require_once XOOPS_ROOT_PATH."/include/common.php";
require_once XOOPS_ROOT_PATH."/include/cp_header.php";


class exTotalizePermController extends exAbstractGenericController {
	var $head_=null;
	var $file_=null;
	var $use_item_id_=0;

	function setItemId()
	{
		$this->use_item_id_=true;
	}

	function setHeadFile($file)
	{
		if(file_exists($file)) {
			$this->head_=$file;
			return true;
		}
		else false;
	}

	function setXMLFile($file)
	{
		if(file_exists($file)) {
			$this->file_=$file;
			return true;
		}
		else false;
	}

	function doService()
	{
		if(!$this->file_) {
			$this->msg_[]="Plz,Set XML File.";
		}
		else {
    		// �Ū�� ActionForward(���Ǥ�)
			// cgi �Ǥؤ��б��Τ��� $_GET ���ڤ��ؤ�
			$op = isset($_GET['op']) ? $_GET['op'] : '';
    		if($op=='perm_confirm') {
    			$service = new exTotalizePermController_confirm($this);
    			$service->doService();
    		}
    		else {
    			$service = new exTotalizePermController_input($this);
    			$service->doService();
    		}
		}
	}
}

class exTotalizePermController_input extends exAbstractGenericController
{
	var $pController_;

	function exTotalizePermController_input($parent)
	{
		$this->pController_=&$parent;
	}

	function doService()
	{
		if($this->pController_->use_item_id_) {
			$form = new exPermItemXMLEditForm($this->pController_->file_);
		}
		else {
			$form = new exPermXMLEditForm($this->pController_->file_);
		}

		$compo = new exInputComponent(null,new exPermInputComponentRender(),'edit_perm',
				$form,
				new exSuccessForwardConfig(EXFORWARD_LOCATION,$_SERVER['SCRIPT_NAME'].'?op=perm_confirm'));


        switch($ret=$compo->init()) {
        	case COMPONENT_INIT_FAIL:
        		xoops_error("FATAL ERROR");
        		die;
        		break;
        
        	case ACTIONFORM_INIT_FAIL:
        		xoops_cp_header();
				if($this->pController_->head_)
					include($this->pController_->head_);
        		print $compo->form_->getHtmlErrors();
        		$compo->display();
        		xoops_cp_footer();
        		break;
        
        	case COMPONENT_INIT_SUCCESS:
        		xoops_cp_header();
				if($this->pController_->head_)
					include($this->pController_->head_);
        		$compo->display();
        		xoops_cp_footer();
        		break;
		}
	}
}

class exTotalizePermController_confirm extends exAbstractGenericController
{
	var $pController_;

	function exTotalizePermController_input($parent)
	{
		$this->pController_=&$parent;
	}

	function doService()
	{
        $editform=&Session::postPop('edit_perm');
        
		$url="";
		if($this->pController_->use_item_id_)
			$url=$_SERVER['SCRIPT_NAME']."?item_id=".$editform->item_id_;
		else
			$url=$_SERVER['SCRIPT_NAME'];

        $forwards = array ( new exSuccessForwardConfig(EXFORWARD_REDIRECT,$url,"Permission Update Success"),
        				new exFailForwardConfig(EXFORWARD_REDIRECT,$url,"Permission Update Fail"));
        
        $compo = new exTypicalConfirmComponent( new PermTypicalConfirmUpdateProcessor(),
        	new exPermConfirmComponentModelRender(),
        	'edit_perm', new exBeanConfirmTicketForm(), $forwards );
        
        switch($ret=$compo->init($editform)) {
        	case COMPONENT_INIT_FAIL:
        		xoops_cp_header();
        		xoops_error("FATAL ERROR");
        		xoops_cp_footer();
        		break;
        
        	default:
        		xoops_cp_header();
        		$compo->display();
        		xoops_cp_footer();
        		break;
        }
	}
}

?>
