<?php
/**
* 文件上传类
*/
class FileUpload_public{
  private $error;                 //错误代码
  private $maxsize;               //文件大小
  private $file_type;             //文件类型
  private $file_type_array = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');   //类型合集
  private $path;                  //上传目录路径
  private $date_path;             //上传路径子文件夹
  private $name;                  //文件名
  private $tmp;                   //临时文件
  private $linkpath;              //链接路径

  function __construct($file,$maxsize){
    $this->error = $_FILES[$file]['error'];
    $this->maxsize = $maxsize/1024;
    $this->file_type = $_FILES[$file]['type'];
    $this->path = ROOT_PATH.UPLOAD_DIR;
    $this->date_path = $this->path.date('Ymd').'/';
    $this->name = $_FILES[$file]['name'];
    $this->tmp = $_FILES[$file]['tmp_name'];           //临时文件名
    $this->CheckError();
    $this->CheckFile_Type();
    $this->CheckPath();
    $this->MoveTmp_File();
  }

  public function getPath() {
    return $this->linkpath;
  }

  private function MoveTmp_File(){
    if (is_uploaded_file($this->tmp)) {
      if (!move_uploaded_file($this->tmp,$this->SetFileName())) {
        Tool_public::alertBack('警告：上传失败！');
      }
    } else {
      Tool_public::alertBack('警告：临时文件不存在！');
    }
  }

  private function SetFileName(){
    $_nameArr = explode('.',$this->name);
    $_postfix = $_nameArr[count($_nameArr)-1];
    $_newname = date('YmdHis').mt_rand(100,1000).'.'.$_postfix;
    return $this->linkpath = $this->date_path.$_newname;
  }

  private function CheckPath(){
    if(!is_dir($this->path)||!is_writeable($this->path)){
      if(!mkdir($this->path)){
        Tool_public::alertBack('文件上传主路径创建失败');
      }
    }
    if(!is_dir($this->date_path)||!is_writeable($this->date_path)){
      if(!mkdir($this->date_path)){
        Tool_public::alertBack('文件上传子路径创建失败');
      }
    }

  }

  private function CheckFile_Type(){
    if(!in_array($this->file_type,$this->file_type_array)){
      Tool_public::alertBack('文件格式错误');
    }
  }

  private function CheckError(){
    if(!empty($this->error)){
      switch($this->error){
        case '1':
          Tool_public::alertBack('上传文件大小超过限制');
          break;
        case '2':
          Tool_public::alertBack('上传文件大小超过'.$this->maxsize.'kb');
          break;
        case '3':
          Tool_public::alertBack('文件未被完整上传');
          break;
        case '4':
          Tool_public::alertBack('文件未被上传');
          break;
        default:
          Tool_public::alertBack('未知错误');
      }
    }
  }
}
?>