<?php
  class TemplatePageController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new TemplatePageModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        case 'defaultPage':
          $this->defaultPage();
		      break;
        case 'setPageTemplate':
          $this->setPageTemplate();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 默认模板
    private function defaultPage(){
      $node = Validate_public::checkNode('defaultPage');
      $this->_tpl->assign('defaultPage',true);
      $date = $this->_model->getDefaultPageTemplate();
      $this->_tpl->assign('default',$date['df']);
      if(isset($_POST['send'])){
        $this->_model->templateName = $_POST['templates'];
        if($this->_model->setDefaultPageTemplate()){
            Tool_public::alertJump(':) 修改默认模板成功','templatePage.php?action=setIndex');
          }else{
            Tool_public::alertBack(':) 修改默认模板成功','templatePage.php?action=setIndex');
          }
      }
    }
    
    // 批量设置文章模板
    private function setPageTemplate(){
      $node = Validate_public::checkNode('setPageTemplate');
      $this->_tpl->assign('setPageTemplate',true);
      parent::page($this->_model->getPageCount());
      $data = $this->_model->getPageTemplate();
      $this->_tpl->assign('page',$data);
      if(isset($_POST['select'])){
        $id = $_POST['checkbox'];
        $this->_model->templateName=$_POST['templates'];
        $count = 0;
        foreach($id as $value){
          $this->_model->pageID = $value;
          $this->_model->setPageTemplate();
          $count++;
        }
        Tool_public::alertJump('共修改'.$count.'条记录','templatePage.php?action=setPageTemplate');
      }elseif(isset($_POST['all'])){
        $this->_model->templateName=$_POST['templates'];
        $count = $this->_model->setAllPageTemplate();
        Tool_public::alertJump('共修改'.$count.'条记录','templatePage.php?action=setPageTemplate');
      } 
    }
}
?>