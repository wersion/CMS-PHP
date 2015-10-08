<?php /* Smarty version 3.1.24, created on 2015-10-08 12:46:24
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/MemberAccount.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:321975615f5204e3a99_44514440%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '513436890bf394cee25e9be2ba1f4ba04986a9d0' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/MemberAccount.tpl',
      1 => 1444117670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321975615f5204e3a99_44514440',
  'variables' => 
  array (
    'showAccount' => 0,
    'delete' => 0,
    'update' => 0,
    'AllAccount' => 0,
    'item' => 0,
    'Page' => 0,
    'addAccount' => 0,
    'updateAccount' => 0,
    'accountEmail' => 0,
    'accountNickName' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f5205cccf6_56586537',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f5205cccf6_56586537')) {
function content_5615f5205cccf6_56586537 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '321975615f5204e3a99_44514440';
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
  <?php if (isset($_smarty_tpl->tpl_vars['showAccount']->value) && $_smarty_tpl->tpl_vars['showAccount']->value == true) {?>
  <table class="table table-hover">
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
"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="MemberAccount.php?action=deleteAccount&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['accountID'];?>
" onclick="return confirm('确定删除此用户')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
          <?php }?>
        </td>
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

  <?php } elseif (isset($_smarty_tpl->tpl_vars['addAccount']->value) && $_smarty_tpl->tpl_vars['addAccount']->value == true) {?>
    <form method="post">
        <div class="form-group">
          <label for="userName">注册邮箱：</label>
          <input input type="text" name="accountEmail" class="form-control" placeholder="注册邮箱"/>
        </div>
        <div class="form-group">
          <label for="userName">用户昵称：</label>
          <input input type="text" name="accountNickName" class="form-control" placeholder="用户昵称："/>
        </div>
        <div class="form-group">
          <label for="userName">密码：</label>
          <input input type="password" name="password" class="form-control" placeholder="密码"/>
        </div>
        <div class="form-group">
          用户状态：
          <label class="radio-inline">
            <input type="radio" name="status" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0"> 停用
          </label>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="MemberAccount.php?action=showAccount"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
    </form>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateAccount']->value) && $_smarty_tpl->tpl_vars['updateAccount']->value == true) {?>
    <form method="post">
        <div class="form-group">
          <label for="userName">注册邮箱：</label>
          <input input type="text" name="accountEmail" class="form-control" placeholder="注册邮箱" value="<?php echo $_smarty_tpl->tpl_vars['accountEmail']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="userName">用户昵称：</label>
          <input input type="text" name="accountNickName" class="form-control" placeholder="用户昵称：" value="<?php echo $_smarty_tpl->tpl_vars['accountNickName']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="userName">密码：</label>
          <input input type="password" name="password" class="form-control" placeholder="密码" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"/>
        </div>
        <div class="form-group">
          用户状态：
          <label class="radio-inline">
            <input type="radio" name="status" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0"> 停用
          </label>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="MemberAccount.php?action=updateAccount"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
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