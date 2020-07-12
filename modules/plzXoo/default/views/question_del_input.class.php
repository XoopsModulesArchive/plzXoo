<?php

class default_Question_delView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$category=&$request->getAttribute('category');
		$question=&$request->getAttribute('question');

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_question_delete.html');

		$renderer->setAttribute('editform',$editform);
		if( is_object( @$editform->ticket_ ) ) $renderer->setAttribute('hidden_ticket',$editform->ticket_->makeHTMLhidden());
		$renderer->setAttribute('category',$category->getStructure());
		$renderer->setAttribute('question',$question->getStructure());

		return $renderer;
	}
}

?>