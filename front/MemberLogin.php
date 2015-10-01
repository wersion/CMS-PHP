<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_login = new LoginController($_smarty);   //入口
$_login->Action();
$_smarty->display('MemberLogin.tpl');
?>