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
		<tr><th>编号</th><th>用户名</th><th>权限等级</th><th>上次登录IP</th><th>上次登陆时间</th><th>登陆次数</th><th>注册时间</th><th>操作</th></tr>
		{foreach $AllManage as $key=>$value}
			<tr>
        <td>{$key+1}</td>
        <td>{$value->admin_user}</td>
        <td>{$value->level_name}</td>
        <td>{$value->last_ip}</td>
        <td>{$value->last_time}</td>
        <td>{$value->login_count}</td>
        <td>{$value->reg_time}</td>
        <td><a href="manage.php?action=update&id={$value->id}">[ 修改 ]</a> | <a href="manage.php?action=delete&id={$value->id}" onclick="return confirm('确定删除此管理员')?true:false">[ 删除 ]</a></td>
      </tr>
		{/foreach}
	</table>
  <p class="crelink"><a class="crelink" href="manage.php?action=create">[ 新增管理员 ]</a><p>
  <div id="page">{$Page}</div>

  {elseif isset($create)&&$create == true}
    <form method="post">
      <table class="create">
        <tr><td><p>用户名：</p></td><td><input type="text" name="admin_user" class="text" /></td></tr>
        <tr><td><p>密　码：</p></td><td><input type="text" name="admin_pass" class="text" /></td></tr>
        <tr><td><p>密码确认：</p></td><td><input type="text" name="pass_confirm" class="text" /></td></tr>
        <tr><td><p>等　级：</p>
        <td>
          <select name="level">
            {foreach $level as $key=>$value}
            <option value="{$value->level}">{$value->level_name}</option>
            {/foreach}
          </select>
        </td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增管理员" class="submit" /> [ <a href="manage.php?action=show">返回列表</a> ]</div>
    </form>

  {elseif isset($update)&&$update == true}
  <script type="text/javascript" src="../js/admin_manage.js"></script>
    <form method="post">
      <table class="upeate">
        <input type="hidden" id="userid" name="userid" value="{$id}"/>
        <input type="hidden" id="userlv" value="{$lv}"/>
        <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
        <tr><td><p>用户名：</p></td><td><input type="text" name="admin_user" value="{$name}" class="text" /></td></tr>
        <tr><td><p>密　码：</p></td><td><input type="text" name="admin_pass" value="{$pass}" class="text" /></td></tr>
        <tr><td><p>密码确认：</p></td><td><input type="text" name="pass_confirm" value="{$pass}" class="text" /></td></tr>
        <tr><td><p>等　级：</p></td>
        <td>
          <select name="level">
            {foreach $level as $key=>$value}
            <option value="{$value->level}">{$value->level_name}</option>
            {/foreach}
          </select>
        </td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改管理员" class="submit" /> [ <a href="manage.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>