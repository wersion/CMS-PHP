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
  {if isset($showNode)&&$showNode == true}
  <table class="list">
    <tr><th>ID</th><th>权限结构</th><th>权限名称</th><th>状态</th><th>描述</th><th>父级</th><th>层级</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
    {foreach from=$AllNode key=key item=item}
      <tr>
        <td>{$item.nodeID}</td>
        <td id="struct">{$item.nodeNameCH|indent:$item.level:'---'}</td>
        <td>{$item.nodeNameEN}</td>
        <td>{if $item.status==0}停用{elseif $item.status==1}开启{/if}</td>
        <td>{$item.nodeInfo}</td>
        <td>{$item.parentID}</td>
        <td>{if $item.level==1}系统{elseif $item.level ==2}模块{elseif $item.level ==3}方法{/if}</td>
        <td>
          {if isset($update)&&$update == true}<a href="RbacNode.php?action=updateNode&id={$item.nodeID}">[ 修改 ]</a>
          {elseif isset($delete)&&$delete == true}<a href="RbacNode.php?action=deleteNode&id={$item.nodeID}" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a>
          {/if}
        </td>
      </tr>
    {/foreach}
  </table>

  {elseif isset($addNode)&&$addNode == true}
    <form method="post">
      <table class="create">
        <tr><td><p>权限方法名：</p></td><td><input type="text" name="nodeNameEN" class="text" /></td></tr>
        <tr><td><p>权限中文描述：</p></td><td><input type="text" name="nodeNameCH" class="text" /></td></tr>
        <tr><td><p>权限状态：</p></td><td><label><input type="radio" name="nodeSatatus" value="1" />开启</label><label><input type="radio" name="nodeSatatus" value="0" />停用</label></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="nodeSort" class="text" /></td></tr>
        <tr><td><p>父级：</p></td><td>
          <select name="parentID">
            {foreach from=$Parent_Node key=key item=item}
            <option value="{$item.nodeID}">{if $item.level ==1}{elseif $item.level ==2}&nbsp&nbsp{elseif $item.level==3}&nbsp&nbsp&nbsp&nbsp{/if}{$item.nodeNameCH}</option>
            {/foreach}
          </select></td></tr>
        <tr><td><p>层级：</p></td><td>          
          <select name="nodeLevel">
            <option value="1">系统</option>
            <option value="2">模块</option>
            <option value="3">方法</option>
          </select></td></tr>
        <tr><td><p>权限简介：</p></td><td><input type="text" name="nodeInfo" class="text" /></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增权限" class="submit" /> [ <a href="RbacNode.php?action=show">返回列表</a> ]</div>
    </form>

  {elseif isset($updateNode)&&$updateNode == true}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="preUrl" value="{$preUrl}">
        <tr><td><p>权限名：</p></td><td><input type="text" name="nodeNameCH" class="text" value="{$nodeNameCH}" /></td></tr>
        <tr><td><p>权限中文：</p></td><td><input type="text" name="nodeNameEN" class="text" value="{$nodeNameEN}" /></td></tr>
        <tr><td><p>权限状态：</p></td><td><label><input type="radio" name="status" value="1" />开启</label><label><input type="radio" name="status" value="0" />停用</label></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="sort" class="text" value="{$sort}" /></td></tr>
        <tr><td><p>父级：</p></td><td>
          <select name="parentID">
            {foreach from=$Parent_Node key=key item=item}
            <option value="{$item.nodeID}">{if $item.level ==1}{elseif $item.level ==2}&nbsp&nbsp{elseif $item.level==3}&nbsp&nbsp&nbsp&nbsp{/if}{$item.nodeNameCH}</option>
            {/foreach}
          </select></td></tr>
        <tr><td><p>层级：</p></td><td>          
          <select name="nodeLevel">
            <option value="1">系统</option>
            <option value="2">模块</option>
            <option value="3">方法</option>
          </select></td></tr>
        <tr><td><p>权限简介：</p></td><td><input type="text" name="nodeInfo" class="text" value="{$nodeInfo}" /></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改权限" class="submit" /> [ <a href="RbacNode.php?action=show">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>