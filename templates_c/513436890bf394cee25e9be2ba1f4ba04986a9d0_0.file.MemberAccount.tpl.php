<?php /* Smarty version 3.1.24, created on 2015-10-01 15:53:25
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/MemberAccount.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10026560ce675175711_91827915%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '513436890bf394cee25e9be2ba1f4ba04986a9d0' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/MemberAccount.tpl',
      1 => 1443686002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10026560ce675175711_91827915',
  'variables' => 
  array (
    'title' => 0,
    'showAccount' => 0,
    'delete' => 0,
    'update' => 0,
    'AllAccount' => 0,
    'item' => 0,
    'addAccount' => 0,
    'updateAccount' => 0,
    'preUrl' => 0,
    'accountEmail' => 0,
    'accountNickName' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_560ce67527d919_85720399',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560ce67527d919_85720399')) {
function content_560ce67527d919_85720399 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10026560ce675175711_91827915';
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
  <?php if (isset($_smarty_tpl->tpl_vars['showAccount']->value) && $_smarty_tpl->tpl_vars['showAccount']->value == true) {?>
  <table class="list">
    <tr><th>ID</th><th>注册邮箱</th><th>会员昵称</th><th>会员密码</th><th>注册时间</th><th>状态</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value)) {?><th>操作</th><?php }?></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllAccount']->value;
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
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['accountID'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['accountEmail'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['accountNickName'];?>
</td>
        <td>******</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['signUpTime'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?>禁言<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>正常<?php }?></td>
        <td>
          <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="MemberAccount.php?action=updateAccount&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['accountID'];?>
">[ 修改 ]</a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="MemberAccount.php?action=deleteAccount&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['accountID'];?>
" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a>
          <?php }?>
        </td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </table>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['addAccount']->value) && $_smarty_tpl->tpl_vars['addAccount']->value == true) {?>
    <form method="post">
      <table class="create">
        <tr><td><p>注册邮箱：</p></td><td><input type="text" name="accountEmail" class="text" /></td></tr>
        <tr><td><p>用户昵称：</p></td><td><input type="text" name="accountNickName" class="text" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="status" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />禁言</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="MemberAccount.php?action=showAccount">返回列表</a> ]</div>
    </form>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateAccount']->value) && $_smarty_tpl->tpl_vars['updateAccount']->value == true) {?>
    <form method="post">
      <table class="create">
        <input type="hIDden" id="pre_url" name="preUrl" value="<?php echo $_smarty_tpl->tpl_vars['preUrl']->value;?>
">
        <tr><td><p>注册邮箱：</p></td><td><input type="text" name="accountEmail" class="text" value="<?php echo $_smarty_tpl->tpl_vars['accountEmail']->value;?>
" /></td></tr>
        <tr><td><p>用户昵称：</p></td><td><input type="text" name="accountNickName" class="text" value="<?php echo $_smarty_tpl->tpl_vars['accountNickName']->value;?>
" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="status" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />禁言</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="MemberAccount.php?action=updateAccount">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>