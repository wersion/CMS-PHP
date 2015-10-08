<?php /* Smarty version 3.1.24, created on 2015-10-08 11:38:35
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/TemplateArticle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:304075615e53be21845_99046246%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '162ae5de6acba56081f0f2e526c451716feb11e0' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/TemplateArticle.tpl',
      1 => 1444275512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304075615e53be21845_99046246',
  'variables' => 
  array (
    'defaultArticle' => 0,
    'default' => 0,
    'setArticleTemplate' => 0,
    'article' => 0,
    'item' => 0,
    'Page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615e53be9e9e3_02072545',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615e53be9e9e3_02072545')) {
function content_5615e53be9e9e3_02072545 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '304075615e53be21845_99046246';
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
    <?php if (isset($_smarty_tpl->tpl_vars['defaultArticle']->value) && $_smarty_tpl->tpl_vars['defaultArticle']->value == true) {?>
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
      
      <?php } elseif (isset($_smarty_tpl->tpl_vars['setArticleTemplate']->value) && $_smarty_tpl->tpl_vars['setArticleTemplate']->value == true) {?>
      <form method="post">
        <table class="table table-hover">
          <tr><th>ID</th><th>标题</th><th>模板</th><th><input type="checkbox"/>本页全选</th></tr>
          <?php
$_from = $_smarty_tpl->tpl_vars['article']->value;
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
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['articleID'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['articleTitle'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['item']->value['templateName'];?>
</td>
              <td><input type="checkbox" name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['articleID'];?>
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