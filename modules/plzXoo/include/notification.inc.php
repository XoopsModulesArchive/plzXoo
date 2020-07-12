<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

function plzXoo_notify_iteminfo($not_category, $item_id)
{
	global $xoopsModule, $xoopsModuleConfig ;

	$db =& Database::getInstance() ;
	$item_id = intval( $item_id ) ;

	if (empty($xoopsModule) || $xoopsModule->getVar("dirname") != "plzXoo" ) {
		$module_handler =& xoops_gethandler("module");
		$module =& $module_handler->getByDirname("plzXoo");
		$config_handler =& xoops_gethandler("config");
		$config =& $config_handler->getConfigsByCat(0,$module->getVar("mid"));
	} else {
		$module =& $xoopsModule;
		$config =& $xoopsModuleConfig;
	}
	$mod_url = XOOPS_URL . "/modules/" . $module->getVar("dirname") ;

	if ($not_category=="global") {
		$item["name"] = "";
		$item["url"] = "";
	} else if( $not_category == "category" ) {
		// Assume we have a valid cid
		$sql = "SELECT name FROM ".$db->prefix("plzxoo_category")." WHERE cid=$item_id";
		list( $name ) = $db->fetchRow( $db->query( $sql ) ) ;
		$item["name"] = $name ;
		$item["url"] = "$mod_url/index.php?cid=$item_id" ;
	} else if( $not_category == "question" ) {
		// Assume we have a valid event_id
		$sql = "SELECT subject FROM ".$db->prefix("plzxoo_question")." WHERE qid=$item_id";
		list( $name ) = $db->fetchRow( $db->query( $sql ) ) ;
		$item["name"] = $name ;
		$item["url"] = "$mod_url/index.php?action=detail&amp;qid=$item_id" ;
	}

	return $item;
}

?>
