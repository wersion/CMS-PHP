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
  <body class="background">
  <div class="container min-height wite">
    {if isset($showUser)&&$showUser == true}
    <table class="table table-hover">
      <tr><th>ID</th><th>用户名</th><th>所属用户组</th><th>登陆时间</th><th>登陆IP</th><th>状态</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
      {foreach from=$allUser key=key item=item}
        <tr>
          <td>{$item.userID}</td>
          <td>{$item.userName}</td>
          <td>{$item.userRole}</td>
          <td>{$item.loginTime}</td>
          <td>{$item.loginIP}</td>
          <td>{$item.status}</td>
          <td>
            {if isset($update)&&$update == true}<a href="RbacUser.php?action=updateUser&ID={$item.userID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
            {elseif isset($delete)&&$delete == true}<a href="RbacUser.php?action=deleteUser&ID={$item.userID}" onclick="return confirm('确定删除此用户')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
            {/if}
          </td>
        </tr>
      {/foreach}
    </table>
    <div class="page">
        <ul class="pagination">
          {$Page}
        </ul>
    </div>
  
    {elseif isset($addUser)&&$addUser == true}
      <form method="post">
        <div class="form-group">
          <label for="userName">用户名：</label>
          <input input type="text" name="userName" class="form-control" placeholder="用户名"/>
        </div>
        <div class="form-group">
          <label for="password">密码：</label>
          <input input type="password" name="password" class="form-control" placeholder="密码"/>
        </div>
        <div class="form-group">
          <label for="userRole">所在用户组：</label>
          <select class="form-control" name="userRole">
              <option>---请选择用户组---</option>
              {foreach from=$Role key=key item=item}
              <option value="{$item.roleID}">{$item.roleName}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          用户状态：
          <label class="radio-inline">
            <input type="radio" name="userStatus" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="userStatus" value="0"> 停用
          </label>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="RbacUser.php?action=showUser"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
  
    {elseif isset($updateUser)&&$update == true}
      <form method="post">
        <div class="form-group">
          <label for="userName">用户名：</label>
          <input input type="text" name="userName" class="form-control" placeholder="用户名" value="{$userName}"/>
        </div>
        <div class="form-group">
          <label for="password">密码：</label>
          <input input type="password" name="password" class="form-control" placeholder="密码" value="{$userName}"/>
        </div>
        <div class="form-group">
          <label for="userRole">所在用户组：</label>
          <select class="form-control" name="userRole">
              <option>---请选择用户组---</option>
              {foreach from=$userRole key=key item=item}
              <option value="{$item.roleID}">{$item.roleName}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          用户状态：
          <label class="radio-inline">
            <input type="radio" name="userStatus" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="userStatus" value="0"> 停用
          </label>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="RbacUser.php?action=updateUser"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
    {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>