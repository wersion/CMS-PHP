
<?php
  class Model {

    protected function GetNextId($_table){
      $_sql = "SHOW TABLE STATUS LIKE '$_table';"; 
      $arr = $this->GetOne($_sql);
      return $arr['Auto_increment'];
    }

    // 获取总记录条数
    protected function GetTotal($_sql){
      $_db = DB_public::getDB();
      $_result = $_db->query($_sql);
      $_total = $_result->fetch_row();
      DB_public::unDB($_result,$_db);
      return $_total[0];
    }

    // 获取多条记录,返回数组
    protected function GetAll($_sql){
      $_db = DB_public::getDB();
      $_result = $_db->query($_sql);
      $_html = array();
      while(!!$_obj = $_result->fetch_array(MYSQL_ASSOC)){
        $_html[] = $_obj;
      }
      DB_public::unDB($_result,$_db);
      return $_html;
    }

    // 获取一条记录,以数组形式返回
    protected function GetOne($_sql){
      $_db = DB_public::getDB();
      $_result = $_db->query($_sql);
      $_arr = $_result->fetch_array(MYSQL_ASSOC);
      DB_public::unDB($_result,$_db);
      return $_arr;      
    }
    // 增改删
    protected function CUD($_sql){
      $_db = DB_public::getDB();
      $_db->query($_sql);
      $_affected = $_db->affected_rows;
      DB_public::unDB($_result,$_db);
      return $_affected;
    }
} 
?>