<?php
// 引入基础配置
require dirname(__FILE__).'/init.inc.php';
global $_tpl;
$_name = '谢俊钊';
$_tpl->assign('name',$_name);
$_tpl->display('index.tpl');
?>