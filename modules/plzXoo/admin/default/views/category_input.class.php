<?php

require_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

class default_CategoryView_input
{
	function &execute (&$controller, &$request, &$user)
	{
		$editform=&$request->getAttribute('editform');
		
		$form = new XoopsThemeForm(_MD_A_PLZXOO_LANG_EDIT_CATEGORY,'Category','','POST');

		$form->addElement(new XoopsFormHidden('cid',$editform->cid_));

		$form->addElement(new XoopsFormText(_MD_A_PLZXOO_LANG_NAME,'name',64,255,$editform->name_));

		//-------------------------
		// 親カテゴリ
		//-------------------------
		$select =new XoopsFormSelect(_MD_A_PLZXOO_LANG_PARENT_CATEGORY,'pid',$editform->pid_);
			$select->addOption(0, _MD_A_PLZXOO_LANG_TOP );
			$categories=&$request->getAttribute('categories');
			foreach($categories as $category){
				$select->addOption($category->getVar('cid'),$category->getVar('name'));
			}

		$form->addElement($select);
		unset($select);

		$form->addElement(new XoopsFormDhtmlTextArea(_MD_A_PLZXOO_LANG_DESCRIPTION,'description',$editform->description_,6, 50));

		$form->addElement(new XoopsFormText(_MD_A_PLZXOO_LANG_WEIGHT,'weight',10,10,intval($editform->weight_)));

		$tray = new XoopsFormElementTray(_MD_A_PLZXOO_LANG_CONTROL);
		$tray->addElement( new XoopsFormButton ( '', 'submit', _MD_A_PLZXOO_LANG_SUBMIT, 'submit' ) );
		$tray->addElement( new XoopsFormButton ( '', 'reset', _MD_A_PLZXOO_LANG_RESET, 'reset' ) );
		$form->addElement($tray);

		$renderer = new mojaLE_Renderer($controller,$request,$user);
		$renderer->setTemplate('category_edit.tpl');

		$renderer->setAttribute('xoopsform',$form);

		return $renderer;
	}
}

?>