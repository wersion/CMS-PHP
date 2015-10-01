<?php /* Smarty version 3.1.24, created on 2015-10-01 10:25:16
         compiled from "C:/wamp/www/CMS-PHP/templates/comment.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4131560c998c548705_58510911%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bce50c618bde7c437c034408b6813a7637941c3' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/comment.tpl',
      1 => 1443666312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4131560c998c548705_58510911',
  'variables' => 
  array (
    'comment' => 0,
    'item' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_560c998c586449_46276915',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560c998c586449_46276915')) {
function content_560c998c586449_46276915 ($_smarty_tpl) {
if (!is_callable('smarty_function_GetComment')) require_once 'C:/wamp/www/CMS-PHP/tag/function.GetComment.php';

$_smarty_tpl->properties['nocache_hash'] = '4131560c998c548705_58510911';
?>
  <?php echo smarty_function_GetComment(array('assign'=>"comment"),$_smarty_tpl);?>

  <div id="newComment" style="display:none">有新评论，点击这里加载</div>
  <ul id="commentList">
    <?php
$_from = $_smarty_tpl->tpl_vars['comment']->value;
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
    <li id="<?php echo $_smarty_tpl->tpl_vars['item']->value['commentID'];?>
">
      评论用户：<?php echo $_smarty_tpl->tpl_vars['item']->value['accountNickName'];?>

      发表时间：<?php echo $_smarty_tpl->tpl_vars['item']->value['commentUpdatetime'];?>

      赞：<a id="<?php echo $_smarty_tpl->tpl_vars['item']->value['commentID'];?>
" class="agree"><?php echo $_smarty_tpl->tpl_vars['item']->value['commentAgree'];?>
</a>
      评论内容：<?php echo $_smarty_tpl->tpl_vars['item']->value['commentContent'];?>

    </li>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </ul>
 <div>
	发表评论：
	<form id="comment">
		<input type="hidden" id="articleID" name="articleID" value="<?php echo $_smarty_tpl->tpl_vars['content']->value['articleID'];?>
"/>
		<textarea name="commentContent" id="comment" cols="40" rows="2" placeholder="请输入评论"></textarea>
	
		<input id="subButton" type="button" url='123' value="提交评论"/>
	</form>
</div><?php }
}
?>