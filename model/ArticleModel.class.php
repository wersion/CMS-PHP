<?php
  //内容实体类
  class ArticleModel extends Model {
    
    private $_limit,$_id,$_column_id,$_article_title,$_article_updatetime,$_article_info,$_article_content;

    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取文章记录条数
    public function GetArticleTotal(){
      $_sql = "SELECT COUNT(*) FROM cms_article";
      return parent::GetTotal($_sql);
    }

    // 获取文章列表
    public function GetAllArticle(){
      $_sql = "SELECT a.id,c.column_name,a.article_title,LEFT(a.article_info,25) as article_info,a.article_updatetime
                FROM cms_article a,cms_column c 
                WHERE a.column_id=c.id
                ORDER BY c.id ASC,a.article_updatetime ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 新增一条文章
    public function AddArticle(){
      $_sql = "INSERT INTO cms_article(article_title,column_id,article_updatetime,article_info,article_content)
                VALUES ('$this->_article_title','$this->_column_id',NOW(),'$this->_article_info','$this->_article_content')";
      return parent::CUD($_sql);
    }

    // 获取一条文章数据
    public function GetOneArticle(){
      $_sql = "SELECT id,article_title,column_id,article_info,article_content
                FROM cms_article
                WHERE id='$this->_id'";
      return parent::GetOne($_sql);
    }
    
    // 更新一条数据
    public function UpdateArticle(){
      $_sql = "UPDATE cms_article
                SET article_title='$this->_article_title',column_id='$this->_column_id',article_info='$this->_article_info',article_content='$this->_article_content'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    // 删除一条数据
    public function DeleteArticle(){
      $_sql = "DELETE FROM cms_article
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    // 获取所有栏目
    public function GetAllColumn(){
      $_sql = "SELECT id,column_name
                FROM cms_column
                ORDER BY id ASC,column_name DESC";
      return parent::GetAll($_sql);
    }
  }
?>