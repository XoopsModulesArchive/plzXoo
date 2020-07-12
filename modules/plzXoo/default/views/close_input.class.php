<?php

class default_CloseView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$category=&$request->getAttribute('category');
		$question=&$request->getAttribute('question');
		$answers_obj=&$request->getAttribute('answers');

		$answers=array();
		foreach($answers_obj as $answer) {
			$ret = $answer->getStructure();
    		$ret['enable_edit']=$answer->isEnableEdit($user);
    		$ret['enable_delete']=$answer->isEnableDelete($user);
    		$answers[]=&$ret;
    		unset($ret);
		}

		$points = explode( '|' , @$GLOBALS['xoopsModuleConfig']['points'] ) ;
		$point_options = '' ;
		foreach( $points as $key => $point_tmp ) {
			@list( $point , $max ) = explode( ':' , $point_tmp ) ;
			if( empty( $max ) ) $max = 0 ;
			$point = intval( $point_tmp ) ;
			$point_options .= "<option value='$point'>".sprintf($max?_MD_PLZXOO_FORMAT_POINT_OF_ANSWER:_MD_PLZXOO_FORMAT_POINT_OF_ANSWER_NOLIMIT,$point,$max)."</option>\n" ;
		}

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_question_close.html');
//		$renderer = new mojaLE_Renderer($controller,$request,$user);
//		$renderer->setTemplate('close_input.tpl');
		$renderer->setAttribute('editform',$editform);
		if( is_object( @$editform->ticket_ ) ) $renderer->setAttribute('hidden_ticket',$editform->ticket_->makeHTMLhidden());
		$renderer->setAttribute('is_error',$editform->isError());
		$renderer->setAttribute('error_html',$editform->getHtmlErrors());
		$renderer->setAttribute('category',$category->getStructure());
		$renderer->setAttribute('question',$question->getStructure());
		$renderer->setAttribute('answers',$answers);
		$renderer->setAttribute('point_options',$point_options);

		return $renderer;
	}
}

?>