<?php

require_once dirname(__FILE__)."/../forms/EditAnswerForm.class.php";

class default_AnswerAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		exFrame::init(EXFRAME_PERM);
		// 回答権限のチェック
		exPerm::GuardRedirect('post_answer','index.php',_MD_PLZXOO_ERROR_PERMISSION);

        $qid = isset($_REQUEST['qid']) ? intval($_REQUEST['qid']) : 0;
        $qHandler=&plzXoo::getHandler('question');
		// ここで qid を確認
		$question =& $qHandler->get($qid);
		if(!is_object($question)) {
			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_QUESTION_NOT_EXISTS);
			return VIEW_ERROR;
		}
		elseif($question->getVar('status')!=1) {
			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_QUESTION_CLOSED);
			return VIEW_ERROR;
		}
		elseif(is_object($user) && $question->getVar('uid')==$user->uid()) {
			exPerm::GuardRedirect('post_answer_myself','index.php',_MD_PLZXOO_ERROR_PERMISSION); // GIJ
		} 

        $id = isset($_REQUEST['aid']) ? intval($_REQUEST['aid']) : 0;
        $handler=&plzXoo::getHandler('answer');

        $obj=&$handler->get($id);
        if(!is_object($obj)) {
			$is_new = true ;
            $obj=&$handler->create();
            $obj->setVar('uid',$user->uid());
            $obj->setVar('qid',$qid);
        }
        else {
			$is_new = false ;
    		// 権限の確認
    		if(!$obj->isEnableEdit($user)) {
    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_PERMISSION);
    			return VIEW_ERROR;
    		}
        }

        $editform =& new EditAnswerForm();
        if($editform->init($obj)==ACTIONFORM_POST_SUCCESS) {
            $editform->update($obj); // 入力内容をオブジェクトに受け取る
			$request->setAttribute('question',$question);
			$obj->setVar('modified_date',time());
			if($handler->insert($obj)) {

				// update size of question
				$question->updateSize();
				$question->setVar('modified_date',time());
				$qHandler->insert($question);

				// notifications
				$notification_handler =& xoops_gethandler( 'notification' ) ;
				if( $is_new ) {
					// trigger notification of question:newa
					$notification_handler->triggerEvent( 'question' , $question->getVar('qid') , 'newa' , array( 'QUESTION_SUBJECT' => $question->getVar('subject') , 'ANSWER_UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_NEWA , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$question->getVar('qid') ) ) ;

					// trigger notification of question:updt
					$notification_handler->triggerEvent( 'question' , $question->getVar('qid') , 'updt' , array( 'QUESTION_SUBJECT' => $question->getVar('subject') , 'UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_NEWA , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$question->getVar('qid') ) ) ;

					// auto register a notification question:updt into answerer
					if( ! empty( $GLOBALS['xoopsModuleConfig']['autonotify_answerer'] ) ) $notification_handler->subscribe( 'question' , $question->getVar('qid') , 'updt' ) ;

				} else {

					// trigger notification of question:updt
					$notification_handler->triggerEvent( 'question' , $question->getVar('qid') , 'updt' , array( 'QUESTION_SUBJECT' => $question->getVar('subject') , 'UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_MODA , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$question->getVar('qid') ) ) ;

				}

				return VIEW_SUCCESS;
			}
			else
				return VIEW_ERROR;
        }

        $handler=&plzXoo::getHandler('category');
        $category=&$handler->get($question->getVar('cid'));

        $request->setAttribute('editform',$editform);
        $request->setAttribute('category',$category);
        $request->setAttribute('question',$question);
        $request->setAttribute('answer',$obj);
        return VIEW_INPUT;
	}
	
	function isSecure()
	{
		return true;
	}
}

?>