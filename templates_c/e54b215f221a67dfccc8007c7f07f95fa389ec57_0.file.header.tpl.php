<?php /* Smarty version 3.1.24, created on 2015-07-06 15:07:21
         compiled from "F:/develop/wamp/www/CMS/templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28663559a2929a72ac3_16867929%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e54b215f221a67dfccc8007c7f07f95fa389ec57' => 
    array (
      0 => 'F:/develop/wamp/www/CMS/templates/header.tpl',
      1 => 1434579706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28663559a2929a72ac3_16867929',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559a2929a7e643_66676437',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a2929a7e643_66676437')) {
function content_559a2929a7e643_66676437 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28663559a2929a72ac3_16867929';
?>
<div id="top">
	<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

	<a href="###">这里可以放置文字广告1</a>
	<a href="###">这里可以放置文字广告2</a>
</div>
<div id="header">
	<h1><a href="###">瓢城Web俱乐部</a></h1>
	<div class="adver"><a href="###"><img src="images/adver.png" alt="广告图" /></a></div>
</div>
<div id="nav">
	<ul>
		<li><a href="###">首页</a></li>
		<li><a href="###">军事动态</a></li>
		<li><a href="###">八卦娱乐</a></li>
		<li><a href="###">时尚女人</a></li>
		<li><a href="###">科技频道</a></li>
		<li><a href="###">智能手机</a></li>
		<li><a href="###">美容护肤</a></li>
		<li><a href="###">热门汽车</a></li>
		<li><a href="###">房产家居</a></li>
		<li><a href="###">读书教育</a></li>
		<li><a href="###">股票基金</a></li>
	</ul>
</div>
<div id="search">
	<form>
		<select name="search">
			<option selected="selected">按标题</option>
			<option>按关键字</option>
			<option>全局查询</option>
		</select>
		<input type="text" name="keyword" class="text" />
		<input type="submit" name="send" class="submit" value="搜索" />
	</form>
	<strong>TAG标签：</strong>
	<ul>
		<li><a href="###">基金(3)</a></li>
		<li><a href="###">美女(1)</a></li>
		<li><a href="###">白兰地(3)</a></li>
		<li><a href="###">音乐(1)</a></li>
		<li><a href="###">体育(1)</a></li>
		<li><a href="###">直播(1)</a></li>
		<li><a href="###">会晤(1)</a></li>
		<li><a href="###">韩日(1)</a></li>
		<li><a href="###">警方(1)</a></li>
		<li><a href="###">广州(1)</a></li>
	</ul>
</div><?php }
}
?>