<?php
// 引入基础配置
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_model = new TemplateModel();
$_model->pageID = $_GET['cid'];
$template = $_model->getPageTemplate();
$_smarty->display($template['templateName']);
?>