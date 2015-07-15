<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS内容管理系统</title>
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
</head>
<body>
{include file='header.tpl'}
<div id="list">
  {GetThisColumn assign="thiscolumn"}
  <h2>当前位置 &gt;&gt;{$thiscolumn.column_name}</h2>

  {GetAllArticleList assign="articlelist" url="article.php" limit="5"}
  {foreach from=$articlelist key=key item=item}
  <dl>
    <dt><img src="images/none.jpg" alt="" /></dt>
    <dd>[<strong>{$item.column_name}</strong>] <a href="{$item.url}">{$item.article_title}</a></dd>
    <dd>日期：{$item.article_updatetime} 点击率：224 好评：0</dd>
    <dd>文章摘要：{$item.article_info}...</dd>
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
      <strong><a href="{$item.url}">{$item.column_name}</a></strong>
    {/foreach}
    {/if}
  </div>
  <div class="right">
    <h2>本类推荐</h2>
    <ul>
      <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
      <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
      <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
      <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
      <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
      <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
      <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
    </ul>
  </div>
  <div class="right">
    <h2>本类热点</h2>
    <ul>
      <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
      <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
      <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
      <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
      <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
      <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
      <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
    </ul>
  </div>
  <div class="right">
    <h2>本类图文</h2>
    <ul>
      <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
      <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
      <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
      <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
      <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
      <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
      <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
    </ul>
  </div>
</div>
{include file='footer.tpl'}
</body>
</html>