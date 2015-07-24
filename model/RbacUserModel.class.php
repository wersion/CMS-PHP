<?php
  class RbacUserModel extends Model {
    
    private $_limit,$_id,$_username,$_password,$_logintime,$_loginip,$_status,$_role_id,$_user_id;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    //查询用户总条数
    public function GetTotalUser(){
      $_sql="SELECT COUNT(*) FROM rbac_user";
      return parent::GetTotal($_sql);
    }

    //查询所有用户记录
    public function GetAllUser(){
      $_sql="SELECT u.id,u.username,r.`name` as user_role,u.logintime,u.loginip,u.`status` 
              FROM rbac_user u, rbac_role r,rbac_role_user ru 
              WHERE u.id=ru.user_id AND r.id=ru.role_id";
      return parent::GetAll($_sql);
    }

    // 查询所有用户组
    public function GetAllRole(){
      $_sql="SELECT id,name
                FROM rbac_role
                ORDER BY id ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 新增用户
    public function AddUser(){
      $_sql = "INSERT INTO rbac_user(username,password,logintime,loginip,status)
                VALUES ('$this->_username','$this->_password',NOW(),'$this->_loginip','$this->_status')";
      return parent::CUD($_sql);
    } 

    public function AddUserRole(){
      $_sql = "INSERT INTO rbac_role_user(user_id,role_id)
                VALUES (".parent::GetNextId('rbac_user')."-1,'$this->_role_id')";
      return parent::CUD($_sql);
    }

    // 删除用户
    public function DeleteUser(){
      $_sql = "DELETE FROM rbac_user 
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    // 获取一条用户数据
    public function GetOneUser(){
      $_sql = "SELECT username,password,status
                FROM rbac_user 
                WHERE id='$this->_id' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    // 修改一条用户数据
    public function  UpdateUser(){
      $_sql = "UPDATE rbac_user
                SET username='$this->_username',password='$this->_password',status='$this->_status'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    //修改用户所对应的用户组信息
    public function UpdateUserRole(){
      $_sql = "UPDATE rbac_role_user
                SET role_id='$this->_role_id'
                WHERE user_id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }
  }
?>