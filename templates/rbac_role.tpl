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
    <tr><th>ID</th><th>用户组名称</th><th>状态</th><th>用户组描述</th><th>操作</th></tr>
    {foreach from=$AllRole key=key item=item}
      <tr>
        <td>{$item.id}</td>
        <td>{$item.name}</td>
        <td>{if $item.status==0}停用{elseif $item.status==1}启用{/if}</td>
        <td>{$item.info}</td>
        <td><a href="rbac_role.php?action=setrole&id={$item.id}">[ 配置权限 ]</a> | <a href="rbac_role.php?action=update&id={$item.id}">[ 修改 ]</a> | <a href="rbac_role.php?action=delete&id={$item.id}" onclick="return confirm('确定删除此用户组')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="rbac_role.php?action=create">[ 新增用户组 ]</a><p>
  <div id="page">{$Page}</div>

  {elseif isset($create)&&$create == true}
    <form method="post">
      <table class="create">
        <tr><td><p>用户组名：</p></td><td><input type="text" name="role_name" class="text" /></td></tr>
        <tr><td><p>用户组描述：</p></td><td><input type="text" name="role_info" class="text" /></td></tr>
        <tr><td><p>用户组状态：</p></td><td><label><input type="radio" name="role_status" value="1" />开启</label><label><input type="radio" name="role_status" value="0" />停用</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户组" class="submit" /> [ <a href="rbac_role.php?action=show">返回列表</a> ]</div>
    </form>

  {elseif isset($update)&&$update == true}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
        <tr><td><p>用户组名：</p></td><td><input type="text" name="role_name" class="text" value="{$name}" /></td></tr>
        <tr><td><p>用户组描述：</p></td><td><input type="text" name="role_info" class="text" value="{$info}" /></td></tr>
        <tr><td><p>用户组状态：</p></td><td><label><input type="radio" name="role_status" value="1" />开启</label><label><input type="radio" name="role_status" value="0" />停用</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改用户组" class="submit" /> [ <a href="rbac_role.php?action=show">返回列表</a> ]</div>
    </form>

    {elseif isset($setrole)&&$setrole == true}
    <p style="margin-left: 50px">正在为{$rolename}配置权限</p>
    <form method="post">
      {foreach from=$NodeList key=key item=item}
        <p>
          <lable><input name="checkbox[]" value="{$item.id}" type="checkbox" {if $item.access==1}checked="checked"{/if} />{$item.title|indent:$item.level:'&nbsp&nbsp&nbsp&nbsp'}</lable>
        </p>
      {/foreach}
      <div class="butt"><input type="submit" name="send" value="提交" class="submit" /> [ <a href="rbac_role.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>