<?php
  //前台模板数据模型

  class TagModel extends Model {
    
    private $articleID,$columnID,$parentID,$limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取所有父级栏目
    public function getAllTopColumn(){
      $_sql = "SELECT columnID,columnName 
                FROM content_column
                WHERE parentID=0
                ORDER BY sort ASC
                $this->limit;";
      return parent::GetAll($_sql);
    }

    //获取单一栏目信息
    public function getOneColumn(){
      $_sql = "SELECT columnID,columnName,columnInfo,parentID,sort
                FROM content_column
                WHERE columnID='$this->columnID'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    //获取子栏目信息
    public function getSubColumn(){
      $_sql = "SELECT columnID,columnName
                FROM content_column
                WHERE parentID='$this->parentID'
                $this->limit;";
      return parent::GetAll($_sql);
    }

    public function getArticleListTotal(){
      $_sql = "SELECT COUNT(*)
                FROM content_article
                WHERE (columnID in (SELECT columnID FROM content_column WHERE parentID='$this->columnID') OR columnID = '$this->columnID')";
      return parent::GetTotal($_sql);
    }
    

    //获取当前栏目文章列表（不包含子栏目）
    public function getArticleList(){
      $_sql = "SELECT a.articleID,c.columnName,a.articleTitle,a.articleUpdatetime,a.articleInfo
                FROM content_article a,content_column c
                WHERE a.columnID = c.columnID AND a.columnID='$this->columnID'
                $this->limit;";
      return parent::GetAll($_sql);
    }

    //获取当前栏目文章列表（只包含下一层子栏目）
    public function getAllArticleList(){
      $_sql = "SELECT a.articleID,c.columnName,a.articleTitle,a.articleUpdatetime,a.articleInfo
                FROM content_article a,content_column c
                WHERE a.columnID = c.columnID 
                AND (a.columnID in (SELECT columnID FROM content_column WHERE parentID='$this->columnID') OR a.columnID = '$this->columnID')
                $this->limit;";
      return parent::GetAll($_sql);
    }
    
    //获取当前文章的内容
    public function getContent(){
      $_sql = "SELECT a.articleID,a.articleTitle,a.articleUpdatetime,a.articleContent,c.columnName
                FROM content_article a,content_column c
                WHERE a.columnID=c.columnID AND a.articleID='$this->articleID'";
      return parent::GetOne($_sql);
    }
    
    //获取当前文章的评论
    public function getComment(){
      $_sql = "SELECT c.commentID,a.accountNickName,c.commentUpdatetime,c.commentUpdatetime,c.commentContent,c.commentAgree
                FROM member_comment c,member_account a
                WHERE c.commentAccountID=a.accountID AND c.articleID='$this->articleID'";
      return parent::GetAll($_sql);
    }
  }
?>