<?php
  //内容实体类
  class ContentModel extends Model {
    
    //拦截器(__set)
    public function __set($_key, $_value) {
      $this->$_key = Tool::mysqlString($_value);
    }
    
    //拦截器(__get)
    public function __get($_key) {
      return $this->$_key;
    }
    

    
  }
?>