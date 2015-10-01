<?php
if(isset($_GET)){
	require substr(dirname(__FILE__),0,-4).'/init.inc.php';
	$_model = new MemberCommentModel();
	if(isset($_SESSION['member'])){
		$keyValue = $_GET;
		$_model->articleID = $keyValue['aid'];
		$showingComment = '';
		$commentCount = count($keyValue);
		foreach($keyValue as $key=>$value){
			if($key!='aid'){
				if($showingComment==''){
					$showingComment="'".$value."'";
				}else{
					$showingComment.=",'".$value."'";
				}
			}
		}
		$_model->showingComment = $showingComment;
		$queryResult = $_model->getLatestComment();
		print_r(json_encode($queryResult));
	}else{
		print_r("请先登录");
	}
}
?>