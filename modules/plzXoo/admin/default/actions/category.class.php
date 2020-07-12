<?php
/**
@version $Id$
*/

require_once XOOPS_ROOT_PATH."/modules/plzXoo/admin/default/forms/CategoryEditForm.class.php";

class default_CategoryAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		$id=isset($_REQUEST['cid']) ? intval ($_REQUEST['cid']) : 0;

		$handler=&plzXoo::getHandler('category');

		$obj=&$handler->get($id);
		if(!is_object($obj)) {
			$obj=&$handler->create();
		}
    
		$editform = new CategoryEditForm();
   
		if($editform->init($obj)==ACTIONFORM_POST_SUCCESS) {
			$editform->update($obj);

			$request->setAttribute('obj',$obj);
			return $handler->insert($obj) ?
				VIEW_SUCCESS : VIEW_ERROR;
		}

		// View にカテゴリ一覧を送る
		$categories=&$handler->getObjects();

		$request->setAttribute('editform',$editform);
		$request->setAttribute('obj',$obj);
		$request->setAttribute('categories',$categories);

		return VIEW_INPUT;
	}

	function isSecure()
	{
		return true;
	}
}

?>
