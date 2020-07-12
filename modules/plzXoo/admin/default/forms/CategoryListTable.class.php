<?php

require_once "exComponent/table/ListTable.php";
require_once XOOPS_ROOT_PATH."/modules/plzXoo/admin/default/forms/CategoryFilter.class.php";

class CategoryListTableComponent extends exListTableComponent
{
	function CategoryListTableComponent()
	{
		parent::exListTableComponent(null,null);
	}
	
	function init($filter=null)
	{
		if(!$filter)
			$filter = new CategoryTableModel();
		parent::init($filter);
	}
}

class CategoryTableModel extends exListTableModel
{
	var $_column_ = array ( "CID","PID","NAME","DESCRIPTION","SIZE","WEIGHT","ACTION" );

	function CategoryTableModel($component=null)
	{
		parent::exListTableModel($component);
		$this->filter_ = new CategoryFilter();
	}

	function init()
	{
		$handler=&plzXoo::getHandler('category');
		
		$this->listController_ = new ListController();
		$this->listController_->filter_=&$this->filter_;
		$this->listController_->filter_->fetch();
		$this->listController_->fetch($handler->getCount($this->listController_->filter_->getCriteria()),20 /* PER PAGE */);

		$objs = $handler->getObjects($this->listController_->getCriteria());
		foreach($objs as $obj) {
			$this->_row_data_[]=$obj->getStructure();
		}
		
		return COMPONENT_MODEL_INIT_SUCCESS;
	}

	function getValueAtAction($arr)
	{
		$ret = @sprintf ( "<a href='index.php?action=category&amp;cid=%d'>%s</a>",
					$arr['cid'], _MD_A_PLZXOO_LANG_EDIT );
		$ret .= @sprintf ( " | <a href='index.php?action=category_delete&amp;cid=%d'>%s</a>",
					$arr['cid'], _MD_A_PLZXOO_LANG_DELETE );
		return $ret;
	}
}

?>