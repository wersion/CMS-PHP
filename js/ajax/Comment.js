(function(){
		
	var updateComment = function(){
		//异步获取前台还没显示的评论
		var articleID = document.getElementById('articleID').value;
		var commentList = document.getElementById('commentList');
		var commentCount = commentList.children.length;
		var getCommentURL = '../ajax/GetComment.php?aid='+articleID;
		for(var i=0;i<commentCount;i++){
			getCommentURL += '&c'+i+'='+commentList.children[i].id;
		}
		window.MyAjaxTool.GetRequest(getCommentURL,function(text){
			var commentData = window.MyAjaxTool.parJSON(text,['commentID','accountNickName','commentUpdatetime','commentAgree','commentContent']);
			var commentList = document.getElementById('commentList');
			for(var i=0, length=commentData.length;i<length;i++){
				var li = document.createElement('li');
				li.id=commentData[i].commentID;
				li.innerHTML="评论用户："+commentData[i].accountNickName+" 发表时间："+commentData[i].commentUpdatetime+
							" 赞："+commentData[i].commentAgree+" 评论内容："+commentData[i].commentContent;
				commentList.appendChild(li);
			}
		});
	}

	var subComment = function(){
		//异步提交评论
		window.MyAjaxTool.PostRequest('../ajax/SubmitComment.php','comment');
		updateComment();
	};
	
	var updateAgree = function(text){
		var agreeData = window.MyAjaxTool.parJSON(text,['commentID','commentAgree']);
		var agreeList = document.getElementsByClassName('agree');
		for(var i=0,len=agreeList.length;i<len;i++){
			if(agreeList[i].id==agreeData[0].commentID){
				agreeList[i].innerHTML=agreeData[0].commentAgree;
			}
		}
	}
	
	var subAgree = function(){
		var commentID = this.id;
		var subAgreeURL = '../ajax/SubmitAgree.php?c='+commentID;
		window.MyAjaxTool.GetRequest(subAgreeURL,updateAgree);
	};
	
	var checkUpdateComments = setInterval(function(){
			var articleID = document.getElementById('articleID').value;
			var showingCount = document.getElementById('commentList').children.length;
			var serverCount = 0;
			var checkURL = '../ajax/GetNewComment.php?aid='+articleID;
			window.MyAjaxTool.GetRequest(checkURL,function(text){
				serverCount = window.MyAjaxTool.parJSON(text,['count']);
			});
			var newComment = serverCount[0]['count'] - showingCount;
			if(newComment>0){
				var newCommentBut = document.getElementById('newComment');
				newCommentBut.style.display="block";
				clearInterval(checkUpdateComments);
			}
	},10000);
	
	var subButton = document.getElementById('subButton');
	subButton.addEventListener('click',subComment,false);

	var agree = document.getElementsByClassName('agree');
    for(var i=0, len=agree.length;i<len;i++){
		agree[i].addEventListener('click',subAgree,false);
	}
	
	var newCommentBut = document.getElementById('newComment');
	newCommentBut.addEventListener('click',updateComment,false);
	
})();