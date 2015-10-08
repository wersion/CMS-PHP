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
  {if isset($showAccount)&&$showAccount == true}
  <table class="table table-hover">
    <tr><th>ID</th><th>注册邮箱</th><th>会员昵称</th><th>会员密码</th><th>注册时间</th><th>状态</th>{if isset($delete)||isset($update)}<th>操作</th>{/if}</tr>
    {foreach from=$AllAccount key=key item=item}
      <tr>
        <td>{$item.accountID}</td>
        <td>{$item.accountEmail}</td>
        <td>{$item.accountNickName}</td>
        <td>******</td>
        <td>{$item.signUpTime}</td>
        <td>{if $item.status==0}禁言{elseif $item.status==1}正常{/if}</td>
        <td>
          {if isset($update)&&$update == true}<a href="MemberAccount.php?action=updateAccount&id={$item.accountID}"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
          {elseif isset($delete)&&$delete == true}<a href="MemberAccount.php?action=deleteAccount&id={$item.accountID}" onclick="return confirm('确定删除此用户')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
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

  {elseif isset($addAccount)&&$addAccount == true}
    <form method="post">
        <div class="form-group">
          <label for="userName">注册邮箱：</label>
          <input input type="text" name="accountEmail" class="form-control" placeholder="注册邮箱"/>
        </div>
        <div class="form-group">
          <label for="userName">用户昵称：</label>
          <input input type="text" name="accountNickName" class="form-control" placeholder="用户昵称："/>
        </div>
        <div class="form-group">
          <label for="userName">密码：</label>
          <input input type="password" name="password" class="form-control" placeholder="密码"/>
        </div>
        <div class="form-group">
          用户状态：
          <label class="radio-inline">
            <input type="radio" name="status" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0"> 停用
          </label>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="MemberAccount.php?action=showAccount"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
    </form>

  {elseif isset($updateAccount)&&$updateAccount == true}
    <form method="post">
        <div class="form-group">
          <label for="userName">注册邮箱：</label>
          <input input type="text" name="accountEmail" class="form-control" placeholder="注册邮箱" value="{$accountEmail}"/>
        </div>
        <div class="form-group">
          <label for="userName">用户昵称：</label>
          <input input type="text" name="accountNickName" class="form-control" placeholder="用户昵称：" value="{$accountNickName}"/>
        </div>
        <div class="form-group">
          <label for="userName">密码：</label>
          <input input type="password" name="password" class="form-control" placeholder="密码" value="{$password}"/>
        </div>
        <div class="form-group">
          用户状态：
          <label class="radio-inline">
            <input type="radio" name="status" value="1"> 开启
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0"> 停用
          </label>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="MemberAccount.php?action=updateAccount"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
    </form>
  {/if}
  </div>
	<script src="../js/jq/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>