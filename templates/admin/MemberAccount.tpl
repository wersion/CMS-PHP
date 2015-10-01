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
  {if isset($showAccount)&&$showAccount == true}
  <table class="list">
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
          {if isset($update)&&$update == true}<a href="MemberAccount.php?action=updateAccount&id={$item.accountID}">[ 修改 ]</a>
          {elseif isset($delete)&&$delete == true}<a href="MemberAccount.php?action=deleteAccount&id={$item.accountID}" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a>
          {/if}
        </td>
      </tr>
    {/foreach}
  </table>

  {elseif isset($addAccount)&&$addAccount == true}
    <form method="post">
      <table class="create">
        <tr><td><p>注册邮箱：</p></td><td><input type="text" name="accountEmail" class="text" /></td></tr>
        <tr><td><p>用户昵称：</p></td><td><input type="text" name="accountNickName" class="text" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="status" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />禁言</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="MemberAccount.php?action=showAccount">返回列表</a> ]</div>
    </form>

  {elseif isset($updateAccount)&&$updateAccount == true}
    <form method="post">
      <table class="create">
        <input type="hIDden" id="pre_url" name="preUrl" value="{$preUrl}">
        <tr><td><p>注册邮箱：</p></td><td><input type="text" name="accountEmail" class="text" value="{$accountEmail}" /></td></tr>
        <tr><td><p>用户昵称：</p></td><td><input type="text" name="accountNickName" class="text" value="{$accountNickName}" /></td></tr>
        <tr><td><p>密码：</p></td><td><input type="text" name="password" class="text" value="{$password}" /></td></tr>
        <tr><td><p>用户状态：</p></td><td><label><input type="radio" name="status" value="1" />开启</label><label><input type="radio" name="userStatus" value="0" />禁言</label></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增用户" class="submit" /> [ <a href="MemberAccount.php?action=updateAccount">返回列表</a> ]</div>
    </form>
  {/if}
</body>
</html>