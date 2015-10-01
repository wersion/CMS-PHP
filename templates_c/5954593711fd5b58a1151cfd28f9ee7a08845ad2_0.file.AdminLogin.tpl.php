<?php /* Smarty version 3.1.24, created on 2015-10-01 10:58:53
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/AdminLogin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6311560ca16d1cd477_92893147%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5954593711fd5b58a1151cfd28f9ee7a08845ad2' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/AdminLogin.tpl',
      1 => 1443668330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6311560ca16d1cd477_92893147',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_560ca16d204e99_94482997',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560ca16d204e99_94482997')) {
function content_560ca16d204e99_94482997 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6311560ca16d1cd477_92893147';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录CMS后台管理系统</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body>

<form id="adminLogin" method="post" action="AdminLogin.php?action=adminLogin">
	<fieldset>
		<legend>登录CMS后台管理系统</legend>
		<label>账　号：<input type="text" name="admin_user" class="text" /></label>
		<label>密　码：<input type="password" name="admin_pass" class="text" /></label>
		<label>验证码：<input type="text" name="code" class="text" /></label>
		<label class="t">输入下图的字符，不区分大小写</label>
		<label><img src="../configs/code.php" onclick="javascript:this.src='../configs/code.php?tm='+Math.random();" /></label>
		<input type="submit" value="登录" class="submit" name="send" />
	</fieldset>
</form>




</body>
</html><?php }
}
?>