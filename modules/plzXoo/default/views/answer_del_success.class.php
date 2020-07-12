<?php
/**
@version $Id$
*/

class default_Answer_delView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$answer=&$request->getAttribute('obj');
		redirect_header('index.php?action=detail&amp;qid='.$answer->getVar('qid'), 1, _MD_PLZXOO_MESSAGE_SUCCESS );

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>