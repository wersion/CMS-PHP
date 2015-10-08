<?php /* Smarty version 3.1.24, created on 2015-10-08 12:43:46
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/TemplatePage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:31375615f482a030c0_45079964%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '959bd283bb2d48a872ae447761877772526ff6ce' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/TemplatePage.tpl',
      1 => 1444279423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31375615f482a030c0_45079964',
  'variables' => 
  array (
    'defaultPage' => 0,
    'default' => 0,
    'setPageTemplate' => 0,
    'page' => 0,
    'item' => 0,
    'Page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f482a86952_64491214',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f482a86952_64491214')) {
function content_5615f482a86952_64491214 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '31375615f482a030c0_45079964';
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
    <?php if (isset($_smarty_tpl->tpl_vars['defaultPage']->value) && $_smarty_tpl->tpl_vars['defaultPage']->value == true) {?>
      <form method="post">
        <div class="form-group">
          <label for="templates">文章默认模板：</label>
          <input input type="text" name="templates" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['default']->value;?>
"/>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="设置模板" />
        </div>
      </form>
      
      <?php } elseif (isset($_smarty_tpl->tpl_vars['setPageTemplate']->value) && $_smarty_tpl->tpl_vars['setPageTemplate']->value == true) {?>
      <form method="post">
        <table class="table table-hover">
          <tr><th>ID</th><th>标题</th><th>模板</th><th><input type="checkbox"/>本页全选</th></tr>
          <?php
$_from = $_smarty_tpl->tpl_vars['page']->value;
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
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pageID'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pageName'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['templateName'];?>
</td>
              <td><input type="checkbox" name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pageID'];?>
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
          <label for="templates">文章模板：</label>
          <input input type="text" name="templates" class="form-control"/>
      </div>
      <div class="form-group">  
        <input name="select" type="submit" class="btn btn-primary btn-lg" value="设置选中文章" />
        <input name="all" type="submit" class="btn btn-primary btn-lg" value="设置所有文章" />
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