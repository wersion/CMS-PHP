<?php /* Smarty version 3.1.24, created on 2015-09-28 16:22:04
         compiled from "C:/wamp/www/CMS-PHP/templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:121675608f8ac662297_25726439%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b21a56cf559957e3c9639bbd6229bd68adad02' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/header.tpl',
      1 => 1443428523,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121675608f8ac662297_25726439',
  'variables' => 
  array (
    'column' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5608f8ac6d8284_40356570',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5608f8ac6d8284_40356570')) {
function content_5608f8ac6d8284_40356570 ($_smarty_tpl) {
if (!is_callable('smarty_function_GetAllTopColumn')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetAllTopColumn.php';

$_smarty_tpl->properties['nocache_hash'] = '121675608f8ac662297_25726439';
?>
<div id="top">

</div>
<div id="header">
</div>
<div id="nav">
	<ul>
		<?php echo smarty_function_GetAllTopColumn(array('assign'=>"column",'url'=>"list.php",'limit'=>"10"),$_smarty_tpl);?>

		<?php
$_from = $_smarty_tpl->tpl_vars['column']->value;
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
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['columnName'];?>
</a></li>
		<?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
 </ul>
</div>
<div id="search">
	<form>
		<select name="search">
			<option selected="selected">按标题</option>
			<option>按关键字</option>
			<option>全局查询</option>
		</select>
		<input type="text" name="keyword" class="text" />
		<input type="submit" name="send" class="submit" value="搜索" />
	</form>
</div><?php }
}
?>