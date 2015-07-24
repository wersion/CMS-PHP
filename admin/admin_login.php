<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_tpl;
$_login = new LoginController($_tpl);   //入口
$_login->Action();
if(isset($_SESSION['admin'])) Tool_public::alertJump(null,'admin.php');
$_tpl->display('admin_login.tpl');
?>