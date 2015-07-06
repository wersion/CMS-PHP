<?php /* Smarty version 3.1.24, created on 2015-07-06 15:07:30
         compiled from "F:/develop/wamp/www/CMS/templates/admin_login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:29827559a29327adb41_74041184%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c76ea4794cb805af85f94ace921de689d2774e7' => 
    array (
      0 => 'F:/develop/wamp/www/CMS/templates/admin_login.tpl',
      1 => 1435495814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29827559a29327adb41_74041184',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559a29327d8ad0_08847883',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a29327d8ad0_08847883')) {
function content_559a29327d8ad0_08847883 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '29827559a29327adb41_74041184';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录CMS后台管理系统</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body>

<form id="adminLogin" method="post" action="admin_login.php?action=login">
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