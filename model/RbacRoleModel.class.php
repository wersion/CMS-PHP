<?php
  class RbacRoleModel extends Model {
    
    private $roleID,$nodeID,$roleName,$parentID,$status,$roleInfo,$limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取用户组记录条数
    public function getTotalRole(){
      $_sql="SELECT COUNT(*) FROM rbac_role";
      return parent::GetTotal($_sql);
    }

    // 获取所有用户组记录条数
    public function getAllRole(){
      $_sql="SELECT roleID,roleName,roleType,status,roleInfo
                FROM rbac_role
                ORDER BY roleID ASC
                $this->limit;";
      return parent::GetAll($_sql);
    }

    // 新增一条用户组记录
    public function addRole(){
      $_sql = "INSERT INTO rbac_role(roleName,status,roleInfo) 
                VALUES ('$this->roleName','$this->status','$this->roleInfo')";
      return parent::CUD($_sql);
    }

    // 删除
    public function deleteRole(){
      $_sql = "DELETE FROM rbac_role 
                WHERE roleID = '$this->roleID'";
      return parent::CUD($_sql);
    }

    // 获取一条用户组记录
    public function getOneRole(){
      $_sql = "SELECT roleName,status,roleInfo
                FROM rbac_role 
                WHERE roleID='$this->roleID' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    // 修改一条记录
    public function updateRole(){
      $_sql = "UPDATE rbac_role
                SET roleName='$this->roleName',roleInfo='$this->roleInfo',status='$this->status'
                WHERE roleID='$this->roleID'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    // 获取当前正在配置权限的用户组名
    public function getThisRoleName(){
      $_sql = "SELECT roleName
                FROM rbac_role
                WHERE roleID='$this->roleID'";
      return parent::GetOne($_sql);
    }

    // 获取所有权限记录
    public function getAllNode(){
      $_sql="SELECT nodeID,nodeNameCH,parentID,level
                FROM rbac_node
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }

    // 获取当前用户组所拥有的权限
    public function getRoleNode(){
      $_sql="SELECT nodeID 
              FROM rbac_role_node 
              WHERE roleID = '$this->roleID'";
      return parent::GetAll($_sql);
    }

    //删除权限
    public function deleteNode(){
      $_sql="DELETE 
              FROM rbac_role_node 
              WHERE roleID='$this->roleID'";
      return parent::CUD($_sql);
    }

    //添加权限
    public function addNode(){
      $_sql="INSERT INTO rbac_role_node(roleID,nodeID) VALUES ('$this->roleID','$this->nodeID')";
      return parent::CUD($_sql);
    }
  }
?>