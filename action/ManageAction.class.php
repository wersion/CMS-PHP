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
        // 登陆
        case 'login':
          $this->login();
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
        $_admin_user = $_POST['admin_user'];
        $_admin_pass = $_POST['admin_pass'];
        $_level = $_POST['level'];
        if($this->_model->addManage($_admin_user,$_admin_pass,$_level)){
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
        if($this->_model->deleteManage($_GET['id'])){
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
      if($date = $this->_model->getOneManage($_GET['id'])){
      $this->_tpl->assign('id',$date->id);
        $this->_tpl->assign('name',$date->admin_user);
        $this->_tpl->assign('pass',$date->admin_pass);
        $this->_tpl->assign('lv',$date->level);  
        $this->_tpl->assign('level',$this->_model->getLevel());
        if(isset($_POST['send'])){
          $_id = $_POST['userid'];
          $_admin_user = $_POST['admin_user'];
          $_admin_pass = $_POST['admin_pass'];
          $_level = $_POST['level'];
          if($this->_model->updateManage($_id,$_admin_user,$_admin_pass,$_level)){
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
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员列表');
      $this->_tpl->assign('AllManage',$this->_model->getAllManage($_page->limit));
      $this->_tpl->assign('Page',$_page->showPage());
    }

    // 登陆
    private function login(){
      if($_POST['send']){
        $_login = $this->_model->getLoginManage($_POST['admin_user'],$_POST['admin_pass']);
        if($_login){
          echo"登陆成功";
          $_SESSION['admin']['admin_id'] = $_login->id;
          $_SESSION['admin']['admin_user'] = $_login->admin_user;
          Tool_inc::alertJump(null,'admin.php');
        }
        else{
          Tool_inc::alertBack(':( 用户名或密码错误');
        }
      }
    }

}

?>