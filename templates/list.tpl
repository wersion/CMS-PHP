<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <link href="../style/admin.css" rel="stylesheet">
  </head>
  <body class="">
    {include file='header.tpl'}
    <div id="list">
      {GetThisColumn assign="thiscolumn"}
      <h2>当前位置 &gt;&gt;{$thiscolumn.columnName}</h2>
    
      {GetAllArticleList assign="articlelist" url="Article.php" limit="5"}
      {foreach from=$articlelist key=key item=item}
      <dl>
        <dt><img src="images/none.jpg" alt="" /></dt>
        <dd>[<strong>{$item.columnName}</strong>] <a href="{$item.url}">{$item.articleTitle}</a></dd>
        <dd>日期：{$item.articleUpdatetime} 点击率：224 好评：0</dd>
        <dd>文章摘要：{$item.articleInfo}...</dd>
      </dl>
      {/foreach}
      <nav>
        <ul class="pagination">
            {$Page}
        </ul>
      </nav>
    </div>
    <div id="sidebar">
      <div class="nav">
        <h2>子栏目列表</h2>
        {GetSubColumn assign="subcolumn" url="list.php" limit="4"}
        {if isset($subcolumn)}
        {foreach from=$subcolumn key=key item=item}
          <strong><a href="{$item.url}">{$item.columnName}</a></strong>
        {/foreach}
        {/if}
      </div>
    </div>
    {include file='footer.tpl'}
    <script src="../js/jq/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>