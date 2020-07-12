<?php
/**
@version $Id$
*/

class default_Question_delView_error
{
	function &execute (&$controller, &$request, &$user)
	{
		$message = $request->getAttribute('message');
		if(!$message)
			$message=_MD_PLZXOO_MESSAGE_FAIL;

		redirect_header('index.php', 3, $message);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>