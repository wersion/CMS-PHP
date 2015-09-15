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
        case 'addNode':
          $this->addNode();
          break;
        // 删
        case 'deleteNode':
          $this->deleteNode();
          break;
        // 改
        case 'updateNode':
          $this->updateNode();          
          break;
        // 查
        case 'showNode':
          $this->showNode();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function addNode(){
      $node = Validate_public::checkNode('addNode');
      $this->_tpl->assign('addNode',true);
      $this->_tpl->assign('title','添加权限');
      $parent_node = $this->_model->getParentNode();
      $this->_tpl->assign('Parent_Node',Tree_public::createTreeStruct($parent_node,0,'nodeID'));
      if(isset($_POST['send'])){
        $this->_model->nodeNameEN = $_POST['nodeNameEN'];
        $this->_model->nodeNameCH = $_POST['nodeNameCH'];
        $this->_model->satatus = $_POST['nodeSatatus'];
        $this->_model->sort = $_POST['nodeSort'];
        $this->_model->parentID = $_POST['parentID'];
        $this->_model->level = $_POST['nodeLevel'];
        $this->_model->nodeInfo = $_POST['nodeInfo'];
        if($this->_model->AddNode()){
            Tool_public::alertJump(':) 创建权限成功','RbacNode.php?action=showNode');
        }
        else{
           Tool_public::alertBack(':( 创建权限失败');
        }
      }
    }

    // 删
    private function deleteNode(){
      $node = Validate_public::checkNode('deleteNode');
      $this->showNode();
      $this->_tpl->assign('delete',true);
      $this->_tpl->assign('title','删除用户');
      if(isset($_GET['id'])){
        $this->_model->nodeID = $_GET['id'];
        if($this->_model->deleteNode()){
          Tool_public::alertJump(':) 删除权限成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除权限失败');
        }
      }
    }

    // 改
    private function updateNode(){
     $node = Validate_public::checkNode('updateNode');
      $this->showNode();
      $this->_tpl->assign('update',true);
      if(isset($_GET['id'])){
        $this->_tpl->assign('showNode',false);
        $this->_tpl->assign('updateNode',true);
        $this->_tpl->assign('title','修改权限');
        $parent_node = $this->_model->getParentNode();
        $this->_tpl->assign('Parent_Node',Tree_public::createTreeStruct($parent_node,0,'nodeID'));
        $date = array();        
        $this->_model->nodeID = $_GET['id'];
        $date = $this->_model->getOneNode();
        $this->_tpl->assign('preUrl',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('nodeNameCH',$date['nodeNameCH']);
        $this->_tpl->assign('nodeNameEN',$date['nodeNameEN']);
        $this->_tpl->assign('status',$date['status']);
        $this->_tpl->assign('sort',$date['sort']);
        $this->_tpl->assign('parentID',$date['parentID']);
        $this->_tpl->assign('level',$date['level']);
        $this->_tpl->assign('nodeInfo',$date['nodeInfo']);
        if(isset($_POST['send'])){
          $this->_model->nodeNameCH = $_POST['nodeNameCH'];
          $this->_model->nodeNameEN = $_POST['nodeNameEN'];
          $this->_model->status = $_POST['status'];
          $this->_model->sort = $_POST['sort'];
          $this->_model->parentID = $_POST['parentID'];
          $this->_model->level = $_POST['nodeLevel'];
          $this->_model->nodeInfo = $_POST['nodeInfo'];
          if($this->_model->UpdateNode()){
            Tool_public::alertJump(':) 修改权限成功',$_POST['preUrl']);
          }
          else{
            Tool_public::alertBack(':( 修改权限失败');
          }
        }
      } 
    }

    // 查
    private function showNode(){
      $node = Validate_public::checkNode('showNode');
      $this->_tpl->assign('showNode',true);
      $this->_tpl->assign('title','权限列表');
      $node = $this->_model->getAllNode();
      $this->_tpl->assign('AllNode',Tree_public::createTreeStruct($node,0,'nodeID'));
    }
    
}

?>