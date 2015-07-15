<?php
/*获取当前页面栏目的信息，如设置栏目ID则可以根据参数获取栏目信息
**
**参数：assign（返回数据的变量名，必填）、cid（指定栏目ID，可选）
**可返回的数据：id（栏目id）、column_name（栏目名）、column_info（栏目介绍）、pid（父栏目id）、sort（排序）
**
**{GetThisColumn assign="thiscolumn" cid="1"}
**{$thiscolumn.id}
**{$thiscolumn.column_name}
*/

    function smarty_function_GetThisColumn($params,&$smarty){
        // 实例化模型类
        $_model = new TagModel();
        if (isset($params['assign'])){
          $assign = $params['assign'];
          // 判断是否设置参数cid，如没有则从url中获取
          if (isset($params['cid'])) {
            $_model->_column_id = $params['cid'];
          }
          else{
            $_model->_column_id = $_GET['cid'];
          }
          if($ColumnInfo = $_model->GetOneColumn()){
            //将数据注入到模板
            $smarty->assign($assign,$ColumnInfo);
          }else{
            echo"没有获取到指定的栏目";
            exit();
          }
        }else{
          echo"没有设置返回数据的变量名！";
          exit();
        }
    }
?>