<?php

require_once "xoops/object.php";
require_once "xoops/user.php";

if( file_exists( XOOPS_ROOT_PATH.'/modules/plzXoo/language/'.$GLOBALS['xoopsConfig']['language'].'/main.php' ) ) {
	include_once XOOPS_ROOT_PATH.'/modules/plzXoo/language/'.$GLOBALS['xoopsConfig']['language'].'/main.php' ;
} else {
	@include_once XOOPS_ROOT_PATH.'/modules/plzXoo/language/english/main.php' ;
}

/// ステータス値をステータス文字列に割り当てる配列
$GLOBALS['plzxoo_status_mapping'] = array (
	1 => _MD_PLZXOO_LANG_STATUS_OPEN,
	2 => _MD_PLZXOO_LANG_STATUS_CLOSE,
	3 => _MD_PLZXOO_LANG_STATUS_DEACTIVE,
	4 => _MD_PLZXOO_LANG_STATUS_WAITING,
);

class plzXooQuestionObject extends exXoopsObject {
	function plzXooQuestionObject($id=null)
	{
		$this->initVar('qid', XOBJ_DTYPE_INT, 0, true);
		$this->initVar('cid', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('uid', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('subject', XOBJ_DTYPE_TXTBOX, null, true, 255);
		$this->initVar('body', XOBJ_DTYPE_TXTAREA, null, true, null);
		$this->initVar('input_date', XOBJ_DTYPE_INT, time(), false);
		$this->initVar('modified_date', XOBJ_DTYPE_INT, time(), false);
		$this->initVar('priority', XOBJ_DTYPE_INT, 3, true);
		$this->initVar('status', XOBJ_DTYPE_INT, 1, true);
		$this->initVar('size', XOBJ_DTYPE_INT, 0, true);
		$this->initVar('for_search', XOBJ_DTYPE_TXTAREA, null, false, null);

		if ( is_array ( $id ) )
			$this->assignVars ( $id );
	}

	function &getStructure($type='s')
	{
		$ret =& parent::getStructure($type);

		$uHandler=&xoops_gethandler('user');
		$user = new exXoopsUserObject($uHandler->get($this->getVar('uid')));
		$ret['user']=$user->getArray($type);

		$ret['status_str'] = $GLOBALS['plzxoo_status_mapping'][$this->getVar('status')];
		$ret['input_date_formatted'] = formatTimestamp( $ret['input_date'] , 'm' ) ;
		$ret['input_date_utime'] = xoops_getUserTimestamp( $ret['input_date'] ) ;
		$ret['modified_date_formatted'] = formatTimestamp( $ret['modified_date'] , 'm' ) ;
		$ret['modified_date_utime'] = xoops_getUserTimestamp( $ret['modified_date'] ) ;

		// カテゴリ
		if($ret['cid']) {
			$cHandler=&plzXoo::getHandler('category');
			$category=&$cHandler->get($ret['cid']);
			$ret['category']=&$category->getArray();
		}

		return $ret;
	}

	/// Database Connect Model
	function &getTableInfo()
	{
		$tinfo =& new exTableInfomation('plzxoo_question','qid');
		return ($tinfo);
	}

	/**
	@brief 回答件数を数え直す
	@remark データオブジェクトのメソッドとしてコードが微妙だが、ここに入れるのが今のところ良い
	*/
	function updateSize()
	{
		$handler=&plzXoo::getHandler('answer');
		$answers=&$handler->getObjects(new Criteria('qid',$this->getVar('qid')));
		$size=sizeof($answers);
		$this->setVar('size',$size);

		// ついでに検索用フィールドも更新する
		$for_search = '' ;
		foreach( $answers as $answer ) {
			$for_search .= $answer->getVar('body','n') . ' ' ;
		}
		$this->setVar('for_search',$for_search);
	}

	/**
	@brief 編集権限があるかどうか
	*/
	function isEnableEdit(&$user)
	{
		exFrame::init(EXFRAME_PERM);
		$uid = is_object($user) ? $user->uid() : 0;
		if($this->getVar('uid')==$uid)
			return exPerm::isPerm('edit_my_question');
		else
			return exPerm::isPerm('edit_other_question');
	}

	/**
	@brief 削除権限があるかどうか
	*/
	function isEnableDelete(&$user)
	{
		exFrame::init(EXFRAME_PERM);
		$uid = is_object($user) ? $user->uid() : 0;
		if($this->getVar('uid')==$uid) {
			return exPerm::isPerm('delete_my_question');
		}
		else {
			return exPerm::isPerm('delete_other_question');
		}
	}
}


class plzXooQuestionObjectHandler extends exXoopsObjectHandler {

	function delete(&$obj,$force=false)
	{
		// remove children (answer)
		$handler=&plzXoo::getHandler('answer');
		$answers =& $handler->getObjects(new Criteria('qid',$obj->getVar('qid')));
		foreach( $answers as $answer ) {
			$handler->delete( $answer ) ;
		}

		// get parent (category)
		$handler=&plzXoo::getHandler('category');
		$category=&$handler->get($obj->getVar('cid'));

		// delete notifications
		$module_handler =& xoops_gethandler('module') ;
		$module =& $module_handler->getByDirname('plzXoo') ;
		$module_id = $module->getVar('mid') ;
		$notification_handler =& xoops_gethandler('notification') ;
		$notification_handler->unsubscribeByItem( $module_id, 'question' , $obj->getVar('qid') ) ;

		$ret =  parent::delete($obj,$force);

		// update parent (category)
		$category->updateSize();
		// $category->setVar('modified_date',time());
		$handler->insert($category);

		return $ret ;
	}
}




?>