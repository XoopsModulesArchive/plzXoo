<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

// referer check
$ref = xoops_getenv('HTTP_REFERER');
if( $ref == '' || strpos( $ref , XOOPS_URL.'/modules/system/admin.php' ) === 0 ) {
	/* Module specific part */

	global $xoopsDB ;

	// add column 'for_search' into question table
	$result = $xoopsDB->query( "SELECT COUNT(`for_search`) FROM ".$xoopsDB->prefix("plzxoo_question") ) ;
	if( $result === false ) {
		$xoopsDB->query( "ALTER TABLE ".$xoopsDB->prefix("plzxoo_question")." ADD `for_search` mediumtext NOT NULL AFTER `size`" ) ;
	}

	// add column 'modified_date' into question&answer table
	$result = $xoopsDB->query( "SELECT COUNT(`modified_date`) FROM ".$xoopsDB->prefix("plzxoo_question") ) ;
	if( $result === false ) {
		$xoopsDB->query( "ALTER TABLE ".$xoopsDB->prefix("plzxoo_question")." ADD `modified_date` int(10) NOT NULL default 0 AFTER `input_date`" ) ;
		$xoopsDB->query( "UPDATE ".$xoopsDB->prefix("plzxoo_question")." SET `modified_date`=`input_date`" ) ;
		$xoopsDB->query( "ALTER TABLE ".$xoopsDB->prefix("plzxoo_answer")." ADD `modified_date` int(10) NOT NULL default 0 AFTER `input_date`" ) ;
		$xoopsDB->query( "UPDATE ".$xoopsDB->prefix("plzxoo_answer")." SET `modified_date`=`input_date`" ) ;
	}

	// add column 'weight' into category table
	$result = $xoopsDB->query( "SELECT COUNT(`weight`) FROM ".$xoopsDB->prefix("plzxoo_category") ) ;
	if( $result === false ) {
		$xoopsDB->query( "ALTER TABLE ".$xoopsDB->prefix("plzxoo_category")." ADD `weight` mediumint(5) NOT NULL default 0 AFTER `size`" ) ;
	}

	// TODO
	$xoopsDB->query( "ALTER TABLE ".$xoopsDB->prefix("plzxoo_answer")." MODIFY `comment` text NOT NULL default ''" ) ;


	/* General part */

	// Keep the values of block's options when module is updated (by nobunobu)
	include dirname( __FILE__ ) . "/updateblock.inc.php" ;
}

?>