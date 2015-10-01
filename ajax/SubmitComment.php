<?php
if(isset($_POST)){
	require substr(dirname(__FILE__),0,-4).'/init.inc.php';
	$_model = new MemberCommentModel();
	//解析原URL,获取文章ID
	if(isset($_SESSION['member'])){
		$sourceURL=parse_url($_SERVER['HTTP_REFERER']);
		parse_str($sourceURL['query'],$keyValue);
		$_model->articleID = $keyValue['aid'];
		$_model->commentAccountID = 1;//用户ID
		$_model->commentContent = $_POST['commentContent'];
		if($_model->addComment()){
			print_r("添加评论成功");
		}	
	}else{
		print_r("请先登录");
	}
}
?>