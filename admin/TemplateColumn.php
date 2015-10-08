<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_public::checkSession();
global $_smarty;
$template = new TemplateColumnController($_smarty);   //入口
$template->Action();
$_smarty->display('admin/TemplateColumn.tpl');
?>