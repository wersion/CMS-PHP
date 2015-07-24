<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_public::checkSession();
global $_tpl;
$_column = new ColumnController($_tpl);   //入口
$_column->Action();
$_tpl->display('column.tpl');
?>