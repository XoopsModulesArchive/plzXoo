<?php

class default_EditquesView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		redirect_header("index.php",1,$request->getAttribute('success_message'));

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>