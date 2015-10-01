<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sidebar</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="sidebar">
<dl>
    {foreach from=$nodeList key=key item=item}
      {if $item.level==1}<dt>{$item.nodeNameCH}</dt>
      {elseif $item.level==2}
        <dd class="secondStage">+ {$item.nodeNameCH}</dd><ul class="thirdStage" style="display: none">
        {foreach from=$nodeList key=key item=item2}{if $item2.level==3&&$item2.parentID==$item.nodeID}<li><a href="../admin/{$item.nodeNameEN}.php?action={$item2.nodeNameEN}" target="main">{$item2.nodeNameCH}</a></li>{/if}
        {/foreach}</ul>
      {/if}
    {/foreach}
</dl>
</body>
<script type="text/javascript" src="../js/admin/NodeList.js"></script>
</html>