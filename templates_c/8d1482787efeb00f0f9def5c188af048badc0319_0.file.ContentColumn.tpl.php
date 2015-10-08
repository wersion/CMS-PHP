<?php /* Smarty version 3.1.24, created on 2015-10-08 12:38:15
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/ContentColumn.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:269245615f3370ce5c7_38984457%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d1482787efeb00f0f9def5c188af048badc0319' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/ContentColumn.tpl',
      1 => 1444184328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269245615f3370ce5c7_38984457',
  'variables' => 
  array (
    'showColumn' => 0,
    'delete' => 0,
    'update' => 0,
    'AllColumn' => 0,
    'item' => 0,
    'addColumn' => 0,
    'ColumnList' => 0,
    'updateColumn' => 0,
    'columnName' => 0,
    'level' => 0,
    'sort' => 0,
    'columnInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5615f337219a00_24962599',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615f337219a00_24962599')) {
function content_5615f337219a00_24962599 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '269245615f3370ce5c7_38984457';
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
    <?php if (isset($_smarty_tpl->tpl_vars['showColumn']->value) && $_smarty_tpl->tpl_vars['showColumn']->value == true) {?>
    <table class="table table-hover">
      <tr><th>序号</th><th>栏目结构</th><th>栏目描述</th><th>父栏目ID</th><th>栏目层级</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value)) {?><th>操作</th><?php }?></tr>
      <?php
$_from = $_smarty_tpl->tpl_vars['AllColumn']->value;
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
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
</td>
          <td id="struct"><?php echo preg_replace('!^!m',str_repeat('---',$_smarty_tpl->tpl_vars['item']->value['level']),$_smarty_tpl->tpl_vars['item']->value['columnName']);?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['columnInfo'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['parentID'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['level'];?>
</td>
          <td>
            <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="ContentColumn.php?action=updateColumn&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
"><button type="button" class="btn btn-primary btn-sm">修改</button></a>
            <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="ContentColumn.php?action=deleteColumn&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['columnID'];?>
}" onclick="return confirm('确定删除此文章')?true:false"><button type="button" class="btn btn-primary btn-sm">删除</button></a>
            <?php }?>
          </td>      
        </tr>
      <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
    </table>
    <br><br><br><br><br>
  
    <?php } elseif (isset($_smarty_tpl->tpl_vars['addColumn']->value) && $_smarty_tpl->tpl_vars['addColumn']->value == 'ture') {?>
      <form method="post">
        <div class="form-group">
          <label for="title">栏目名称：</label>
          <input input type="text" name="columnName" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="parentID">
              <option>请选择文章栏目</option>
              <option value="0">---顶级栏目---</option>
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
          <label for="title">栏目层级：</label>
          <input input type="text" name="level" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          <label for="title">排序：</label>
          <input input type="text" name="sort" class="form-control" placeholder="栏目名称"/>
        </div>
        <div class="form-group">
          <label for="info">栏目描述：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="columnInfo"></textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改" />
          <a href="ContentColumn.php?action=showColumn"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
        </div>
      </form>
  
    <?php } elseif (isset($_smarty_tpl->tpl_vars['updateColumn']->value) && $_smarty_tpl->tpl_vars['updateColumn']->value == true) {?>
      <form method="post">
        <div class="form-group">
          <label for="title">栏目名称：</label>
          <input input type="text" name="columnName" class="form-control" placeholder="栏目名称" value="<?php echo $_smarty_tpl->tpl_vars['columnName']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="title">栏目：</label>
          <select class="form-control" name="parentID">
              <option>请选择文章栏目</option>
              <option value="0">---顶级栏目---</option>
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
          <label for="title">栏目层级：</label>
          <input input type="text" name="level" class="form-control" placeholder="栏目名称" value="<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="title">排序：</label>
          <input input type="text" name="sort" class="form-control" placeholder="栏目名称" value="<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
"/>
        </div>
        <div class="form-group">
          <label for="info">栏目描述：</label>
          <textarea class="form-control" rows="2" placeholder="摘要" name="columnInfo"><?php echo $_smarty_tpl->tpl_vars['columnInfo']->value;?>
</textarea>
        </div>
        <div class="form-group">  
          <input name="send" type="submit" class="btn btn-primary btn-lg" value="修改" />
          <a href="ContentColumn.php?action=updateColumn"><button type="button" class="btn btn-primary btn-lg">返回列表</button></a>
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
</html><?php }
}
?>