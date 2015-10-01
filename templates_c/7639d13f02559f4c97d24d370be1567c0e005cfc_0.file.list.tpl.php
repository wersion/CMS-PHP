<?php /* Smarty version 3.1.24, created on 2015-09-28 16:22:40
         compiled from "C:/wamp/www/CMS-PHP/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:201405608f8d05ae1b6_60238383%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7639d13f02559f4c97d24d370be1567c0e005cfc' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/list.tpl',
      1 => 1443428559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201405608f8d05ae1b6_60238383',
  'variables' => 
  array (
    'thiscolumn' => 0,
    'articlelist' => 0,
    'item' => 0,
    'Page' => 0,
    'subcolumn' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5608f8d06754e1_24080724',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5608f8d06754e1_24080724')) {
function content_5608f8d06754e1_24080724 ($_smarty_tpl) {
if (!is_callable('smarty_function_GetThisColumn')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetThisColumn.php';
if (!is_callable('smarty_function_GetAllArticleList')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetAllArticleList.php';
if (!is_callable('smarty_function_GetSubColumn')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetSubColumn.php';

$_smarty_tpl->properties['nocache_hash'] = '201405608f8d05ae1b6_60238383';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id="list">
  <?php echo smarty_function_GetThisColumn(array('assign'=>"thiscolumn"),$_smarty_tpl);?>

  <h2>当前位置 &gt;&gt;<?php echo $_smarty_tpl->tpl_vars['thiscolumn']->value['columnName'];?>
</h2>

  <?php echo smarty_function_GetAllArticleList(array('assign'=>"articlelist",'url'=>"content.php",'limit'=>"5"),$_smarty_tpl);?>

  <?php
$_from = $_smarty_tpl->tpl_vars['articlelist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
  <dl>
    <dt><img src="images/none.jpg" alt="" /></dt>
    <dd>[<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['columnName'];?>
</strong>] <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['articleTitle'];?>
</a></dd>
    <dd>日期：<?php echo $_smarty_tpl->tpl_vars['item']->value['articleUpdatetime'];?>
 点击率：224 好评：0</dd>
    <dd>文章摘要：<?php echo $_smarty_tpl->tpl_vars['item']->value['articleInfo'];?>
...</dd>
  </dl>
  <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>
</div>
<div id="sidebar">
  <div class="nav">
    <h2>子栏目列表</h2>
    <?php echo smarty_function_GetSubColumn(array('assign'=>"subcolumn",'url'=>"list.php",'limit'=>"4"),$_smarty_tpl);?>

    <?php if (isset($_smarty_tpl->tpl_vars['subcolumn']->value)) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['subcolumn']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
      <strong><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['columnName'];?>
</a></strong>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
    <?php }?>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</body>
</html><?php }
}
?>