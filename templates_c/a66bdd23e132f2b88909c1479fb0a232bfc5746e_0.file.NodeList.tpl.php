<?php /* Smarty version 3.1.24, created on 2015-09-24 15:48:28
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/NodeList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:73825603aaccbdb712_80164882%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a66bdd23e132f2b88909c1479fb0a232bfc5746e' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/NodeList.tpl',
      1 => 1442056274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73825603aaccbdb712_80164882',
  'variables' => 
  array (
    'nodeList' => 0,
    'item' => 0,
    'item2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5603aaccce60d7_03651532',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5603aaccce60d7_03651532')) {
function content_5603aaccce60d7_03651532 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '73825603aaccbdb712_80164882';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sidebar</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="sidebar">
<dl>
    <?php
$_from = $_smarty_tpl->tpl_vars['nodeList']->value;
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
      <?php if ($_smarty_tpl->tpl_vars['item']->value['level'] == 1) {?><dt><?php echo $_smarty_tpl->tpl_vars['item']->value['nodeNameCH'];?>
</dt>
      <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 2) {?>
        <dd class="secondStage">+ <?php echo $_smarty_tpl->tpl_vars['item']->value['nodeNameCH'];?>
</dd><ul class="thirdStage" style="display: none">
        <?php
$_from = $_smarty_tpl->tpl_vars['nodeList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
if ($_smarty_tpl->tpl_vars['item2']->value['level'] == 3 && $_smarty_tpl->tpl_vars['item2']->value['parentID'] == $_smarty_tpl->tpl_vars['item']->value['nodeID']) {?><li><a href="../admin/<?php echo $_smarty_tpl->tpl_vars['item']->value['nodeNameEN'];?>
.php?action=<?php echo $_smarty_tpl->tpl_vars['item2']->value['nodeNameEN'];?>
" target="main"><?php echo $_smarty_tpl->tpl_vars['item2']->value['nodeNameCH'];?>
</a></li><?php }?>
        <?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?></ul>
      <?php }?>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
</dl>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="../js/admin/NodeList.js"><?php echo '</script'; ?>
>
</html><?php }
}
?>