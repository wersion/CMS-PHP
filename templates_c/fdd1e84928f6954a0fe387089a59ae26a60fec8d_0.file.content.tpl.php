<?php /* Smarty version 3.1.24, created on 2015-06-29 15:46:40
         compiled from "E:/develop/wamp/www/CMS/templates/content.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3084855914c407257f3_09019170%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdd1e84928f6954a0fe387089a59ae26a60fec8d' => 
    array (
      0 => 'E:/develop/wamp/www/CMS/templates/content.tpl',
      1 => 1435585518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3084855914c407257f3_09019170',
  'variables' => 
  array (
    'update' => 0,
    'id' => 0,
    'add' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55914c407b2213_83868771',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55914c407b2213_83868771')) {
function content_55914c407b2213_83868771 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3084855914c407257f3_09019170';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="../js/admin_content.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
</head>
<body id="manage">


<div class="map">
  内容管理 &gt;&gt; 查看文档列表 &gt;&gt; <strong id="title"></strong>
</div>

<ol>
  <li><a href="content.php?action=show" class="selected">文档列表</a></li>
  <li><a href="content.php?action=add">新增文档</a></li>
  <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?>
  <li><a href="content.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">修改文档</a></li>
  <?php }?>
</ol>


<?php if (isset($_smarty_tpl->tpl_vars['add']->value) && $_smarty_tpl->tpl_vars['add']->value == true) {?>
<form>
<table cellspacing="0" class="content">
  <tr><th><strong>发布一条新文档</strong></th></tr>
  <tr><td>文档标题：<input type="text" name="title" class="text" /></td></tr>
  <tr><td>栏　　目：<select name="nav"><option>请选择一个栏目类别</option></select></td></tr>
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
  <tr class="ckeditor"><td><textarea id="TextArea1" name="content" class="ckeditor"></textarea></td></tr>
  <tr><td>评论选项：<input type="radio" name="commend" value="1" checked="checked" />允许评论 
                <input type="radio" name="commend" value="0" />禁止评论 
          　　　　浏览次数：<input type="text" name="count" value="100" class="text small" />
  </td></tr>
  <tr><td>文档排序：<select name="sort">
                  <option>默认排序</option>
                  <option>置顶一天</option>
                  <option>置顶一周</option>
                  <option>置顶一月</option>
                  <option>置顶一年</option>
                </select>
           　 　　消费金币：<input type="text" name="gold" value="0" class="text small" />
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
  <tr><td><input type="submit" value="发布文档" /> <input type="reset" value="重置" /></td></tr>
  <tr><td></td></tr>
</table>
</form>
<?php }?>


</body>
</html><?php }
}
?>