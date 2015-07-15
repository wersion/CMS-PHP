<?php
/*获取当前栏目的所有子栏目的信息，如设置栏目ID则可以根据参数获取栏目信息
**
**参数：assign（返回数据的变量名，必填）、url（需要生产的链接，可选）、limit（取出数据的条数，可选）
**可返回的数据：id（栏目id）、column_name（栏目名）、url（链接）
**
**{GetTopColumn assign="data" url="index.php" limit="5"}
**{foreach from=$data key=key item=item}
**  <li><a href="{$item.url}">{$item.column_name}</a></li>
**{/foreach}
*/

    function smarty_function_GetSubColumn($params,&$smarty){
        $_model = new TagModel();
        //判断是否设置返回数据的变量名
        if (isset($params['assign'])){
          $assign = $params['assign'];
          // 判断是否设置参数cid，如没有则从url中获取
          if (isset($params['parent_id'])) {
            $_model->_parent_id = $params['parent_id'];
          }
          else{
            $_model->_parent_id = $_GET['cid'];
          }
          // 判断用户是否设置limit，有则获取
          if(isset($params['limit'])){
            $limit = $params['limit'];
            $_model->_limit = 'LIMIT 0,'.$limit;
          }
          //获取数据
          if($ColumnInfo = $_model->GetSubColumn()){
            // 判断用户是否设置url，有则获取url,并重组数组
            if(isset($params['url'])){
              $url = $params['url'];
              $data = array('id','column_name','url');
              //根据用户传入的参数和id生成url字段，并执行入栈操作
              for ($i=0; $i < count($ColumnInfo); $i++) { 
                $c_url = $url.'?cid='.$ColumnInfo[$i]['id'];
                array_push($ColumnInfo[$i],$c_url);
              }
              //重组数组，修改数组键值
              for ($j=0;$j<count($ColumnInfo);$j++){
                $SubColumnInfo[$j] = array_combine($data, array_slice($ColumnInfo[$j], 0, 3));
              }
            }
            //将数据注入到模板
            $smarty->assign($assign,$SubColumnInfo);
          }else{
            echo"没有子栏目了";
          }
        }else{
          echo"没有设置返回数据的变量名！";
          exit();
        }
    }
?>