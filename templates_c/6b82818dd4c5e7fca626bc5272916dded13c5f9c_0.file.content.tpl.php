<?php /* Smarty version 3.1.24, created on 2015-10-01 10:25:16
         compiled from "C:/wamp/www/CMS-PHP/templates/content.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9554560c998c46aa98_95960016%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b82818dd4c5e7fca626bc5272916dded13c5f9c' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/content.tpl',
      1 => 1443666303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9554560c998c46aa98_95960016',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_560c998c4e44a5_93731285',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560c998c4e44a5_93731285')) {
function content_560c998c4e44a5_93731285 ($_smarty_tpl) {
if (!is_callable('smarty_function_GetContent')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetContent.php';

$_smarty_tpl->properties['nocache_hash'] = '9554560c998c46aa98_95960016';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
<link rel="stylesheet" type="text/css" href="../style/basic.css" />
<link rel="stylesheet" type="text/css" href="../style/list.css" />
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id="content">
  <?php echo smarty_function_GetContent(array('assign'=>"content"),$_smarty_tpl);?>

  <h2>当前位置 &gt;&gt;<?php echo $_smarty_tpl->tpl_vars['content']->value['columnName'];?>
</h2>
  <h1><?php echo $_smarty_tpl->tpl_vars['content']->value['articleTitle'];?>
,<?php echo $_smarty_tpl->tpl_vars['content']->value['articleID'];?>
</h1> <br>
  更新时间：<?php echo $_smarty_tpl->tpl_vars['content']->value['articleUpdatetime'];?>
 <br><br>
  <?php echo $_smarty_tpl->tpl_vars['content']->value['articleContent'];?>

  
  <?php echo $_smarty_tpl->getSubTemplate ('comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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