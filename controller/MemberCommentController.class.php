<?php
  class MemberCommentController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new MemberCommentModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'addComment':
          $this->addComment();
          break;
        // 删
        case 'deleteComment':
          $this->deleteComment();
          break;
        // 改
        case 'updateComment':
          $this->updateComment();          
          break;
        // 查
        case 'showComment':
          $this->showComment();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 删
    private function deleteComment(){
      Validate_public::checkNode('deleteComment');
      $this->showComment();
      $this->_tpl->assign('delete',true);
      $this->_tpl->assign('title','删除网站评论');
      if(isset($_GET['id'])){
        $this->_model->commentID = $_GET['id'];
        if($this->_model->deleteComment()){
          Tool_public::alertJump(':) 删除网站评论成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除网站评论失败');
        }
      }
    }

    // 改
    private function updateComment(){
      Validate_public::checkNode('updateComment');
      $this->showComment();
      $this->_tpl->assign('update',true);
      if(isset($_GET['id'])){
        $this->_tpl->assign('showComment',false);
        $this->_tpl->assign('updateComment',true);
        $this->_tpl->assign('title','修改网站评论');
        $date = array();        
        $this->_model->commentID = $_GET['id'];
        $date = $this->_model->getOneComment();
        $this->_tpl->assign('preUrl',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('articleID',$date['articleID']);
        $this->_tpl->assign('commentAccountID',$date['commentAccountID']);
        $this->_tpl->assign('commentUpdatetime',$date['commentUpdatetime']);
        $this->_tpl->assign('commentContent',$date['commentContent']);
        $this->_tpl->assign('commentAgree',$date['commentAgree']);
        if(isset($_POST['send'])){
          $this->_model->articleID = $_POST['articleID'];
          $this->_model->commentAccountID = $_POST['commentAccountID'];
          $this->_model->commentUpdatetime = $_POST['commentUpdatetime'];
          $this->_model->commentContent = $_POST['commentContent'];
          $this->_model->commentAgree = $_POST['commentAgree'];
          if($this->_model->updateComment()){
            Tool_public::alertJump(':) 修改网站评论成功',$_POST['preUrl']);
          }
          else{
            Tool_public::alertBack(':( 修改网站评论失败');
          }
        }
      } 
    }

    // 查
    private function showComment(){
      Validate_public::checkNode('showComment');
      parent::page($this->_model->getTotalComment());
      $this->_tpl->assign('showComment',true);
      $this->_tpl->assign('title','网站评论列表');
      $this->_tpl->assign('AllComment',$this->_model->getAllComment());
    }
    
    //前台提交评论
    private function addComment(){
      if(isset($_POST['send'])){
        echo "add";
      }
    }
    
}

?>