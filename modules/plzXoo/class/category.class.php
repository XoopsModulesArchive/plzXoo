<?php

require_once "xoops/object.php";

class plzXooCategoryObject extends exXoopsObject {
	function plzXooCategoryObject($id=null)
	{
		$this->initVar('cid', XOBJ_DTYPE_INT, 0, true);
		$this->initVar('pid', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('name', XOBJ_DTYPE_TXTBOX, null, true, 255);
		$this->initVar('description', XOBJ_DTYPE_TXTAREA, null, false, null);
		$this->initVar('size', XOBJ_DTYPE_INT, 0, false);
		$this->initVar('weight', XOBJ_DTYPE_INT, 0, false);

		if ( is_array ( $id ) )
			$this->assignVars ( $id );
	}

	/// Database Connect Model
	function &getTableInfo()
	{
		$tinfo =& new exTableInfomation('plzxoo_category','cid');
		return ($tinfo);
	}

	/**
	@brief 回答件数を数え直す
	@remark データオブジェクトのメソッドとしてコードが微妙だが、ここに入れるのが今のところ良い
	*/
	function updateSize()
	{
		$handler=&plzXoo::getHandler('question');
		$size=$handler->getCount(new Criteria('cid',$this->getVar('cid')));
		$this->setVar('size',$size);
	}

	function &getStructure($type='s') {
		$ret =& $this->getArray($type);
		$ret['parents'] = $this->getParents( $this->getVar('cid') ) ;
		$ret['children'] = $this->getChildren( $this->getVar('cid') ) ;

		return $ret;
	}

	/* class function */
	function getParents( $cid , $ret_array = array() )
	{
		if( $cid <= 0 ) return $ret_array ;

		$db =& Database::getInstance() ;
		$sql = "SELECT `pid`,`name` FROM ".$db->prefix('plzxoo_category')." WHERE `cid`=".intval($cid) ;
		$result = $db->query( $sql ) ;
		list( $pid , $name ) = $db->fetchRow( $result ) ;
		array_unshift( $ret_array , array( $cid => $name ) ) ;
		$ret_array = $this->getParents( $pid , $ret_array ) ;

		return $ret_array ;
	}

	/* class function */
	function getChildren( $cid )
	{
		$db =& Database::getInstance() ;
		$sql = "SELECT `cid`,`name` FROM ".$db->prefix('plzxoo_category')." WHERE `pid`=".intval($cid)." ORDER BY `weight`" ;
		$result = $db->query( $sql ) ;
		$ret = array() ;
		while( list( $cid , $name ) = $db->fetchRow( $result ) ) {
			$ret[] = array( $cid => $name ) ;
		}

		return $ret ;
	}
}


class plzXooCategoryObjectHandler extends exXoopsObjectHandler {

	function delete(&$obj,$force=false)
	{
		// handlers
		$module_handler =& xoops_gethandler('module') ;
		$notification_handler =& xoops_gethandler('notification') ;
		$question_handler =& plzXoo::getHandler('question');
		$answer_handler =& plzXoo::getHandler('answer');

		// get this module
		$module =& $module_handler->getByDirname('plzXoo') ;
		$module_id = $module->getVar('mid') ;

		// ----------------------------------------------
		// 子カテゴリーがあったらエラー
		// ----------------------------------------------
		$cid =  $obj->getVar('cid') ;
		$child_handler =& plzXoo::getHandler('category');
		$children =& $child_handler->getObjects( new Criteria('pid',$cid) ) ;
		if( ! empty( $children ) ) return false ;

		// ----------------------------------------------
		// ぶら下がっている質問・回答をすべて削除
		// ----------------------------------------------
		$questions =& $question_handler->getObjects( new Criteria('cid',$cid) ) ;
		foreach( $questions as $question ) {
			$qid = $question->getVar('qid') ;
			$answers =& $answer_handler->getObjects( new Criteria('qid',$qid) ) ;
			foreach( $answers as $answer ) {
				$answer_handler->delete( $answer ) ;
			}

			$question_handler->delete( $question ) ;
		}

		// delete notifications about this category
		$notification_handler->unsubscribeByItem( $module_id, 'category' , $obj->getVar('cid') ) ;

		return parent::delete($obj,$force);
	}

}

?>