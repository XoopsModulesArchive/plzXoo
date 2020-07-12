<?php

require_once "xoops/object.php";
require_once "xoops/user.php";

class plzXooAnswerObject extends exXoopsObject {
	function plzXooAnswerObject($id=null)
	{
		$this->initVar('aid', XOBJ_DTYPE_INT, 0, true);
		$this->initVar('qid', XOBJ_DTYPE_INT, 0, true);
		$this->initVar('uid', XOBJ_DTYPE_INT, 0, true);
		$this->initVar('input_date', XOBJ_DTYPE_INT, time(), false);
		$this->initVar('modified_date', XOBJ_DTYPE_INT, time(), false);
		$this->initVar('body', XOBJ_DTYPE_TXTAREA, null, true, null);
		$this->initVar('comment', XOBJ_DTYPE_TXTAREA, null, false, null);
		$this->initVar('point', XOBJ_DTYPE_INT, 0, false);

		if ( is_array ( $id ) )
			$this->assignVars ( $id );
	}

	function &getStructure($type='s')
	{
		$ret =& parent::getStructure($type);

		$uHandler=&xoops_gethandler('user');
		$user = new exXoopsUserObject($uHandler->get($this->getVar('uid')));
		$ret['user']=$user->getArray($type);
		$ret['input_date_formatted'] = formatTimestamp( $ret['input_date'] , 'm' ) ;
		$ret['input_date_utime'] = xoops_getUserTimestamp( $ret['input_date'] ) ;
		$ret['modified_date_formatted'] = formatTimestamp( $ret['modified_date'] , 'm' ) ;
		$ret['modified_date_utime'] = xoops_getUserTimestamp( $ret['modified_date'] ) ;

		return $ret;
	}

	/// Database Connect Model
	function &getTableInfo()
	{
		$tinfo =& new exTableInfomation('plzxoo_answer','aid');
		return ($tinfo);
	}

	/**
	@brief 編集権限があるかどうか
	*/
	function isEnableEdit(&$user)
	{
		exFrame::init(EXFRAME_PERM);
		$uid = is_object($user) ? $user->uid() : 0;
		$flag=false;
		if($this->getVar('uid')==$uid)
			$flag= exPerm::isPerm('edit_my_answer');
		else
			$flag= exPerm::isPerm('edit_other_answer');

		if(!$flag) {
			$handler=&plzXoo::getHandler('question');
			$question=&$handler->get($this->getVar('qid'));
			if($question->getVar('uid')==$uid)
				return exPerm::isPerm('edit_myposts_answer');
			else
				return false;
		}
		return true;
	}

	/**
	@brief 削除権限があるかどうか
	*/
	function isEnableDelete(&$user)
	{
		exFrame::init(EXFRAME_PERM);
		$uid = is_object($user) ? $user->uid() : 0;
		$flag=false;
		if($this->getVar('uid')==$uid)
			$flag= exPerm::isPerm('delete_my_answer');
		else
			$flag= exPerm::isPerm('delete_other_answer');

		if(!$flag) {
			$handler=&plzXoo::getHandler('question');
			$question=&$handler->get($this->getVar('qid'));
			if($question->getVar('uid')==$uid)
				return exPerm::isPerm('delete_myposts_answer');
			else
				return false;
		}
		return true;
	}
}


class plzXooAnswerObjectHandler extends exXoopsObjectHandler {

	function delete(&$obj,$force=false)
	{
		// get parent (question)
		$qHandler=&plzXoo::getHandler('question');
		$question=&$qHandler->get($obj->getVar('qid'));

		// notification delete

		$ret =  parent::delete($obj,$force);

		// update parent (question)
		$question->updateSize();
		$question->setVar('modified_date',time());
		$qHandler->insert($question);

		return $ret ;
	}

}


?>