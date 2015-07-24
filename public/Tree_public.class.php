<?php
  // 重组数组，显示无限级分类
  class Tree_public{
    static public $TreeList=array();

    static public function Create($data,$pid=0){
      foreach ($data as $key => $value) {
        if($value['pid']==$pid){
          self::$TreeList[]=$value;
          unset($data[$key]);
          self::Create($data,$value['id']);
        }
      }
      return self::$TreeList;
    }
  }
?>