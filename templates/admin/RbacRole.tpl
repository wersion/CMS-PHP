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
    {if isset($showRole)&&$showRole == true}
    <table class="table table-hover">
      <tr><th>ID</th><th>用户组名称</th><th>状态</th><th>用户组描述</th>{if isset($delete)||isset($update)||isset($set)}<th>操作</th>{/if}</tr>
      {foreach from=$AllRole key=key item=item}
        <tr>
          <td>{$item.roleID}</td>
          <td>{$item.roleName}</td>
          <td>{if $item.status==0}停用{elseif $item.status==1}启用{/if}</td>
          <td>{$item.roleInfo}</td>
          <td>
            {if isset($update)&&$update == true}<a href="RbacRole.php?action=updateRole&id={$item.roleID}"><button type="button" class="btn btn-primary btn-sm">修改</button>
            {elseif isset($delete)&&$delete == true}<a href="RbacRole.php?action=deleteRole&id={$item.roleID}" onclick="return confirm('确定删除此用户组')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
            {elseif isset($set)&&$set == true}<a href="RbacRole.php?action=setRole&id={$item.roleID}"><button type="button" class="btn btn-primary btn-sm">配置权限</button></a>
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
  
    {elseif isset($addRole)&&$addRole == true}
      <form method="post">
          <div class="form-group">
            <label for="roleName">用户组名：</label>
            <input input type="text" name="roleName" class="form-control" placeholder="用户组名："/>
          </div>
          <div class="form-group">
            <label for="roleInfo">用户组描述：</label>
            <input input type="text" name="roleInfo" class="form-control" placeholder="用户组描述"/>
          </div>
          <div class="form-group">
            用户组状态：
            <label class="radio-inline">
              <input type="radio" name="roleStatus" value="1"> 开启
            </label>
            <label class="radio-inline">
              <input type="radio" name="roleStatus" value="0"> 停用
            </label>
          </div>
          <div class="form-group">  
            <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
            <a href="RbacRole.php?action=showRole"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
          </div>
      </form>
  
    {elseif isset($updateRole)&&$updateRole == true}
      <form method="post">
          <div class="form-group">
            <label for="roleName">用户组名：</label>
            <input input type="text" name="roleName" class="form-control" placeholder="用户组名：" value="{$roleName}"/>
          </div>
          <div class="form-group">
            <label for="roleInfo">用户组描述：</label>
            <input input type="text" name="roleInfo" class="form-control" placeholder="用户组描述" value="{$roleInfo}"/>
          </div>
          <div class="form-group">
            用户组状态：
            <label class="radio-inline">
              <input type="radio" name="roleStatus" value="1"> 开启
            </label>
            <label class="radio-inline">
              <input type="radio" name="roleStatus" value="0"> 停用
            </label>
          </div>
          <div class="form-group">  
            <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
            <a href="RbacRole.php?action=updateRole"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
          </div> 
      </form>
  
      {elseif isset($setRole)&&$setRole == true}
      <p>正在为“{$rolename}”配置权限</p>
      <form method="post">
        <div class="checkbox">
          {foreach from=$NodeList key=key item=item}
            <p>
              <label>
                <input type="checkbox" name="checkbox[]" value="{$item.nodeID}"  {if $item.access==1}checked="checked"{/if} />{$item.nodeNameCH|indent:$item.level:'---'}
              </label>
            </p>
          {/foreach}
        </div>        
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改权限" />
          <a href="RbacRole.php?action=setRole"><button type="button" class="btn btn-primary btn-lg">返回</button></a>
        </div> 
      </form>
    {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>