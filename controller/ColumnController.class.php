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
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function Add(){
      $this->_tpl->assign('Add',true);
      $this->_tpl->assign('title','添加顶级栏目');
      $column = $this->_model->GetAllColumnList();
      $this->_tpl->assign('ColumnList',Tree_public::Create($column));
      if(isset($_POST['send'])){
        if(Validate_public::checkForm($_POST['column_name'],false,2,16,'栏目名称')){
          $this->_model->_column_name = $_POST['column_name'];
        }
        if(Validate_public::checkForm($_POST['column_info'],false,2,200,'栏目描述')){
          $this->_model->_column_info = $_POST['column_info'];
        }
        $this->_model->_level = $_POST['level'];
        $this->_model->_pid = $_POST['pid'];
        if($this->_model->AddColumn()){
            Tool_public::alertJump(':) 创建栏目成功','column.php?action=Show');
        }
        else{
           Tool_public::alertBack(':( 创建栏目失败');
        }
      }
    }

    // 删
    private function Delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->DeleteColumn()){
          Tool_public::alertJump(':) 删除栏目成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除栏目失败');
        }
      }
      else{
        Tool_public::alertBack(':( 非法操作');
      }
    }

    // 改
    private function Update(){
      $this->_tpl->assign('Update',true);
      $this->_tpl->assign('title','修改栏目');
      $column = $this->_model->GetAllColumnList();
      $this->_tpl->assign('ColumnList',Tree_public::Create($column));
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->GetOneColumn();
        $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
        $this->_tpl->assign('id',$date['id']);        
        $this->_tpl->assign('column_name',$date['column_name']);
        $this->_tpl->assign('pid',$date['pid']);
        $this->_tpl->assign('level',$date['level']);
        $this->_tpl->assign('sort',$date['sort']);
        $this->_tpl->assign('column_info',$date['column_info']);
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['column_id'];
          $this->_model->_pid = $_POST['pid'];
          $this->_model->_sort = $_POST['sort'];
          $this->_model->_level = $_POST['level'];
          $this->_model->_column_info = $_POST['column_info'];
          if(Validate_public::checkForm($_POST['column_name'],false,2,16,'等级名称')){
            $this->_model->_column_name = $_POST['column_name'];
          }
          if(Validate_public::checkForm($_POST['column_info'],false,2,200,'等级描述')){
            $this->_model->_column_info = $_POST['column_info'];
          }
          if($this->_model->UpdateColumn()){
            Tool_public::alertJump(':) 修改栏目成功',$_POST['pre_url']);
          }
          else{
            Tool_public::alertBack(':( 修改栏目失败');
          }
        }
      } 
      else{
        Tool_public::alertBack(':( 非法操作');
      }
    }

    // 查所有栏目
    private function Show(){
      parent::page($this->_model->GetColumnTotal());
      $this->_tpl->assign('Show',true);
      $this->_tpl->assign('title','顶级栏目列表');
      $column = $this->_model->GetAllColumn();
      $this->_tpl->assign('AllColumn',Tree_public::Create($column));
    }

    // 查询子栏目
    private function ShowSubColumn(){
      $_pid = $_GET['pid'];
      $this->_model->_pid = $_pid;
      $this->_model->_id = $_pid;
      $date = $this->_model->GetOneColumn();
      parent::page($this->_model->GetSubColumnTotal());
      $this->_tpl->assign('ShowSubColumn',true);
      $this->_tpl->assign('pid',$_pid);
      $this->_tpl->assign('parent_column',$date['column_name']);
      $this->_tpl->assign('title','"'.$date['column_name'].'"子栏目列表');
      $this->_tpl->assign('AllColumn',$this->_model->GetAllSubColumn());
    }

    // 添加子栏目
    private function AddSubColumn(){
      $this->_tpl->assign('AddSubColumn',true);
      $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
      $this->_tpl->assign('title','添加栏目');
      if(isset($_POST['send'])){
        if(Validate_public::checkForm($_POST['column_name'],false,2,16,'栏目名称')){
          $this->_model->_column_name = $_POST['column_name'];
        }
        if(Validate_public::checkForm($_POST['column_info'],false,2,200,'栏目描述')){
          $this->_model->_column_info = $_POST['column_info'];
        }
        $this->_model->_pid = $_GET['pid'];
        $this->_model->_level = $_POST['level'];
        if($this->_model->AddColumn()){
            Tool_public::alertJump(':) 创建栏目成功',$_POST['pre_url']);
        }
        else{
           Tool_public::alertBack(':( 创建栏目失败');
        }
      }
    }

}

?>