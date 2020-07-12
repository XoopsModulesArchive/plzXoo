<?php

class default_DefaultIndexAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
//		$controller->forward($controller->getModuleName(),"category_list");
		return VIEW_SUCCESS;
	}

	function isSecure()
	{
		return true;
	}
}

?>