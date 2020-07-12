<?php

require_once dirname(__FILE__)."/../forms/EditQuestionForm.class.php";

class default_EditquesAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		exFrame::init(EXFRAME_PERM);
		// ��ȡ���¤Υ����å�
		exPerm::GuardRedirect('post_question','index.php',_MD_PLZXOO_ERROR_PERMISSION);

        $id = isset($_REQUEST['qid']) ? intval($_REQUEST['qid']) : 0;
        $handler=&plzXoo::getHandler('question');
        $obj=null;

        if($id)
            $obj=&$handler->get($id);
        if(!is_object($obj)) {
			$is_new = true ;
            $obj=&$handler->create();
            $obj->setVar('uid',$user->uid());
			// ��ư��ǧ���ʤ���С���ǧ�Ԥ���
			if( ! exPerm::isPerm('post_question_auto_approve') ) {
				$obj->setVar( 'status' , 4 ) ;
				$is_need_approve = true ;
				$is_new = false ;
			}
        } else {
			$is_new = false ;
    		// �Խ����¤γ�ǧ
    		if(!$obj->isEnableEdit($user)) {
    			$request->setAttribute('message',_MD_PLZXOO_ERROR_PERMISSION);
    			return VIEW_ERROR;
    		}

			// ���ơ�������̵���Τ�Τϴ����԰ʳ��Խ���ǽ
			if( $obj->getVar('status') == 3 ) {
				if( ! is_object( $GLOBALS['xoopsUser'] ) || ! $GLOBALS['xoopsUser']->isAdmin() )
					return VIEW_ERROR;
			}
        }
		$prev_status = $obj->getVar('status') ;

        $editform =& new EditQuestionForm();
        if($editform->init($obj)==ACTIONFORM_POST_SUCCESS) {
            $editform->update($obj); // �������Ƥ򥪥֥������Ȥ˼������
			// ��ǧ�����Υ����å�
			$obj->setVar('modified_date',time());
			if( $handler->insert($obj) ) {

				// update size of category
				$category_handler =& plzXoo::getHandler('category');
				$category =& $category_handler->get( $obj->getVar('cid') ) ;
				$category->updateSize();
				$category_handler->insert( $category ) ;

				// notifications
				$notification_handler =& xoops_gethandler( 'notification' ) ;
				if( $is_new || $prev_status == 4 && $obj->getVar('status') == 1 ) {
					// �����ޤ��Ͼ�ǧ������ν���
					// trigger notification of global:newq
					$notification_handler->triggerEvent( 'global' , 0 , 'newq' , array( 'QUESTION_SUBJECT' => $obj->getVar('subject') , 'QUESTION_UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_NEWQ , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$obj->getVar('qid') ) ) ;
					// trigger notification of category:newq
					$notification_handler->triggerEvent( 'category' , $obj->getVar('cid') , 'newq' , array( 'QUESTION_SUBJECT' => $obj->getVar('subject') , 'QUESTION_UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_NEWQ , 'CATEGORY_NAME' => $category->getVar('name') , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$obj->getVar('qid') ) ) ;

					// auto register a notification question:newa into questioner
					if( ! empty( $GLOBALS['xoopsModuleConfig']['autonotify_questioner'] ) ) $notification_handler->subscribe( 'question' , $obj->getVar('qid') , 'newa' , null , null , $obj->getVar('uid') ) ;

				} else {
					if( $is_need_approve ) {
						// ��ǧ�Ԥ������ν��� (waiting)
						// trigger notification of global:neww
						$notification_handler->triggerEvent( 'global' , 0 , 'neww' , array( 'QUESTION_SUBJECT' => $obj->getVar('subject') , 'QUESTION_UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_NEWW , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$obj->getVar('qid') ) ) ;
					} else {
						// trigger notification of question:updt
						$notification_handler->triggerEvent( 'question' , $obj->getVar('qid') , 'updt' , array( 'QUESTION_SUBJECT' => $obj->getVar('subject') , 'UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_MODQ , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$obj->getVar('qid') ) ) ;
					}
				}

				// message
				if( empty( $is_need_approve ) ) {
					$request->setAttribute('success_message',_MD_PLZXOO_MESSAGE_POSTQ_AUTO_APPROVED);
				} else {
					$request->setAttribute('success_message',_MD_PLZXOO_MESSAGE_POSTQ_NEED_APPROVE);
				}

				return VIEW_SUCCESS ;
			} else {
				return VIEW_ERROR ;
			}
		}

		// ���ƥ�����������
		$cHandler=&plzXoo::getHandler('category');
		$categories=&$cHandler->getObjects();

		$request->setAttribute('editform',$editform);
		$request->setAttribute('question',$obj);
		$request->setAttribute('categories',$categories);
		return VIEW_INPUT;
	}
	
	function isSecure()
	{
		return true;
	}
}

?>