<?php /* Smarty version 3.1.24, created on 2015-10-08 12:46:34
         compiled from "C:/wamp/www/CMS-PHP/templates/article.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:190585615f52abe6ed4_64103930%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '906459cfcd4c594de0fc848dfff0a03337a35321' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/article.tpl',
      1 => 1444220576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190585615f52abe6ed4_64103930',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f52ac8dab3_42367851',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f52ac8dab3_42367851')) {
function content_5615f52ac8dab3_42367851 ($_smarty_tpl) {
if (!is_callable('smarty_function_GetArticle')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetArticle.php';

$_smarty_tpl->properties['nocache_hash'] = '190585615f52abe6ed4_64103930';
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
  <?php echo smarty_function_GetArticle(array('assign'=>"article"),$_smarty_tpl);?>

  <h2>当前位置 &gt;&gt;<?php echo $_smarty_tpl->tpl_vars['article']->value['columnName'];?>
</h2>
  <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['articleTitle'];?>
,<?php echo $_smarty_tpl->tpl_vars['article']->value['articleID'];?>
</h1> <br>
  更新时间：<?php echo $_smarty_tpl->tpl_vars['article']->value['articleUpdatetime'];?>
 <br><br>
  <?php echo $_smarty_tpl->tpl_vars['article']->value['articleContent'];?>

  
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