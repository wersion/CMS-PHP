<?php
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
ob_clean();
$_vc = new ValidateCode_inc();
$_vc->makeImg();
$_SESSION['code']=$_vc->getCode();
?>