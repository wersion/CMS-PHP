<?php
  class ValidateCode_public{
      private $charset='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      private $code;
      private $codelen = 4;                                       //验证码长度
      private $width = 130;
      private $height = 50;
      private $img;                                              //图形资源句柄
      private $font;                //指定的字体
      private $fontsize = 20;       //指定字体大小
      private $fontcolor;           //指定字体颜色

      //构造方法初始化字体
      public function __construct() {
        $this->font = ROOT_PATH.'/fonts/elephant.ttf';
      }

      // 生产随机码
      private function createCode(){
        $_len = strlen($this->charset)-1;
        for($i=0;$i<$this->codelen;$i++){
          $this->code .= $this->charset[mt_rand(0,$_len)];
        }
        return $this->code;
      }

      // 创建验证码背景
      private function createBG(){
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img,mt_rand(157,255),mt_rand(157,255),mt_rand(157,255));
        imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
      }

      //生成文字
      private function createFont() { 
        $_x = $this->width / $this->codelen;
        for ($i=0;$i<$this->codelen;$i++) {
          $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
          imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
        }
      }
    
      //生成线条、雪花
      private function createLine() {
        for ($i=0;$i<6;$i++) {
          $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
          imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
        }
        for ($i=0;$i<100;$i++) {
          $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
          imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
        }
      }

      //输出图形
      private function outPut(){
        header('Content-type:image/png');
        imagepng($this->img);
        imagedestroy($this->img);
      }

      //对外生产
      public function makeImg(){
        $this->createBG();
        $this->createCode();
        $this->createLine();
        $this->createFont();
        $this->outPut();
      }

      //获取验证码
      public function getCode() {
        return strtolower($this->code);
      }
  }  
?>