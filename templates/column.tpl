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
  {if isset($Show)&&$Show == true}
  <table class="list" id="show">
    <tr><th>序号</th><th>栏目结构</th><th>栏目描述</th><th>父栏目ID</th><th>排序</th><th>操作</th></tr>
    {foreach from=$AllColumn key=key item=item}
      <tr>
        <td>{$key+1}</td>
        <td id="struct">{$item.column_name|indent:$item.level:'---'}</td>
        <td>{$item.column_info}</td>
        <td>{$item.pid}</td>
        <td><input type="text" class="sort"  name="sort_id" value="{$item.sort}"></td>
        <td><a href="column.php?action=AddSubColumn&pid={$item.id}">[ 增加子栏目 ]</a> | <a href="column.php?action=Update&id={$item.id}">[ 修改 ]</a> | <a href="column.php?action=Delete&id={$item.id}" onclick="return confirm('确定删除此栏目')?true:false">[ 删除 ]</a></td>
      </tr>
    {/foreach}
  </table>
  <p class="crelink"><a class="crelink" href="column.php?action=Add">[ 新增顶级栏目 ]</a><p>

  {elseif isset($Add)&&$Add == ture}
    <form method="post">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>父级栏目：</p></td><td><select name="pid">
                            {foreach from=$ColumnList key=key item=item}
                            <option value="{$item.id}">{$item.column_name|indent:$item.level:'---'}</option>
                            {/foreach}
                          </select></td></tr>
        <tr><td><p>栏目层级：</p></td><td><input type="text" name="level" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>

  {elseif isset($AddSubColumn)&&$AddSubColumn == ture}
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" /></td></tr>
        <tr><td><p>栏目层级：</p></td><td><input type="text" name="level" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>

  {elseif isset($Update)&&$Update == true}
    <form method="post">
      <input type="hidden" id="id" name="column_id" value="{$id}"/>
      <input type="hidden" id="pre_url" name="pre_url" value="{$pre_url}">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="column_name" class="text" value="{$column_name}" /></td></tr>
        <tr><td><p>父级栏目：</p></td><td><select name="pid">
                            {foreach from=$ColumnList key=key item=item}
                            <option value="{$item.id}">{$item.column_name|indent:$item.level:'---'}</option>
                            {/foreach}
                          </select></td></tr>
        <tr><td><p>栏目层级：</p></td><td><input type="text" name="level" class="text" value="{$level}" /></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="sort" class="text" value="{$sort}" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="column_info">{$column_info}</textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>