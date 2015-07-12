<?php
  //前台模板数据模型

  class TagModel extends Model {
    
    private $_limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取所有父级栏目
    public function getAllTopColumn(){
      $_sql = "SELECT id,column_name 
                FROM cms_column
                WHERE pid=0
                ORDER BY sort ASC
                $this->_limit;";
      return parent::GetAll_array($_sql);
    }   
  }
?>