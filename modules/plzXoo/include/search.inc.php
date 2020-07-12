<?php
/**
@brief Xoops グローバルサーチのための検索コールバック関数の定義
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
		// 検索対象テーブル名は plzxoo_question です
		$this->setTable("plzxoo_question");

		// title,time,uid にそれぞれ title, input_date, uid のフィールドを割り当てます
		$this->info_->setFields("subject","input_date","uid");

		// 渡された文字列は、 title フィールド body フィールドの検索に用います
		$this->info_->addQueryField("subject");
		$this->info_->addQueryField("body");
		$this->info_->addQueryField("for_search");

		// 渡された uid は uid フィールドの検索に用います
		$this->info_->setUidField("uid");

		// ほか qid を取得してください
		$this->info_->addExtra("qid");
		$this->info_->addExtra("body");
		$this->info_->addExtra("for_search");

		// 新しく入力されたものから取得します
		$this->info_->setSort("input_date");
		$this->info_->setOrder("DESC");
	}
	
	function getResultArray(&$row) {
		// 追加で取得して貰ったフィールド qid を使ってリンク URL を作成します
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