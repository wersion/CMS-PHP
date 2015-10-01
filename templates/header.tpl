<div id="top">

</div>
<div id="header">
</div>
<div id="nav">
	<ul>
		{GetAllTopColumn assign="column" url="List.php" limit="10"}
		{foreach from=$column key=key item=item}
			<li><a href="{$item.url}">{$item.columnName}</a></li>
		{/foreach}
 </ul>
</div>
<div id="search">
	<form>
		<select name="search">
			<option selected="selected">按标题</option>
			<option>按关键字</option>
			<option>全局查询</option>
		</select>
		<input type="text" name="keyword" class="text" />
		<input type="submit" name="send" class="submit" value="搜索" />
	</form>
</div>