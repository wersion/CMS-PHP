<?php
  class ColumnModel extends Model {
    
    private $_id,$_column_name,$_column_info,$_parent_id,$_sort,$_limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取所有父级栏目条数
    public function GetParentColumnTotal(){
      $_sql = "SELECT COUNT(*) FROM cms_column WHERE parent_id=0";
      return parent::GetTotal($_sql);
    }

    // 获取所有父级栏目
    public function GetAllParentColumn(){
      $_sql = "SELECT * 
                FROM cms_column
                WHERE parent_id=0
                ORDER BY sort ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 获取当前栏目下的子栏目总数
    public function GetSubColumnTotal(){
      $_sql = "SELECT COUNT(*) FROM cms_column WHERE parent_id='$this->_parent_id'";
      return parent::GetTotal($_sql);
    }

    // 获取当前栏目下的所有子栏目
    public function GetAllSubColumn(){
      $_sql = "SELECT * 
                FROM cms_column
                WHERE parent_id='$this->_parent_id'
                ORDER BY sort ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 获取一条记录
    public function GetOneColumn(){
      $_sql = "SELECT id,column_name,column_info,parent_id,sort
                FROM cms_column
                WHERE id='$this->_id LIMIT 1';"; 
      return parent::GetOne($_sql);
    }

    public function  UpdateColumn(){
      $_sql = "UPDATE cms_column
                SET column_name='$this->_column_name',column_info='$this->_column_info',parent_id='$this->_parent_id',sort='$this->_sort',column_info='$this->_column_info'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function DeleteColumn(){
      $_sql = "DELETE FROM cms_column
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    //增加一条记录
    public function AddColumn(){
      $_sql = "INSERT INTO cms_column(column_name,column_info,parent_id,sort) 
                VALUES ('$this->_column_name','$this->_column_info','$this->_parent_id',".parent::GetNextId('cms_column').")";
      return parent::CUD($_sql);
    }
  }
?>