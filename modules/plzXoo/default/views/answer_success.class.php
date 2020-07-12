<?php

class default_AnswerView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$question=&$request->getAttribute('question');
		redirect_header("index.php?action=detail&amp;qid=".$question->getVar('qid'),1,_MD_PLZXOO_MESSAGE_SUCCESS);

		$renderer = new mojaLE_NoneRenderer($controller,$request,$user);
		$renderer->setTemplate('');
		return $renderer;
	}
}

?>