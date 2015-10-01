<?php
// 引入基础配置
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_smarty->display('content.tpl');
?>