<?php /* Smarty version 3.1.24, created on 2015-06-27 04:36:40
         compiled from "E:/develop/wamp/www/CMS/templates/column.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13592558e0c382fdd40_90911221%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c16c84f72ddf2ff06e12103747057a83f71754' => 
    array (
      0 => 'E:/develop/wamp/www/CMS/templates/column.tpl',
      1 => 1435372595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13592558e0c382fdd40_90911221',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllColumn' => 0,
    'value' => 0,
    'Page' => 0,
    'showC_Column' => 0,
    'create' => 0,
    'update' => 0,
    'id' => 0,
    'pre_url' => 0,
    'column_name' => 0,
    'pid' => 0,
    'sort' => 0,
    'column_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558e0c38470f29_94676733',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558e0c38470f29_94676733')) {
function content_558e0c38470f29_94676733 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13592558e0c382fdd40_90911221';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="manage">
  <div class="map">
    内容管理 &gt;&gt; <strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
  </div>
  <?php if (isset($_smarty_tpl->tpl_vars['show']->value) && $_smarty_tpl->tpl_vars['show']->value == true) {?>
  <table class="list">
    <tr><th>ID</th><th>栏目名称</th><th>栏目描述</th><th>父栏目ID</th><th>排序</th><th>操作</th></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllColumn']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->column_name;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->column_info;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->pid;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->sort;?>
</td>
        <td><a href="column.php?action=showC_Column&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">[ 子栏目 ]</a> | <a href="column.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">[ 修改 ]</a> | <a href="column.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定删除此栏目')?true:false">[ 删除 ]</a></td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
  </table>
  <p class="crelink"><a class="crelink" href="column.php?action=create">[ 新增栏目 ]</a><p>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>
  
  <?php } elseif (isset($_smarty_tpl->tpl_vars['showC_Column']->value) && $_smarty_tpl->tpl_vars['showC_Column']->value == 'ture') {?>
  <table class="list">
    <tr><th>ID</th><th>栏目名称</th><th>栏目描述</th><th>父栏目ID</th><th>排序</th><th>操作</th></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllColumn']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->column_name;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->column_info;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->pid;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->sort;?>
</td>
        <td><a href="column.php?action=showc_Column&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">[ 子栏目 ]</a> | <a href="column.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">[ 修改 ]</a> | <a href="column.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定删除此栏目')?true:false">[ 删除 ]</a></td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
  </table>
  <p class="crelink"><a class="crelink" href="column.php?action=create">[ 新增栏目 ]</a><p>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['create']->value) && $_smarty_tpl->tpl_vars['create']->value == 'ture') {?>
    <form method="post">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>父栏目ID：</p></td><td><input type="text" name="pid" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="level.php?action=show">返回列表</a> ]</div>
    </form>
  
  <?php } elseif (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?>
    <form method="post">
      <input type="hidden" id="id" name="column_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
      <input type="hidden" id="pre_url" name="pre_url" value="<?php echo $_smarty_tpl->tpl_vars['pre_url']->value;?>
">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" value="<?php echo $_smarty_tpl->tpl_vars['column_name']->value;?>
" /></td></tr>
        <tr><td><p>父栏目ID：</p></td><td><input type="text" name="pid" class="text" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" /></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="sort" class="text" value="<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"><?php echo $_smarty_tpl->tpl_vars['column_info']->value;?>
</textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改栏目" class="submit" /> [ <a href="column.php?action=show">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>