<?php

class default_Answer_delView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$category=&$request->getAttribute('category');
		$question=&$request->getAttribute('question');
		$answer=&$request->getAttribute('obj');

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_answer_delete.html');

		$renderer->setAttribute('editform',$editform);
		if( is_object( @$editform->ticket_ ) ) $renderer->setAttribute('hidden_ticket',$editform->ticket_->makeHTMLhidden());
		$renderer->setAttribute('category',$category->getStructure());
		$renderer->setAttribute('question',$question->getStructure());
		$renderer->setAttribute('answer',$answer->getStructure());

		return $renderer;
	}
}

?>