<?php /* Smarty version 3.1.24, created on 2015-07-06 14:47:51
         compiled from "F:/develop/wamp/www/CMS/templates/top.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13085559a2497838a34_37133667%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24f11cf5ab62110c42b6271fc63694b6e1f9b820' => 
    array (
      0 => 'F:/develop/wamp/www/CMS/templates/top.tpl',
      1 => 1435496162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13085559a2497838a34_37133667',
  'variables' => 
  array (
    'admin_user' => 0,
    'ueser_lever' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559a249785fb48_76186737',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a249785fb48_76186737')) {
function content_559a249785fb48_76186737 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13085559a2497838a34_37133667';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="../js/admin_top_nav.js"><?php echo '</script'; ?>
>
</head>
<body id="top">

<h1>LOGO</h1>

<ul>
	<li><a href="../templates/sidebar.html" target="sidebar" id="nav1" class="selected" onclick="admin_top_nav(1)">首页</a></li>
	<li><a href="../templates/sidebarn.html" target="sidebar" id="nav2" onclick="admin_top_nav(2)">内容</a></li>
	<li><a href="###" id="nav3" target="sidebar" onclick="admin_top_nav(3)">会员</a></li>
	<li><a href="###" id="nav4" target="sidebar" onclick="admin_top_nav(4)">系统</a></li>
</ul>

<p>
	您好，<strong><?php echo $_smarty_tpl->tpl_vars['admin_user']->value;?>
</strong> [ <?php echo $_smarty_tpl->tpl_vars['ueser_lever']->value;?>
 ] [ <a href="../" target="_blank">去首页</a> ] [ <a href="admin_login.php?action=logout" target="_parent">退出</a> ]
</p>

</body>
</html><?php }
}
?>