<?php
  //前台模板数据模型

  class TagModel extends Model {
    
    private $_column_id,$_pid,$_limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取所有父级栏目
    public function GetAllTopColumn(){
      $_sql = "SELECT id,column_name 
                FROM cms_column
                WHERE pid=0
                ORDER BY sort ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    //获取单一栏目信息
    public function GetOneColumn(){
      $_sql = "SELECT id,column_name,column_info,pid,sort
                FROM cms_column
                WHERE id='$this->_column_id'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    //获取子栏目信息
    public function GetSubColumn(){
      $_sql = "SELECT id,column_name
                FROM cms_column
                WHERE pid='$this->_pid'
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    public function GetArticleListTotal(){
      $_sql = "SELECT COUNT(*)
                FROM cms_article
                WHERE (column_id in (SELECT id FROM cms_column WHERE pid='$this->_column_id') OR column_id = '$this->_column_id')";
      return parent::GetTotal($_sql);
    }

    //获取当前栏目文章列表（不包含子栏目）
    public function GetArticleList(){
      $_sql = "SELECT a.id,c.column_name,a.article_title,a.article_updatetime,a.article_info
                FROM cms_article a,cms_column c
                WHERE a.column_id = c.id AND a.column_id='$this->_column_id'
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    //获取当前栏目文章列表（只包含下一层子栏目）
    public function GetAllArticleList(){
      $_sql = "SELECT a.id,c.column_name,a.article_title,a.article_updatetime,a.article_info
                FROM cms_article a,cms_column c
                WHERE a.column_id = c.id 
                AND (a.column_id in (SELECT id FROM cms_column WHERE pid='$this->_column_id') OR a.column_id = '$this->_column_id')
                $this->_limit;";
      return parent::GetAll($_sql);
    }
  }
?>