<?php
  class RbacNodeController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new RbacNodeModel());
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
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function add(){
      $this->_tpl->assign('create',true);
      $this->_tpl->assign('title','添加权限');
      $parent_node = $this->_model->GetParentNode();
      $this->_tpl->assign('Parent_Node',Tree_public::Create($parent_node));
      if(isset($_POST['send'])){
        $this->_model->_name = $_POST['node_name'];
        $this->_model->_title = $_POST['node_title'];
        $this->_model->_status = $_POST['node_status'];
        $this->_model->_sort = $_POST['node_sort'];
        $this->_model->_pid = $_POST['parent_node'];
        $this->_model->_level = $_POST['node_level'];
        $this->_model->_info = $_POST['node_info'];
        if($this->_model->AddNode()){
            Tool_public::alertJump(':) 创建权限成功','rbac_node.php?action=show');
        }
        else{
           Tool_public::alertBack(':( 创建权限失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->DeleteNode()){
          Tool_public::alertJump(':) 删除权限成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除权限失败');
        }
      }
      else{
        Tool_public::alertBack(':( 非法操作');
      }
    }

    // 改
    private function update(){
      $this->_tpl->assign('update',true);
      $this->_tpl->assign('title','修改权限');
      $parent_node = $this->_model->GetParentNode();
      $this->_tpl->assign('Parent_Node',Tree_public::Create($parent_node));
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->GetOneNode();
        $this->_tpl->assign('pre_url',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('name',$date['name']);
        $this->_tpl->assign('title',$date['title']);
        $this->_tpl->assign('status',$date['status']);
        $this->_tpl->assign('sort',$date['sort']);
        $this->_tpl->assign('pid',$date['pid']);
        $this->_tpl->assign('level',$date['level']);
        $this->_tpl->assign('info',$date['info']);
        if(isset($_POST['send'])){
          $this->_model->_name = $_POST['node_name'];
          $this->_model->_title = $_POST['node_title'];
          $this->_model->_status = $_POST['node_status'];
          $this->_model->_sort = $_POST['node_sort'];
          $this->_model->_pid = $_POST['parent_node'];
          $this->_model->_level = $_POST['node_level'];
          $this->_model->_info = $_POST['node_info'];
          if($this->_model->UpdateNode()){
            Tool_public::alertJump(':) 修改权限成功',$_POST['pre_url']);
          }
          else{
            Tool_public::alertBack(':( 修改权限失败');
          }
        }
      } 
      else{
        Tool_public::alertBack(':( 非法操作');
      }
    }

    // 查
    private function read(){
      parent::page($this->_model->GetTotalNode());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员列表');
      $node = $this->_model->GetAllNode();
      $this->_tpl->assign('AllNode',Tree_public::Create($node));
    }
}

?>