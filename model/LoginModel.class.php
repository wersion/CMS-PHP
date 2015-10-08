<?php
  class LoginModel extends Model {
    
    private $userID,$userName,$passWord,$_limit,$loginIP,$account;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 用户查询
    public function getLoginUser(){
      $_sql = "SELECT u.userID,u.userName,u.`password`,r.roleName
                FROM rbac_user u,rbac_role_user ru,rbac_role r
                WHERE u.userID=ru.userID AND ru.roleID=r.roleID
                AND u.userName='$this->userName' AND u.`password`='$this->passWord'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    //用户权限查询
    public function getUserNode(){
      $_sql = "SELECT n.nodeID,n.nodeNameCH,n.nodeNameEN,n.parentID,n.level
                FROM rbac_user u,rbac_role_user ru,rbac_role_node rn,rbac_node n
                WHERE u.userID=ru.userID AND ru.roleID=rn.roleID AND rn.nodeID=n.nodeID
                AND u.userID='$this->userID'
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }
    //
    public function updateUserInfo(){
      $_sql = "UPDATE rbac_user
              SET loginIP='$this->loginIP',loginTime=NOW()
              WHERE userID='$this->userID'";
      return parent::CUD($_sql);
    }
    
    public function getLoginMemberEmail(){
      $_sql = "SELECT accountNickName
                FROM member_account
                WHERE accountEmail='$this->account' AND `password`='$this->passWord'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    public function getLoginMemberNickName(){
      $_sql = "SELECT accountNickName
                FROM member_account
                WHERE accountNickName='$this->account' AND `password`='$this->passWord'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

  }
?>