<?php
/**
@version $Id$
*/

// FIXME
require_once XOOPS_ROOT_PATH."/modules/plzXoo/default/forms/AnswerResponseEditForm.class.php";

class default_ResponseAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		// FIXME
		$id=isset($_REQUEST['aid']) ? intval ($_REQUEST['aid']) : 0;

		// FIXME
		$handler=&plzXoo::getHandler('answer');

		$obj=&$handler->get($id);
		if(!is_object($obj)) {
			$request->setAttribute("message",_MD_PLZXOO_ERROR_ANSWER_NOT_EXISTS);
			return VIEW_ERROR;
		}

		$q_handler=&plzXoo::getHandler('question');
		$question=&$q_handler->get($obj->getVar('qid'));

		$c_handler=&plzXoo::getHandler('category');
		$category=&$c_handler->get($question->getVar('cid'));

		// この質問がアクティブなのか確認
		if(!is_object($question))
			return VIEW_ERROR;
		if(!($question->getVar('status')<=2))
			return VIEW_ERROR;

		// この回答への権限を確認
		if($question->getVar('uid')!=$user->uid() && !$user->isAdmin()) {
			$request->setAttribute("message",_MD_PLZXOO_ERROR_PERMISSION);
			return VIEW_ERROR;
		}
		
		// 回答が終了しているならポイントも投函可能なフォームを渡す
		//$editform = ($question->getVar('status')==2) ?
		//		new AnswerResponsePointEditForm() : new AnswerResponseEditForm();
		$editform = new AnswerResponseEditForm();

		if($editform->init($obj)==ACTIONFORM_POST_SUCCESS) {
			$editform->update($obj);

			// update size of question
			$question->setVar('modified_date',time());
			$q_handler->insert($question);

			// update answer
			$request->setAttribute('answer',$obj);
			$obj->setVar('modified_date',time());

			// trigger notification of question:updt
			$notification_handler =& xoops_gethandler( 'notification' ) ;
			$notification_handler->triggerEvent( 'question' , $question->getVar('qid') , 'updt' , array( 'QUESTION_SUBJECT' => $question->getVar('subject') , 'UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_MODC , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$question->getVar('qid') ) ) ;

			return $handler->insert($obj) ?
				VIEW_SUCCESS : VIEW_ERROR;
		}

		$request->setAttribute('editform',$editform);
		$request->setAttribute('answer',$obj);
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
