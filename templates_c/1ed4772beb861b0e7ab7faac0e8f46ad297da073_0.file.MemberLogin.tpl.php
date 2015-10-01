<?php /* Smarty version 3.1.24, created on 2015-10-01 15:31:25
         compiled from "C:/wamp/www/CMS-PHP/templates/MemberLogin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1482560ce14dc79889_42467512%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ed4772beb861b0e7ab7faac0e8f46ad297da073' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/MemberLogin.tpl',
      1 => 1443683180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1482560ce14dc79889_42467512',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_560ce14dca68a6_17341789',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560ce14dca68a6_17341789')) {
function content_560ce14dca68a6_17341789 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1482560ce14dc79889_42467512';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../style/index.css">
</head>
<body>
<div id="user">
	<h2>会员信息</h2>
	<form method="post" action="MemberLogin.php?action=memberLogin">
		<label>邮箱或用户名：<input type="text" name="accountEmail" class="text" /></label>
		<label>密　码：<input type="password" name="accountPassword" class="text" /></label>
		<label>验证码：<input type="text" name="code" class="text code" /></label><br/>
		<p><img src="../configs/code.php" onclick="javascript:this.src='../configs/code.php?tm='+Math.random();" /></p>
		<input type="submit" value="登录" class="submit" name="send" />
		<a href="###">注册会员</a> <a href="###">忘记密码?</a>
	</form>
	</dl>
</div>
</body>
</html><?php }
}
?>