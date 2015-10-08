<?php
  //首页模板数据模型

  class TemplateArticleModel extends Model {
    
    private $articleID,$templateName,$limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    
    public function getDefaultArticleTemplate(){
      $_sql = "select default(templateName) as df from template_article LIMIT 1";
      return parent::GetOne($_sql);
    }
    
    public function setDefaultArticleTemplate(){
      $_sql = "alter table template_article alter column templateName set default '$this->templateName';";
      return parent::CUD($_sql);
    }
    
    public function getArticleCount(){
      $_sql="SELECT COUNT(*) FROM template_article t,content_article a
             WHERE t.articleID=a.articleID";
      return parent::GetTotal($_sql);
    }
    
    public function getArticleTemplate(){
      $_sql = "SELECT a.articleID,a.articleTitle,a.articleInfo,t.templateName
                FROM template_article t,content_article a
                WHERE t.articleID=a.articleID
                $this->limit";
      return parent::GetAll($_sql);
    }
    
    public function setArticleTemplate(){
      $_sql = "UPDATE template_article
                SET templateName='$this->templateName'
                WHERE articleID='$this->articleID'";
      return parent::CUD($_sql); 
    }
    
    public function setAllArticleTemplate(){
      $_sql = "UPDATE template_article SET templateName='$this->templateName'";
      return parent::CUD($_sql); 
    }
  }
?>