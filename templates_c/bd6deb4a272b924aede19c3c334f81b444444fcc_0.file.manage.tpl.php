<?php /* Smarty version 3.1.24, created on 2015-06-24 04:36:34
         compiled from "E:/develop/wamp/www/CMS/templates/manage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:27444558a17b25888e7_06687012%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd6deb4a272b924aede19c3c334f81b444444fcc' => 
    array (
      0 => 'E:/develop/wamp/www/CMS/templates/manage.tpl',
      1 => 1435113387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27444558a17b25888e7_06687012',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllManage' => 0,
    'value' => 0,
    'Page' => 0,
    'create' => 0,
    'level' => 0,
    'update' => 0,
    'id' => 0,
    'lv' => 0,
    'name' => 0,
    'pass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558a17b26c4fa3_21476976',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558a17b26c4fa3_21476976')) {
function content_558a17b26c4fa3_21476976 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '27444558a17b25888e7_06687012';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="../js/admin_manage.js"><?php echo '</script'; ?>
>
</head>
<body id="manage">
	<div class="map">
		管理首页 &gt;&gt; 管理员管理&gt;&gt;<strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
	</div>
  <?php if (isset($_smarty_tpl->tpl_vars['show']->value) && $_smarty_tpl->tpl_vars['show']->value == true) {?>
	<table class="list">
		<tr><th>ID</th><th>用户名</th><th>权限等级</th><th>上次登录IP</th><th>上次登陆时间</th><th>登陆次数</th><th>注册时间</th><th>操作</th></tr>
		<?php
$_from = $_smarty_tpl->tpl_vars['AllManage']->value;
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
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->admin_user;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->level_name;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_ip;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_time;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->login_count;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->reg_time;?>
</td>
        <td><a href="manage.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">[ 修改 ]</a> | <a href="manage.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定删除此管理员')?true:false">[ 删除 ]</a></td>
      </tr>
		<?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
	</table>
  <p class="crelink"><a class="crelink" href="manage.php?action=create">[ 新增管理员 ]</a><p>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['create']->value) && $_smarty_tpl->tpl_vars['create']->value == true) {?>
    <form method="post">
      <table class="create">
        <tr><td><p>用户名：</p></td><td><input type="text" name="admin_user" class="text" /></td></tr>
        <tr><td><p>密　码：</p></td><td><input type="text" name="admin_pass" class="text" /></td></tr>
        <tr><td><p>密码确认：</p></td><td><input type="text" name="pass_confirm" class="text" /></td></tr>
        <tr><td><p>等　级：</p>
        <td>
          <select name="level">
            <?php
$_from = $_smarty_tpl->tpl_vars['level']->value;
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->level;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->level_name;?>
</option>
            <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
          </select>
        </td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增管理员" class="submit" /> [ <a href="manage.php?action=show">返回列表</a> ]</div>
    </form>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?>
    <form method="post">
      <table class="upeate">
        <input type="hidden" id="userid" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
        <input type="hidden" id="userlv" value="<?php echo $_smarty_tpl->tpl_vars['lv']->value;?>
"/>       
        <tr><td><p>用户名：</p></td><td><input type="text" name="admin_user" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="text" /></td></tr>
        <tr><td><p>密　码：</p></td><td><input type="text" name="admin_pass" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
" class="text" /></td></tr>
        <tr><td><p>密码确认：</p></td><td><input type="text" name="pass_confirm" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
" class="text" /></td></tr>
        <tr><td><p>等　级：</p></td>
        <td>
          <select name="level">
            <?php
$_from = $_smarty_tpl->tpl_vars['level']->value;
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->level;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->level_name;?>
</option>
            <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
          </select>
        </td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改管理员" class="submit" /> [ <a href="manage.php?action=show">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>