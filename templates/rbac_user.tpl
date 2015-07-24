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
  {if isset($show)&&$show == true}
  <table class="list">
    <tr><th>ID</th><th>用户名</th><th>所属用户组</th><th>登陆时间</th><th>登陆IP</th><th>状态</th><th>操作</th></tr>
    {foreach from=$AllUser key=key item=item}
      <tr>
        <td>{$item.id}</td>
        <td>{$item.username}</td>
        <td>{$item.user_role}</td>
        <td>{$item.logintime}</td>
        <td>{$item.loginip}</td>
        <td>{if $item.status==0}停用{elseif $item.status==1}开启{/if}</td>
        <td><a href="rbac_user.php?action=update&id={$item.id}">[ 修改 ]</a> | <a href="rbac_user.php?action=delete&id={$item.id}" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="rbac_user.php?action=create">[ 新增用户 ]</a><p>
  <div id="page">{$Page}</div>

  {elseif isset($create)&&$create == true}
    <form method="post">
      <table class="create">
        <tr><td><p>用户名：</p></td><td><input type="text" name="user_name" class="text" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="user_status" value="1" />开启</label><label><input type="radio" name="user_status" value="0" />停用</label></td></tr>
        <tr><td><p>所在用户组：</p></td><td>
          <select name="user_role">
            {foreach from=$Role key=key item=item}
            <option value="{$item.id}">{$item.name}</option>
            {/foreach}
          </select></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="rbac_user.php?action=show">返回列表</a> ]</div>
    </form>

  {elseif isset($update)&&$update == true}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
        <tr><td><p>用户名：</p></td><td><input type="text" name="username" class="text" value="{$user_name}" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" value="{$password}"/></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="user_status" value="1" />开启</label><label><input type="radio" name="user_status" value="0" />停用</label></td></tr>
        <tr><td><p>所在用户组：</p></td><td>
          <select name="user_role">
            {foreach from=$Role key=key item=item}
            <option value="{$item.id}">{$item.name}</option>
            {/foreach}
          </select></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改用户" class="submit" /> [ <a href="rbac_user.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>