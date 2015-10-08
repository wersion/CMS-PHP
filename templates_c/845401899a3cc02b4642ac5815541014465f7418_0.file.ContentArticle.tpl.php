<?php /* Smarty version 3.1.24, created on 2015-10-08 12:38:18
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/ContentArticle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:245655615f33a1980e3_66139476%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '845401899a3cc02b4642ac5815541014465f7418' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/ContentArticle.tpl',
      1 => 1444184302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245655615f33a1980e3_66139476',
  'variables' => 
  array (
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
  'unifunc' => 'content_5615f33a2dcc33_60886354',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f33a2dcc33_60886354')) {
function content_5615f33a2dcc33_60886354 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '245655615f33a1980e3_66139476';
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章管理</title>
    <link href="../style/admin.css" rel="stylesheet">
    <link href="../style/bootstrap.min.css" rel="stylesheet">
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
  <body class="background">
  <div class="container min-height wite">
    <?php if (isset($_smarty_tpl->tpl_vars['showArticle']->value) && $_smarty_tpl->tpl_vars['showArticle']->value == true) {?>
        <table class="table table-hover">
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
"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
              <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="contentArticle.php?action=deleteArticle&ID=<?php echo $_smarty_tpl->tpl_vars['item']->value['articleID'];?>
" onclick="return confirm('确定删除此文章')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
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

    <?php } elseif (isset($_smarty_tpl->tpl_vars['updateArticle']->value) && $_smarty_tpl->tpl_vars['updateArticle']->value == true) {?>
    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../js/admin_article.js"><?php echo '</script'; ?>
>
      <form method="post">
      <input type="hIDden"  name="articleID" value="<?php echo $_smarty_tpl->tpl_vars['articleID']->value;?>
"/>
      <input type="hIDden"  value="<?php echo $_smarty_tpl->tpl_vars['columnID']->value;?>
">
      <form method="post">
        <div class="form-group">
          <label for="title">文档标题：</label>
          <input input type="text" name="articleTitle" class="form-control" id="title" placeholder="标题" value="<?php echo $_smarty_tpl->tpl_vars['articleTitle']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="columnID">
              <option>请选择文章栏目</option>
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
          </select>
        </div>
        <div class="form-group">
          <label for="InputFile">缩略图</label>
          <input type="file" id="InputFile">
        </div>
        <div class="form-group">
          <label for="info">文章摘要：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="articleInfo"><?php echo $_smarty_tpl->tpl_vars['articleInfo']->value;?>
</textarea>
        </div>
        <div class="form-group">
          <label for="content">文编辑文章内容：</label>
          <textarea id="editor" name="articleContent" type="text/plain" style="wIDth:1024px;height:500px;"><?php echo $_smarty_tpl->tpl_vars['articleContent']->value;?>
</textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="发布文档" />
          <a href="ContentArticle.php?action=updateArticle"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
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
        <div class="form-group">
          <label for="title">文档标题：</label>
          <input input type="text" name="articleTitle" class="form-control" id="title" placeholder="标题">
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="columnID">
              <option>请选择文章栏目</option>
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
          </select>
        </div>
        <div class="form-group">
          <label for="InputFile">缩略图</label>
          <input type="file" id="InputFile">
        </div>
        <div class="form-group">
          <label for="info">文章摘要：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="articleInfo"/></textarea>
        </div>
        <div class="form-group">
          <label for="content">文编辑文章内容：</label>
          <textarea id="editor" type="text/plain" style="wIDth:1024px;height:500px;" name="articleContent"></textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="发布文档" />
          <a href="ContentArticle.php?action=showArticle"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
      <?php echo '<script'; ?>
 type="text/javascript">
          var ue = UE.getEditor('editor');
      <?php echo '</script'; ?>
>
    <?php }?>
  </div>
	<?php echo '<script'; ?>
 src="../js/jq/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
?>