<?php
require_once "../../mainfile.php";
require_once XOOPS_ROOT_PATH."/header.php";
require_once XOOPS_ROOT_PATH."/modules/exFrame/frameloader.php";

require_once "./class/global.class.php";

exFrame::init ( EXFRAME_MOJALE );	// mojaLE を使用

$module = "default";	// 決め打ち
$action = isset($_REQUEST['action']) ? trim($_REQUEST['action']) : "";

$controller=new SimpleFrontController($module,$action,XOOPS_ROOT_PATH."/modules/plzXoo");
$controller->setVarbose();

$controller->dispatch();

require_once XOOPS_ROOT_PATH."/footer.php";

?>
