<?php
/**
@version $Id$
*/

class default_ResponseView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$answer=&$request->getAttribute('answer');
		redirect_header('index.php?action=detail&qid='.$answer->getVar('qid'), 1, _MD_PLZXOO_MESSAGE_SUCCESS);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		return $renderer;
	}
}

?>