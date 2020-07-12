<?php
require_once "../../../mainfile.php";
require_once XOOPS_ROOT_PATH."/include/cp_header.php";
require_once XOOPS_ROOT_PATH."/modules/exFrame/frameloader.php";

require_once "../class/global.class.php";

exFrame::init ( EXFRAME_MOJALE );	// mojaLE を使用

$module = "default";	// 決め打ち
if( isset($_REQUEST['action']) ) {
	$action = trim($_REQUEST['action']) ;
} else {
	$action = $_REQUEST['action'] = 'category_list' ;
}

$controller=new SimpleFrontController($module,$action,XOOPS_ROOT_PATH."/modules/plzXoo/admin");
$controller->setVarbose();

xoops_cp_header();
$controller->dispatch();
xoops_cp_footer();


?>
