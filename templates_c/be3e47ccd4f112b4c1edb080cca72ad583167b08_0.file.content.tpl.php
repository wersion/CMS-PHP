<?php /* Smarty version 3.1.24, created on 2015-07-06 22:14:22
         compiled from "F:/develop/wamp/www/CMS/templates/content.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:26221559a8d3ee4e7d3_60687843%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be3e47ccd4f112b4c1edb080cca72ad583167b08' => 
    array (
      0 => 'F:/develop/wamp/www/CMS/templates/content.tpl',
      1 => 1436192057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26221559a8d3ee4e7d3_60687843',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'update' => 0,
    'id' => 0,
    'add' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559a8d3eecb7f2_36688648',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a8d3eecb7f2_36688648')) {
function content_559a8d3eecb7f2_36688648 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '26221559a8d3ee4e7d3_60687843';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../js/admin_content.js"><?php echo '</script'; ?>
>
</head>
<body id="manage">

<div class="map">
  内容管理 &gt;&gt; 查看文档列表 &gt;&gt; <strong id="title"><!-- <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 --></strong>
</div>

<ol>
  <?php if (isset($_smarty_tpl->tpl_vars['show']->value) && $_smarty_tpl->tpl_vars['show']->value == true) {?>
  <li><a href="content.php?action=show" class="selected">文档列表</a></li>
  <?php }?>
  <li><a href="content.php?action=add">新增文档</a></li>
  <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?>
  <li><a href="content.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">修改文档</a></li>
  <?php }?>
</ol>

<?php if (isset($_smarty_tpl->tpl_vars['add']->value) && $_smarty_tpl->tpl_vars['add']->value == true) {?>
  <form method="post" action="content.php?action=add">
  <table cellspacing="0" class="content">
    <tr><th><strong>发布一篇文章</strong></th></tr>
    <tr><td>文档标题：<input type="text" name="title" class="text" /></td></tr>
    <tr><td>栏目ID：<input type="text" name="c_id" class="text" /><!-- <select name="nav"><option>请选择一个栏目类别</option></select> --></td></tr>
    <tr><td>定义属性：<input type="checkbox" name="top" value="头条" />头条
                  <input type="checkbox" name="rec" value="推荐" />推荐
                  <input type="checkbox" name="bold" value="加粗" />加粗
                  <input type="checkbox" name="skip" value="跳转" />跳转
    </td></tr>
    <tr><td>标　　签：<input type="text" name="tag" class="text" /></td></tr>
    <tr><td>关 键 字：<input type="text" name="keyword" class="text" /></td></tr>
    <tr><td>缩 略 图：<input type="text" name="thumbnail" class="text" /> <input type="button" value="上传缩略图" onclick="centerWindow('../templates/upload_file.html','upfile','400','100')" /></td></tr>
    <tr><td>文章来源：<input type="text" name="source" class="text" /></td></tr>
    <tr><td>作　　者：<input type="text" name="author" class="text" /></td></tr>
    <tr><td><span class="middle">内容摘要：</span><textarea name="info"></textarea></td></tr>
    <tr><td>评论选项：<input type="radio" name="commend" value="1" checked="checked" />允许评论 
                  <input type="radio" name="commend" value="0" />禁止评论 
            　　　　浏览次数：<input type="text" name="count" value="100" class="small" />
    </td></tr>
    <tr><td>文档排序：<select name="sort">
                    <option>默认排序</option>
                    <option>置顶一天</option>
                    <option>置顶一周</option>
                    <option>置顶一月</option>
                    <option>置顶一年</option>
                  </select>
             　 　　消费金币：<input type="text" name="gold" value="0" class="small" />
    </td></tr>
    <tr><td>阅读权限：<select name="limit">
                    <option>开放浏览</option>
                    <option>初级会员</option>
                    <option>中级会员</option>
                    <option>高级会员</option>
                    <option>VIP会员</option>
                  </select>
          标题颜色：<select name="color">
                    <option>默认颜色</option>
                    <option style="color:red;">红色</option>
                    <option style="color:blue;">蓝色</option>
                    <option style="color:orange;">橙色</option>
                  </select>
    </td></tr>
    <tr><td>编辑文章内容：<div><?php echo '<script'; ?>
 id="editor" name="editor" type="text/plain" style="width:1024px;height:500px;"><?php echo '</script'; ?>
></div></td></tr>
    <tr><td><input name="send" type="submit" value="发布文档" /> <input type="reset" value="重置" /></td></tr>
  </table>
  </form>
  <?php echo '<script'; ?>
 type="text/javascript">
      var ue = UE.getEditor('editor');
  <?php echo '</script'; ?>
>
<?php }?>
</body>
</html><?php }
}
?>