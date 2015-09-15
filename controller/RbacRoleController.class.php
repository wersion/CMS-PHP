<?php
  class RbacRoleController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new RbacRoleModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'addRole':
          $this->addRole();
          break;
        // 删
        case 'deleteRole':
          $this->deleteRole();
          break;
        // 改
        case 'updateRole':
          $this->updateRole();          
          break;
        // 查
        case 'showRole':
          $this->showRole();
          break;
        // 配置权限
        case 'setRole':
          $this->setRole();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function addRole(){
      $node = Validate_public::checkNode('addRole');
      $this->_tpl->assign('addRole',true);
      $this->_tpl->assign('title','添加用户组');
      if(isset($_POST['send'])){
        $this->_model->roleName = $_POST['roleName'];
        $this->_model->roleInfo = $_POST['roleInfo'];
        $this->_model->status = $_POST['roleStatus'];
        if($this->_model->addRole()){
            Tool_public::alertJump(':) 创建用户组成功','RbacRole.php?action=showRole');
        }
        else{
           Tool_public::alertBack(':( 创建用户组失败');
        }
      }
    }

    // 删
    private function deleteRole(){
      $node = Validate_public::checkNode('deleteRole');
      $this->showRole();
      $this->_tpl->assign('delete',true);
      $this->_tpl->assign('title','删除用户组');
      if(isset($_GET['id'])){
        $this->_model->roleID = $_GET['id'];
        if($this->_model->deleteRole()){
          if($this->_model->deleteNode()){
            Tool_public::alertJump(':) 删除用户组及其权限记录成功',$_SERVER['HTTP_REFERER']);
          }
        }
        else{
          Tool_public::alertBack(':( 删除用户组失败');
        }
      }
    }

    // 改
    private function updateRole(){
      $node = Validate_public::checkNode('updateRole');
      $this->showRole();
      $this->_tpl->assign('update',true);
      if(isset($_GET['id'])){
        $this->_tpl->assign('showRole',false);
        $this->_tpl->assign('updateRole',true);
        $this->_tpl->assign('title','修改用户组');
        $date = array();
        $this->_model->roleID = $_GET['id'];
        $date = $this->_model->getOneRole();
        $this->_tpl->assign('preUrl',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('roleName',$date['roleName']);
        $this->_tpl->assign('roleInfo',$date['roleInfo']);
        if(isset($_POST['send'])){
          $this->_model->roleName = $_POST['roleName'];
          $this->_model->roleInfo = $_POST['roleInfo'];
          $this->_model->status = $_POST['roleStatus'];
          if($this->_model->UpdateRole()){
            Tool_public::alertJump(':) 修改用户组成功',$_POST['preUrl']);
          }
          else{
            Tool_public::alertBack(':( 修改用户组失败');
          }
        }
      } 
    }

    // 查
    private function showRole(){
      $node = Validate_public::checkNode('showRole');
      parent::page($this->_model->getTotalRole());
      $this->_tpl->assign('showRole',true);
      $this->_tpl->assign('title','管理员列表');
      $this->_tpl->assign('AllRole',$this->_model->getAllRole());
    }

    // 配置权限(显示)
    private function setRole(){
      $node = Validate_public::checkNode('setRole');
      $this->showRole();
      $this->_tpl->assign('set',true);
      if(isset($_GET['id'])){
        $this->_tpl->assign('showRole',false);
        $this->_tpl->assign('setRole',true);
        $this->_tpl->assign('title','配置权限');
        $this->_model->roleID = $_GET['id'];
        $this->_tpl->assign('rolename',$this->_model->getThisRoleName()['roleName']);
        $NodeList = $this->_model->getAllNode();         // 获取所有权限列表
        $NodeList = Tree_public::createTreeStruct($NodeList,0,'nodeID');
        $RoleNode = $this->_model->getRoleNode();        // 获取当前用户组所拥有的权限
        $NodeID = array();
        foreach ($RoleNode as $value) {
           array_push($NodeID, $value['nodeID']);       //提取当前用户所拥有的权限的ID，组成新数组NodeId
        }
        foreach ($NodeList as $value){
          if(in_array($value['nodeID'],$NodeID)){            //遍历权限列表，判断是否拥有权限，并添加一个新字段（access）到权限列表中
            $value['access'] = 1;
          }
          else{
            $value['access'] = 0;
          }
          $NewNodeList[] = $value;
        }
        $this->_tpl->assign('NodeList',$NewNodeList);
        $count =0;
        if(isset($_POST['send'])){
          $access = $_POST['checkbox'];
          $this->_model->roleID = $_GET['id'];
          $this->_model->DeleteNode();
          foreach ($access as $value) {
            $this->_model->nodeID = $value;
            $this->_model->AddNode();
            $count++;
          }
          echo '成功配置'.$count.'条权限';
        }
      }
    }
}

?>