<?php /* Smarty version 3.1.24, created on 2015-10-08 12:44:39
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/TemplateColumn.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:137985615f4b75411b6_43429317%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ed79a893758aff14348f7ac63552fa3c4d3bc3' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/TemplateColumn.tpl',
      1 => 1444279472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137985615f4b75411b6_43429317',
  'variables' => 
  array (
    'defaultColumn' => 0,
    'default' => 0,
    'setColumnTemplate' => 0,
    'column' => 0,
    'item' => 0,
    'Page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f4b75c1e45_46477649',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f4b75c1e45_46477649')) {
function content_5615f4b75c1e45_46477649 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '137985615f4b75411b6_43429317';
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="background">
  <div class="container min-height wite">
    <?php if (isset($_smarty_tpl->tpl_vars['defaultColumn']->value) && $_smarty_tpl->tpl_vars['defaultColumn']->value == true) {?>
      <form method="post">
        <div class="form-group">
          <label for="templates">栏目默认模板：</label>
          <input input type="text" name="templates" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['default']->value;?>
"/>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="设置模板" />
        </div>
      </form>
      
      <?php } elseif (isset($_smarty_tpl->tpl_vars['setColumnTemplate']->value) && $_smarty_tpl->tpl_vars['setColumnTemplate']->value == true) {?>
      <form method="post">
        <table class="table table-hover">
          <tr><th>ID</th><th>标题</th><th>模板</th><th><input type="checkbox"/>本页全选</th></tr>
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
            <tr>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['columnName'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['templateName'];?>
</td>
              <td><input type="checkbox" name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
" /></label></td>
            </tr>
          <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
      </table>
      <div class="page">
        <ul class="pagination">
          <?php echo $_smarty_tpl->tpl_vars['Page']->value;?>

        </ul>
      </div>
      <div class="form-group">
          <label for="templates">栏目模板：</label>
          <input input type="text" name="templates" class="form-control"/>
      </div>
      <div class="form-group">  
        <input name="select" type="submit" class="btn btn-primary btn-lg" value="设置选中栏目" />
        <input name="all" type="submit" class="btn btn-primary btn-lg" value="设置所有栏目" />
      </div>
      </form>
    <?php }?>
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