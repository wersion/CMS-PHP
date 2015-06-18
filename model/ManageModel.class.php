<?php
  class ManageModel extends Model {
     
     public function getTotalManage(){
      $_sql = "SELECT COUNT(*) FROM cms_manage";
      return parent::GetTotal($_sql);
     }

    public function getOneManage($_id){
      $_sql = "SELECT id,admin_user,admin_pass,`level` 
                FROM cms_manage 
                WHERE id='$_id' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    // 登陆查询
    public function getLoginManage($_user,$_pass){
      $_sql = "SELECT id,admin_user
                FROM cms_manage
                WHERE admin_user='$_user' AND admin_pass='$_pass'
                LIMIT 1";
      return parent::GetOne($_sql);
    }

    public function getAllManage($_limit){
      $_sql = "SELECT m.id,m.admin_user,l.level_name,m.last_ip,m.last_time,m.login_count,m.reg_time 
                FROM cms_manage m,cms_level l
                WHERE m.level=l.level
                ORDER BY m.id ASC
                $_limit;";
      return parent::GetAll($_sql);
    }

    public function getLevel(){
      $_sql = "SELECT `level`,level_name 
                FROM cms_level";
      return parent::GetAll($_sql);
    }

    public function  updateManage($_id,$_admin_user,$_admin_pass,$_level){
      $_sql = "UPDATE cms_manage
                SET admin_user='$_admin_user',admin_pass='$_admin_pass',`level`='$_level'
                WHERE id='$_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function deleteManage($_id){
      $_sql = "DELETE FROM cms_manage 
                WHERE id = '$_id'";
      return parent::CUD($_sql);
    }

    public function addManage($_admin_user,$_admin_pass,$_level){
      $_sql = "INSERT INTO cms_manage(admin_user,admin_pass,`level`,reg_time) 
                VALUES ('$_admin_user','$_admin_pass','$_level',NOW())";
      return parent::CUD($_sql);
    }
  }
?>