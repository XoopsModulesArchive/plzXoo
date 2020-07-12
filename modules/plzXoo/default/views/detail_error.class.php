<?php

class default_DetailView_error
{
	function &execute (&$controller, &$request, &$user)
	{
		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>