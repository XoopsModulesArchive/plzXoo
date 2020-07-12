<?php
/**
@brief ������Ĥ��륢�������
*/

require_once "exForm/ConfirmTicketForm.php";

class default_CloseAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
            $qid = isset($_REQUEST['qid']) ? intval($_REQUEST['qid']) : 0;
            $handler=&plzXoo::getHandler('question');
    		// ������ qid ���ǧ
    		$question =& $handler->get($qid);
    		if(!is_object($question)) {
    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_QUESTION_NOT_EXISTS);
    			return VIEW_ERROR;
    		}
    		elseif($question->getVar('status')!=1) {
    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_QUESTION_CLOSED);
    			return VIEW_ERROR;
    		}
    		elseif( ! is_object( $user ) ) {
    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_PERMISSION);
    			return VIEW_ERROR;
    		}

			// �����Ǹ��¤��ǧ
			if($question->getVar('uid')!=$user->uid() && !$user->isAdmin()) {
    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_PERMISSION);
    			return VIEW_ERROR;
			}

            $editform =& new exConfirmTicketForm();
            if($editform->init('plzXooClose')==ACTIONFORM_POST_SUCCESS) {

				// �ݥ���Ȥ��Τ��Validation
				$points = explode( '|' , @$GLOBALS['xoopsModuleConfig']['points'] ) ;
				$points_allowed = array() ;
				foreach( $points as $key => $point_tmp ) {
					@list( $point , $max ) = explode( ':' , $point_tmp ) ;
					if( empty( $max ) ) $max = 0x7fff ; // fixme :lol:
					$point = intval( $point_tmp ) ;
					$points_allowed[ $point ] = intval( $max ) ;
				}
				foreach( $_POST['points'] as $point ) {
					if( empty( $points_allowed[ $point ] ) ) {
		    			// �ݥ���ȿ������С�
		    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_POINT_RULE);
		    			return VIEW_ERROR;
					}
					$points_allowed[ $point ] -- ;
				}

				// �ݥ���Ȥ���Ͽ����
				$answer_handler =& plzXoo::getHandler('answer');
				$member_handler =& xoops_gethandler('member');
				foreach( $_POST['points'] as $aid => $point ) {
					$point = intval( $point ) ;
					$answer =& $answer_handler->get(intval($aid)) ;
		    		if(!is_object($answer)) {
		    			// ���ꤵ�줿aid��¸�ߤ��뤫
		    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_ANSWER_NOT_EXISTS);
		    			return VIEW_ERROR;
		    		}
		    		elseif($answer->getVar('qid')!=$qid) {
		    			// ���ꤵ�줿aid��qid�Τ�Τ�
		    			$request->setAttribute('error_message',_MD_PLZXOO_ERROR_ANSWER_NOT_EXISTS);
		    			return VIEW_ERROR;
		    		}
		    		// answer�ơ��֥�˥ݥ������¸
	            	$answer->setVar('point',$point);
					$answer->setVar('modified_date',time());
		            $answer_handler->insert($answer);
		            $answerer =& $member_handler->getUser( $answer->getVar('uid') ) ;

		            // ��ƿ������䤹������points2posts��ON/OFF��
		            if( ! empty( $GLOBALS['xoopsModuleConfig']['points2posts'] ) && is_object( $answerer ) ) {
						for( $i = 0 ; $i < $point ; $i ++ ) {
							$answerer->incrementPost() ;
						}
					}
				}

				// trigger notification of question:updt
				$notification_handler =& xoops_gethandler( 'notification' ) ;
				$notification_handler->triggerEvent( 'question' , $question->getVar('qid') , 'updt' , array( 'QUESTION_SUBJECT' => $question->getVar('subject') , 'UNAME' => $user->getVar('uname') , 'CONDITION' => _MD_PLZXOO_LANG_NOTIFY_CLOSE , 'QUESTION_URI' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".$question->getVar('qid') ) ) ;

            	$editform->sessionClear();	// ���å���󥯥ꥢ
            	$question->setVar('status',2);
	            $request->setAttribute('question',$question);
	            $question->setVar('modified_date',time());
                return $handler->insert($question) ?
                    VIEW_SUCCESS : VIEW_ERROR;
            }
    
            $request->setAttribute('editform',$editform);
            $request->setAttribute('question',$question);

			$handler=&plzXoo::getHandler('answer');
			$criteria = new Criteria('qid',$qid);
			$criteria->setSort('input_date');
			$criteria->setOrder('DESC');
			$answers=&$handler->getObjects($criteria);
			$request->setAttribute('answers',$answers);

			$handler=&plzXoo::getHandler('category');
			$category=&$handler->get($question->getVar('cid'));
			$request->setAttribute('category',$category);

            return VIEW_INPUT;
	}
	
	function isSecure()
	{
		return true;
	}
}

?>