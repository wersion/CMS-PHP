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
<div id="content">
  {GetContent assign="content"}
  <h2>当前位置 &gt;&gt;{$content.columnName}</h2>
  <h1>{$content.articleTitle},{$content.articleID}</h1> <br>
  更新时间：{$content.articleUpdatetime} <br><br>
  {$content.articleContent}
  
  {include file='comment.tpl'}
</div>
{include file='footer.tpl'}
<script type="text/javascript" src="../js/ajax/MyAjaxTool.js"></script>
<script type="text/javascript" src="../js/ajax/Comment.js"></script>
</body>
</html>