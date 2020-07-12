<?php
/**
@version $Id$
*/

// FIXME
require_once "exForm/ConfirmTicketForm.php";

class default_Category_deleteAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		// FIXME
		$id=isset($_REQUEST['cid']) ? intval ($_REQUEST['cid']) : 0;

		// FIXME
		$handler=&plzXoo::getHandler('category');

		$obj=&$handler->get($id);
		if(!is_object($obj)) {
			return VIEW_ERROR;
		}
    
		// =======================================================================
		// Permission Check etc...  削除権限のチェックなどが必要ならここにコードを書く
		// ======================================================================= 

		// FIXME
		$editform = new exConfirmTicketForm();
		$editform->setErrorMessage(_MD_A_PLZXOO_ERROR_TICKET);
   
		if($editform->init(strtolower(get_class($this)))==ACTIONFORM_POST_SUCCESS) {
			$editform->release();

			return $handler->delete($obj) ?
				VIEW_SUCCESS : VIEW_ERROR;
		}

		$request->setAttribute('editform',$editform);
		$request->setAttribute('obj',$obj);

		return VIEW_INPUT;
	}

	function isSecure()
	{
		return true;
	}
}

?>
