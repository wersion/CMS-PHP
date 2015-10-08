<?php
/*获取当前栏目下的文章列表（只包含下一层子栏目）
**
**参数：assign（返回数据的变量名，必填）、url（需要生产的链接，可选）、limit（取出数据的条数，可选）
**可返回的数据：id（栏目id）、column_name（栏目名）、url（链接）
**
**{GetTopColumn assign="data" url="index.php" limit="5"}
**{foreach from=$data key=key item=item}
**  <li><a href="{$item.url}">{$item.column_name}</a></li>
**{/foreach}
*/

    function smarty_function_GetAllArticleList($params,&$smarty){
        // 实例化模型类
        $_model = new TagModel();
        //判断用户是否设置返回数据的变量名
        if(isset($params['assign'])){
          $assign = $params['assign'];
        }else{
          echo" 没有设置返回数据的变量名！";
          exit();
        }
        //判断用户是否设定栏目ID
        if(isset($params['columnID'])){
          $_model->columnID = $params['columnID'];
        }else{
          $_model->columnID = $_GET['cid'];
        }
        //判断用户是否设置limit，有则获取
        if(isset($params['limit'])){
          $limit = $params['limit'];
          $_page = new Page_public($_model->getArticleListTotal(),$limit);
          $_model->limit = $_page->limit;
          $smarty->assign('Page',$_page->showPage());
        }
        // 获取数据
        $ArticleInfo = $_model->getAllArticleList();
        // 判断用户是否设置url，有则获取,并重组数组
        if(isset($params['url'])){
          $url = $params['url'];
          $data = array('columnID','columnName','articleTitle','articleUpdatetime','articleInfo','url');
          //根据用户传入的参数和id生成url字段，并执行入栈操作
          for ($i=0; $i < count($ArticleInfo); $i++) { 
            $c_url = $url.'?aid='.$ArticleInfo[$i]['articleID'];
            array_push($ArticleInfo[$i],$c_url);
          }
          //重组数组，修改数组键值
          for ($j=0;$j<count($ArticleInfo);$j++){
            $ArticleInfo[$j] = array_combine($data, array_slice($ArticleInfo[$j], 0, 6));
          }
        }
        //将数据注入到模板
        $smarty->assign($assign,$ArticleInfo);
    }
?>
