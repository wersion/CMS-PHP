<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="manage">
  <div class="map">
    管理首页 &gt;&gt; 管理员管理&gt;&gt;<strong>{$title}</strong>
  </div>
  {if isset($showUser)&&$showUser == true}
  <table class="list">
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
          {if isset($update)&&$update == true}<a href="RbacUser.php?action=updateUser&ID={$item.userID}">[ 修改 ]</a>
          {elseif isset($delete)&&$delete == true}<a href="RbacUser.php?action=deleteUser&ID={$item.userID}" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a>
          {/if}
        </td>
      </tr>
    {/foreach}
  </table>
  <div id="page">{$Page}</div>

  {elseif isset($addUser)&&$addUser == true}
    <form method="post">
      <table class="create">
        <tr><td><p>用户名：</p></td><td><input type="text" name="userName" class="text" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="userStatus" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />停用</label></td></tr>
        <tr><td><p>所在用户组：</p></td><td>
          <select name="userRole">
            {foreach from=$Role key=key item=item}
            <option value="{$item.roleID}">{$item.roleName}</option>
            {/foreach}
          </select></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="rbac_user.php?action=show">返回列表</a> ]</div>
    </form>

  {elseif isset($updateUser)&&$update == true}
    <form method="post">
      <table class="create">
        <input type="hIDden" id="pre_url" name="preUrl" value="{$preUrl}">
        <tr><td><p>用户名：</p></td><td><input type="text" name="userName" class="text" value="{$userName}" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" value="{$password}"/></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="userStatus" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />停用</label></td></tr>
        <tr><td><p>所在用户组：</p></td><td>
          <select name="userRole">
            {foreach from=$userRole key=key item=item}
            <option value="{$item.roleID}">{$item.roleName}</option>
            {/foreach}
          </select></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改用户" class="submit" /> [ <a href="rbac_user.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>