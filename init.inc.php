<?php
  //设置utf-8编码
  header('Content-Type:text/html;charset=utf-8');
  //网站根目录
  define('ROOT_PATH',dirname(__FILE__));
  //引入配置信息
  require ROOT_PATH.'/configs/profile.inc.php';
  //设置中国时区
  date_default_timezone_set('Asia/Shanghai');
  //开启SESSION
  session_start();
  //自动加载类
  function __autoload($_className) {
    if (substr($_className, -10) == 'Controller') {
      require ROOT_PATH.'/controller/'.$_className.'.class.php';
    } elseif (substr($_className, -5) == 'Model') {
      require ROOT_PATH.'/model/'.$_className.'.class.php';
    } elseif (substr($_className, -7) == '_public') {
      require ROOT_PATH.'/public/'.$_className.'.class.php';
    } 
  }

  // 以下为Smarty配置项

  // 引入Smarty
  require ROOT_PATH.'\smarty\Smarty.class.php';
  // 解决Smarty与_atuoload函数的冲突
  spl_autoload_register("__autoload");
  // 声明Smarty对象
  $_smarty = new Smarty();
  // 模板目录
  $_smarty->template_dir = ROOT_PATH.'\templates';
  // 编译目录
  $_smarty->compile_dir = ROOT_PATH.'\templates_c';
  // 配置目录
  $_smarty->config_dir = ROOT_PATH.'\configs';
  // 缓存目录
  $_smarty->cache_dir = ROOT_PATH.'\cache';
  // 增加一个插件目录，模板标签专用
  $_smarty->addPluginsDir(ROOT_PATH.'\tag');
  // 关闭缓存
  $_smarty->caching = false;
?>