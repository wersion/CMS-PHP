<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_tpl;
Validate_public::checkSession();
$_tpl->display('main.tpl');
?>