<?php

require_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

class default_EditquesView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		$question=&$request->getAttribute('question');

/*		$form = new XoopsThemeForm(_MD_PLZXOO_LANG_QUESTION,'editquestion','','POST');
		$form->addElement(new XoopsFormHidden('qid',$editform->qid_));
		$form->addElement(new XoopsFormText(_MD_PLZXOO_LANG_SUBJECT,'subject',64,255,$editform->subject_));
		$form->addElement(new XoopsFormTextArea(_MD_PLZXOO_LANG_BODY,'body',$editform->body_,6,50)); */

		//Ticket
//		$form->addElement(new XoopsFormHidden($editform->ticket_->name_,$editform->ticket_->value_));

		//Category
		$categories=&$request->getAttribute('categories');
		if(count($categories)) {

			include_once XOOPS_ROOT_PATH.'/class/xoopstree.php' ;
			$db =& Database::getInstance() ;
			$tree =& new XoopsTree( $db->prefix('plzxoo_category') , 'cid' , 'pid' ) ;
			ob_start() ;
			$tree->makeMySelBox('name','weight',$editform->cid_?$editform->cid_:intval(@$_GET['cid']),0,'cid');
			$select_cid = ob_get_contents() ;
			ob_end_clean() ;
		}
/*		if(count($categories)) {

			$select = new XoopsFormSelect(_MD_PLZXOO_LANG_CATEGORY,'cid',$editform->cid_);
			foreach($categories as $category) {
				$select->addOption($category->getVar('cid'),$category->getVar('name'));
			}
			$form->addElement($select);
			unset($select);
		}
		else {
			$form->addElement(new XoopsFormHidden('cid',$editform->cid_));
		} */

		//Priority
		/* $select = new XoopsFormSelect(_MD_PLZXOO_LANG_PRIORITY,'priority',$editform->priority_);
		for($i=1;$i<=5;$i++)
			$select->addOption($i,$i);

		$form->addElement($select); */
		$select_priority = "<select name='priority'>\n" ;
		for( $i = 1 ; $i <= 5 ; $i ++ ) {
			$selected = $i == $question->getVar('priority') ? "selected='selected'" : "" ;
			$select_priority .= "<option value='$i' $selected>$i</option>\n" ;
		}
		$select_priority .= "</select>\n" ;

		//Status (only admin can edit status directly)
		if( is_object( $GLOBALS['xoopsUser'] ) && $GLOBALS['xoopsUser']->isAdmin() ) {
			$select_status = "<select name='status'>\n" ;
			foreach( $GLOBALS['plzxoo_status_mapping'] as $st => $label ) {
				$selected = $st == $question->getVar('status') ? "selected='selected'" : "" ;
				$select_status .= "<option value='$st' $selected>".htmlspecialchars($label)."</option>\n" ;
			}
			$select_status .= "</select>\n" ;
		}

		//-------------------------
		// Tray & Buttons
		//-------------------------
		/* $tray = new XoopsFormElementTray(_MD_PLZXOO_LANG_CONTROL);

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
		$renderer->setTemplate('plzxoo_question_edit.html');
//		$renderer = new mojaLE_Renderer($controller,$request,$user);
//		$renderer->setTemplate('edit_question.tpl');
//		$renderer->setAttribute('xoopsform',$form);
		$renderer->setAttribute('editform',$editform);
		if( is_object( @$editform->ticket_ ) ) $renderer->setAttribute('hidden_ticket',$editform->ticket_->makeHTMLhidden());
		$renderer->setAttribute('is_error',$editform->isError());
		$renderer->setAttribute('error_html',$editform->getHtmlErrors());
		$renderer->setAttribute('question',$question->getStructure('e'));
		$renderer->setAttribute('select_cid',@$select_cid);
		$renderer->setAttribute('select_priority',@$select_priority);
		$renderer->setAttribute('select_status',@$select_status);
		return $renderer;
	}
}

?>