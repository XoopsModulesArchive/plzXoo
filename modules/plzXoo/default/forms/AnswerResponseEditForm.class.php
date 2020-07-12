<?php

require_once "exForm/Form.php";

class AnswerResponseEditForm extends exActionFormEx
{
	var $aid_;
	var $comment_;
	var $point_;

	function fetch(&$master) {
		// チケットチェック
		if(!exOnetimeTicket::inquiry(strtolower(get_class($this)))) {
			$this->addError(_MD_PLZXOO_ERROR_TICKET);
			// 再発行
			$this->ticket_=new exOnetimeTicket(strtolower(get_class($this)),3600);
			$this->ticket_->setSession();
		}
		else
			exOnetimeTicket::unsetSession(strtolower(get_class($this)));

		$this->comment_ = trim($_POST['comment']);
		//if(!$this->validateMaxLength($this->comment_, 255)) {
		//	$this->addError(_MD_PLZXOO_ERROR_COMMENT_SIZEOVER);
		//}
	}

	function load(&$master) {
		$this->aid_ = $master->getVar ( 'aid', 'e' );
		$this->comment_ = $master->getVar ( 'comment', 'e' );

		$this->ticket_=new exOnetimeTicket(strtolower(get_class($this)),3600);
		$this->ticket_->setSession();
	}

	function update(&$master) {
		$master->setVar ( 'aid', $this->aid_ );
		$master->setVar ( 'comment', $this->comment_ );
	}
}

/* class AnswerResponsePointEditForm extends AnswerResponseEditForm
{
	var $point_;

	function fetch(&$master) {
		parent::fetch($master);
		$this->point_ = intval($_POST['point']);

		if(!($this->point_==0 | $this->point_==10 | $this->point_==20)) {
			$this->addError(_MD_PLZXOO_ERROR_POINT_RULE);
		}
	}

	function load(&$master) {
		parent::load($master);
		$this->point_ = $master->getVar ( 'point', 'e' );
	}

	function update(&$master) {
		parent::update($master);
		$master->setVar ( 'point', $this->point_ );
	}
} */

?>