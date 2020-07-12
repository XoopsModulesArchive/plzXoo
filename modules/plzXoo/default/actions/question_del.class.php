<?php
/**
@version $Id$
*/

// FIXME
require_once "exForm/ConfirmTicketForm.php";

class default_Question_delAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		// FIXME
		$id=isset($_REQUEST['qid']) ? intval ($_REQUEST['qid']) : 0;

		// FIXME
		$handler=&plzXoo::getHandler('question');

		$question=&$handler->get($id);
		if(!is_object($question)) {
			return VIEW_ERROR;
		}
    
		// 権限の確認
		if(!$question->isEnableDelete($user)) {
			$request->setAttribute('message',_MD_PLZXOO_ERROR_PERMISSION);
			return VIEW_ERROR;
		}

		// FIXME
		$editform = new exConfirmTicketForm();
		$editform->setErrorMessage(_MD_PLZXOO_ERROR_TICKET);
   
		if($editform->init(strtolower(get_class($this)))==ACTIONFORM_POST_SUCCESS) {
			$editform->release();
			return $handler->delete($question) ?
				VIEW_SUCCESS : VIEW_ERROR;
		}

		$handler=&plzXoo::getHandler('category');
		$category=&$handler->get($question->getVar('cid'));

		$request->setAttribute('editform',$editform);
		$request->setAttribute('question',$question);
		$request->setAttribute('category',$category);

		return VIEW_INPUT;
	}

	function isSecure()
	{
		return true;
	}
}

?>
