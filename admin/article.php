<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_inc::checkSession();
global $_tpl;
$_content = new ArticleController($_tpl);   //入口
$_content->Action();
$_tpl->display('article.tpl');
?>