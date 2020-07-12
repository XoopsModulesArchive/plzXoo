<?php

require_once "exForm/Form.php";

class EditAnswerForm extends exActionFormEx
{
	var $aid_;
	var $qid_;
	var $body_;

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

		$this->body_ = $_POST['body'];
		if(!$this->body_) {
			$this->addError(_MD_PLZXOO_ERROR_BODY_REQUIRED);
		}
	}

	function load(&$master) {
		$this->aid_ = $master->getVar ( 'aid', 'e' );
		$this->qid_ = $master->getVar ( 'qid', 'e' );
		$this->body_ = $master->getVar ( 'body', 'e' );
		
		$this->ticket_=new exOnetimeTicket(strtolower(get_class($this)),3600);
		$this->ticket_->setSession();
	}

	function update(&$master) {
		$master->setVar ( 'body', $this->body_ );
	}
}


?>