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
        // 配置权限
        case 'setrole':
          $this->setrole();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function add(){
      $this->_tpl->assign('create',true);
      $this->_tpl->assign('title','添加用户组');
      if(isset($_POST['send'])){
        $this->_model->_name = $_POST['role_name'];
        $this->_model->_info = $_POST['role_info'];
        $this->_model->_status = $_POST['role_status'];
        if($this->_model->AddRole()){
            Tool_public::alertJump(':) 创建用户组成功','rbac_role.php?action=show');
        }
        else{
           Tool_public::alertBack(':( 创建用户组失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->DeleteRole()){
          Tool_public::alertJump(':) 删除用户组成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除用户组失败');
        }
      }
      else{
        Tool_public::alertBack(':( 非法操作');
      }
    }

    // 改
    private function update(){
      $this->_tpl->assign('update',true);
      $this->_tpl->assign('title','修改用户组');
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->GetOneRole();
        $this->_tpl->assign('pre_url',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('name',$date['name']);
        $this->_tpl->assign('info',$date['info']);
        if(isset($_POST['send'])){
          $this->_model->_name = $_POST['role_name'];
          $this->_model->_info = $_POST['role_info'];
          $this->_model->_status = $_POST['role_status'];
          if($this->_model->UpdateRole()){
            Tool_public::alertJump(':) 修改用户组成功',$_POST['pre_url']);
          }
          else{
            Tool_public::alertBack(':( 修改用户组失败');
          }
        }
      } 
      else{
        Tool_public::alertBack(':( 非法操作');
      }
    }

    // 查
    private function read(){
      parent::page($this->_model->GetTotalRole());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员列表');
      $this->_tpl->assign('AllRole',$this->_model->GatAllRole());
    }

    // 配置权限(显示)
    private function setrole(){
      $this->_tpl->assign('setrole',true);
      $this->_tpl->assign('title','配置权限');
      $this->_model->_id = $_GET['id'];
      $this->_tpl->assign('rolename',$this->_model->GetThisRoleName()['name']);
      $NodeList = $this->_model->GetAllNode();         // 获取所有权限列表
      $NodeList = Tree_public::Create($NodeList);
      $RoleNode = $this->_model->GetRoleNode();        // 获取当前用户组所拥有的权限
      $NodeId = array();
      foreach ($RoleNode as $value) {
         array_push($NodeId, $value['node_id']);       //提取当前用户所拥有的权限的ID，组成新数组NodeId
      }
      foreach ($NodeList as $value){
        if(in_array($value['id'],$NodeId)){            //遍历权限列表，判断是否拥有权限，并添加一个新字段（access）到权限列表中
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
        $this->_model->_id = $_GET['id'];
        $this->_model->DeleteNode();
        foreach ($access as $value) {
          $this->_model->_role_id = $value;
          $this->_model->AddNode();
          $count++;
        }
        echo '成功配置'.$count.'条权限';
      }
    }

    // 配置权限（提交）
    private function updaterole(){
    }
}

?>