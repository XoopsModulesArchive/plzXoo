<?php

class default_DetailView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$question=&$request->getAttribute('question');
		$answers_obj=&$request->getAttribute('answers');

		// prepare for points decoration
		$points = explode( '|' , @$GLOBALS['xoopsModuleConfig']['points'] ) ;
		rsort( $points , SORT_NUMERIC ) ;
		$point_decorations = array() ;
		$rank = 0 ;
		foreach( $points as $point ) {
			$point = intval( $point ) ;
			$rank ++ ;
			if( defined( '_MD_PLZXOO_FORMAT_POINT_RESULT_RANK'.$rank ) ) {
				$point_decorations[$point] = sprintf( constant( '_MD_PLZXOO_FORMAT_POINT_RESULT_RANK'.$rank ) , $point ) ;
			} else {
				$point_decorations[$point] = sprintf( _MD_PLZXOO_FORMAT_POINT_RESULT_GENERAL , $point ) ;
			}
		}

		$answers=array();
		foreach($answers_obj as $answer) {
			$ret = $answer->getStructure();
    		$ret['enable_edit']=$answer->isEnableEdit($user);
    		$ret['enable_delete']=$answer->isEnableDelete($user);
    		$ret['point_decorated']= empty( $point_decorations[ $ret['point'] ] ) ? $ret['point'] : $point_decorations[ $ret['point'] ] ;
    		$answers[]=&$ret;
    		unset($ret);
		}

		// 権限チェック
		$question_arr = $question->getStructure();
		$question_arr['enable_edit']=$question->isEnableEdit($user);
		$question_arr['enable_delete']=$question->isEnableDelete($user);
		
		// メッセージ権限のチェック
		$question_arr['enable_message'] = is_object($user) ? 
			($user->isAdmin() || $user->uid()==$question->getVar('uid')) : false;

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_detail.html');
		$renderer->setAttribute('question',$question_arr);
		$renderer->setAttribute('answers',$answers);
		$renderer->setAttribute('enable_post_answer',exPerm::isPerm('post_answer')&& is_object( $user ) && $question->getVar('uid') != $user->uid() | exPerm::isPerm('post_answer_myself') ) ; // GIJ

		$renderer->setAttribute('is_detail',true);
		$renderer->setAttribute('mod_config',@$GLOBALS['xoopsModuleConfig']);

		$cat_handler =& plzXoo::getHandler('category');
		$cat_obj =& $cat_handler->get( $question->getVar('cid') ) ;
		if( is_object( $cat_obj ) ) {
			$renderer->setAttribute('category',$cat_obj->getStructure());
		} else {
			$renderer->setAttribute('category',array());
		}

		$renderer->setAttribute('xoops_pagetitle',$question_arr['subject']);

		return $renderer;
	}
}

?>