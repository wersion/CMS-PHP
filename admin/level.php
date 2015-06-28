<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_inc::checkSession();
global $_tpl;
$_level = new LevelController($_tpl);   //入口
$_level->Action();
$_tpl->display('level.tpl');
?>