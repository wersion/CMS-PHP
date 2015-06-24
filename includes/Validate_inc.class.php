<?php
  class Validate_inc{

    // 检查Session
    static function checkSession(){
      if(!isset($_SESSION['admin'])){
        Tool_inc::alertJump('非法登陆','admin_login.php');
      }
    }

    // 检查两个表单的数据是否一致
    static function checkEqual($date,$other_date){
      if(trim($date) != trim($other_date)){
        Tool_inc::alertBack('两次密码输入必须相同');
        return false;
      }
      else{
        return true;
      }
    }

    // 检查长度（要检查的字符串，是否允许为空，最小长度，最大长度）
    static public function checkForm($date,$null,$min,$max,$info){
      switch ($null) {
        // 内容不允许为空
        case false:
          if(self::checknull($date,$info)&&self::checkLength($date,$min,$max,$info)){
            return true;
          }
          else{
            return false;
          }
          break;
        // 内容允许为空
        case true:
          if(self::checkLength($date,$min,$max,$info)){
            return true;
          }
          else{
            return false;
          }
          break;
        default:
          echo"参数错误";
          break;
      }
    }

    // 检查表单数据是否为空
    static private function checknull($date,$info){
      if(trim($date) == ''){
        Tool_inc::alertBack($info.'不能为空！');
        return false;
      }
      else{
        return true;
      }
    }
    // 检查表单数据是否符合指定长度
    static private function checkLength($date,$min,$max,$info){
      if (mb_strlen(trim($date),'utf-8') > $max){
        Tool_inc::alertBack($info.'不能大于'.$max.'位');
        return false;
      }
      elseif(mb_strlen(trim($date),'utf-8') < $min){
        Tool_inc::alertBack($info.'不能小于'.$min.'位');
        return false;
      }
      else{
        return true;
      }
    }

  }
?>