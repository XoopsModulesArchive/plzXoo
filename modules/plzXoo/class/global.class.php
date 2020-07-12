<?php

class plzXoo
{
	function &getHandler($name) {
		global $xoopsDB;
		global $xoopsModule;
		static $__cache__;

		$name=strtolower(trim($name));
		if(!isset($__cache__[$name])) {
			$class = 'plzXoo'.ucfirst($name).'Object';

			if(!class_exists($class)) { // １回だけ読み込む
				$filename = XOOPS_ROOT_PATH."/modules/plzXoo/class/".$name.".class.php";
				if(file_exists($filename)) {
					require_once($filename);
				}
			}

			$handler_class = $class."Handler";
			if(class_exists($handler_class)) {
				$__cache__[$name] = new $handler_class($xoopsDB,$class);
			}
			else { // 一回だけ読み込む
				$__cache__[$name] = new exXoopsObjectHandler($xoopsDB,$class);
			}
			return $__cache__[$name];
		}
		else {
			return $__cache__[$name];
		}
	}
}


?>