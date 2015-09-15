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
        case 'addUser':
          $this->addUser();
          break;
        // 删
        case 'deleteUser':
          $this->deleteUser();
          break;
        // 改
        case 'updateUser':
          $this->updateUser();          
          break;
        // 查
        case 'showUser':
          $this->showUser();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function addUser(){
      $node = Validate_public::checkNode('addUser');
      $this->_tpl->assign('addUser',true);
      $this->_tpl->assign('title','新增用户');
      $this->_tpl->assign('Role',$this->_model->getAllRole());
      if(isset($_POST['send'])){
        $this->_model->userName = $_POST['userName'];
        $this->_model->password = $_POST['password'];
        $this->_model->status = $_POST['userStatus'];
        $this->_model->loginIP = $_SERVER["REMOTE_ADDR"];
        $this->_model->ruRoleID = $_POST['userRole'];
        if($this->_model->addUser()&&$this->_model->AddUserRole()){
            Tool_public::alertJump(':) 创建权限成功','RbacUser.php?action=showUser');
        }
        else{
           Tool_public::alertBack(':( 创建权限失败');
        }
      }
    }

    // 删
    private function deleteUser(){
      $node = Validate_public::checkNode('deleteUser');
      $this->showUser();
      $this->_tpl->assign('delete',true);
      $this->_tpl->assign('title','删除用户');
      if(isset($_GET['ID'])){
        $this->_model->userID = $_GET['ID'];
        if($this->_model->deleteUser()){
          Tool_public::alertJump(':) 删除权限成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除权限失败');
        }
      }
    }

    // 改
    private function updateUser(){
      $node = Validate_public::checkNode('updateUser');
      $this->showUser();
      $this->_tpl->assign('update',true);
      if(isset($_GET['ID'])){
        $this->_tpl->assign('showUser',false);
        $this->_tpl->assign('updateUser',true);
        $this->_tpl->assign('title','修改用户');
        $this->_tpl->assign('userRole',$this->_model->getAllRole());
        $date = array();
        $this->_model->userID = $_GET['ID'];
        $date = $this->_model->getOneUser();
        $this->_tpl->assign('preUrl',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('userName',$date['userName']);
        $this->_tpl->assign('password',$date['password']);
        if(isset($_POST['send'])){
          $this->_model->userName = $_POST['userName'];
          $this->_model->password = $_POST['password'];
          $this->_model->status = $_POST['userStatus'];
          $this->_model->loginIP = $_SERVER["REMOTE_ADDR"];
          $this->_model->ruRoleID = $_POST['userRole'];
          if($this->_model->updateUser()){
            Tool_public::alertJump(':) 修改用户成功','RbacUser.php?action=updateUser');
          }else{
            Tool_public::alertBack(':( 修改用户失败');
          }
        }
      } 
    }

    // 查
    private function showUser(){
      $node = Validate_public::checkNode('showUser');
      parent::page($this->_model->getTotalUser());
      $this->_tpl->assign('showUser',true);
      $this->_tpl->assign('title','查看用户');
      $this->_tpl->assign('allUser',$this->_model->getAllUser());
    }
}

?>