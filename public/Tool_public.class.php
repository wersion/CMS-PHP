<?php
  // 通用提示
  class Tool_public{

    // 弹窗+跳转
    static public function alertJump($_info,$_url){
      if(!empty($_info)){
        echo"<script type='text/javascript'>alert('$_info');location.href='$_url'</script>";
        exit();
      }
      else{
        header('Location:'.$_url);
        exit();
      }
    } 

    // 弹窗并返回
    static public function alertBack($_info){
      echo"<script type='text/javascript'>alert('$_info');history.back();</script>";
      exit();
    }

    // 清理SESSION
    static public function unSession(){
      if(isset($_SESSION)){
        session_destroy();
      }     
    }

    // html特殊字符转义
    static public function htmlString($date){
      // new一个空的sting对象，最后返回对象
      $string  = new stdClass();
      if(is_array($date)) {
        foreach ($date as $key => $value) {
          $string->$key = self::htmlString($value);
        }
      }
      elseif (is_object($date)) {
        foreach ($date as $key => $value) {
          $string->$key = self::htmlString($value);
        }
      }
      else{
        $string = htmlspecialchars($date);
      }
      return $string;
    }
  }
?>