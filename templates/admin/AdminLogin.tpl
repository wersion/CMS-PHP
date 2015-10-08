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
    <script src="../js/jq/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>