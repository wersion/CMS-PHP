<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate_public::checkSession();
global $_smarty;
$template = new TemplateArticleController($_smarty);   //入口
$template->Action();
$_smarty->display('admin/TemplateArticle.tpl');
?>