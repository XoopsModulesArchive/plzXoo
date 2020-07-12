<?php
/**
@version $Id$
*/

class default_CategoryView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		redirect_header('index.php', 1, _MD_A_PLZXOO_MESSAGE_DBUPDATE_SUCCESS );

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>