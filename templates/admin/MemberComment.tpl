<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="manage">
  <div class="map">
    管理首页 &gt;&gt; 管理员管理&gt;&gt;<strong>{$title}</strong>
  </div>
  {if isset($showComment)&&$showComment == true}
  <table class="list">
    <tr><th>ID</th><th>评论所属文章</th><th>评论会员ID</th><th>评论时间</th><th>评论内容</th><th>赞</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
    {foreach from=$AllComment key=key item=item}
      <tr>
        <td>{$item.commentID}</td>
        <td>{$item.articleID}</td>
        <td>{$item.commentAccountID}</td>
        <td>{$item.commentUpdatetime}</td>
        <td>{$item.commentContent}</td>
        <td>{$item.commentAgree}</td>
        <td>
          {if isset($update)&&$update == true}<a href="MemberComment.php?action=updateComment&id={$item.commentID}">[ 修改 ]</a>
          {elseif isset($delete)&&$delete == true}<a href="MemberComment.php?action=deleteComment&id={$item.commentID}" onclick="return confirm('确定删除此评论')?true:false">[ 删除 ]</a>
          {/if}
        </td>
      </tr>
    {/foreach}
  </table>

  {elseif isset($updateComment)&&$updateComment == true}
    <form method="post">
      <table class="create">
        <input type="hIDden" id="pre_url" name="preUrl" value="{$preUrl}">
          <tr><td><p>评论所属文章：</p></td><td><input type="text" name="articleID" class="text" value="{$articleID}"/></td></tr>
          <tr><td><p>评论会员ID：</p></td><td><input type="text" name="commentAccountID" class="text" value="{$commentAccountID}"/></td></tr>
          <tr><td><p>评论时间：</p></td><td><input type="text" name="commentUpdatetime" class="text" value="{$commentUpdatetime}"/></td></tr>
          <tr><td><p>评论内容：</p></td><td><input type="text" name="commentContent" class="text" value="{$commentContent}"/></td></tr>
          <tr><td><p>赞：</p></td><td><input type="text" name="commentAgree" class="text" value="{$commentAgree}"/></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改评论" class="submit" /> [ <a href="MemberComment.php?action=updateComment">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>