<?php
  class LevelModel extends Model {
     
    // 获取一条记录
    public function getOneLevel($_id){
      $_sql = "SELECT id,`level`,level_name,level_info
                FROM cms_level
                WHERE id='$_id LIMIT 1';"; 
      return parent::GetOne($_sql);
    }

    public function getAllLevel(){
      $_sql = "SELECT * 
                FROM cms_level";
      return parent::GetAll($_sql);
    }

    public function  updateLevel($_id,$_level,$_level_name,$_level_info){
      $_sql = "UPDATE cms_level
                SET `level`='$_level',level_name='$_level_name',level_info='$_level_info'
                WHERE id='$_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function deleteLevel($_id){
      $_sql = "DELETE FROM cms_level
                WHERE id = '$_id'";
      return parent::CUD($_sql);
    }

    public function addLevel($_level,$_level_name,$_level_info){
      $_sql = "INSERT INTO cms_level(`level`,level_name,level_info) 
                VALUES ('$_level','$_level_name','$_level_info')";
      return parent::CUD($_sql);
    }
  }
?>