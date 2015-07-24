<?php
  class RbacRoleModel extends Model {
    
    private $_id,$_role_id,$_name,$_pid,$_status,$_info;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取用户组记录条数
    public function GetTotalRole(){
      $_sql="SELECT COUNT(*) FROM rbac_role";
      return parent::GetTotal($_sql);
    }

    // 获取所有用户组记录条数
    public function GatAllRole(){
      $_sql="SELECT id,name,type,status,info
                FROM rbac_role
                ORDER BY id ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 新增一条用户组记录
    public function AddRole(){
      $_sql = "INSERT INTO rbac_role(name,status,info) 
                VALUES ('$this->_name','$this->_status','$this->_info')";
      return parent::CUD($_sql);
    }

    // 删除
    public function DeleteRole(){
      $_sql = "DELETE FROM rbac_role 
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    // 获取一条用户组记录
    public function GetOneRole(){
      $_sql = "SELECT name,status,info
                FROM rbac_role 
                WHERE id='$this->_id' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    // 修改一条记录
    public function UpdateRole(){
      $_sql = "UPDATE rbac_role
                SET name='$this->_name',info='$this->_info',status='$this->_status'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    // 获取当前正在配置权限的用户组名
    public function GetThisRoleName(){
      $_sql = "SELECT name
                FROM rbac_role
                WHERE id='$this->_id'";
      return parent::GetOne($_sql);
    }

    // 获取所有权限记录
    public function GetAllNode(){
      $_sql="SELECT id,title,pid,level
                FROM rbac_node
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }

    // 获取当前用户组所拥有的权限
    public function GetRoleNode(){
      $_sql="SELECT node_id 
              FROM rbac_role_node 
              WHERE role_id = $this->_id";
      return parent::GetAll($_sql);
    }

    //删除权限
    public function DeleteNode(){
      $_sql="DELETE 
              FROM rbac_role_node 
              WHERE role_id='$this->_id'";
      return parent::CUD($_sql);
    }

    //添加权限
    public function AddNode(){
      $_sql="INSERT INTO rbac_role_node(role_id,node_id) VALUES ('$this->_id','$this->_role_id')";
      return parent::CUD($_sql);
    }
  }
?>