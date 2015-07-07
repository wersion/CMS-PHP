<?php
  //内容实体类
  class ArticleModel extends Model {
    
    private $_limit,$_id,$_title,$_c_id,$_info,$_content;

    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取文章记录条数
    public function getTotalArticle(){
      $_sql = "SELECT COUNT(*) FROM cms_article";
      return parent::GetTotal($_sql);
    }

    // 获取文章列表
    public function getAllArticle(){
      $_sql = "SELECT a.id,c.column_name,a.title,a.info,a.updatetime
                FROM cms_article a,cms_column c 
                WHERE a.c_id=c.id
                ORDER BY c.id ASC,a.updatetime ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 新增一条文章
    public function addArticle(){
      $_sql = "INSERT INTO cms_article(title,c_id,updatetime,info,content)
                VALUES ('$this->_title','$this->_c_id',NOW(),'$this->_info','$this->_content')";
      return parent::CUD($_sql);
    }

    // 获取一条文章数据
    public function getOneArticle(){
      $_sql = "SELECT id,title,c_id,info,content
                FROM cms_article
                WHERE id='$this->_id'";
      return parent::GetOne($_sql);
    }
    
    // 更新一条数据
    public function updateArticle(){
      $_sql = "UPDATE cms_article
                SET title='$this->_title',c_id='$this->_c_id',info='$this->_info',content='$this->_content'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    // 删除一条数据
    public function deleteArticle(){
      $_sql = "DELETE FROM cms_article
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }
  }
?>