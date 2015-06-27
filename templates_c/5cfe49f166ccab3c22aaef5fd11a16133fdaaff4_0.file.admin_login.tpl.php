<?php /* Smarty version 3.1.24, created on 2015-06-25 14:05:29
         compiled from "E:/develop/wamp/www/CMS/templates/admin_login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:27143558bee8971eab6_81735928%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cfe49f166ccab3c22aaef5fd11a16133fdaaff4' => 
    array (
      0 => 'E:/develop/wamp/www/CMS/templates/admin_login.tpl',
      1 => 1434579706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27143558bee8971eab6_81735928',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558bee89751748_92781476',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558bee89751748_92781476')) {
function content_558bee89751748_92781476 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '27143558bee8971eab6_81735928';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录CMS后台管理系统</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body>

<form id="adminLogin" method="post" action="manage.php?action=login">
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