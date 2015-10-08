<?php
  class TemplateIndexController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new TemplateIndexModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'setIndexTemplate':
          $this->setIndexTemplate();
		  break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 改
    private function setIndexTemplate(){
      $node = Validate_public::checkNode('setIndexTemplate');
      $this->_tpl->assign('setIndex',true);
      $date = $this->_model->getIndexTemplate();
      $this->_tpl->assign('indexTemplate',$date['templateName']);
      if(isset($_POST['send'])){
        $this->_model->templateName = $_POST['templates'];
        if($this->_model->setIndexTemplate()){
            Tool_public::alertJump(':) 修改模板成功','TemplateIndex.php?action=setIndex');
          }else{
            Tool_public::alertBack(':( 修改模板失败');
          }
      }
    }
}
?>