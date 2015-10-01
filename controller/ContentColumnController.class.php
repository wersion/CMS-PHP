<?php
  class ContentColumnController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ContentColumnModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'addColumn':
          $this->addColumn();
          break;
        // 删
        case 'deleteColumn':
          $this->deleteColumn();
          break;
        // 改
        case 'updateColumn':
          $this->updateColumn();          
          break;
        // 查
        case 'showColumn':
          $this->showColumn();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function addColumn(){
      $this->_tpl->assign('addColumn',true);
      $this->_tpl->assign('title','添加顶级栏目');
      $column = $this->_model->getAllColumnList();
      $this->_tpl->assign('ColumnList',Tree_public::createTreeStruct($column,0,'columnID'));
      if(isset($_POST['send'])){
        $this->_model->columnName = $_POST['columnName'];
        $this->_model->columnInfo = $_POST['columnInfo'];
        $this->_model->level = $_POST['level'];
        $this->_model->parentID = $_POST['parentID'];
        if($this->_model->addColumn()){
            Tool_public::alertJump(':) 创建栏目成功','ContentColumn.php?action=showColumn');
        }
        else{
           Tool_public::alertBack(':( 创建栏目失败');
        }
      }
    }

    // 删
    private function deleteColumn(){
      $this->showColumn();
      $this->_tpl->assign('delete',true);
      if(isset($_GET['id'])){
        $this->_model->columnID = $_GET['id'];
        if($this->_model->deleteColumn()){
          Tool_public::alertJump(':) 删除栏目成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除栏目失败');
        }
      }
    }

    // 改
    private function updateColumn(){
      $this->showColumn();
      $this->_tpl->assign('update',true);
      if(isset($_GET['id'])){
        $this->_tpl->assign('showColumn',false);
        $this->_tpl->assign('updateColumn',true);
        $this->_tpl->assign('title','修改栏目'); 
        $column = $this->_model->getAllColumnList();
        $this->_tpl->assign('ColumnList',Tree_public::createTreeStruct($column,0,'columnID'));
        $date = array();
        $this->_model->columnID = $_GET['id'];
        $date = $this->_model->getOneColumn();
        $this->_tpl->assign('preUrl',$_SERVER["HTTP_REFERER"]);
        $this->_tpl->assign('columnID',$date['columnID']);        
        $this->_tpl->assign('columnName',$date['columnName']);
        $this->_tpl->assign('parentID',$date['parentID']);
        $this->_tpl->assign('level',$date['level']);
        $this->_tpl->assign('sort',$date['sort']);
        $this->_tpl->assign('columnInfo',$date['columnInfo']);
        if(isset($_POST['send'])){
          $this->_model->columnID = $_POST['columnID'];
          $this->_model->parentID = $_POST['parentID'];
          $this->_model->sort = $_POST['sort'];
          $this->_model->level = $_POST['level'];
          $this->_model->columnInfo = $_POST['columnInfo'];
          $this->_model->columnName = $_POST['columnName'];
          $this->_model->columnInfo = $_POST['columnInfo'];
          if($this->_model->updateColumn()){
            Tool_public::alertJump(':) 修改栏目成功',$_POST['preUrl']);
          }
          else{
            Tool_public::alertBack(':( 修改栏目失败');
          }
        }
      }
    }

    // 查所有栏目
    private function showColumn(){
      $this->_tpl->assign('showColumn',true);
      $this->_tpl->assign('title','顶级栏目列表');
      $column = $this->_model->getAllColumn();
      $this->_tpl->assign('AllColumn',Tree_public::createTreeStruct($column,0,'columnID'));
    }

}

?>