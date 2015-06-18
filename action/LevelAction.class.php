<?php
  class LevelAction extends Action {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new LevelModel());
      $this->Action();
      $this->_tpl->display('level.tpl');
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
        default:
          Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 增
    private function add(){
      $this->_tpl->assign('create',true);
      $this->_tpl->assign('title','添加管理员');
      if(isset($_POST['send'])){
        $_level = $_POST['level'];
        $_level_name = $_POST['level_name'];
        $_level_info = $_POST['level_info'];
        if($this->_model->addLevel($_level,$_level_name,$_level_info)){
            Tool_inc::alertJump(':) 创建管理员等级成功','level.php?action=show');
        }
        else{
           Tool_inc::alertBack(':( 创建管理员等级失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        if($this->_model->deleteLevel($_GET['id'])){
          Tool_inc::alertJump(':) 删除管理员等级成功','level.php?action=show');
        }
        else{
          Tool_inc::alertBack(':( 删除管理员等级失败');
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
      if($date = $this->_model->getOneLevel($_GET['id'])){
        $this->_tpl->assign('id',$date->id);        
        $this->_tpl->assign('level',$date->level);
        $this->_tpl->assign('level_name',$date->level_name);
        $this->_tpl->assign('level_info',$date->level_info);
        if(isset($_POST['send'])){
          $_id = $_POST['levelid'];
          $_level = $_POST['level'];
          $_level_name = $_POST['level_name'];
          $_level_info = $_POST['level_info'];
          if($this->_model->updateLevel($_id,$_level,$_level_name,$_level_info)){
            Tool_inc::alertJump(':) 修改管理员等级成功','level.php?action=show');
          }
          else{
            Tool_inc::alertBack(':( 修改管理员等级失败');
          }
        }
      } 
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 查
    private function read(){
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员等级列表');
      $this->_tpl->assign('AllLevel',$this->_model->getAllLevel());
    }

}

?>