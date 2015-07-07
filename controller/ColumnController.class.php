<?php
  class ColumnController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ColumnModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'create':
          $this->add();
          break;
        // 删
        case 'delete':
          $this->delete();
          break;
        // 改
        case 'update':
          $this->update();          
          break;
        // 查
        case 'show':
          $this->read();
          break;
        // 查询子栏目
        case 'showC_Column':
          $this->showC_Column();
          break;
        case 'createC_Column':
          $this->createC_Column();
          break;
        default:
          Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 增
    private function add(){
      $this->_tpl->assign('create',true);
      $this->_tpl->assign('title','添加顶级栏目');
      if(isset($_POST['send'])){
        if(Validate_inc::checkForm($_POST['column_name'],false,2,16,'栏目名称')){
          $this->_model->_column_name = $_POST['column_name'];
        }
        if(Validate_inc::checkForm($_POST['column_info'],false,2,200,'栏目描述')){
          $this->_model->_column_info = $_POST['column_info'];
        }
        $this->_model->_pid = $_POST['pid'];
        if($this->_model->addColumn()){
            Tool_inc::alertJump(':) 创建栏目成功','column.php?action=show');
        }
        else{
           Tool_inc::alertBack(':( 创建栏目失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->deleteColumn()){
          Tool_inc::alertJump(':) 删除栏目成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_inc::alertBack(':( 删除栏目失败');
        }
      }
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 改
    private function update(){
      $this->_tpl->assign('update',true);
      $this->_tpl->assign('title','修改栏目');
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->getOneColumn();
        $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
        $this->_tpl->assign('id',$date->id);        
        $this->_tpl->assign('column_name',$date->column_name);
        $this->_tpl->assign('pid',$date->pid);
        $this->_tpl->assign('sort',$date->sort);
        $this->_tpl->assign('column_info',$date->column_info);
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['column_id'];
          $this->_model->_pid = $_POST['pid'];
          $this->_model->_sort = $_POST['sort'];
          if(Validate_inc::checkForm($_POST['column_name'],false,2,16,'等级名称')){
            $this->_model->_column_name = $_POST['column_name'];
          }
          if(Validate_inc::checkForm($_POST['column_info'],false,2,200,'等级描述')){
            $this->_model->_column_info = $_POST['column_info'];
          }
          if($this->_model->updateColumn()){
            Tool_inc::alertJump(':) 修改栏目成功',$_POST['pre_url']);
          }
          else{
            Tool_inc::alertBack(':( 修改栏目失败');
          }
        }
      } 
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 查顶级栏目
    private function read(){
      parent::page($this->_model->getTotalF_Column());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','顶级栏目列表');
      $this->_tpl->assign('AllColumn',$this->_model->getAllF_Column());
    }

    // 查询子栏目
    private function showC_Column(){
      $_pid = $_GET['pid'];
      $this->_model->_pid = $_pid;
      $this->_model->_id = $_pid;
      $date = $this->_model->getOneColumn();
      parent::page($this->_model->getTotalC_Column());
      $this->_tpl->assign('showC_Column',true);
      $this->_tpl->assign('pid',$_pid);
      $this->_tpl->assign('f_column',$date->column_name);
      $this->_tpl->assign('title','"'.$date->column_name.'"子栏目列表');
      $this->_tpl->assign('AllColumn',$this->_model->getAllC_Column());
    }

    // 添加子栏目
    private function createC_Column(){
      $this->_tpl->assign('createC_Column',true);
      $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
      $this->_tpl->assign('title','添加栏目');
      if(isset($_POST['send'])){
        if(Validate_inc::checkForm($_POST['column_name'],false,2,16,'栏目名称')){
          $this->_model->_column_name = $_POST['column_name'];
        }
        if(Validate_inc::checkForm($_POST['column_info'],false,2,200,'栏目描述')){
          $this->_model->_column_info = $_POST['column_info'];
        }
        $this->_model->_pid = $_GET['pid'];
        if($this->_model->addColumn()){
            Tool_inc::alertJump(':) 创建栏目成功',$_POST['pre_url']);
        }
        else{
           Tool_inc::alertBack(':( 创建栏目失败');
        }
      }
    }

}

?>