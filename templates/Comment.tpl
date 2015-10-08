  {GetComment assign="comment"}
  <div id="newComment" style="display:none">有新评论，点击这里加载</div>
  <ul id="commentList">
    {foreach from=$comment item=item key=key}
    <li id="{$item.commentID}">
      评论用户：{$item.accountNickName}
      发表时间：{$item.commentUpdatetime}
      赞：<a id="{$item.commentID}" class="agree">{$item.commentAgree}</a>
      评论内容：{$item.commentContent}
    </li>
    {/foreach}
  </ul>
 <div>
	发表评论：
	<form id="comment">
		<input type="hidden" id="articleID" name="articleID" {if isset($article)}value="{$article.articleID}" {elseif isset($page)}value="{$page.pageID} {/if}"/>
		<textarea name="commentContent" id="comment" cols="40" rows="2" placeholder="请输入评论"></textarea>
	
		<input id="subButton" type="button" url='123' value="提交评论"/>
	</form>
</div>