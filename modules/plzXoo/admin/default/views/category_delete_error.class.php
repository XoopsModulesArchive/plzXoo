<?php
/**
@version $Id$
*/

class default_Category_deleteView_error
{
	function &execute (&$controller, &$request, &$user)
	{
		redirect_header('index.php', 3, _MD_A_PLZXOO_MESSAGE_DBUPDATE_FAIL);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>