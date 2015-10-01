<?php
  class MemberAccountModel extends Model {
    
    private $limit,$accountID,$accountEmail,$accountNickName,$password,$loginTime,$status;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    public function getTotalAccount(){
      $_sql="SELECT COUNT(*) FROM memberAccount";
      return parent::GetTotal($_sql);
    }

    public function getAllAccount(){
      $_sql="SELECT accountID,accountEmail,accountNickName,password,signUpTime,status
                FROM member_account
                ORDER BY accountID ASC";
      return parent::GetAll($_sql);
    }

    public function addAccount(){
      $_sql = "INSERT INTO member_account(accountEmail,accountNickName,password,status,signUpTime) 
                VALUES ('$this->accountEmail','$this->accountNickName','$this->password','$this->status',NOW())";
      return parent::CUD($_sql);
    } 

    public function deleteAccount(){
      $_sql = "DELETE FROM member_account 
                WHERE accountID = '$this->accountID'";
      return parent::CUD($_sql);
    }

    public function getOneAccount(){
      $_sql = "SELECT accountEmail,accountNickName,password,status
                FROM member_account 
                WHERE accountID='$this->accountID' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    public function  updateAccount(){
      $_sql = "UPDATE member_account
                SET accountEmail='$this->accountEmail',accountNickName='$this->accountNickName',password='$this->password',status='$this->status'
                WHERE accountID='$this->accountID'
                LIMIT 1";
      return parent::CUD($_sql);
    }
  }
?>