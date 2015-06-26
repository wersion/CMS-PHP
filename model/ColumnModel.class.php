<?php
  class ColumnModel extends Model {
    
    private $_id,$_column_name,$_column_info,$_pid,$_sort,$_limit;

    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    // 拦截器
    public function getTotalColumn(){
      $_sql = "SELECT COUNT(*) FROM cms_column";
      return parent::GetTotal($_sql);
    }

    // 获取一条记录
    public function getOneColumn(){
      $_sql = "SELECT id,column_name,column_info,pid,sort
                FROM cms_column
                WHERE id='$this->_id LIMIT 1';"; 
      return parent::GetOne($_sql);
    }

    public function getAllColumn(){
      $_sql = "SELECT * 
                FROM cms_column
                ORDER BY id DESC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    public function  updateColumn(){
      $_sql = "UPDATE cms_column
                SET column_name='$this->_column_name',column_info='$this->_column_info',pid='$this->_pid',sort='$this->_sort'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function deleteColumn(){
      $_sql = "DELETE FROM cms_column
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    public function addColumn(){
      $_sql = "INSERT INTO cms_column(column_name,column_info,pid,sort) 
                VALUES ('$this->_column_name','$this->_column_info','$this->_pid',".parent::GetNextId('cms_column').")";
      return parent::CUD($_sql);
    }
  }
?>