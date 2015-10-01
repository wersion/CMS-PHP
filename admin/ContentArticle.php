<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_public::checkSession();
global $_smarty;
$Content = new ContentArticleController($_smarty);   //入口
$Content->Action();
$_smarty->display('admin/ContentArticle.tpl');
?>