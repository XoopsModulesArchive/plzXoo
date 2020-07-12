<?php

class default_Category_deleteView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$obj=&$request->getAttribute('obj');

		$renderer = new mojaLE_Renderer($controller,$request,$user);
		$renderer->setTemplate('category_delete.tpl');

		$renderer->setAttribute('editform',$editform);
		$renderer->setAttribute('obj',$obj);

		return $renderer;
	}
}

?>