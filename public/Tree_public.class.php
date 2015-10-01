<?php
  // 重组数组，生成树形结果
  class Tree_public{
    static public $TreeList=array();

    static public function createTreeStruct($data,$pid,$idName){
      foreach ($data as $key => $value) {
        if($value['parentID']==$pid){
          self::$TreeList[]=$value;
          unset($data[$key]);
          self::createTreeStruct($data,$value[$idName],$idName);
        }
      }
      return self::$TreeList;
    }
}
?>