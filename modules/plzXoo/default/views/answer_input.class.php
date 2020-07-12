<?php

require_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

class default_AnswerView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$category=&$request->getAttribute('category');
		$question=&$request->getAttribute('question');
		$answer=&$request->getAttribute('answer');

		/* $form = new XoopsThemeForm('Answer','editanswer','','POST');
		$form->addElement(new XoopsFormHidden('aid',$editform->aid_));
		$form->addElement(new XoopsFormHidden('qid',$editform->qid_));
		$form->addElement(new XoopsFormDhtmlTextArea(_MD_PLZXOO_LANG_ANSWER_BODY,'body',$editform->body_,6,50));

		//Ticket
		$form->addElement(new XoopsFormHidden($editform->ticket_->name_,$editform->ticket_->value_));

		//-------------------------
		// Tray & Button
		//-------------------------
		$tray = new XoopsFormElementTray(_MD_PLZXOO_LANG_CONTROL);

		// preview (check isset($_POST['preview']))
//		$tray->addElement( new XoopsFormButton ( '' , 'preview', 'DISPLAY STRING', 'submit' ) );

		$tray->addElement( new XoopsFormButton ( '', 'submit', _MD_PLZXOO_LANG_SUBMIT, 'submit' ) );
		$tray->addElement( new XoopsFormButton ( '' , 'reset', _MD_PLZXOO_LANG_RESET, 'reset' ) );

		$backButton = new XoopsFormButton ( '' , "back", _MD_PLZXOO_LANG_GO_BACK, "button" );
		$backButton->setExtra('onclick="javascript:history.go(-1);"');
		$tray->addElement($backButton);

		// add tray
		$form->addElement($tray); */

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_answer_edit.html');
//		$renderer = new mojaLE_Renderer($controller,$request,$user);
//		$renderer->setTemplate('edit_answer.tpl');
//		$renderer->setAttribute('xoopsform',$form);
		$renderer->setAttribute('editform',$editform);
		if( is_object( @$editform->ticket_ ) ) $renderer->setAttribute('hidden_ticket',$editform->ticket_->makeHTMLhidden());
		$renderer->setAttribute('is_error',$editform->isError());
		$renderer->setAttribute('error_html',$editform->getHtmlErrors());
		$renderer->setAttribute('category',$category->getStructure());
		$renderer->setAttribute('question',$question->getStructure());
		$renderer->setAttribute('answer',$answer->getStructure('e'));
		return $renderer;
	}
}

?>