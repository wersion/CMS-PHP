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
       用户：{$admin_user} <br>
       用户组：{$admin_role} <br>
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
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>