<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
Validate_public::checkSession();
$_smarty->display('admin/Main.tpl');
?>