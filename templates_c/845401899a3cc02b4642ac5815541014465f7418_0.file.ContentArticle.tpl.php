<?php /* Smarty version 3.1.24, created on 2015-09-25 15:30:21
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/ContentArticle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:125105604f80de50902_71883906%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '845401899a3cc02b4642ac5815541014465f7418' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/ContentArticle.tpl',
      1 => 1441811006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125105604f80de50902_71883906',
  'variables' => 
  array (
    'position' => 0,
    'showArticle' => 0,
    'delete' => 0,
    'update' => 0,
    'AllArticle' => 0,
    'key' => 0,
    'item' => 0,
    'Page' => 0,
    'updateArticle' => 0,
    'articleID' => 0,
    'columnID' => 0,
    'articleTitle' => 0,
    'columnList' => 0,
    'articleInfo' => 0,
    'articleContent' => 0,
    'addArticle' => 0,
    'ColumnList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5604f80e046450_40071951',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5604f80e046450_40071951')) {
function content_5604f80e046450_40071951 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '125105604f80de50902_71883906';
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
</head>
<body id="manage">

<div class="map">
  内容管理 &gt;&gt; 查看文档列表 &gt;&gt; <strong><?php echo $_smarty_tpl->tpl_vars['position']->value;?>
</strong>
</div>

  <?php if (isset($_smarty_tpl->tpl_vars['showArticle']->value) && $_smarty_tpl->tpl_vars['showArticle']->value == true) {?>
    <table class="list" id="show">
    <tr><th>序号</th><th>所属栏目</th><th>标题</th><th>文章描述</th><th>更新时间</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value)) {?><th>操作</th><?php }?></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllArticle']->value;
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
        <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['columnName'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['articleTitle'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['articleInfo'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['articleUpdatetime'];?>
</td>
        <td>
          <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="contentArticle.php?action=updateArticle&ID=<?php echo $_smarty_tpl->tpl_vars['item']->value['articleID'];?>
">[ 修改 ]</a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="contentArticle.php?action=deleteArticle&ID=<?php echo $_smarty_tpl->tpl_vars['item']->value['articleID'];?>
" onclick="return confirm('确定删除此文章')?true:false">[ 删除 ]</a>
          <?php }?>
        </td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </table>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>

<?php } elseif (isset($_smarty_tpl->tpl_vars['updateArticle']->value) && $_smarty_tpl->tpl_vars['updateArticle']->value == true) {?>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../js/admin_article.js"><?php echo '</script'; ?>
>
  <form method="post">
  <input type="hIDden" id="articleID" name="articleID" value="<?php echo $_smarty_tpl->tpl_vars['articleID']->value;?>
"/>
  <input type="hIDden" id="columnID" value="<?php echo $_smarty_tpl->tpl_vars['columnID']->value;?>
">
  <table cellspacing="0" class="content">
    <tr><td>文档标题：<input type="text" name="articleTitle" class="text" value="<?php echo $_smarty_tpl->tpl_vars['articleTitle']->value;?>
" /></td></tr>
    <tr><td>栏目：<select name="columnID">
                    <?php
$_from = $_smarty_tpl->tpl_vars['columnList']->value;
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
                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
"><?php echo preg_replace('!^!m',str_repeat('---',$_smarty_tpl->tpl_vars['item']->value['level']),$_smarty_tpl->tpl_vars['item']->value['columnName']);?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                  </select></td></tr>
    <tr><td>定义属性：<input type="checkbox" name="top" value="头条" />头条
                  <input type="checkbox" name="rec" value="推荐" />推荐
                  <input type="checkbox" name="bold" value="加粗" />加粗
                  <input type="checkbox" name="skip" value="跳转" />跳转
    </td></tr>
    <tr><td>标　　签：<input type="text" name="tag" class="text" /></td></tr>
    <tr><td>关 键 字：<input type="text" name="keyword" class="text" /></td></tr>
    <tr><td>缩 略 图：<input type="text" name="thumbnail" class="text" /> <input type="button" value="上传缩略图" onclick="centerWindow('../templates/UploadFile.html','upfile','400','100')" /></td></tr>
    <tr><td>文章来源：<input type="text" name="source" class="text" /></td></tr>
    <tr><td>作　　者：<input type="text" name="author" class="text" /></td></tr>
    <tr><td><span class="mIDdle">内容摘要：</span><textarea name="articleInfo"><?php echo $_smarty_tpl->tpl_vars['articleInfo']->value;?>
</textarea></td></tr>
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
    <tr><td>编辑文章内容：<div><textarea id="editor" name="articleContent" type="text/plain" style="wIDth:1024px;height:500px;"><?php echo $_smarty_tpl->tpl_vars['articleContent']->value;?>
</textarea></div></td></tr>
    <tr><td><input name="send" type="submit" value="发布文档" /> <input type="reset" value="重置" /></td></tr>
  </table>
  </form>
  <?php echo '<script'; ?>
 type="text/javascript">
      var ue = UE.getEditor('editor');
  <?php echo '</script'; ?>
>

<?php } elseif (isset($_smarty_tpl->tpl_vars['addArticle']->value) && $_smarty_tpl->tpl_vars['addArticle']->value == true) {?>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../js/admin_content.js"><?php echo '</script'; ?>
>
  <form method="post">
  <table cellspacing="0" class="content">
    <tr><th><strong>发布一篇文章</strong></th></tr>
    <tr><td>文档标题：<input type="text" name="articleTitle" class="text" /></td></tr>
    <tr><td>栏目：<select name="columnID">
                    <?php
$_from = $_smarty_tpl->tpl_vars['ColumnList']->value;
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
                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
"><?php echo preg_replace('!^!m',str_repeat('---',$_smarty_tpl->tpl_vars['item']->value['level']),$_smarty_tpl->tpl_vars['item']->value['columnName']);?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                  </select></td></tr>
    <tr><td>定义属性：<input type="checkbox" name="top" value="头条" />头条
                  <input type="checkbox" name="rec" value="推荐" />推荐
                  <input type="checkbox" name="bold" value="加粗" />加粗
                  <input type="checkbox" name="skip" value="跳转" />跳转
    </td></tr>
    <tr><td>标　　签：<input type="text" name="tag" class="text" /></td></tr>
    <tr><td>关 键 字：<input type="text" name="keyword" class="text" /></td></tr>
    <tr><td>缩 略 图：<input type="text" name="thumbnail" class="text" /> <input type="button" value="上传缩略图" onclick="centerWindow('../templates/UploadFile.html','upfile','400','100')" /></td></tr>
    <tr><td>文章来源：<input type="text" name="source" class="text" /></td></tr>
    <tr><td>作　　者：<input type="text" name="author" class="text" /></td></tr>
    <tr><td><span class="mIDdle">内容摘要：</span><textarea name="articleInfo"></textarea></td></tr>
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
    <tr><td>编辑文章内容：<div><textarea id="editor" name="articleContent" type="text/plain" style="wIDth:1024px;height:500px;"></textarea></div></td></tr>
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