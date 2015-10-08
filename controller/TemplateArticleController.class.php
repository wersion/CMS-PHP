<?php
  class TemplateArticleController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new TemplateArticleModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        case 'defaultArticle':
          $this->defaultArticle();
		      break;
        case 'setArticleTemplate':
          $this->setArticleTemplate();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 默认模板
    private function defaultArticle(){
      $node = Validate_public::checkNode('defaultArticle');
      $this->_tpl->assign('defaultArticle',true);
      $date = $this->_model->getDefaultArticleTemplate();
      $this->_tpl->assign('default',$date['df']);
      if(isset($_POST['send'])){
        $this->_model->templateName = $_POST['templates'];
        if($this->_model->setDefaultArticleTemplate()){
            Tool_public::alertJump(':) 修改默认模板成功','templateArticle.php?action=setIndex');
          }else{
            Tool_public::alertBack(':) 修改默认模板成功','templateArticle.php?action=setIndex');
          }
      }
    }
    
    // 批量设置文章模板
    private function setArticleTemplate(){
      $node = Validate_public::checkNode('setArticleTemplate');
      $this->_tpl->assign('setArticleTemplate',true);
      parent::page($this->_model->getArticleCount());
      $data = $this->_model->getArticleTemplate();
      $this->_tpl->assign('article',$data);
      if(isset($_POST['select'])){
        $id = $_POST['checkbox'];
        $this->_model->templateName=$_POST['templates'];
        $count = 0;
        foreach($id as $value){
          $this->_model->articleID = $value;
          $this->_model->setArticleTemplate();
          $count++;
        }
        Tool_public::alertJump('共修改'.$count.'条记录','templateArticle.php?action=setArticleTemplate');
      }elseif(isset($_POST['all'])){
        $this->_model->templateName=$_POST['templates'];
        $count = $this->_model->setAllArticleTemplate();
        Tool_public::alertJump('共修改'.$count.'条记录','templateArticle.php?action=setArticleTemplate');
      } 
    }
}
?>