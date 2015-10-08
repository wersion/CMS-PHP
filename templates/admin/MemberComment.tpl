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
  {if isset($showComment)&&$showComment == true}
  <table class="table table-hover">
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
          {if isset($update)&&$update == true}<a href="MemberComment.php?action=updateComment&id={$item.commentID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
          {elseif isset($delete)&&$delete == true}<a href="MemberComment.php?action=deleteComment&id={$item.commentID}" onclick="return confirm('确定删除此评论')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
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

  {elseif isset($updateComment)&&$updateComment == true}
      <form method="post">
        <div class="form-group">
          <label for="userName">评论所属文章：</label>
          <input input type="text" name="articleID" class="form-control" placeholder="评论所属文章" value="{$articleID}"/>
        </div>
        <div class="form-group">
          <label for="userName">评论会员ID：</label>
          <input input type="text" name="commentAccountID" class="form-control" placeholder="评论会员ID" value="{$commentAccountID}"/>
        </div>
        <div class="form-group">
          <label for="userName">评论时间：</label>
          <input input type="text" name="commentUpdatetime" class="form-control" placeholder="评论时间" value="{$commentUpdatetime}"/>
        </div>
        <div class="form-group">
          <label for="userName">评论内容：</label>
          <input input type="text" name="commentContent" class="form-control" placeholder="评论内容" value="{$commentContent}"/>
        </div>
        <div class="form-group">
          <label for="userName">赞：</label>
          <input input type="text" name="commentAgree" class="form-control" placeholder="赞：" value="{$commentAgree}"/>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="MemberComment.php?action=updateComment"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
  {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>
