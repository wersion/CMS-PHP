<?php
  //首页模板数据模型

  class TemplateColumnModel extends Model {
    
    private $columnID,$templateName,$limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    
    public function getDefaultColumnTemplate(){
      $_sql = "select default(templateName) as df from template_column LIMIT 1";
      return parent::GetOne($_sql);
    }
    
    public function setDefaultColumnTemplate(){
      $_sql = "alter table template_column alter column templateName set default '$this->templateName';";
      return parent::CUD($_sql);
    }
    
    public function getColumnCount(){
      $_sql="SELECT COUNT(*) FROM template_column t,content_column c
             WHERE t.columnID=c.columnID";
      return parent::GetTotal($_sql);
    }
    
    public function getColumnTemplate(){
      $_sql = "SELECT c.columnID,c.columnName,c.columnInfo,t.templateName
                FROM template_column t,content_column c
                WHERE t.columnID=c.columnID
                $this->limit";
      return parent::GetAll($_sql);
    }
    
    public function setColumnTemplate(){
      $_sql = "UPDATE template_column
                SET templateName='$this->templateName'
                WHERE columnID='$this->columnID'";
      return parent::CUD($_sql); 
    }
    
    public function setAllColumnTemplate(){
      $_sql = "UPDATE template_column SET templateName='$this->templateName'";
      return parent::CUD($_sql); 
    }
  }
?>