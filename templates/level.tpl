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
    <tr><th>等级</th><th>等级名称</th><th>等级描述</th><th>操作</th></tr>
    {foreach $AllLevel as $key=>$value}
      <tr>
        <td>{$value->level}</td>
        <td>{$value->level_name}</td>
        <td>{$value->level_info}</td>
        <td><a href="level.php?action=update&id={$value->id}">[ 修改 ]</a> | <a href="level.php?action=delete&id={$value->id}" onclick="return confirm('确定删除此管理员等级')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="level.php?action=create">[ 新增管理员等级 ]</a><p>
  <div id="page">{$Page}</div>
  
  {elseif isset($create)&&$create == ture}
    <form method="post">
      <table class="create">
        <tr><td><p>等级：</p></td><td><input type="text" name="level" class="text" /></td></tr>
        <tr><td><p>等级名称：</p></td><td><input type="text" name="level_name" class="text" /></td></tr>
        <tr><td><p>等级描述：</p><td><textarea rows="3" cols="20" name="level_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增管理员等级" class="submit" /> [ <a href="level.php?action=show">返回列表</a> ]</div>
    </form>
  
  {elseif isset($update)&&$update == true}
    <form method="post">
      <input type="hidden" id="uesrlevel" name="levelid" value="{$id}"/>
      <table class="create">
        <tr><td><p>等级：</p></td><td><input type="text" name="level" class="text" value="{$level}" /></td></tr>
        <tr><td><p>等级名称：</p></td><td><input type="text" name="level_name" class="text" value="{$level_name}" /></td></tr>
        <tr><td><p>等级描述：</p><td><textarea rows="3" cols="20" name="level_info" >{$level_info}</textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改管理员等级" class="submit" /> [ <a href="level.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>