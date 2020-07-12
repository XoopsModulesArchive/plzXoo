<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

function b_waiting_plzXoo()
{
	$db =& Database::getInstance();
	$block = array();

	$result = $db->query("SELECT qid FROM ".$db->prefix("plzxoo_question")." WHERE status=4");
	while( list( $qid ) = $db->fetchRow( $result ) ) {
		$block[] = array(
			'adminlink' => XOOPS_URL."/modules/plzXoo/index.php?action=detail&amp;qid=".intval($qid) ,
			'pendingnum' => 1 ,
			'lang_linkname' => _PI_WAITING_WAITINGS ,
		) ;
	}

	return $block;
}


?>