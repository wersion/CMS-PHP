<?php
  // 数据库链接类
  class DB_inc{

    // 获取对象句柄
  	static public function getDB(){
  		$_mysqli = new mysqli(DB_IP,DB_USER,DB_PASS,DB_NAME);
      if(mysqli_connect_errno()){
        echo'数据库链接失败';
        exit();
      }
      $_mysqli->set_charset('utf8');
      return $_mysqli;
  	}

    // 清理对象
  	static public function unDB(&$_result,&$_db){
      if(is_object($_result)){
        $_result->free();
        $_result=null;
      }
      if(is_object($_db)){
        $_db->close();
        $_db=null;
      }
  	}
  }
?>