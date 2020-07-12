<?php
/**
@brief Xoops �����Х륵�����Τ���θ���������Хå��ؿ������
@author minahito
@varsion $Id$
*/

require_once XOOPS_ROOT_PATH."/modules/exFrame/frameloader.php";
require_once "xoops/search.php";

function plzXoo_search ($queryarray, $andor, $limit, $offset, $userid) {
	$service = new plzXooXoopsSearchService($queryarray,$andor,$limit,$offset,$userid);
	return $service->doService();
}

class plzXooXoopsSearchService extends SimpleXoopsSearchService {
	function startup() {
		// �����оݥơ��֥�̾�� plzxoo_question �Ǥ�
		$this->setTable("plzxoo_question");

		// title,time,uid �ˤ��줾�� title, input_date, uid �Υե�����ɤ������Ƥޤ�
		$this->info_->setFields("subject","input_date","uid");

		// �Ϥ��줿ʸ����ϡ� title �ե������ body �ե�����ɤθ������Ѥ��ޤ�
		$this->info_->addQueryField("subject");
		$this->info_->addQueryField("body");
		$this->info_->addQueryField("for_search");

		// �Ϥ��줿 uid �� uid �ե�����ɤθ������Ѥ��ޤ�
		$this->info_->setUidField("uid");

		// �ۤ� qid ��������Ƥ�������
		$this->info_->addExtra("qid");
		$this->info_->addExtra("body");
		$this->info_->addExtra("for_search");

		// ���������Ϥ��줿��Τ���������ޤ�
		$this->info_->setSort("input_date");
		$this->info_->setOrder("DESC");
	}
	
	function getResultArray(&$row) {
		// �ɲäǼ���������ä��ե������ qid ��Ȥäƥ�� URL ��������ޤ�
		$row['link']="index.php?action=detail&amp;qid=".$row['qid'];

		// get context for module "search"
		if( function_exists( 'search_make_context' ) && ! empty( $_GET['showcontext'] ) ) {
			$text = $row['body'] . '  ' . $row['for_search'] ;
			if( function_exists( 'easiestml' ) ) $text = easiestml( $text ) ;
			$row['context'] = search_make_context( htmlspecialchars( $text , ENT_QUOTES ) , $this->filter_->querys_ ) ;
		}

		return $row;
	}
}

?>