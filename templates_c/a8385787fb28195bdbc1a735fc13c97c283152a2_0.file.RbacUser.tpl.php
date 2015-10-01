<?php /* Smarty version 3.1.24, created on 2015-09-28 11:04:50
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/RbacUser.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:289415608ae52854d35_11935120%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8385787fb28195bdbc1a735fc13c97c283152a2' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/RbacUser.tpl',
      1 => 1443233843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289415608ae52854d35_11935120',
  'variables' => 
  array (
    'title' => 0,
    'showUser' => 0,
    'delete' => 0,
    'update' => 0,
    'allUser' => 0,
    'item' => 0,
    'Page' => 0,
    'addUser' => 0,
    'Role' => 0,
    'updateUser' => 0,
    'preUrl' => 0,
    'userName' => 0,
    'password' => 0,
    'userRole' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5608ae529519c6_22098536',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5608ae529519c6_22098536')) {
function content_5608ae529519c6_22098536 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '289415608ae52854d35_11935120';
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
    管理首页 &gt;&gt; 管理员管理&gt;&gt;<strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
  </div>
  <?php if (isset($_smarty_tpl->tpl_vars['showUser']->value) && $_smarty_tpl->tpl_vars['showUser']->value == true) {?>
  <table class="list">
    <tr><th>ID</th><th>用户名</th><th>所属用户组</th><th>登陆时间</th><th>登陆IP</th><th>状态</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value)) {?><th>操作</th><?php }?></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['allUser']->value;
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
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['userID'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['userName'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['userRole'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['loginTime'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['loginIP'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
        <td>
          <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="RbacUser.php?action=updateUser&ID=<?php echo $_smarty_tpl->tpl_vars['item']->value['userID'];?>
">[ 修改 ]</a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="RbacUser.php?action=deleteUser&ID=<?php echo $_smarty_tpl->tpl_vars['item']->value['userID'];?>
" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a>
          <?php }?>
        </td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </table>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['addUser']->value) && $_smarty_tpl->tpl_vars['addUser']->value == true) {?>
    <form method="post">
      <table class="create">
        <tr><td><p>用户名：</p></td><td><input type="text" name="userName" class="text" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="userStatus" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />停用</label></td></tr>
        <tr><td><p>所在用户组：</p></td><td>
          <select name="userRole">
            <?php
$_from = $_smarty_tpl->tpl_vars['Role']->value;
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['roleID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['roleName'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
          </select></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="RbacUser.php?action=showUser">返回列表</a> ]</div>
    </form>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateUser']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?>
    <form method="post">
      <table class="create">
        <input type="hIDden" id="pre_url" name="preUrl" value="<?php echo $_smarty_tpl->tpl_vars['preUrl']->value;?>
">
        <tr><td><p>用户名：</p></td><td><input type="text" name="userName" class="text" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"/></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="userStatus" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />停用</label></td></tr>
        <tr><td><p>所在用户组：</p></td><td>
          <select name="userRole">
            <?php
$_from = $_smarty_tpl->tpl_vars['userRole']->value;
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['roleID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['roleName'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
          </select></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改用户" class="submit" /> [ <a href="RbacUser.php?action=showUser">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>