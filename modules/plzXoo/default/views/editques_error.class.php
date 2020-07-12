<?php

class default_EditquesView_error
{
	function &execute (&$controller, &$request, &$user)
	{
		redirect_header("index.php",1,_MD_PLZXOO_MESSAGE_FAIL);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>