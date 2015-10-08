<?php
// 引入基础配置
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_model = new TemplateModel();
$template = $_model->getIndexTemplate();
$_smarty->display($template['templateName']);
?>