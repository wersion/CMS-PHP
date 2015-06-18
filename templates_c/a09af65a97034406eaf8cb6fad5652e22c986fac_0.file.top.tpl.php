<?php /* Smarty version 3.1.24, created on 2015-06-18 10:33:18
         compiled from "E:/develop/wamp/www/CMS_smarty/templates/top.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12905582824eef2096_46742505%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a09af65a97034406eaf8cb6fad5652e22c986fac' => 
    array (
      0 => 'E:/develop/wamp/www/CMS_smarty/templates/top.tpl',
      1 => 1432775822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12905582824eef2096_46742505',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5582824ef3c426_58478235',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5582824ef3c426_58478235')) {
function content_5582824ef3c426_58478235 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12905582824eef2096_46742505';
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
	您好，<strong>$admin_user</strong> [ 超级管理员 ] [ <a href="../" target="_blank">去首页</a> ] [ 退出 ]
</p>

</body>
</html><?php }
}
?>