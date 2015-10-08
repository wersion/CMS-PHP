<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_public::checkSession();
global $_smarty;
$Content = new ContentPageController($_smarty);   //入口
$Content->Action();
$_smarty->display('admin/ContentPage.tpl');
?>