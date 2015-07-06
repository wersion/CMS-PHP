<?php /* Smarty version 3.1.24, created on 2015-07-06 14:47:50
         compiled from "F:/develop/wamp/www/CMS/templates/column.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21986559a24964f8560_39686975%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '881edc9afcee12548bc8d522bc97506b63b770ac' => 
    array (
      0 => 'F:/develop/wamp/www/CMS/templates/column.tpl',
      1 => 1435585194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21986559a24964f8560_39686975',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllColumn' => 0,
    'value' => 0,
    'Page' => 0,
    'create' => 0,
    'showC_Column' => 0,
    'f_column' => 0,
    'pid' => 0,
    'createC_Column' => 0,
    'pre_url' => 0,
    'update' => 0,
    'id' => 0,
    'column_name' => 0,
    'sort' => 0,
    'column_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559a24965e2b93_32462259',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a24965e2b93_32462259')) {
function content_559a24965e2b93_32462259 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21986559a24964f8560_39686975';
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
  <table class="list" id="show">
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
        <td><input type="text" class="sort"  name="sort_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->sort;?>
"></td>
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
  <p class="crelink"><a class="crelink" href="column.php?action=create">[ 新增顶级栏目 ]</a><p>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['create']->value) && $_smarty_tpl->tpl_vars['create']->value == 'ture') {?>
    <form method="post">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>父栏目ID：</p></td><td><input type="text" name="pid" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>
  
  <?php } elseif (isset($_smarty_tpl->tpl_vars['showC_Column']->value) && $_smarty_tpl->tpl_vars['showC_Column']->value == 'ture') {?>
  <table class="list" id="show">
    <tr><th>ID</th><th>栏目名称</th><th>栏目描述</th><th>父栏目</th><th>排序</th><th>操作</th></tr>
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
        <td><?php echo $_smarty_tpl->tpl_vars['f_column']->value;?>
</td>
        <td><input type="text" class="sort"  name="sort_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->sort;?>
"></td>
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
  <p class="crelink"><a class="crelink" href="column.php?action=createC_Column&pid=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">[ 新增"<?php echo $_smarty_tpl->tpl_vars['f_column']->value;?>
"子栏目 ]</a><a href="javascript:history.go(-1);location.reload()">[ 返回上一层栏目列表 ]</a><p>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['createC_Column']->value) && $_smarty_tpl->tpl_vars['createC_Column']->value == 'ture') {?>
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="pre_url" value="<?php echo $_smarty_tpl->tpl_vars['pre_url']->value;?>
">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
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
      <div class="butt"><input type="submit" name="send" value="修改栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>