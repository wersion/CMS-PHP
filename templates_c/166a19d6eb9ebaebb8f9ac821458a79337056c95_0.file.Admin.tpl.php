<?php /* Smarty version 3.1.24, created on 2015-09-24 15:48:28
         compiled from "C:/wamp/www/CMS-PHP/templates/admin/Admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:152005603aacc8e15e8_44043739%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '166a19d6eb9ebaebb8f9ac821458a79337056c95' => 
    array (
      0 => 'C:/wamp/www/CMS-PHP/templates/admin/Admin.tpl',
      1 => 1441632894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152005603aacc8e15e8_44043739',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5603aacc911e79_86910467',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5603aacc911e79_86910467')) {
function content_5603aacc911e79_86910467 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '152005603aacc8e15e8_44043739';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎光临CMS内容管理系统后台操作</title>
<link rel="stylesheet" type="text/css" href="../style/index.css" />
</head>
<frameset rows="80px,*" border="0">
	<frame src="AdminTop.php" noresize="true" scrolling="no" />
	<frameset cols="150px,*" border="0">
		<frame src="NodeList.php" name="sidebar" noresize="true" scrolling="no" />
		<frame src="Main.php" name="main" noresize="true" />
	</frameset>
</frameset>
</html><?php }
}
?>