<?php

$xoopsOption['nocommon']=true;
include_once "../../../mainfile.php";
require_once XOOPS_ROOT_PATH."/modules/exFrame/frameloader.php";

// require_once "exController/totalize/TotalizePermController.php";
require_once "./class/PlzxooTotalizePermController.php";

$con = new exTotalizePermController();
$con->setHeadFile("./default/templates/index.tpl");
$con->setXMLFile("./include/permission.xml");

$con->doService();

?>