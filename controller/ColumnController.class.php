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
        case 'Add':
          $this->Add();
          break;
        // 删
        case 'Delete':
          $this->Delete();
          break;
        // 改
        case 'Update':
          $this->Update();          
          break;
        // 查
        case 'Show':
          $this->Show();
          break;
        // 查询子栏目
        case 'ShowSubColumn':
          $this->ShowSubColumn();
          break;
        case 'AddSubColumn':
          $this->AddSubColumn();
          break;
        default:
          Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 增
    private function Add(){
      $this->_tpl->assign('Add',true);
      $this->_tpl->assign('title','添加顶级栏目');
      if(isset($_POST['send'])){
        if(Validate_inc::checkForm($_POST['column_name'],false,2,16,'栏目名称')){
          $this->_model->_column_name = $_POST['column_name'];
        }
        if(Validate_inc::checkForm($_POST['column_info'],false,2,200,'栏目描述')){
          $this->_model->_column_info = $_POST['column_info'];
        }
        $this->_model->_parent_id = $_POST['parent_id'];
        if($this->_model->AddColumn()){
            Tool_inc::alertJump(':) 创建栏目成功','column.php?action=show');
        }
        else{
           Tool_inc::alertBack(':( 创建栏目失败');
        }
      }
    }

    // 删
    private function Delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->DeleteColumn()){
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
    private function Update(){
      $this->_tpl->assign('Update',true);
      $this->_tpl->assign('title','修改栏目');
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->GetOneColumn();
        $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
        $this->_tpl->assign('id',$date->id);        
        $this->_tpl->assign('column_name',$date->column_name);
        $this->_tpl->assign('parent_id',$date->parent_id);
        $this->_tpl->assign('sort',$date->sort);
        $this->_tpl->assign('column_info',$date->column_info);
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['column_id'];
          $this->_model->_parent_id = $_POST['parent_id'];
          $this->_model->_sort = $_POST['sort'];
          $this->_model->_column_info = $_POST['column_info'];
          if(Validate_inc::checkForm($_POST['column_name'],false,2,16,'等级名称')){
            $this->_model->_column_name = $_POST['column_name'];
          }
          if(Validate_inc::checkForm($_POST['column_info'],false,2,200,'等级描述')){
            $this->_model->_column_info = $_POST['column_info'];
          }
          if($this->_model->UpdateColumn()){
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
    private function Show(){
      parent::page($this->_model->GetParentColumnTotal());
      $this->_tpl->assign('Show',true);
      $this->_tpl->assign('title','顶级栏目列表');
      $this->_tpl->assign('AllColumn',$this->_model->GetAllParentColumn());
    }

    // 查询子栏目
    private function ShowSubColumn(){
      $_parent_id = $_GET['p_id'];
      $this->_model->_parent_id = $_parent_id;
      $this->_model->_id = $_parent_id;
      $date = $this->_model->GetOneColumn();
      parent::page($this->_model->GetSubColumnTotal());
      $this->_tpl->assign('ShowSubColumn',true);
      $this->_tpl->assign('parent_id',$_parent_id);
      $this->_tpl->assign('parent_column',$date->column_name);
      $this->_tpl->assign('title','"'.$date->column_name.'"子栏目列表');
      $this->_tpl->assign('AllColumn',$this->_model->GetAllSubColumn());
    }

    // 添加子栏目
    private function AddSubColumn(){
      $this->_tpl->assign('AddSubColumn',true);
      $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
      $this->_tpl->assign('title','添加栏目');
      if(isset($_POST['send'])){
        if(Validate_inc::checkForm($_POST['column_name'],false,2,16,'栏目名称')){
          $this->_model->_column_name = $_POST['column_name'];
        }
        if(Validate_inc::checkForm($_POST['column_info'],false,2,200,'栏目描述')){
          $this->_model->_column_info = $_POST['column_info'];
        }
        $this->_model->_parent_id = $_GET['p_id'];
        if($this->_model->AddColumn()){
            Tool_inc::alertJump(':) 创建栏目成功',$_POST['pre_url']);
        }
        else{
           Tool_inc::alertBack(':( 创建栏目失败');
        }
      }
    }

}

?>