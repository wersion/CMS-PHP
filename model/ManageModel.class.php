<?php
  class ManageModel extends Model {
    
    private $_id,$admin_user,$admin_pass,$_level,$_limit;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

   public function getTotalManage(){
    $_sql = "SELECT COUNT(*) FROM cms_manage";
    return parent::GetTotal($_sql);
   }

    public function getOneManage(){
      $_sql = "SELECT id,admin_user,admin_pass,`level` 
                FROM cms_manage 
                WHERE id='$this->_id' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    // 登陆查询
    public function getLoginManage(){
      $_sql = "SELECT m.id,m.admin_user,l.level_name
                FROM cms_manage m,cms_level l
                WHERE m.level=l.level AND admin_user='$this->admin_user' AND admin_pass='$this->admin_pass'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    public function getAllManage(){
      $_sql = "SELECT m.id,m.admin_user,l.level_name,m.last_ip,m.last_time,m.login_count,m.reg_time 
                FROM cms_manage m,cms_level l
                WHERE m.level=l.level
                ORDER BY m.id ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    public function getLevel(){
      $_sql = "SELECT `level`,level_name 
                FROM cms_level";
      return parent::GetAll($_sql);
    }

    public function  updateManage(){
      $_sql = "UPDATE cms_manage
                SET admin_user='$this->admin_user',admin_pass='$this->admin_pass',`level`='$this->_level'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function deleteManage(){
      $_sql = "DELETE FROM cms_manage 
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    public function addManage(){
      $_sql = "INSERT INTO cms_manage(admin_user,admin_pass,`level`,reg_time) 
                VALUES ('$this->admin_user','$this->admin_pass','$this->_level',NOW())";
      return parent::CUD($_sql);
    }
  }
?>