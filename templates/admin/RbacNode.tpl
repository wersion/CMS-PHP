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
  {if isset($showNode)&&$showNode == true}
    <table class="table table-hover">
      <tr><th>ID</th><th>权限结构</th><th>权限名称</th><th>状态</th><th>描述</th><th>父级</th><th>层级</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
      {foreach from=$AllNode key=key item=item}
        <tr>
          <td>{$item.nodeID}</td>
          <td id="struct">{$item.nodeNameCH|indent:$item.level:'---'}</td>
          <td>{$item.nodeNameEN}</td>
          <td>{if $item.status==0}停用{elseif $item.status==1}开启{/if}</td>
          <td>{$item.nodeInfo}</td>
          <td>{$item.parentID}</td>
          <td>{if $item.level==1}系统{elseif $item.level ==2}模块{elseif $item.level ==3}方法{/if}</td>
          <td>
            {if isset($update)&&$update == true}<a href="RbacNode.php?action=updateNode&id={$item.nodeID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
            {elseif isset($delete)&&$delete == true}<a href="RbacNode.php?action=deleteNode&id={$item.nodeID}" onclick="return confirm('确定删除此用户')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
            {/if}
          </td>
        </tr>
      {/foreach}
    </table>
  
    {elseif isset($addNode)&&$addNode == true}
      <form method="post">
          <div class="form-group">
            <label for="roleName">权限中文：</label>
            <input input type="text" name="nodeNameCH" class="form-control" placeholder="权限中文："/>
          </div>
          <div class="form-group">
            <label for="roleName">权限名：</label>
            <input input type="text" name="nodeNameEN" class="form-control" placeholder="权限名："/>
          </div>
          <div class="form-group">
            <label for="roleName">排序：</label>
            <input input type="text" name="nodeSort" class="form-control" placeholder="排序："/>
          </div>
          <div class="form-group">
            权限状态：
            <label class="radio-inline">
              <input type="radio" name="nodeStatus" value="1"> 开启
            </label>
            <label class="radio-inline">
              <input type="radio" name="nodeStatus" value="0"> 停用
            </label>
          </div>
          <div class="form-group">
          <label for="userRole">父级：</label>
          <select class="form-control" name="parentID">
              <option>请选择父级权限</option>
              <option value="0">---顶级----</option>
              {foreach from=$Parent_Node key=key item=item}
              <option value="{$item.nodeID}">{if $item.level ==1}{elseif $item.level ==2}---{elseif $item.level==3}------{/if}{$item.nodeNameCH}</option>
              {/foreach}
          </select>
          <label for="userRole">层级：</label>
          <select class="form-control" name="nodeLevel">
              <option value="1">系统</option>
              <option value="2">模块</option>
              <option value="3">方法</option>
          </select>
        </div>
          <div class="form-group">
            <label for="roleName">权限简介：</label>
            <input input type="text" name="nodeInfo" class="form-control" placeholder="权限简介："/>
          </div>
          <div class="form-group">  
            <input name="send" type="submit" class="btn btn-primary btn-lg" value="新增权限" />
            <a href="RbacNode.php?action=showNode"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
          </div>
      </form>
  
    {elseif isset($updateNode)&&$updateNode == true}
      <form method="post">
          <div class="form-group">
            <label for="roleName">权限中文：</label>
            <input input type="text" name="nodeNameCH" class="form-control" placeholder="权限中文：" value="{$nodeNameCH}"/>
          </div>
          <div class="form-group">
            <label for="roleName">权限名：</label>
            <input input type="text" name="nodeNameEN" class="form-control" placeholder="权限名：" value="{$nodeNameEN}"/>
          </div>
          <div class="form-group">
            <label for="roleName">排序：</label>
            <input input type="text" name="sort" class="form-control" placeholder="排序：" value="{$sort}"/>
          </div>
          <div class="form-group">
            权限状态：
            <label class="radio-inline">
              <input type="radio" name="status" value="1"> 开启
            </label>
            <label class="radio-inline">
              <input type="radio" name="status" value="0"> 停用
            </label>
          </div>
          <div class="form-group">
          <label for="userRole">父级：</label>
          <select class="form-control" name="parentID">
              <option>请选择父级权限</option>
              <option value="0">---顶级----</option>
              {foreach from=$Parent_Node key=key item=item}
              <option value="{$item.nodeID}">{if $item.level ==1}{elseif $item.level ==2}---{elseif $item.level==3}----{/if}{$item.nodeNameCH}</option>
              {/foreach}
          </select>
          <label for="userRole">层级：</label>
          <select class="form-control" name="nodeLevel">
              <option value="1">系统</option>
              <option value="2">模块</option>
              <option value="3">方法</option>
          </select>
        </div>
          <div class="form-group">
            <label for="roleName">权限简介：</label>
            <input input type="text" name="nodeInfo" class="form-control" placeholder="权限简介：" value="{$nodeInfo}"/>
          </div>
          <div class="form-group">  
            <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改权限" />
            <a href="RbacNode.php?action=updateNode"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
          </div>
      </form>
    {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>
