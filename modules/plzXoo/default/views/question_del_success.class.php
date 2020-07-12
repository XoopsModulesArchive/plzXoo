<?php
/**
@version $Id$
*/

class default_Question_delView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		redirect_header('index.php', 1, _MD_PLZXOO_MESSAGE_SUCCESS);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>