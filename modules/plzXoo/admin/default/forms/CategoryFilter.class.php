<?php

require_once "exForm/Filter.php";

// Sort Filter
class CategoryFilter extends exAbstractFilterForm
{
	var $sort_=array("cid","pid","name","description","size");

	var $action_;	// for mojaLE.

	function fetch()
	{
		$this->action_=trim($_REQUEST['action']);
	}

	function &getCriteria($start=0,$limit=0,$sort=0)
	{
		$criteria=$this->getSortCriteria($start,$limit,$sort);
		return $criteria;
	}

	function &getDefaultCriteria($start,$limit)
	{
		// --- INSERT DEFAULT SORT CONDITION ----
		// このメソッドがフィルタがデフォルトで持っているソート条件などを返すようにします

		$criteria = parent::getDefaultCriteria($start,$limit);
		$criteria->setSort('cid');

		return $criteria;
	}
	
	function &getExtra()
	{
		$ret=array();
		$ret['action']=$this->action_;
		return $ret;
	}

}


?>