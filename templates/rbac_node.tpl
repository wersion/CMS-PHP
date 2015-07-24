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
    <tr><th>ID</th><th>权限结构</th><th>权限名称</th><th>状态</th><th>描述</th><th>父级</th><th>层级</th><th>操作</th></tr>
    {foreach from=$AllNode key=key item=item}
      <tr>
        <td>{$item.id}</td>
        <td id="struct">{$item.name|indent:$item.level:'---'}</td>
        <td>{$item.title}</td>
        <td>{if $item.status==0}停用{elseif $item.status==1}开启{/if}</td>
        <td>{$item.info}</td>
        <td>{$item.pid}</td>
        <td>{if $item.level==0}系统{elseif $item.level ==1}模块{elseif $item.level ==2}方法{/if}</td>
        <td><a href="rbac_node.php?action=update&id={$item.id}">[ 修改 ]</a> | <a href="rbac_node.php?action=delete&id={$item.id}" onclick="return confirm('确定删除此权限')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="rbac_node.php?action=create">[ 新增权限 ]</a><p>
  <div id="page">{$Page}</div>

  {elseif isset($create)&&$create == true}
    <form method="post">
      <table class="create">
        <tr><td><p>权限名：</p></td><td><input type="text" name="node_name" class="text" /></td></tr>
        <tr><td><p>权限中文：</p></td><td><input type="text" name="node_title" class="text" /></td></tr>
        <tr><td><p>权限状态：</p></td><td><label><input type="radio" name="node_status" value="1" />开启</label><label><input type="radio" name="node_status" value="0" />停用</label></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="node_sort" class="text" /></td></tr>
        <tr><td><p>父级：</p></td><td>
          <select name="parent_node">
            {foreach from=$Parent_Node key=key item=item}
            <option value="{$item.id}">{if $item.level ==1}{$item.title}{elseif $item.level==2}&nbsp&nbsp{$item.title}{/if}</option>
            {/foreach}
          </select></td></tr>
        <tr><td><p>层级：</p></td><td>          
          <select name="level">
            <option value="1">模块</option>
            <option value="2">方法</option>
          </select></td></tr>
        <tr><td><p>权限简介：</p></td><td><input type="text" name="node_info" class="text" /></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增权限" class="submit" /> [ <a href="rbac_node.php?action=show">返回列表</a> ]</div>
    </form>

  {elseif isset($update)&&$update == true}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
        <tr><td><p>权限名：</p></td><td><input type="text" name="node_name" class="text" value="{$name}" /></td></tr>
        <tr><td><p>权限中文：</p></td><td><input type="text" name="node_title" class="text" value="{$title}" /></td></tr>
        <tr><td><p>权限状态：</p></td><td><label><input type="radio" name="node_status" value="1" />开启</label><label><input type="radio" name="node_status" value="0" />停用</label></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="node_sort" class="text" value="{$sort}" /></td></tr>
        <tr><td><p>父级：</p></td><td>
          <select name="parent_node">
            {foreach from=$Parent_Node key=key item=item}
            <option value="{$item.id}">{if $item.level ==1}{$item.title}{elseif $item.level==2}&nbsp&nbsp{$item.title}{/if}</option>
            {/foreach}
          </select></td></tr>
        <tr><td><p>层级：</p></td><td>          
          <select name="node_level">
            <option value="1">模块</option>
            <option value="2">方法</option>
          </select></td></tr>
        <tr><td><p>权限简介：</p></td><td><input type="text" name="node_info" class="text" value="{$info}" /></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改权限" class="submit" /> [ <a href="rbac_node.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>