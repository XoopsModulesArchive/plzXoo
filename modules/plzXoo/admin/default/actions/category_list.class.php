<?php

require_once XOOPS_ROOT_PATH."/modules/plzXoo/admin/default/forms/CategoryListTable.class.php";

class default_Category_listAction extends mojaLE_AbstractAction
{
	function getDefaultView(&$controller,&$request,&$user)
	{
		$component = new CategoryListTableComponent();
		$component->init();

		$request->setAttribute("component",$component);

		return VIEW_SUCCESS;
	}
	
	function getRequestMethods()
	{
		return REQ_NONE;
	}

	function isSecure()
	{
		return true;
	}
}

?>