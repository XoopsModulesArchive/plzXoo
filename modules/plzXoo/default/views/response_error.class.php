<?php
/**
@version $Id$
*/

class default_ResponseView_error
{
	function &execute (&$controller, &$request, &$user)
	{
		$answer=&$request->getAttribute('answer');
		$message = $request->getAttribute('message');
		if(!$message) $message = _MD_PLZXOO_MESSAGE_FAIL;
		redirect_header('index.php' , 3, $message ) ;

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		return $renderer;
	}
}

?>