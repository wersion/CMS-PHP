<?php /* Smarty version 3.1.24, created on 2015-10-08 09:32:58
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/NodeList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:302025615c7cabdb9f1_33791826%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a66bdd23e132f2b88909c1479fb0a232bfc5746e' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/NodeList.tpl',
      1 => 1444030587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302025615c7cabdb9f1_33791826',
  'variables' => 
  array (
    'nodeList' => 0,
    'item' => 0,
    'item2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615c7cacb2911_98017915',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615c7cacb2911_98017915')) {
function content_5615c7cacb2911_98017915 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '302025615c7cabdb9f1_33791826';
?>
<!DOCTYPE html>
<html lang="zh-CN" class="node-list ">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="background node-list font">
    <div class="gray node-list ">
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
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle btn-sm node-list-but" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_smarty_tpl->tpl_vars['item']->value['nodeNameCH'];?>
&nbsp&nbsp<span class="glyphicon glyphicon-menu-down"></span>
            </button>
            <ul class="dropdown-menu">
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
            </ul>
          </div>
        <?php }?>
      <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
    </div>
	<?php echo '<script'; ?>
 src="../js/jq/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
?>