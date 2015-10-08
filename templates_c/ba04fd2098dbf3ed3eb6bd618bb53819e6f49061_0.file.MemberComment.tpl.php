<?php /* Smarty version 3.1.24, created on 2015-10-08 12:46:25
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/MemberComment.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:171785615f521cdb378_57305121%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba04fd2098dbf3ed3eb6bd618bb53819e6f49061' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/MemberComment.tpl',
      1 => 1444117415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171785615f521cdb378_57305121',
  'variables' => 
  array (
    'showComment' => 0,
    'delete' => 0,
    'update' => 0,
    'AllComment' => 0,
    'item' => 0,
    'Page' => 0,
    'updateComment' => 0,
    'articleID' => 0,
    'commentAccountID' => 0,
    'commentUpdatetime' => 0,
    'commentContent' => 0,
    'commentAgree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f521db6904_37680386',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f521db6904_37680386')) {
function content_5615f521db6904_37680386 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '171785615f521cdb378_57305121';
?>
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
  <?php if (isset($_smarty_tpl->tpl_vars['showComment']->value) && $_smarty_tpl->tpl_vars['showComment']->value == true) {?>
  <table class="table table-hover">
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
"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="MemberComment.php?action=deleteComment&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['commentID'];?>
" onclick="return confirm('确定删除此评论')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
          <?php }?>
        </td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </table>
    <div class="page">
      <ul class="pagination">
        <?php echo $_smarty_tpl->tpl_vars['Page']->value;?>

      </ul>
    </div>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateComment']->value) && $_smarty_tpl->tpl_vars['updateComment']->value == true) {?>
      <form method="post">
        <div class="form-group">
          <label for="userName">评论所属文章：</label>
          <input input type="text" name="articleID" class="form-control" placeholder="评论所属文章" value="<?php echo $_smarty_tpl->tpl_vars['articleID']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="userName">评论会员ID：</label>
          <input input type="text" name="commentAccountID" class="form-control" placeholder="评论会员ID" value="<?php echo $_smarty_tpl->tpl_vars['commentAccountID']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="userName">评论时间：</label>
          <input input type="text" name="commentUpdatetime" class="form-control" placeholder="评论时间" value="<?php echo $_smarty_tpl->tpl_vars['commentUpdatetime']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="userName">评论内容：</label>
          <input input type="text" name="commentContent" class="form-control" placeholder="评论内容" value="<?php echo $_smarty_tpl->tpl_vars['commentContent']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="userName">赞：</label>
          <input input type="text" name="commentAgree" class="form-control" placeholder="赞：" value="<?php echo $_smarty_tpl->tpl_vars['commentAgree']->value;?>
"/>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改用户" />
          <a href="MemberComment.php?action=updateComment"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
  <?php }?>
  </div>
	<?php echo '<script'; ?>
 src="../js/jq/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
?>