<?php
  class RbacUserModel extends Model {
    
    private $limit,$userID,$userName,$password,$loginTime,$loginIP,$status,$ruRoleID;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    //查询用户总条数
    public function getTotalUser(){
      $_sql="SELECT COUNT(*) FROM rbac_user";
      return parent::GetTotal($_sql);
    }

    //查询所有用户记录
    public function getAllUser(){
      $_sql="SELECT u.userID,u.userName,r.`roleName` as userRole,u.loginTime,u.loginIP,u.`status` 
              FROM rbac_user u, rbac_role r,rbac_role_user ru 
              WHERE u.userID=ru.userID AND r.roleID=ru.roleID";
      return parent::GetAll($_sql);
    }

    // 查询所有用户组
    public function getAllRole(){
      $_sql="SELECT roleID,roleName
                FROM rbac_role
                ORDER BY roleID ASC
                $this->limit;";
      return parent::GetAll($_sql);
    }

    // 新增用户
    public function addUser(){
      $_sql = "INSERT INTO rbac_user(userName,password,loginTime,loginIP,status)
                VALUES ('$this->userName','$this->password',NOW(),'$this->loginIP','$this->status')";
      return parent::CUD($_sql);
    } 

    public function addUserRole(){
      $_sql = "INSERT INTO rbac_role_user(userID,roleID)
                VALUES (".parent::GetNextID('rbac_user')."-1,'$this->ruRoleID')";
      return parent::CUD($_sql);
    }

    // 删除用户
    public function deleteUser(){
      $_sql = "DELETE FROM rbac_user 
                WHERE userID = '$this->userID'";
      return parent::CUD($_sql);
    }

    // 获取一条用户数据
    public function getOneUser(){
      $_sql = "SELECT userName,password,status
                FROM rbac_user 
                WHERE userID='$this->userID' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    // 修改用户数据
    public function  updateUser(){
      $_sql = "UPDATE rbac_user u,rbac_role_user ru
                SET u.userName='$this->userName',u.password='$this->password',u.status='$this->status',ru.RoleID='$this->ruRoleID'
                WHERE u.userID = ru.userID AND u.userID='$this->userID'";
      return parent::CUD($_sql);
    }
  }
?>