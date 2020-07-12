<?php

require_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

class default_ResponseView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$category=&$request->getAttribute('category');
		$question=&$request->getAttribute('question');
		$answer=&$request->getAttribute('answer');

		/* $form = new XoopsThemeForm(_MD_PLZXOO_LANG_RESPONSE,'Response','','POST');

		$form->addElement(new XoopsFormHidden('aid',$editform->aid_));
		$form->addElement(new XoopsFormHidden($editform->ticket_->name_,$editform->ticket_->value_));

		//-------------------------
		// Select
		//-------------------------
		if(isset($editform->point_)) {
			$select =new XoopsFormSelect(_MD_PLZXOO_LANG_POINT,'point', $editform->point_);
				$select->addOption(20, _MD_PLZXOO_LANG_POINT_20 );
				$select->addOption(10, _MD_PLZXOO_LANG_POINT_10 );
				$select->addOption(0, _MD_PLZXOO_LANG_POINT_0 );
			$form->addElement($select);
			unset($select);
		}


		//-------------------------
		// TextArea(Plain)
		//-------------------------
		$form->addElement(new XoopsFormTextArea(_MD_PLZXOO_LANG_COMMENT,'comment',$editform->comment_,3, 50 ));


		//-------------------------
		// Tray & Button
		//-------------------------
		$tray = new XoopsFormElementTray(_MD_PLZXOO_LANG_CONTROL);

		// preview (check isset($_POST['preview']))
//		$tray->addElement( new XoopsFormButton ( '' , 'preview', 'DISPLAY STRING', 'submit' ) );

		$tray->addElement( new XoopsFormButton ( '', 'submit', _MD_PLZXOO_LANG_SUBMIT, 'submit' ) );
		$tray->addElement( new XoopsFormButton ( '', 'reset', _MD_PLZXOO_LANG_RESET, 'reset' ) );

		$backButton = new XoopsFormButton ( '' , "back", _MD_PLZXOO_LANG_GO_BACK, "button" );
		$backButton->setExtra('onclick="javascript:history.go(-1);"');
		$tray->addElement($backButton);

		// add tray
		$form->addElement($tray); */

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_answer_response.html');
//		$renderer = new mojaLE_Renderer($controller,$request,$user);
//		$renderer->setTemplate('response.tpl');

//		$renderer->setAttribute('xoopsform',$form);
		$renderer->setAttribute('editform',$editform);
		if( is_object( @$editform->ticket_ ) ) $renderer->setAttribute('hidden_ticket',$editform->ticket_->makeHTMLhidden());
		$renderer->setAttribute('is_error',$editform->isError());
		$renderer->setAttribute('error_html',$editform->getHtmlErrors());
		$renderer->setAttribute('category',$category->getStructure());
		$renderer->setAttribute('question',$question->getStructure());

		$answer_structure = $answer->getStructure() ;
		$answer_structure['comment4edit'] = $answer->getVar('comment','e') ;
		$renderer->setAttribute('answer',$answer_structure);

		return $renderer;
	}
}

?>