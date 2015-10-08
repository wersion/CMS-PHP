<?php
  class ContentPageController extends Controller {
    
    //构造方法，初始化 
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ContentPageModel());
    }
    
    //action
    public function Action() {
      switch ($_GET['action']) {
        case 'showPage' :
          $this->showPage();
          break;
        case 'addPage' :
          $this->addPage();
          break;
        case 'updatePage' :
          $this->updatePage();
          break;
        case 'deletePage' :
          $this->deletePage();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }
    
    //显示单页列表
    private function showPage() {
      parent::page($this->_model->getPageTotal());
      $this->_tpl->assign('showPage',true);
      $this->_tpl->assign('position','单页列表');
      $this->_tpl->assign('AllPage',$this->_model->getAllPage());
    }
    
    //add
    private function addPage() {
      $this->_tpl->assign('addPage',true);
      $this->_tpl->assign('position','新增单页');
      $column = $this->_model->getAllColumn();
      $this->_tpl->assign('ColumnList',Tree_public::createTreeStruct($column,0,'columnID'));
      if(isset($_POST['send'])){
        $this->_model->PageTitle = $_POST['PageTitle'];
        $this->_model->columnID = $_POST['columnID'];
        $this->_model->PageInfo = $_POST['PageInfo'];
        $this->_model->PageContent = $_POST['PageContent'];
        if($this->_model->addPage()){
          Tool_public::alertJump(':) 新增单页成功','ContentPage.php?action=showPage');
        }
        else{
          Tool_public::alertJump(':( 新增单页失败','ContentPage.php?action=showPage');
        }
      }
    }
    
    //update
    private function updatePage() {
      $this->showPage();
      $this->_tpl->assign('update',true);
      if(isset($_GET['ID'])){
        $this->_tpl->assign('showPage',false);
        $this->_tpl->assign('updatePage',true);
        $this->_tpl->assign('position','修改单页');
        $column = $this->_model->getAllColumn();
        $this->_tpl->assign('columnList',Tree_public::createTreeStruct($column,0,'columnID'));
        $date = array();
        $PageID = $_GET['ID'];
        $this->_model->pageID = $PageID;
        $date = $this->_model->getOnePage();
        $this->_tpl->assign('PageID',$PageID);
        $this->_tpl->assign('parentID',$date['parentID']);
        $this->_tpl->assign('pageName',$date['pageName']);
        $this->_tpl->assign('sort',$date['sort']);
        $this->_tpl->assign('status',$date['status']);
        $this->_tpl->assign('pageInfo',$date['pageInfo']);
        $this->_tpl->assign('pageContent',$date['pageContent']);
        if(isset($_POST['send'])){
          $this->_model->pageID = $_POST['PageID'];
          $this->_model->parentID = $_POST['parentID'];
          $this->_model->pageName = $_POST['pageName'];
          $this->_model->pageInfo = $_POST['pageInfo'];
          $this->_model->pageContent = $_POST['pageContent'];
          $this->_model->sort = $_POST['sort'];
          $this->_model->status = $_POST['status'];
          if($this->_model->updatePage()){
            Tool_public::alertJump(':) 修改单页成功','ContentPage.php?action=showPage');
          }
          else{
              Tool_public::alertJump(':( 修改单页失败','ContentPage.php?action=showPage');
          }
        }
      }
    }
    
    //delete
    private function deletePage() {
      $this->showPage();
      $this->_tpl->assign('delete',true);
      if(isset($_GET['ID'])){
        $this->_model->PageID = $_GET['ID'];
        if($this->_model->deletePage()){
          Tool_public::alertJump(':) 删除单页成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除单页失败');
        }
      }
    }
   
  }
?>