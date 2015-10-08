<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_smarty->assign('nodeList',$_SESSION['nodeList']);
$_smarty->display('admin/Admin.tpl');
?>