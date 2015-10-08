<?php
  //首页模板数据模型

  class TemplateIndexModel extends Model {
    
    private $templateName;
    
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
    
    public function setIndexTemplate(){
        $_sql = "UPDATE template_index
                SET templateName='$this->templateName'";
      return parent::CUD($_sql);
    }
  }
?>