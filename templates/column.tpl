<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="manage">
  <div class="map">
    内容管理 &gt;&gt; <strong>{$title}</strong>
  </div>
  {if isset($show)&&$show == true}
  <table class="list">
    <tr><th>ID</th><th>栏目名称</th><th>栏目描述</th><th>父栏目ID</th><th>排序</th><th>操作</th></tr>
    {foreach $AllColumn as $key=>$value}
      <tr>
        <td>{$value->id}</td>
        <td>{$value->column_name}</td>
        <td>{$value->column_info}</td>
        <td>{$value->pid}</td>
        <td>{$value->sort}</td>
        <td><a href="column.php?action=showC_Column&pid={$value->id}">[ 子栏目 ]</a> | <a href="column.php?action=update&id={$value->id}">[ 修改 ]</a> | <a href="column.php?action=delete&id={$value->id}" onclick="return confirm('确定删除此栏目')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="column.php?action=create">[ 新增顶级栏目 ]</a><p>
  <div id="page">{$Page}</div>

  {elseif isset($create)&&$create == ture}
    <form method="post">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>父栏目ID：</p></td><td><input type="text" name="pid" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>
  
  {elseif isset($showC_Column)&&$showC_Column == ture}
  <table class="list">
    <tr><th>ID</th><th>栏目名称</th><th>栏目描述</th><th>父栏目</th><th>排序</th><th>操作</th></tr>
    {foreach $AllColumn as $key=>$value}
      <tr>
        <td>{$value->id}</td>
        <td>{$value->column_name}</td>
        <td>{$value->column_info}</td>
        <td>{$f_column}</td>
        <td>{$value->sort}</td>
        <td><a href="column.php?action=showC_Column&pid={$value->id}">[ 子栏目 ]</a> | <a href="column.php?action=update&id={$value->id}">[ 修改 ]</a> | <a href="column.php?action=delete&id={$value->id}" onclick="return confirm('确定删除此栏目')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="column.php?action=createC_Column&pid={$pid}">[ 新增"{$f_column}"子栏目 ]</a><a href="javascript:history.go(-1);location.reload()">[ 返回上一层栏目列表 ]</a><p>
  <div id="page">{$Page}</div>

  {elseif isset($createC_Column)&&$createC_Column == ture}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>

  {elseif isset($update)&&$update == true}
    <form method="post">
      <input type="hidden" id="id" name="column_id" value="{$id}"/>
      <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" value="{$column_name}" /></td></tr>
        <tr><td><p>父栏目ID：</p></td><td><input type="text" name="pid" class="text" value="{$pid}" /></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="sort" class="text" value="{$sort}" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info">{$column_info}</textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>