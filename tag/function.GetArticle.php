<?php
/*获取当前文章的内容
**
**参数：assign（返回数据的变量名，必填）、url（需要生产的链接，可选）、limit（取出数据的条数，可选）
**可返回的数据：id（栏目id）、column_name（栏目名）、url（链接）
**
**{GetTopColumn assign="data" url="index.php" limit="5"}
**{foreach from=$data key=key item=item}
**  <li><a href="{$item.url}">{$item.column_name}</a></li>
**{/foreach}
*/

    function smarty_function_GetArticle($params,&$smarty){
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
        if(isset($params['articleID'])){
          $_model->articleID = $params['articleID'];
        }else{
          $_model->articleID = $_GET['aid'];
        }
        // 获取数据
        $articleInfo = $_model->getArticle();
        //将数据注入到模板
        $smarty->assign($assign,$articleInfo);
    }
?>
