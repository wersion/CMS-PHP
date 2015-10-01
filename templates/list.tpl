<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
<link rel="stylesheet" type="text/css" href="../style/basic.css" />
<link rel="stylesheet" type="text/css" href="../style/list.css" />
</head>
<body>
{include file='header.tpl'}
<div id="list">
  {GetThisColumn assign="thiscolumn"}
  <h2>当前位置 &gt;&gt;{$thiscolumn.columnName}</h2>

  {GetAllArticleList assign="articlelist" url="Content.php" limit="5"}
  {foreach from=$articlelist key=key item=item}
  <dl>
    <dt><img src="images/none.jpg" alt="" /></dt>
    <dd>[<strong>{$item.columnName}</strong>] <a href="{$item.url}">{$item.articleTitle}</a></dd>
    <dd>日期：{$item.articleUpdatetime} 点击率：224 好评：0</dd>
    <dd>文章摘要：{$item.articleInfo}...</dd>
  </dl>
  {/foreach}
  <div id="page">{$Page}</div>
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
</body>
</html>