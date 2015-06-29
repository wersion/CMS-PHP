<?php
  class ContentController extends Controller {
    
    //构造方法，初始化 
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ContentModel());
    }
    
    //action
    public function Action() {
      switch ($_GET['action']) {
        case 'show' :
          $this->show();
          break;
        case 'add' :
          $this->add();
          break;
        case 'update' :
          $this->update();
          break;
        case 'delete' :
          $this->delete();
          break;
        default:
          Tool::alertBack('非法操作！');
      }
    }
    
    
    //show
    private function show() {

    }
    
    //add
    private function add() {
      $this->_tpl->assign('add',true);
      $this->_tpl->assign('title','新增文档');
      // $this->_tpl->assign('prev_url',PREV_URL);
    }
    
    //update
    private function update() {

    }
    
    //delete
    private function delete() {

    }
    
  }
?>