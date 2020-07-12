<?php

require_once "exForm/Filter.php";

class CategorySearchFilter extends exAbstractFilterForm
{
	var $cid_=0;
	var $status_=0;
	var $txt_=0;
	var $sort_=array("cid","input_date","modified_date","priority","status","size");

	var $action_;	// for mojaLE.

	function fetch()
	{
		$myts =& MyTextSanitizer::getInstance() ;
	
		$this->cid_ = isset($_GET['cid']) ? intval( $_GET['cid'] ) : 0;

		$this->status_ = isset($_GET['status']) ? intval ( $_GET['status'] ) : 0;
		if( ! in_array( $this->status_ , array(1,2) ) )
			$this->status_ = 0 ;

		$this->txt_ = isset($_GET['txt']) ? $myts->stripSlashesGPC( $_GET['txt'] ) : '' ;
	}

	function &getCriteria($start=0,$limit=0,$sort=0)
	{
		$criteria=$this->getSortCriteria($start,$limit,$sort);

		include_once XOOPS_ROOT_PATH.'/class/xoopstree.php' ;
		$db =& Database::getInstance() ;
		$tree =& new XoopsTree( $db->prefix('plzxoo_category') , 'cid' , 'pid' ) ;
		$children = $tree->getAllChild( $this->cid_ ) ;
		$cids4in = intval( $this->cid_ ) ;
		foreach( $children as $child ) {
			$cids4in .= ','.intval($child['cid']) ;
		}

		// cid Criterion
		if ( $this->cid_ )
			$criteria->add(new Criteria('cid','('.$cids4in.')','IN'));

		// status Criterion
		if ( $this->status_ ) {
			$criteria->add(new Criteria('status',$this->status_));
		} else if( ! is_object( $GLOBALS['xoopsUser'] ) || ! $GLOBALS['xoopsUser']->isAdmin() ) {
			// only admin can see disabled question
			$criteria->add(new Criteria('status','(1,2)','IN'));
		}

		// txt Criterion
		if ( $this->txt_ ) {
			$criteria4txt =& new CriteriaCompo() ;
			$criteria4txt->add(new Criteria('for_search','%'.addslashes($this->txt_).'%','LIKE'));
			$criteria4txt->add(new Criteria('body','%'.addslashes($this->txt_).'%','LIKE'),'OR');
			$criteria4txt->add(new Criteria('subject','%'.addslashes($this->txt_).'%','LIKE'),'OR');
			$criteria->add( $criteria4txt ) ;
		}

		return $criteria;
	}

	function &getDefaultCriteria($start,$limit)
	{
		// --- INSERT DEFAULT SORT CONDITION ----
		// このメソッドがフィルタがデフォルトで持っているソート条件などを返すようにします

		$criteria = parent::getDefaultCriteria($start,$limit);
		switch( @$GLOBALS['xoopsModuleConfig']['index_order_default'] ) {
			case 0 :
			default :
				$criteria->setSort('input_date');
				$criteria->setOrder('DESC');
				break ;
			case 2 :
				$criteria->setSort('status,input_date');
				$criteria->setOrder('DESC');
				break ;
			case 4 :
				$criteria->setSort('modified_date');
				$criteria->setOrder('DESC');
				break ;
			case 6 :
				$criteria->setSort('status,modified_date');
				$criteria->setOrder('DESC');
				break ;
		}

		return $criteria;
	}
	
	function &getExtra()
	{
		// set array
		// ここに GET リクエストでフィルタ条件が引き継げるよう連想配列をセットします
		$ret=array();
		if($this->cid_)
			$ret['cid'] = $this->cid_;

		if($this->status_)
			$ret['status'] = $this->status_;

		if($this->txt_)
			$ret['txt'] = $this->txt_;

		return $ret;
	}

}


?>