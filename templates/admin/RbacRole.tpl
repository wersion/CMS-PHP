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
  {if isset($showRole)&&$showRole == true}
  <table class="list">
    <tr><th>ID</th><th>用户组名称</th><th>状态</th><th>用户组描述</th>{if isset($delete)||isset($update)||isset($set)}<th>操作</th>{/if}</tr>
    {foreach from=$AllRole key=key item=item}
      <tr>
        <td>{$item.roleID}</td>
        <td>{$item.roleName}</td>
        <td>{if $item.status==0}停用{elseif $item.status==1}启用{/if}</td>
        <td>{$item.roleInfo}</td>
        <td>
          {if isset($update)&&$update == true}<a href="RbacRole.php?action=updateRole&id={$item.roleID}">[ 修改 ]
          {elseif isset($delete)&&$delete == true}<a href="RbacRole.php?action=deleteRole&id={$item.roleID}" onclick="return confirm('确定删除此用户组')?true:false">[ 删除 ]</a>
          {elseif isset($set)&&$set == true}<a href="RbacRole.php?action=setRole&id={$item.roleID}">[ 配置权限 ]</a>
          {/if}
        </td>
      </tr>
    {/foreach}
  </table>
  <div id="page">{$Page}</div>

  {elseif isset($addRole)&&$addRole == true}
    <form method="post">
      <table class="create">
        <tr><td><p>用户组名：</p></td><td><input type="text" name="roleName" class="text" /></td></tr>
        <tr><td><p>用户组描述：</p></td><td><input type="text" name="roleInfo" class="text" /></td></tr>
        <tr><td><p>用户组状态：</p></td><td><label><input type="radio" name="roleStatus" value="1" />开启</label><label><input type="radio" name="roleStatus" value="0" />停用</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户组" class="submit" /> [ <a href="RbacRole.php?action=showRole">返回列表</a> ]</div>
    </form>

  {elseif isset($updateRole)&&$updateRole == true}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="preUrl" value="{$preUrl}">
        <tr><td><p>用户组名：</p></td><td><input type="text" name="roleName" class="text" value="{$roleName}" /></td></tr>
        <tr><td><p>用户组描述：</p></td><td><input type="text" name="roleInfo" class="text" value="{$roleInfo}" /></td></tr>
        <tr><td><p>用户组状态：</p></td><td><label><input type="radio" name="roleStatus" value="1" />开启</label><label><input type="radio" name="roleStatus" value="0" />停用</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改用户组" class="submit" /> [ <a href="RbacRole.php?action=show">返回列表</a> ]</div>
    </form>

    {elseif isset($setRole)&&$setRole == true}
    <p style="margin-left: 50px">正在为{$rolename}配置权限</p>
    <form method="post">
      {foreach from=$NodeList key=key item=item}
        <p>
          <lable><input name="checkbox[]" value="{$item.nodeID}" type="checkbox" {if $item.access==1}checked="checked"{/if} />{$item.nodeNameCH|indent:$item.level:'&nbsp&nbsp&nbsp&nbsp'}</lable>
        </p>
      {/foreach}
      <div class="butt"><input type="submit" name="send" value="提交" class="submit" /> [ <a href="RbacRole.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>