<?php
  //首页模板数据模型

  class TemplatePageModel extends Model {
    
    private $pageID,$templateName,$limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    
    public function getDefaultPageTemplate(){
      $_sql = "select default(templateName) as df from template_page LIMIT 1";
      return parent::GetOne($_sql);
    }
    
    public function setDefaultPageTemplate(){
      $_sql = "alter table template_page alter column templateName set default '$this->templateName';";
      return parent::CUD($_sql);
    }
    
    public function getPageCount(){
      $_sql="SELECT COUNT(*) FROM template_page t,content_page a
             WHERE t.pageID=a.pageID";
      return parent::GetTotal($_sql);
    }
    
    public function getPageTemplate(){
      $_sql = "SELECT a.pageID,a.pageName,a.pageInfo,t.templateName
                FROM template_page t,content_page a
                WHERE t.pageID=a.pageID
                $this->limit";
      return parent::GetAll($_sql);
    }
    
    public function setPageTemplate(){
      $_sql = "UPDATE template_page
                SET templateName='$this->templateName'
                WHERE pageID='$this->pageID'";
      return parent::CUD($_sql); 
    }
    
    public function setAllPageTemplate(){
      $_sql = "UPDATE template_page SET templateName='$this->templateName'";
      return parent::CUD($_sql); 
    }
  }
?>