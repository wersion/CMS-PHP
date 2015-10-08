<?php
// 引入基础配置
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_model = new TemplateModel();
$_model->articleID = $_GET['aid'];
$template = $_model->getArticleTemplate();
$_smarty->display($template['templateName']);
?>