<?php
  class LoginModel extends Model {
    
    private $userID,$userName,$passWord,$_limit,$loginIP;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 用户查询
    public function getLoginManage(){
      $_sql = "SELECT userID,userName,`password`
                FROM rbac_user
                WHERE userName='$this->userName' AND `password`='$this->passWord'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    //用户权限查询
    public function getUserNode(){
      $_sql = "SELECT n.nodeID,n.nodeNameCH,n.nodeNameEN,n.parentID,n.level
                FROM rbac_user u,rbac_role_user ru,rbac_role_node rn,rbac_node n
                WHERE u.userID=ru.userID AND ru.roleID=rn.roleID AND rn.nodeID=n.nodeID
                AND u.userID='$this->userID'";
      return parent::GetAll($_sql);
    }

    public function updateLoginInfo(){
      $_sql = "UPDATE rbac_user
              SET loginIP='$this->loginIP',loginTime=NOW()
              WHERE userID='$this->userID'";
      return parent::CUD($_sql);
    }

  }
?>