<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="background">
  <div class="container min-height wite">
    {if isset($showColumn)&&$showColumn == true}
    <table class="table table-hover">
      <tr><th>序号</th><th>栏目结构</th><th>栏目描述</th><th>父栏目ID</th><th>栏目层级</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
      {foreach from=$AllColumn key=key item=item}
        <tr>
          <td>{$item.columnID}</td>
          <td id="struct">{$item.columnName|indent:$item.level:'---'}</td>
          <td>{$item.columnInfo}</td>
          <td>{$item.parentID}</td>
          <td>{$item.level}</td>
          <td>
            {if isset($update)&&$update == true}<a href="ContentColumn.php?action=updateColumn&id={$item.columnID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
            {elseif isset($delete)&&$delete == true}<a href="ContentColumn.php?action=deleteColumn&id={$item.columnID}}" onclick="return confirm('确定删除此文章')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
            {/if}
          </td>      
        </tr>
      {/foreach}
    </table>
    <br><br><br><br><br>
  
    {elseif isset($addColumn)&&$addColumn == ture}
      <form method="post">
        <div class="form-group">
          <label for="title">栏目名称：</label>
          <input input type="text" name="columnName" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="parentID">
              <option>请选择文章栏目</option>
              <option value="0">---顶级栏目---</option>
              {foreach from=$ColumnList key=key item=item}
              <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="title">栏目层级：</label>
          <input input type="text" name="level" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          <label for="title">排序：</label>
          <input input type="text" name="sort" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          <label for="info">栏目描述：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="columnInfo"></textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改" />
          <a href="ContentColumn.php?action=showColumn"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
  
    {elseif isset($updateColumn)&&$updateColumn == true}
      <form method="post">
        <div class="form-group">
          <label for="title">栏目名称：</label>
          <input input type="text" name="columnName" class="form-control" placeholder="栏目名称" value="{$columnName}"/>
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="parentID">
              <option>请选择文章栏目</option>
              <option value="0">---顶级栏目---</option>
              {foreach from=$ColumnList key=key item=item}
              <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="title">栏目层级：</label>
          <input input type="text" name="level" class="form-control" placeholder="栏目名称" value="{$level}"/>
        </div>
        <div class="form-group">
          <label for="title">排序：</label>
          <input input type="text" name="sort" class="form-control" placeholder="栏目名称" value="{$sort}"/>
        </div>
        <div class="form-group">
          <label for="info">栏目描述：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="columnInfo">{$columnInfo}</textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改" />
          <a href="ContentColumn.php?action=updateColumn"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
    {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>