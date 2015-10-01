<?php /* Smarty version 3.1.24, created on 2015-09-25 15:25:30
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/RbacNode.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:97965604f6eac65105_96072688%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a3b7cd2ba4157d7bb8cb8411711f013e4d3c81a' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/RbacNode.tpl',
      1 => 1443165923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97965604f6eac65105_96072688',
  'variables' => 
  array (
    'title' => 0,
    'showNode' => 0,
    'delete' => 0,
    'update' => 0,
    'AllNode' => 0,
    'item' => 0,
    'addNode' => 0,
    'Parent_Node' => 0,
    'updateNode' => 0,
    'preUrl' => 0,
    'nodeNameCH' => 0,
    'nodeNameEN' => 0,
    'sort' => 0,
    'nodeInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5604f6eadceb02_93699231',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5604f6eadceb02_93699231')) {
function content_5604f6eadceb02_93699231 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '97965604f6eac65105_96072688';
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
  <?php if (isset($_smarty_tpl->tpl_vars['showNode']->value) && $_smarty_tpl->tpl_vars['showNode']->value == true) {?>
  <table class="list">
    <tr><th>ID</th><th>权限结构</th><th>权限名称</th><th>状态</th><th>描述</th><th>父级</th><th>层级</th><?php if (isset($_smarty_tpl->tpl_vars['delete']->value) || isset($_smarty_tpl->tpl_vars['update']->value)) {?><th>操作</th><?php }?></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllNode']->value;
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
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nodeID'];?>
</td>
        <td id="struct"><?php echo preg_replace('!^!m',str_repeat('---',$_smarty_tpl->tpl_vars['item']->value['level']),$_smarty_tpl->tpl_vars['item']->value['nodeNameCH']);?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nodeNameEN'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?>停用<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>开启<?php }?></td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nodeInfo'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['parentID'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['level'] == 1) {?>系统<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 2) {?>模块<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 3) {?>方法<?php }?></td>
        <td>
          <?php if (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?><a href="RbacNode.php?action=updateNode&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['nodeID'];?>
">[ 修改 ]</a>
          <?php } elseif (isset($_smarty_tpl->tpl_vars['delete']->value) && $_smarty_tpl->tpl_vars['delete']->value == true) {?><a href="RbacNode.php?action=deleteNode&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['nodeID'];?>
" onclick="return confirm('确定删除此用户')?true:false">[ 删除 ]</a>
          <?php }?>
        </td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </table>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['addNode']->value) && $_smarty_tpl->tpl_vars['addNode']->value == true) {?>
    <form method="post">
      <table class="create">
        <tr><td><p>权限方法名：</p></td><td><input type="text" name="nodeNameEN" class="text" /></td></tr>
        <tr><td><p>权限中文描述：</p></td><td><input type="text" name="nodeNameCH" class="text" /></td></tr>
        <tr><td><p>权限状态：</p></td><td><label><input type="radio" name="nodeStatus" value="1" />开启</label><label><input type="radio" name="nodeSatatus" value="0" />停用</label></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="nodeSort" class="text" /></td></tr>
        <tr><td><p>父级：</p></td><td>
          <select name="parentID">
            <option value="0">---顶级----</option>
            <?php
$_from = $_smarty_tpl->tpl_vars['Parent_Node']->value;
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nodeID'];?>
"><?php if ($_smarty_tpl->tpl_vars['item']->value['level'] == 1) {
} elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 2) {?>&nbsp&nbsp<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 3) {?>&nbsp&nbsp&nbsp&nbsp<?php }
echo $_smarty_tpl->tpl_vars['item']->value['nodeNameCH'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
          </select></td></tr>
        <tr><td><p>层级：</p></td><td>          
          <select name="nodeLevel">
            <option value="1">系统</option>
            <option value="2">模块</option>
            <option value="3">方法</option>
          </select></td></tr>
        <tr><td><p>权限简介：</p></td><td><input type="text" name="nodeInfo" class="text" /></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增权限" class="submit" /> [ <a href="RbacNode.php?action=show">返回列表</a> ]</div>
    </form>

  <?php } elseif (isset($_smarty_tpl->tpl_vars['updateNode']->value) && $_smarty_tpl->tpl_vars['updateNode']->value == true) {?>
    <form method="post">
      <table class="create">
        <input type="hidden" id="pre_url" name="preUrl" value="<?php echo $_smarty_tpl->tpl_vars['preUrl']->value;?>
">
        <tr><td><p>权限名：</p></td><td><input type="text" name="nodeNameCH" class="text" value="<?php echo $_smarty_tpl->tpl_vars['nodeNameCH']->value;?>
" /></td></tr>
        <tr><td><p>权限中文：</p></td><td><input type="text" name="nodeNameEN" class="text" value="<?php echo $_smarty_tpl->tpl_vars['nodeNameEN']->value;?>
" /></td></tr>
        <tr><td><p>权限状态：</p></td><td><label><input type="radio" name="status" value="1" />开启</label><label><input type="radio" name="status" value="0" />停用</label></td></tr>
        <tr><td><p>排序：</p></td><td><input type="text" name="sort" class="text" value="<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
" /></td></tr>
        <tr><td><p>父级：</p></td><td>
          <select name="parentID">
            <option value="0">---顶级----</option>
            <?php
$_from = $_smarty_tpl->tpl_vars['Parent_Node']->value;
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
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nodeID'];?>
"><?php if ($_smarty_tpl->tpl_vars['item']->value['level'] == 1) {
} elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 2) {?>&nbsp&nbsp<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['level'] == 3) {?>&nbsp&nbsp&nbsp&nbsp<?php }
echo $_smarty_tpl->tpl_vars['item']->value['nodeNameCH'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
          </select></td></tr>
        <tr><td><p>层级：</p></td><td>          
          <select name="nodeLevel">
            <option value="1">系统</option>
            <option value="2">模块</option>
            <option value="3">方法</option>
          </select></td></tr>
        <tr><td><p>权限简介：</p></td><td><input type="text" name="nodeInfo" class="text" value="<?php echo $_smarty_tpl->tpl_vars['nodeInfo']->value;?>
" /></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改权限" class="submit" /> [ <a href="RbacNode.php?action=show">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>