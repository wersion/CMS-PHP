<?php
  //内容实体类
  class ContentArticleModel extends Model {
    
    private $limit,$articleID,$columnID,$articleTitle,$articleUpdatetime,$articleInfo,$articleContent;

    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取文章记录条数
    public function getArticleTotal(){
      $_sql = "SELECT COUNT(*) FROM content_article";
      return parent::GetTotal($_sql);
    }

    // 获取文章列表
    public function getAllArticle(){
      $_sql = "SELECT a.articleID,c.columnName,a.articleTitle,LEFT(a.articleInfo,25) as articleInfo,a.articleUpdatetime
                FROM content_article a,content_column c 
                WHERE a.columnID=c.columnID
                ORDER BY c.columnID ASC,a.articleUpdatetime ASC
                $this->limit;";
      return parent::GetAll($_sql);
    }

    // 新增一条文章
    public function addArticle(){
      $_sql = "INSERT INTO content_article(articleTitle,columnID,articleUpdatetime,articleInfo,articleContent)
                VALUES ('$this->articleTitle','$this->columnID',NOW(),'$this->articleInfo','$this->articleContent')";
      return parent::CUD($_sql);
    }

    // 获取一条文章数据
    public function getOneArticle(){
      $_sql = "SELECT articleID,articleTitle,columnID,articleInfo,articleContent
                FROM content_article
                WHERE articleID='$this->articleID'";
      return parent::GetOne($_sql);
    }
    
    // 更新一条数据
    public function updateArticle(){
      $_sql = "UPDATE content_article
                SET articleTitle='$this->articleTitle',columnID='$this->columnID',articleInfo='$this->articleInfo',articleContent='$this->articleContent'
                WHERE articleID='$this->articleID'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    // 删除一条数据
    public function deleteArticle(){
      $_sql = "DELETE FROM content_article
                WHERE articleID = '$this->articleID'";
      return parent::CUD($_sql);
    }

    // 获取所有栏目
    public function getAllColumn(){
      $_sql = "SELECT columnID,columnName,parentID,level
                FROM content_column
                ORDER BY columnID ASC,columnName DESC";
      return parent::GetAll($_sql);
    }
  }
?>