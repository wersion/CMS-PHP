<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章管理</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
  </head>
  <body class="background">
  <div class="container min-height wite">
    {if isset($showArticle)&&$showArticle == true}
        <table class="table table-hover">
        <tr><th>序号</th><th>所属栏目</th><th>标题</th><th>文章描述</th><th>更新时间</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
        {foreach from=$AllArticle key=key item=item}
          <tr>
            <td>{$key+1}</td>
            <td>{$item.columnName}</td>
            <td>{$item.articleTitle}</td>
            <td>{$item.articleInfo}</td>
            <td>{$item.articleUpdatetime}</td>
            <td>
              {if isset($update)&&$update == true}<a href="contentArticle.php?action=updateArticle&ID={$item.articleID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
              {elseif isset($delete)&&$delete == true}<a href="contentArticle.php?action=deleteArticle&ID={$item.articleID}" onclick="return confirm('确定删除此文章')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
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

    {elseif isset($updateArticle)&&$updateArticle == true}
    <script type="text/javascript" charset="utf-8" src="../js/admin_article.js"></script>
      <form method="post">
      <input type="hIDden"  name="articleID" value="{$articleID}"/>
      <input type="hIDden"  value="{$columnID}">
      <form method="post">
        <div class="form-group">
          <label for="title">文档标题：</label>
          <input input type="text" name="articleTitle" class="form-control" id="title" placeholder="标题" value="{$articleTitle}"/>
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="columnID">
              <option>请选择文章栏目</option>
              {foreach from=$columnList key=key item=item}
              <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="InputFile">缩略图</label>
          <input type="file" id="InputFile">
        </div>
        <div class="form-group">
          <label for="info">文章摘要：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="articleInfo">{$articleInfo}</textarea>
        </div>
        <div class="form-group">
          <label for="content">文编辑文章内容：</label>
          <textarea id="editor" name="articleContent" type="text/plain" style="wIDth:1024px;height:500px;">{$articleContent}</textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="发布文档" />
          <a href="ContentArticle.php?action=updateArticle"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
      <script type="text/javascript">
          var ue = UE.getEditor('editor');
      </script>
    
    {elseif isset($addArticle)&&$addArticle == true}
    <script type="text/javascript" charset="utf-8" src="../js/admin_content.js"></script>
      <form method="post">
        <div class="form-group">
          <label for="title">文档标题：</label>
          <input input type="text" name="articleTitle" class="form-control" id="title" placeholder="标题">
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="columnID">
              <option>请选择文章栏目</option>
              {foreach from=$ColumnList key=key item=item}
              <option value="{$item.columnID}">{$item.columnName|indent:$item.level:'---'}</option>
              {/foreach}
          </select>
        </div>
        <div class="form-group">
          <label for="InputFile">缩略图</label>
          <input type="file" id="InputFile">
        </div>
        <div class="form-group">
          <label for="info">文章摘要：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="articleInfo"/></textarea>
        </div>
        <div class="form-group">
          <label for="content">文编辑文章内容：</label>
          <textarea id="editor" type="text/plain" style="wIDth:1024px;height:500px;" name="articleContent"></textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="发布文档" />
          <a href="ContentArticle.php?action=showArticle"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
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