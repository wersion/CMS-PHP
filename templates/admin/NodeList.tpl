<!DOCTYPE html>
<html lang="zh-CN" class="node-list ">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="background node-list font">
    <div class="gray node-list ">
      {foreach from=$nodeList key=key item=item}
        {if $item.level==1}<dt>{$item.nodeNameCH}</dt>
        {elseif $item.level==2}
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle btn-sm node-list-but" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {$item.nodeNameCH}&nbsp&nbsp<span class="glyphicon glyphicon-menu-down"></span>
            </button>
            <ul class="dropdown-menu">
              {foreach from=$nodeList key=key item=item2}{if $item2.level==3&&$item2.parentID==$item.nodeID}<li><a href="../admin/{$item.nodeNameEN}.php?action={$item2.nodeNameEN}" target="main">{$item2.nodeNameCH}</a></li>{/if}
              {/foreach}</ul>
            </ul>
          </div>
        {/if}
      {/foreach}
    </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>