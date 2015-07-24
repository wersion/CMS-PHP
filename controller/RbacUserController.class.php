<?php
  class RbacUserController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new RbacUserModel());
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
      $this->_tpl->assign('Role',$this->_model->GetAllRole());
      if(isset($_POST['send'])){
        $this->_model->_username = $_POST['user_name'];
        $this->_model->_password = $_POST['password'];
        $this->_model->_status = $_POST['user_status'];
        $this->_model->_loginip = $_SERVER["REMOTE_ADDR"];
        $this->_model->_role_id = $_POST['user_role'];
        if($this->_model->AddUser()&&$this->_model->AddUserRole()){
            Tool_public::alertJump(':) 创建权限成功','rbac_user.php?action=show');
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
        if($this->_model->DeleteUser()){
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
      $this->_tpl->assign('Role',$this->_model->GetAllRole());
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->GetOneUser();
        $this->_tpl->assign('pre_url',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('user_name',$date['username']);
        $this->_tpl->assign('password',$date['password']);
        if(isset($_POST['send'])){
          $this->_model->_username = $_POST['username'];
          $this->_model->_password = $_POST['password'];
          $this->_model->_status = $_POST['user_status'];
          $this->_model->_loginip = $_SERVER["REMOTE_ADDR"];
          $this->_model->_role_id = $_POST['user_role'];
          if($this->_model->UpdateUser()||$this->_model->UpdateUserRole()){
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
      parent::page($this->_model->GetTotalUser());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员列表');
      $this->_tpl->assign('AllUser',$this->_model->GetAllUser());
    }
}

?>