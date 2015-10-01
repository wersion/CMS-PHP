<?php
if(isset($_GET)){
	require substr(dirname(__FILE__),0,-4).'/init.inc.php';
	$_model = new MemberCommentModel();
	if(isset($_SESSION['member'])){
		$_model->articleID = $_GET['aid'];
		$queryResult = array($_model->checkNewComment());
		print_r(json_encode($queryResult));
	}else{
		print_r("请先登录");
	}
}
?>