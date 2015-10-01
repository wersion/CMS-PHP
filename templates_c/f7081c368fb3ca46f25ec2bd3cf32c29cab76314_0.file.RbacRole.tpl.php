<?php /* Smarty version 3.1.24, created on 2015-09-25 15:25:58
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/RbacRole.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:131015604f706a45be1_88828009%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7081c368fb3ca46f25ec2bd3cf32c29cab76314' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/RbacRole.tpl',
      1 => 1442149712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131015604f706a45be1_88828009',
  'variables' => 
  array (
    'title' => 0,
    'showRole' => 0,
    'delete' => 0,
    'update' => 0,
    'set' => 0,
    'AllRole' => 0,
    'item' => 0,
    'Page' => 0,
    'addRole' => 0,
    'updateRole' => 0,
    'preUrl' => 0,
    'roleName' => 0,
    'roleInfo' => 0,
    'setRole' => 0,
    'rolename' => 0,
    'NodeList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5604f706b89901_74614980',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5604f706b89901_74614980')) {
function content_5604f706b89901_74614980 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '131015604f706a45be1_88828009';
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
  <?php if (isset($_smarty_tpl->tpl_vars['showRole']->value) && $_smarty_tpl->tpl_vars['showRole']->value == true) {?>
  <table class="list">
    <tr><th>ID</th><th>用户组名称</th><th>状态</th><th>用户组描述</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value) || isset($_smarty_tpl->tpl_vars['set']->value)) {?><th>操作</th><?php }?></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllRole']->value;
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
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['roleID'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['roleName'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?>停用<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>启用<?php }?></td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['roleInfo'];?>
</td>
        <td>
          <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="RbacRole.php?action=updateRole&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleID'];?>
">[ 修改 ]
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="RbacRole.php?action=deleteRole&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleID'];?>
" onclick="return confirm('确定删除此用户组')?true:false">[ 删除 ]</a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['set']->value) && $_smarty_tpl->tpl_vars['set']->value == true) {?><a href="RbacRole.php?action=setRole&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleID'];?>
">[ 配置权限 ]</a>
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

  <?php } elseif (isset($_smarty_tpl->tpl_vars['addRole']->value) && $_smarty_tpl->tpl_vars['addRole']->value == true) {?>
    <form method="post">
      <table class="create">
        <tr><td><p>用户组名：</p></td><td><input type="text" name="roleName" class="text" /></td></tr>
        <tr><td><p>用户组描述：</p></td><td><input type="text" name="roleInfo" class="text" /></td></tr>
        <tr><td><p>用户组状态：</p></td><td><label><input type="radio" name="roleStatus" value="1" />开启</label><label><input type="radio" name="roleStatus" value="0" />停用</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户组" class="submit" /> [ <a href="RbacRole.php?action=showRole">返回列表</a> ]</div>
    </form>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateRole']->value) && $_smarty_tpl->tpl_vars['updateRole']->value == true) {?>
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="preUrl" value="<?php echo $_smarty_tpl->tpl_vars['preUrl']->value;?>
">
        <tr><td><p>用户组名：</p></td><td><input type="text" name="roleName" class="text" value="<?php echo $_smarty_tpl->tpl_vars['roleName']->value;?>
" /></td></tr>
        <tr><td><p>用户组描述：</p></td><td><input type="text" name="roleInfo" class="text" value="<?php echo $_smarty_tpl->tpl_vars['roleInfo']->value;?>
" /></td></tr>
        <tr><td><p>用户组状态：</p></td><td><label><input type="radio" name="roleStatus" value="1" />开启</label><label><input type="radio" name="roleStatus" value="0" />停用</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改用户组" class="submit" /> [ <a href="RbacRole.php?action=show">返回列表</a> ]</div>
    </form>

    <?php } elseif (isset($_smarty_tpl->tpl_vars['setRole']->value) && $_smarty_tpl->tpl_vars['setRole']->value == true) {?>
    <p style="margin-left: 50px">正在为<?php echo $_smarty_tpl->tpl_vars['rolename']->value;?>
配置权限</p>
    <form method="post">
      <?php
$_from = $_smarty_tpl->tpl_vars['NodeList']->value;
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
        <p>
          <lable><input name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nodeID'];?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['item']->value['access'] == 1) {?>checked="checked"<?php }?> /><?php echo preg_replace('!^!m',str_repeat('&nbsp&nbsp&nbsp&nbsp',$_smarty_tpl->tpl_vars['item']->value['level']),$_smarty_tpl->tpl_vars['item']->value['nodeNameCH']);?>
</lable>
        </p>
      <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
      <div class="butt"><input type="submit" name="send" value="提交" class="submit" /> [ <a href="RbacRole.php?action=show">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>