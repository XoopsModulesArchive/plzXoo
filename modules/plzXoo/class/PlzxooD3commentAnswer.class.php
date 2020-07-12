<?php

// a class for d3forum comment integration
class PlzxooD3commentAnswer extends D3commentAbstract {

function fetchSummary( $external_link_id )
{
	$db =& Database::getInstance() ;
	$myts =& MyTextsanitizer::getInstance() ;

	$module_handler =& xoops_gethandler( 'module' ) ;
	$module =& $module_handler->getByDirname( $this->mydirname ) ;

	$aid = intval( $external_link_id ) ;
	$mydirname = $this->mydirname ;
	if( preg_match( '/[^0-9a-zA-Z_-]/' , $mydirname ) ) die( 'Invalid mydirname' ) ;

	// language constants
	@include XOOPS_ROOT_PATH.'/modules/'.$mydirname.'/language/'.@$GLOBALS['xoopsConfig']['language'].'/main.php' ;
	if( ! defined( '_MD_PLZXOO_LANG_QUESTION' ) ) {
		@include XOOPS_ROOT_PATH.'/modules/'.$mydirname.'/language/english/main.php' ;
	}

	// query
	$myrow = $db->fetchArray( $db->query( "SELECT a.uid AS answer_uid,a.body AS answer_body,a.comment,q.subject,q.uid AS question_uid,q.body AS question_body,q.qid FROM ".$db->prefix("plzxoo_answer")." a LEFT JOIN ".$db->prefix("plzxoo_question")." q ON a.qid=q.qid WHERE aid=$aid" ) ) ;

	$comment = array(
		'dirname' => $mydirname ,
		'module_name' => $module->getVar( 'name' ) ,
		'question' => array(
			'id' => intval($myrow['qid']) ,
			'uid' => intval($myrow['question_uid']) ,
			'subject' => $myts->makeTboxData4Show( $myrow['subject'] ) ,
			'body' => htmlspecialchars( xoops_substr( strip_tags( $myrow['question_body'] ) , 0 , 255 ) , ENT_QUOTES ) ,
		) ,
		'answer' => array(
			'id' => $aid ,
			'uid' => intval( $myrow['answer_uid'] ) ,
			'body' => htmlspecialchars( xoops_substr( strip_tags( $myrow['answer_body'] ) , 0 , 255 ) , ENT_QUOTES ) ,
			'comment' => htmlspecialchars( xoops_substr( strip_tags( $myrow['comment'] ) , 0 , 255 ) , ENT_QUOTES ) ,
		) ,
	) ;

	include_once XOOPS_ROOT_PATH.'/class/template.php' ;
	$tpl =& new XoopsTpl() ;
	$tpl->assign( 'comment' , $comment ) ;
	$ret = $tpl->fetch( 'db:plzxoo_d3comment_reference.html' ) ;
	return $ret ;

/*	return array(
		'dirname' => $mydirname ,
		'module_name' => $module->getVar( 'name' ) ,
		'subject' => $myts->makeTboxData4Show( $myrow['subject'] ) ,
		'uri' => XOOPS_URL.'/modules/'.$mydirname.'/index.php?action=detail&amp;qid='.intval($myrow['qid']) ,
		'summary' => htmlspecialchars( xoops_substr( strip_tags( $myrow['body'] ) , 0 , 255 ) , ENT_QUOTES ) ,
	) ;*/

}


}

?>