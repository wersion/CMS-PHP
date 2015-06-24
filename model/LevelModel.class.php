<?php
  class LevelModel extends Model {
    
    private $_id,$_level,$_level_name,$_level_info,$_limit;

    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }
    // 拦截器
    public function getTotalLevel(){
      $_sql = "SELECT COUNT(*) FROM cms_level";
      return parent::GetTotal($_sql);
    }

    // 获取一条记录
    public function getOneLevel(){
      $_sql = "SELECT id,`level`,level_name,level_info
                FROM cms_level
                WHERE id='$this->_id LIMIT 1';"; 
      return parent::GetOne($_sql);
    }

    public function getAllLevel(){
      $_sql = "SELECT * 
                FROM cms_level
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    public function  updateLevel(){
      $_sql = "UPDATE cms_level
                SET `level`='$this->_level',level_name='$this->_level_name',level_info='$this->_level_info'
                WHERE id='$this->_id'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function deleteLevel(){
      $_sql = "DELETE FROM cms_level
                WHERE id = '$this->_id'";
      return parent::CUD($_sql);
    }

    public function addLevel(){
      $_sql = "INSERT INTO cms_level(`level`,level_name,level_info) 
                VALUES ('$this->_level','$this->_level_name','$this->_level_info')";
      return parent::CUD($_sql);
    }
  }
?>