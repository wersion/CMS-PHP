<?php
  // 通用提示
  class Tool_inc{

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
  }
?>