<?php
/*获取首页导航栏
**
*/

    function smarty_function_GetNav($params,&$smarty){
        // 实例化模型类
        $_model = new TagModel();
        //判断用户是否设置返回数据的变量名
        if(isset($params['assign'])){
          $assign = $params['assign'];
        }else{
          echo" 没有设置返回数据的变量名！";
          exit();
        }
        // 判断用户是否设置limit，有则获取
          $limit = $params['limit'];
        // 获取数据
        $ColumnInfo = $_model->getAllTopColumn();
        $PageInfo = $_model->getAllTopPage();
        $Nav = array();
        //列表页操作
        $listUrl = 'list.php';
        $data = array('navID','navName','sort','url');
        //根据用户传入的参数和id生成url字段，并执行入栈操作
        for ($i=0; $i < count($ColumnInfo); $i++) { 
        $c_url = $listUrl.'?cid='.$ColumnInfo[$i]['columnID'];
        array_push($ColumnInfo[$i],$c_url);
        }
        //重组数组，修改数组键值
        for ($j=0;$j<count($ColumnInfo);$j++){
        $ColumnInfo[$j] = array_combine($data, array_slice($ColumnInfo[$j], 0, 4));
        }
        
        //单页操作
        $pageUrl = 'page.php';
        $data = array('navID','navName','sort','url');
        //根据用户传入的参数和id生成url字段，并执行入栈操作
        for ($i=0; $i < count($PageInfo); $i++) { 
        $c_url = $pageUrl.'?cid='.$PageInfo[$i]['pageID'];
        array_push($PageInfo[$i],$c_url);
        }
        //重组数组，修改数组键值
        for ($j=0;$j<count($PageInfo);$j++){
        $PageInfo[$j] = array_combine($data, array_slice($PageInfo[$j], 0, 4));
        }
        
        for($i=0;$i<count($PageInfo);$i++){
            array_push($ColumnInfo,$PageInfo[$i]);
        }
        //排序
        $count = count($ColumnInfo);
        for($i=0;$i<$count;$i++){
            for($j=0;$j<$count-$i-1;$j++){
                if($ColumnInfo[$j]['sort']>$ColumnInfo[$j+1]['sort']){
                    $temp = $ColumnInfo[$j];
                    $ColumnInfo[$j] = $ColumnInfo[$j+1];
                    $ColumnInfo[$j+1] = $temp;
                }
            }
        }
        //将数据注入到模板
        $smarty->assign($assign,$ColumnInfo);
    }
?>