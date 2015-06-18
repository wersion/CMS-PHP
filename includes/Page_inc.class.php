<?php
  // 分页类
  class Page_inc{
    private $total;                       //总记录条数
    private $limit;                       //数据库查询limit
    private $pagesize;                    //每页显示数
    private $page;                        //当前页码
    private $pagetotal;                   //总页数
    private $limitpage;                   //limit语句
    private $url;                         //url
    private $_page;                       //page按钮输出
    private $_pagelist;                   //page列表
    private $bothnum;                     //两边保持数字分页的量    

    public function __construct($_total,$_pagesize){
      $this->total = $_total;
      $this->pagesize = $_pagesize;
      $this->pagetotal = ceil($_total/$_pagesize);
      $this->page = $this->setPage();
      $this->limitpage = ($this->page-1)*$_pagesize;
      $this->limit = 'LIMIT '.$this->limitpage.','.$this->pagesize;
      $this->url = $this->setUrl();
      $this->bothnum = 1;
    }

    public function __get($_key){
      return $this->$_key;
    }

    private function setPage(){
      if(!empty($_GET['page'])&&$_GET['page']>0){
        if($_GET['page']>$this->pagetotal){
          return $this->pagetotal;
        }
        return $_GET['page'];
      }
      else{
        return 1;
      }
    }

    private function setUrl(){
      $_url = $_SERVER['REQUEST_URI'];                            //获取url
      $_par = parse_url($_url);                                   //url转换成数组
      if(isset($_par['query'])){
        parse_str($_par['query'],$_query);                        //把query部分分离成一个数组$_query
        unset($_query['page']);                                   //删除$_query数组的page
        $_url = $_par['path'].'?'.http_build_query($_query);      //重组url
      }
      return $_url;
    }

    private function pageList() {
      for ($i=$this->bothnum;$i>=1;$i--) {
        $_page = $this->page-$i;
        if ($_page < 1) continue;
        $this->_pagelist .= ' <a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a> ';
      }
      $this->_pagelist .= ' <span class="me">'.$this->page.'</span> ';
      for ($i=1;$i<=$this->bothnum;$i++) {
        $_page = $this->page+$i;
        if ($_page > $this->pagetotal) break;
        $this->_pagelist .= ' <a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a> ';
      }
      return $this->_pagelist;
    }
    
    //首页
    private function first() {
      if ($this->page > $this->bothnum+1) {
        return ' <a href="'.$this->url.'">1</a> ...';
      }
    }
    
    //上一页
    private function prev() {
      if ($this->page == 1) {
        return '<span class="disabled">上一页</span>';
      }
      return ' <a href="'.$this->url.'&page='.($this->page-1).'">上一页</a> ';
    }
    
    //下一页
    private function next() {
      if ($this->page == $this->pagetotal) {
        return '<span class="disabled">下一页</span>';
      }
      return ' <a href="'.$this->url.'&page='.($this->page+1).'">下一页</a> ';
    }
    
    //尾页
    private function last() {
      if ($this->pagetotal - $this->page > $this->bothnum) {
        return ' ...<a href="'.$this->url.'&page='.$this->pagetotal.'">'.$this->pagetotal .'</a> ';
      }
    }  

    //分页信息
    public function showPage() {
      $this->_page .=$this->first();
      $this->_page .=$this->pageList();
      $this->_page .=$this->last();
      $this->_page .=$this->prev();     
      $this->_page .=$this->next();
      return $this->_page;
    }
  }
?>