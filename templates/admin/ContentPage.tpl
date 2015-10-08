<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>单页管理</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
  </head>
  <body class="background">
  <div class="container min-height wite">
    {if isset($showPage)&&$showPage == true}
        <table class="table table-hover">
        <tr><th>ID</th><th>单页名称</th><th>单页描述</th><th>父栏目</th><th>排序</th><th>状态</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
        {foreach from=$AllPage key=key item=item}
          <tr>
            <td>{$item.pageID}</td>
            <td>{$item.pageName}</td>
            <td>{$item.pageInfo}</td>
            <td>{$item.columnName}</td>
            <td>{$item.sort}</td>
            <td>{$item.status}</td>
            <td>
              {if isset($update)&&$update == true}<a href="contentPage.php?action=updatePage&ID={$item.pageID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
              {elseif isset($delete)&&$delete == true}<a href="contentPage.php?action=deletePage&ID={$item.pageID}" onclick="return confirm('确定删除此文章')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
              {/if}
            </td>
          </tr>
        {/foreach}
      </table>
      <div class="page">
        <ul class="pagination">
          {$Page}
        </ul>
      </div>

    {elseif isset($updatePage)&&$updatePage == true}
    <script type="text/javascript" charset="utf-8" src="../js/admin_Page.js"></script>
      <form method="post">
        <input type="hIDden"  name="PageID" value="{$PageID}"/>
        <div class="form-group">
          <label for="title">单页名称</label>
          <input input type="text" name="pageName" class="form-control" id="title" placeholder="标题" value="{$pageName}"/>
        </div>
        <div class="form-group">
          <label for="title">父栏目：</label>
          <select class="form-control" name="parentID">
              <option>请选择父栏目</option>
              {foreach from=$columnList key=key item=item}
              <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="title">排序：</label>
          <input input type="text" name="sort" class="form-control" placeholder="栏目名称" value="{$sort}"/>
        </div>
        <div class="form-group">
          单页状态：
          <label class="radio-inline">
            <input type="radio" name="status" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0"> 停用
          </label>
        </div>
        <div class="form-group">
          <label for="info">单页简介：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="pageInfo">{$pageInfo}</textarea>
        </div>
        <div class="form-group">
          <label for="content">编辑单页内容：</label>
          <textarea id="editor" name="pageContent" type="text/plain" style="wIDth:1024px;height:500px;">{$pageContent}</textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改文档" />
          <a href="ContentPage.php?action=updatePage"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
      <script type="text/javascript">
          var ue = UE.getEditor('editor');
      </script>
    
    {elseif isset($addPage)&&$addPage == true}
    <script type="text/javascript" charset="utf-8" src="../js/admin_content.js"></script>
      <form method="post">
        <div class="form-group">
          <label for="title">单页名称</label>
          <input input type="text" name="pageName" class="form-control" id="title" placeholder="标题"/>
        </div>
        <div class="form-group">
          <label for="title">父栏目：</label>
          <select class="form-control" name="parentID">
              <option>请选择父栏目</option>
              {foreach from=$ColumnList key=key item=item}
              <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="title">排序：</label>
          <input input type="text" name="sort" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          单页状态：
          <label class="radio-inline">
            <input type="radio" name="status" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0"> 停用
          </label>
        </div>
        <div class="form-group">
          <label for="info">单页简介：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="pageInfo"></textarea>
        </div>
        <div class="form-group">
          <label for="content">编辑单页内容：</label>
          <textarea id="editor" name="pageContent" type="text/plain" style="wIDth:1024px;height:500px;"></textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改文档" />
          <a href="ContentPage.php?action=updatePage"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
      <script type="text/javascript">
          var ue = UE.getEditor('editor');
      </script>
    {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>