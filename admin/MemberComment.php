<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_smarty;
$_manage = new MemberCommentController($_smarty);   //入口
$_manage->Action();
$_smarty->display('admin/MemberComment.tpl');
?>