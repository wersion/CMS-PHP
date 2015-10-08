<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
</head>
<body>
{include file='header.tpl'}
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
{include file='footer.tpl'}
</body>
</html>