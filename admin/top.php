<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_tpl;
// 注入session
$_tpl->assign('admin_user',$_SESSION['admin']['admin_user']);
$_tpl->assign('ueser_lever',$_SESSION['admin']['admin_level']);
$_tpl->display('top.tpl');
?>