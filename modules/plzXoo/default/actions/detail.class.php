<?php

class default_DetailAction extends mojaLE_AbstractAction
{
	function execute(&$controller,&$request,&$user)
	{
		exFrame::init(EXFRAME_PERM);
		// 閲覧権限のチェック
		exPerm::GuardRedirect('view_detail','index.php',_MD_PLZXOO_ERROR_PERMISSION);

		$id = isset($_REQUEST['qid']) ? intval($_REQUEST['qid']) : 0;
		$handler=&plzXoo::getHandler('question');

		$question=&$handler->get($id);
		if(!is_object($question))
			return VIEW_ERROR;

		// ステータスが1,2と異なるものは管理者以外キック
		if( ! in_array( $question->getVar('status') , array(1,2) ) ) {
			if( ! is_object( $GLOBALS['xoopsUser'] ) || ! $GLOBALS['xoopsUser']->isAdmin() )
				return VIEW_ERROR;
		}

		$handler=&plzXoo::getHandler('answer');
		$criteria = new Criteria('qid',$id);
		$criteria->setSort('input_date');
		$criteria->setOrder('DESC');

		$answers=&$handler->getObjects($criteria);
		
		$request->setAttribute('question',$question);
		$request->setAttribute('answers',$answers);
		return VIEW_SUCCESS;
	}

	function isSecure()
	{
		return false;
	}
}

?>