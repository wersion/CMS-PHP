<?php /* Smarty version 3.1.24, created on 2015-10-08 09:32:58
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/AdminTop.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:58625615c7cab0f6c2_68669408%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5303f3b0933621cdaf033662abc1e34ca7cccc3' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/AdminTop.tpl',
      1 => 1444117886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58625615c7cab0f6c2_68669408',
  'variables' => 
  array (
    'admin_user' => 0,
    'admin_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615c7cab60dc1_12776142',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615c7cab60dc1_12776142')) {
function content_5615c7cab60dc1_12776142 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '58625615c7cab0f6c2_68669408';
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
  <body class="background font">
    <div class="admin-top">
      <div class="top-background gray"></div>
      <div class="home">
        <a href="Admin.php" target="_parent">
          <div class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp后台首页
          </div>
        </a>
      </div>
      <div class="user-info">
       用户：<?php echo $_smarty_tpl->tpl_vars['admin_user']->value;?>
 <br>
       用户组：<?php echo $_smarty_tpl->tpl_vars['admin_role']->value;?>
 <br>
        <a href="AdminLogin.php?action=adminLogout" target="_parent">
          <div class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp退出登录
          </div>
        </a>
        <a href="../index.php" target="_blank">
          <div class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp网站前台
          </div>
        </a>
      </div>
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