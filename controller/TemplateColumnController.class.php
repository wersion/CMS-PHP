<?php
  class TemplateColumnController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new TemplateColumnModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        case 'defaultColumn':
          $this->defaultColumn();
		      break;
        case 'setColumnTemplate':
          $this->setColumnTemplate();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 默认模板
    private function defaultColumn(){
      $node = Validate_public::checkNode('defaultColumn');
      $this->_tpl->assign('defaultColumn',true);
      $date = $this->_model->getDefaultColumnTemplate();
      $this->_tpl->assign('default',$date['df']);
      if(isset($_POST['send'])){
        $this->_model->templateName = $_POST['templates'];
        if($this->_model->setDefaultColumnTemplate()){
            Tool_public::alertJump(':) 修改默认模板成功','templateColumn.php?action=setIndex');
          }else{
            Tool_public::alertBack(':) 修改默认模板成功','templateColumn.php?action=setIndex');
          }
      }
    }
    
    // 批量设置文章模板
    private function setColumnTemplate(){
      $node = Validate_public::checkNode('setColumnTemplate');
      $this->_tpl->assign('setColumnTemplate',true);
      parent::page($this->_model->getColumnCount());
      $data = $this->_model->getColumnTemplate();
      $this->_tpl->assign('column',$data);
      if(isset($_POST['select'])){
        $id = $_POST['checkbox'];
        $this->_model->templateName=$_POST['templates'];
        $count = 0;
        foreach($id as $value){
          $this->_model->columnID = $value;
          $this->_model->setColumnTemplate();
          $count++;
        }
        Tool_public::alertJump('共修改'.$count.'条记录','templateColumn.php?action=setColumnTemplate');
      }elseif(isset($_POST['all'])){
        $this->_model->templateName=$_POST['templates'];
        $count = $this->_model->setAllColumnTemplate();
        Tool_public::alertJump('共修改'.$count.'条记录','templateColumn.php?action=setColumnTemplate');
      } 
    }
}
?>