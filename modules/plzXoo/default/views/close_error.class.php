<?php

class default_CloseView_error
{
	function &execute (&$controller, &$request, &$user)
	{
		$error_message=$request->getAttribute('error_message');
		if(!$error_message)
			$error_message = _MD_PLZXOO_MESSAGE_FAIL;

		redirect_header("index.php",3,$error_message);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		return $renderer;
	}
}

?>