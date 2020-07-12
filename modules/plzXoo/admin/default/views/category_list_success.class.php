<?php

class default_Category_listView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$component=&$request->getAttribute('component');
		
		$renderer = new mojaLE_Renderer($controller,$request,$user);
		$renderer->setTemplate('category_list.tpl');
		$renderer->setAttribute('component',$component);
		return $renderer;
	}
}

?>