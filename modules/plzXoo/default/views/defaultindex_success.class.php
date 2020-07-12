<?php

class default_DefaultindexView_success
{
	function &execute (&$controller, &$request, &$user)
	{
		$objs=&$request->getAttribute('questions');
		$questions=array();
		foreach($objs as $obj) {
			$arr=&$obj->getStructure();
			$arr['size_str']=@sprintf(_MD_PLZXOO_FORMAT_ANSWERS_COUNT,$arr['size']);
			$questions[]=&$arr;
			unset($arr);
		}

		$listController=&$request->getAttribute('listController');

		$renderer = new mojaLE_XoopsTplRenderer($controller,$request,$user);
		$renderer->setTemplate('plzxoo_index.html');
		$renderer->setAttribute('questions',$questions);
		$renderer->setAttribute('listController',$listController->getStructure());
		exFrame::init(EXFRAME_PERM);
		$renderer->setAttribute('enable_post_question',exPerm::isPerm('post_question'));

		$cat_handler =& plzXoo::getHandler('category');
		$cat_obj =& $cat_handler->get( intval( @$_GET['cid'] ) ) ;
		if( is_object( $cat_obj ) ) {
			$cat_arr = $cat_obj->getStructure() ;
			$renderer->setAttribute('category',$cat_arr);
			$renderer->setAttribute('xoops_pagetitle',$cat_arr['name']);

		} else {
			$renderer->setAttribute('category' , array( 'children' => plzXooCategoryObject::getChildren(0) , 'cid' => 0 ) ) ;
			$renderer->setAttribute('searchtxt4disp' , htmlspecialchars( $listController->filter_->txt_ , ENT_QUOTES ) ) ;
		}
		/*
		echo "<pre>" ;
		var_dump( $cat_obj->getStructure() ) ;
		exit ;*/

		return $renderer;
	}
}

?>