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
</html>