<?php
  //页面模板数据模型

  class TemplateModel extends Model {
    
    private $articleID,$columnID,$pageID;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    
    public function getIndexTemplate(){
        $_sql = "SELECT templateName
                  FROM template_index";
      return parent::GetOne($_sql);
    }

    public function getColumnTemplate(){
        $_sql = "SELECT templateName
                  FROM template_column
                  WHERE columnID = '$this->columnID';";
      return parent::GetOne($_sql);
    }
  
    public function getArticleTemplate(){
        $_sql = "SELECT templateName
                  FROM template_article
                  WHERE articleID = '$this->articleID';";
      return parent::GetOne($_sql);
    }
    
    public function getPageTemplate(){
        $_sql = "SELECT templateName
                  FROM template_page
                  WHERE pageID = '$this->pageID';";
      return parent::GetOne($_sql);
    }
  }
?>