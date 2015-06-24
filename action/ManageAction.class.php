<?php
  class ManageAction extends Action {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ManageModel());
      $this->Action();
      $this->_tpl->display('manage.tpl');
    }

    // 业务流程控制器
    private function Action(){
      if($_GET['action'] == 'login') $this->login();
      Validate_inc::checkSession();
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
        // 登出
        case 'logout':
          $this->logout();
          break;
        default:
          Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 增
    private function add(){
      $this->_tpl->assign('create',true);
      $this->_tpl->assign('title','添加管理员');
      $this->_tpl->assign('level',$this->_model->getLevel());
      if(isset($_POST['send'])){
        if(Validate_inc::checkForm($_POST['admin_user'],false,2,16,'用户名')){
          $this->_model->admin_user = $_POST['admin_user'];
        }
        if(Validate_inc::checkForm($_POST['admin_pass'],false,2,16,'密码')){
          if(Validate_inc::checkEqual($_POST['admin_pass'],$_POST['pass_confirm'])){
            $this->_model->admin_pass = $_POST['admin_pass'];
          }
        }
        $this->_model->_level = $_POST['level'];
        if($this->_model->addManage()){
            Tool_inc::alertJump(':) 创建管理员成功','manage.php?action=show');
        }
        else{
           Tool_inc::alertBack(':( 创建管理员失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->deleteManage()){
          Tool_inc::alertJump(':) 删除管理员成功','manage.php?action=show');
        }
        else{
          Tool_inc::alertBack(':( 删除管理员失败');
        }
      }
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 改
    private function update(){
      $this->_tpl->assign('update',true);
      $this->_tpl->assign('title','修改管理员');
      $date = array();
      $this->_model->_id = $_GET['id'];
      if($date = $this->_model->getOneManage()){
        $this->_tpl->assign('id',$date->id);
        $this->_tpl->assign('name',$date->admin_user);
        $this->_tpl->assign('pass',$date->admin_pass);
        $this->_tpl->assign('lv',$date->level);  
        $this->_tpl->assign('level',$this->_model->getLevel());
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['userid'];
          if(Validate_inc::checkForm($_POST['admin_user'],false,2,16,'用户名')){
            $this->_model->admin_user = $_POST['admin_user'];
          }
          if(Validate_inc::checkForm($_POST['admin_pass'],false,2,16,'密码')){
            if(Validate_inc::checkEqual($_POST['admin_pass'],$_POST['pass_confirm'])){
              $this->_model->admin_pass = $_POST['admin_pass'];
            }
          }
          $this->_model->_level = $_POST['level'];
          if($this->_model->updateManage()){
            Tool_inc::alertJump(':) 修改管理员成功','manage.php?action=show');
          }
          else{
            Tool_inc::alertBack(':( 修改管理员失败');
          }
        }
      } 
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 查
    private function read(){
      $_page = new Page_inc($this->_model->getTotalManage(),PAGE_SIZE);               //初始化分页类
      $this->_model->_limit = $_page->limit;
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员列表');
      $this->_tpl->assign('AllManage',$this->_model->getAllManage());
      $this->_tpl->assign('Page',$_page->showPage());
    }

    // 登陆
    private function login(){
      if($_POST['send']){
        if(Validate_inc::checkForm($_POST['admin_user'],false,2,16,'用户名')){
          $this->_model->admin_user = $_POST['admin_user'];
        }
        if(Validate_inc::checkForm($_POST['admin_pass'],false,2,16,'密码')){
          $this->_model->admin_pass = $_POST['admin_pass'];
        }
        $_login = $this->_model->getLoginManage();
        if($_login){
          echo"登陆成功";
          $_SESSION['admin']['admin_user'] = $_login->admin_user;
          $_SESSION['admin']['admin_level'] = $_login->level_name;
          Tool_inc::alertJump(null,'admin.php');
        }
        else{
          Tool_inc::alertBack(':( 用户名或密码错误');
        }
      }
    }

    // 登出
    private function logout(){
      Tool_inc::unSession();
      Tool_inc::alertJump(null,'admin_login.php');
    }

}

?>