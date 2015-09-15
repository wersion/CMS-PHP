<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_public::checkSession();
global $_smarty;
$_column = new ContentColumnController($_smarty);   //入口
$_column->Action();
$_smarty->display('admin/ContentColumn.tpl');
?>