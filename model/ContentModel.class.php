<?php
  //内容实体类
  class ContentModel extends Model {
    
    private $_id,$_title,$_c_id,$_info,$_content;

    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    
    public function addArticle(){
      $_sql = "INSERT INTO cms_article(title,c_id,info,content)
                VALUES ('$this->_title','$this->_c_id','$this->_info','$this->_content')";
      return parent::CUD($_sql);
    }

    public function getOneArticle(){
      $_sql = "SELECT id,title,c_id,info,content
                FROM cms_article
                WHERE id='$this->_id'";
      return parent::GetOne($_sql);
    }
    
  }
?>