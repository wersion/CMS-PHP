<?php
  //控制器基类
  class Controller {
    protected $_tpl;
    protected $_model;
    
    protected function __construct(&$_tpl, &$_model) {
      $this->_tpl = $_tpl;
      $this->_model = $_model;
    }

    protected function page($GetTotal){
      $_page = new Page_inc($GetTotal,PAGE_SIZE);               //初始化分页类
      $this->_model->_limit = $_page->limit;
      $this->_tpl->assign('Page',$_page->showPage());
      $this->_tpl->assign('num',(($_page->page-1)*PAGE_SIZE)+1);
    }
    
  }
?>