<?php /* Smarty version 3.1.24, created on 2015-10-08 09:32:55
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/AdminLogin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:98205615c7c77f9520_29457901%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5954593711fd5b58a1151cfd28f9ee7a08845ad2' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/AdminLogin.tpl',
      1 => 1444030437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98205615c7c77f9520_29457901',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615c7c7842498_96785607',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615c7c7842498_96785607')) {
function content_5615c7c7842498_96785607 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '98205615c7c77f9520_29457901';
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <link href="../style/admin.css" rel="stylesheet">
  </head>
  <body class="background font">
      <div class="admin-login">
        <form  method="post" action="AdminLogin.php?action=adminLogin">
          <div class="form-group">
            <label for="userName">用户名</label>
            <input type="text" name="admin_user" class="form-control"  placeholder="用户名">
          </div>
          <div class="form-group">
            <label for="userPassword">密码</label>
            <input type="password" name="admin_pass" class="form-control" placeholder="密码">
          </div>
          <div class="form-group">
            <label for="validateCode">验证码</label>
            <input type="text" name="code" class="form-control"  placeholder="验证码">
          </div>
          <div class="form-group">
            <img src="../configs/code.php" onclick="javascript:this.src='../configs/code.php?tm='+Math.random();" />
          </div>
          <input type="submit" value="登录" class="btn btn-primary" name="send" />
        </form>
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