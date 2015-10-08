<?php /* Smarty version 3.1.24, created on 2015-10-08 12:46:28
         compiled from "C:/wamp/www/CMS-PHP/templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:118515615f5243e2036_29408800%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa11cf0d4b176c26e234101b09f3c4b7a4ed146e' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/index.tpl',
      1 => 1444205063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118515615f5243e2036_29408800',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f524482208_45952608',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f524482208_45952608')) {
function content_5615f524482208_45952608 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '118515615f5243e2036_29408800';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id="user">
	<h2>会员信息</h2>
	<form method="post" action="MemberLogin.php?action=memberLogin">
		<label>用户名：<input type="text" name="accountEmail" class="text" /></label>
		<label>密　码：<input type="password" name="accountPassword" class="text" /></label>
		<label>验证码：<input type="text" name="code" class="text code" /></label><br/>
		<p><img src="../configs/code.php" onclick="javascript:this.src='../configs/code.php?tm='+Math.random();" /></p>
		<input type="submit" value="登录" class="submit" name="send" />
		<a href="###">注册会员</a> <a href="###">忘记密码?</a>
	</form>
	</dl>
	<a href="MemberLogin.php?action=memberLogout" target="_parent">退出</a>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</body>
</html><?php }
}
?>