<?php

class default_DefaultindexView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$renderer = new mojaLE_Renderer($controller,$request,$user);
		$renderer->setTemplate('index.tpl');
		return $renderer;
	}
}

?>