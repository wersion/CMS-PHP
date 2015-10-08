<?php /* Smarty version 3.1.24, created on 2015-10-08 12:46:31
         compiled from "C:/wamp/www/CMS-PHP/templates/page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:141195615f52736d332_47368849%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4959d2a79c819e48fe30293cb3fa24a8519a5b30' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/page.tpl',
      1 => 1444220650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141195615f52736d332_47368849',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f527411027_83563421',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f527411027_83563421')) {
function content_5615f527411027_83563421 ($_smarty_tpl) {
if (!is_callable('smarty_function_GetPage')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetPage.php';

$_smarty_tpl->properties['nocache_hash'] = '141195615f52736d332_47368849';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id="content">
  <?php echo smarty_function_GetPage(array('assign'=>"page"),$_smarty_tpl);?>

  <h2>当前位置 &gt;&gt;<?php echo $_smarty_tpl->tpl_vars['page']->value['columnName'];?>
</h2>
  <h1><?php echo $_smarty_tpl->tpl_vars['page']->value['pageName'];?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value['pageID'];?>
</h1> <br>
  简介：<?php echo $_smarty_tpl->tpl_vars['page']->value['pageInfo'];?>
 <br><br>
  <?php echo $_smarty_tpl->tpl_vars['page']->value['pageContent'];?>

  
  <!--<?php echo $_smarty_tpl->getSubTemplate ('comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
-->
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="../js/ajax/MyAjaxTool.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../js/ajax/Comment.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>