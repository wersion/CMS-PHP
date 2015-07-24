<?php
  class RbacNodeModel extends Model {
    
    private $_limit,$_id,$_name,$_title,$_status,$_sort,$_pid,$_level,$_info;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    public function GetTotalNode(){
      $_sql="SELECT COUNT(*) FROM rbac_node";
      return parent::GetTotal($_sql);
    }

    public function GetAllNode(){
      $_sql="SELECT id,name,title,status,sort,pid,level,info
                FROM rbac_node
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }

    public function GetParentNode(){
      $_sql="SELECT id,title,pid,level
                FROM rbac_node
                ORDER BY sort ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    public function AddNode(){
      $_sql = "INSERT INTO rbac_node(name,title,status,sort,pid,level,info) 
                VALUES ('$this->_name','$this->_title','$this->_status','$this->_sort','$this->_pid','$this->_level','$this->_info')";
      return parent::CUD($_sql);
    } 

    public function DeleteNode(){
      $_sql = "DELETE FROM rbac_node 
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    public function GetOneNode(){
      $_sql = "SELECT name,title,status,sort,pid,level,info
                FROM rbac_node 
                WHERE id='$this->_id' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    public function  UpdateNode(){
      $_sql = "UPDATE rbac_node
                SET name='$this->_name',info='$this->_info',status='$this->_status'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }
  }
?>