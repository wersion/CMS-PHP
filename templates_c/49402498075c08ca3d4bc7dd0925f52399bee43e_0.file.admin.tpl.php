<?php /* Smarty version 3.1.24, created on 2015-07-06 15:07:27
         compiled from "F:/develop/wamp/www/CMS/templates/admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6349559a292fc509a6_72893283%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49402498075c08ca3d4bc7dd0925f52399bee43e' => 
    array (
      0 => 'F:/develop/wamp/www/CMS/templates/admin.tpl',
      1 => 1436166418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6349559a292fc509a6_72893283',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559a292fc7f7b2_39249858',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a292fc7f7b2_39249858')) {
function content_559a292fc7f7b2_39249858 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6349559a292fc509a6_72893283';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎光临CMS内容管理系统后台操作</title>
<link rel="stylesheet" type="text/css" href="../style/index.css" />
</head>
<frameset rows="80px,*" border="0">
	<frame src="top.php" noresize="true" scrolling="no" />
	<frameset cols="150px,*" border="0">
		<frame src="../templates/sidebar.html" name="sidebar" noresize="true" scrolling="no" />
		<frame src="main.php" name="main" noresize="true" />
	</frameset>
</frameset>
</html><?php }
}
?>