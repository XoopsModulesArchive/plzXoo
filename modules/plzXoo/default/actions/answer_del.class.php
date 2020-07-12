<?php
/**
@version $Id$
*/

// FIXME
require_once "exForm/ConfirmTicketForm.php";

class default_Answer_delAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		// FIXME
		$id=isset($_REQUEST['aid']) ? intval ($_REQUEST['aid']) : 0;

		// FIXME
		$handler=&plzXoo::getHandler('answer');

		$obj=&$handler->get($id);
		if(!is_object($obj)) {
			$request->setAttribute('message',_MD_PLZXOO_ERROR_ANSWER_NOT_EXISTS);
			return VIEW_ERROR;
		}
    
		// 権限の確認
		if(!$obj->isEnableDelete($user)) {
			$request->setAttribute('message',_MD_PLZXOO_ERROR_PERMISSION);
			return VIEW_ERROR;
		}

		// FIXME
		$editform = new exConfirmTicketForm();
		$editform->setErrorMessage(_MD_PLZXOO_ERROR_TICKET);
   
		if($editform->init(strtolower(get_class($this)))==ACTIONFORM_POST_SUCCESS) {
			$editform->release();
			$request->setAttribute('obj',$obj);
			return $handler->delete($obj) ?
				VIEW_SUCCESS : VIEW_ERROR;
		}

		$handler=&plzXoo::getHandler('question');
		$question=&$handler->get($obj->getVar('qid'));
		$handler=&plzXoo::getHandler('category');
		$category=&$handler->get($question->getVar('cid'));

		$request->setAttribute('editform',$editform);
		$request->setAttribute('obj',$obj);
		$request->setAttribute('question',$question);
		$request->setAttribute('category',$category);

		return VIEW_INPUT;
	}

	function isSecure()
	{
		return false;
	}
}

?>
