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
  {if isset($showColumn)&&$showColumn == true}
  <table class="list" id="show">
    <tr><th>序号</th><th>栏目结构</th><th>栏目描述</th><th>父栏目ID</th><th>栏目层级</th><th>排序</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
    {foreach from=$AllColumn key=key item=item}
      <tr>
        <td>{$item.columnID}</td>
        <td id="struct">{$item.columnName|indent:$item.level:'---'}</td>
        <td>{$item.columnInfo}</td>
        <td>{$item.parentID}</td>
        <td>{$item.level}</td>
        <td><input type="text" class="sort"  name="sort_id" value="{$item.sort}"></td>
        <td>
          {if isset($update)&&$update == true}<a href="ContentColumn.php?action=updateColumn&id={$item.columnID}">[ 修改 ]</a>
          {elseif isset($delete)&&$delete == true}<a href="ContentColumn.php?action=deleteColumn&id={$item.columnID}}" onclick="return confirm('确定删除此文章')?true:false">[ 删除 ]</a>
          {/if}
        </td>      
      </tr>
    {/foreach}
  </table>
  <br><br><br><br><br>

  {elseif isset($addColumn)&&$addColumn == ture}
    <form method="post">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="columnName" class="text" /></td></tr>
        <tr><td><p>父级栏目：</p></td><td><select name="parentID">
                            <option value="0">--顶级栏目--</option>
                            {foreach from=$ColumnList key=key item=item}
                            <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
                            {/foreach}
                          </select></td></tr>
        <tr><td><p>栏目层级：</p></td><td><input type="text" name="level" class="text" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="columnInfo"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>

  {elseif isset($updateColumn)&&$updateColumn == true}
    <form method="post">
      <input type="hidden" id="id" name="columnID" value="{$columnID}"/>
      <input type="hidden" id="pre_url" name="preUrl" value="{$preUrl}">
      <table class="create">
        <tr><td><p>栏目名称：</p></td><td><input type="text" name="columnName" class="text" value="{$columnName}" /></td></tr>
        <tr><td><p>父级栏目：</p></td><td><select name="parentID">
                            <option value="0">--顶级栏目--</option>
                            {foreach from=$ColumnList key=key item=item}
                            <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
                            {/foreach}
                          </select></td></tr>
        <tr><td><p>栏目层级：</p></td><td><input type="text" name="level" class="text" value="{$level}" /></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="sort" class="text" value="{$sort}" /></td></tr>
        <tr><td><p>栏目描述：</p><td><textarea rows="3" cols="20" name="columnInfo">{$columnInfo}</textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改栏目" class="submit" /> [ <a href="javascript:history.go(-1);location.reload()">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>