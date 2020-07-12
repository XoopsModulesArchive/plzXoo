<?php

require_once "exForm/Form.php";

class CategoryEditForm extends exActionFormEx
{
	var $cid_;
	var $pid_;
	var $name_;
	var $description_;

	function fetch(&$master) {

		$this->pid_ = intval($_POST['pid']);
		// pid бееЖю╜╦║╨╨
		if($this->pid_) {
    		$handler=&plzXoo::getHandler('category');
    		$obj=&$handler->get($this->pid_);
    		if(!is_object($obj))
    			$this->addError(_MD_PLZXOO_ERROR_PID_INJURY);
		}

		$this->name_ = trim($_POST['name']);
		if(!$this->name_) {
			$this->addError(_MD_PLZXOO_ERROR_NAME_REQUIRED);
		}
		if(!$this->validateMaxLength($this->name_, 255)) {
			$this->addError(_MD_PLZXOO_ERROR_NAME_SIZEOVER);
		}

		$this->description_ = $_POST['description'];

		$this->weight_ = intval( $_POST['weight'] ) ;
	}

	function load(&$master) {
		$this->cid_ = $master->getVar ( 'cid', 'e' );
		$this->pid_ = $master->getVar ( 'pid', 'e' );
		$this->name_ = $master->getVar ( 'name', 'e' );
		$this->weight_ = $master->getVar ( 'weight', 'e' );
		$this->description_ = $master->getVar ( 'description', 'e' );
	}

	function update(&$master) {
		$master->setVar ( 'pid', $this->pid_ );
		$master->setVar ( 'name', $this->name_ );
		$master->setVar ( 'weight', $this->weight_ );
		$master->setVar ( 'description', $this->description_ );
	}
}


?>