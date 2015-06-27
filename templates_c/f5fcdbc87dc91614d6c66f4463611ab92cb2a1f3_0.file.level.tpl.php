<?php /* Smarty version 3.1.24, created on 2015-06-25 15:22:38
         compiled from "E:/develop/wamp/www/CMS/templates/level.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:31265558c009e1ed712_23484178%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5fcdbc87dc91614d6c66f4463611ab92cb2a1f3' => 
    array (
      0 => 'E:/develop/wamp/www/CMS/templates/level.tpl',
      1 => 1435238556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31265558c009e1ed712_23484178',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllLevel' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'Page' => 0,
    'create' => 0,
    'update' => 0,
    'id' => 0,
    'pre_url' => 0,
    'level' => 0,
    'level_name' => 0,
    'level_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558c009e2a50c9_22332695',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558c009e2a50c9_22332695')) {
function content_558c009e2a50c9_22332695 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '31265558c009e1ed712_23484178';
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
  <?php if (isset($_smarty_tpl->tpl_vars['show']->value) && $_smarty_tpl->tpl_vars['show']->value == true) {?>
  <table class="list">
    <tr><th>编号</th><th>等级名称</th><th>等级描述</th><th>操作</th></tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['AllLevel']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->level_name;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value->level_info;?>
</td>
        <td><a href="level.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">[ 修改 ]</a> | <a href="level.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定删除此管理员等级')?true:false">[ 删除 ]</a></td>
      </tr>
    <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
  </table>
  <p class="crelink"><a class="crelink" href="level.php?action=create">[ 新增管理员等级 ]</a><p>
  <div id="page"><?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</div>
  
  <?php } elseif (isset($_smarty_tpl->tpl_vars['create']->value) && $_smarty_tpl->tpl_vars['create']->value == 'ture') {?>
    <form method="post">
      <table class="create">
        <tr><td><p>等级：</p></td><td><input type="text" name="level" class="text" /></td></tr>
        <tr><td><p>等级名称：</p></td><td><input type="text" name="level_name" class="text" /></td></tr>
        <tr><td><p>等级描述：</p><td><textarea rows="3" cols="20" name="level_info"></textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="新增管理员等级" class="submit" /> [ <a href="level.php?action=show">返回列表</a> ]</div>
    </form>
  
  <?php } elseif (isset($_smarty_tpl->tpl_vars['update']->value) && $_smarty_tpl->tpl_vars['update']->value == true) {?>
    <form method="post">
      <input type="hidden" id="uesrlevel" name="levelid" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
      <input type="hidden" id="pre_url" name="pre_url" value="<?php echo $_smarty_tpl->tpl_vars['pre_url']->value;?>
">
      <table class="create">
        <tr><td><p>等级：</p></td><td><input type="text" name="level" class="text" value="<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
" /></td></tr>
        <tr><td><p>等级名称：</p></td><td><input type="text" name="level_name" class="text" value="<?php echo $_smarty_tpl->tpl_vars['level_name']->value;?>
" /></td></tr>
        <tr><td><p>等级描述：</p><td><textarea rows="3" cols="20" name="level_info" ><?php echo $_smarty_tpl->tpl_vars['level_info']->value;?>
</textarea></td></tr>
      </table>
      <div class="butt"><input type="submit" name="send" value="修改管理员等级" class="submit" /> [ <a href="level.php?action=show">返回列表</a> ]</div>
    </form>
  <?php }?>
</body>
</html><?php }
}
?>