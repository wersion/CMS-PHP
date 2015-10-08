<?php
  class MemberCommentModel extends Model {
    
    private $limit,$commentID,$articleID,$commentAccountID,$commentUpdatetime,$commentContent,$commentAgree,
            $showingComment;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    public function getTotalComment(){
      $_sql="SELECT COUNT(*) FROM member_Comment";
      return parent::GetTotal($_sql);
    }

    public function getAllComment(){
      $_sql="SELECT commentID,articleID,commentAccountID,commentUpdatetime,commentContent,commentAgree
                FROM member_comment
                ORDER BY commentUpdatetime ASC";
      return parent::GetAll($_sql);
    }
    
    public function deleteComment(){
      $_sql = "DELETE FROM member_comment 
                WHERE commentID = '$this->commentID'";
      return parent::CUD($_sql);
    }

    public function getOneComment(){
      $_sql = "SELECT articleID,commentAccountID,commentUpdatetime,commentContent,commentAgree
                FROM member_comment 
                WHERE commentID='$this->commentID' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    public function updateComment(){
      $_sql = "UPDATE member_comment
                SET articleID='$this->articleID',commentAccountID='$this->commentAccountID',commentUpdatetime=NOW(),commentContent='$this->commentContent',commentAgree='$this->commentAgree'
                WHERE commentID='$this->commentID'
                LIMIT 1";
      return parent::CUD($_sql);
    }
    
    // 前台异步添加评论
    public function addComment(){
      $_sql = "INSERT INTO member_comment(articleID,commentAccountID,commentUpdatetime,commentContent) 
                VALUES ('$this->articleID','$this->commentAccountID',NOW(),'$this->commentContent')";
      return parent::CUD($_sql);
    }
    
    //前台异步获取前台还没显示的评论
    public function getLatestComment(){
      $_sql = "SELECT c.commentID,a.accountNickName,c.commentUpdatetime,c.commentUpdatetime,c.commentContent,c.commentAgree
                FROM member_comment c,member_account a
                WHERE c.commentAccountID=a.accountID AND c.articleID='$this->articleID'
                AND c.commentID NOT IN($this->showingComment)";
      return parent::GetAll($_sql);
    }
    
    //异步点赞
    public function addAgree(){
      $_sql = "update member_comment set commentAgree=commentAgree+1 WHERE commentID='$this->commentID'";
      parent::CUD($_sql);
      $_sql = "select commentID,commentAgree FROM member_comment WHERE commentID='$this->commentID'";
      return parent::GetOne($_sql);
    }

    public function checkNewComment(){
      $_sql = "SELECT COUNT(*) as count FROM member_comment WHERE articleID='$this->articleID'";
      return parent::GetOne($_sql);
    }
  }
?>