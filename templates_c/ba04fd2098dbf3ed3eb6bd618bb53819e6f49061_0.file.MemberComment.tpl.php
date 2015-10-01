<?php /* Smarty version 3.1.24, created on 2015-09-27 09:49:23
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/MemberComment.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:365856074b23a33390_19158552%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba04fd2098dbf3ed3eb6bd618bb53819e6f49061' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/MemberComment.tpl',
      1 => 1443318561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '365856074b23a33390_19158552',
  'variables' => 
  array (
    'title' => 0,
    'showComment' => 0,
    'delete' => 0,
    'update' => 0,
    'AllComment' => 0,
    'item' => 0,
    'updateComment' => 0,
    'preUrl' => 0,
    'articleID' => 0,
    'commentAccountID' => 0,
    'commentUpdatetime' => 0,
    'commentContent' => 0,
    'commentAgree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56074b23b239d0_48525376',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56074b23b239d0_48525376')) {
function content_56074b23b239d0_48525376 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '365856074b23a33390_19158552';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id="manage">
  <div class="map">
    管理首页 &gt;&gt; 管理员管理&gt;&gt;<strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
  </div>
  <?php if (isset($_smarty_tpl->tpl_vars['showComment']->value) && $_smarty_tpl->tpl_vars['showComment']->value == true) {?>
  <table class="list">
    <tr><th>ID</th><th>评论所属文章</th><th>评论会员ID</th><th>评论时间</th><th>评论内容</th><th>赞</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value)) {?><th>操作</th><?php }?></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllComment']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['commentID'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['articleID'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['commentAccountID'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['commentUpdatetime'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['commentContent'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['commentAgree'];?>
</td>
        <td>
          <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="MemberComment.php?action=updateComment&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['commentID'];?>
">[ 修改 ]</a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="MemberComment.php?action=deleteComment&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['commentID'];?>
" onclick="return confirm('确定删除此评论')?true:false">[ 删除 ]</a>
          <?php }?>
        </td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </table>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateComment']->value) && $_smarty_tpl->tpl_vars['updateComment']->value == true) {?>
    <form method="post">
      <table class="create">
        <input type="hIDden" id="pre_url" name="preUrl" value="<?php echo $_smarty_tpl->tpl_vars['preUrl']->value;?>
">
          <tr><td><p>评论所属文章：</p></td><td><input type="text" name="articleID" class="text" value="<?php echo $_smarty_tpl->tpl_vars['articleID']->value;?>
"/></td></tr>
          <tr><td><p>评论会员ID：</p></td><td><input type="text" name="commentAccountID" class="text" value="<?php echo $_smarty_tpl->tpl_vars['commentAccountID']->value;?>
"/></td></tr>
          <tr><td><p>评论时间：</p></td><td><input type="text" name="commentUpdatetime" class="text" value="<?php echo $_smarty_tpl->tpl_vars['commentUpdatetime']->value;?>
"/></td></tr>
          <tr><td><p>评论内容：</p></td><td><input type="text" name="commentContent" class="text" value="<?php echo $_smarty_tpl->tpl_vars['commentContent']->value;?>
"/></td></tr>
          <tr><td><p>赞：</p></td><td><input type="text" name="commentAgree" class="text" value="<?php echo $_smarty_tpl->tpl_vars['commentAgree']->value;?>
"/></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改评论" class="submit" /> [ <a href="MemberComment.php?action=updateComment">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>