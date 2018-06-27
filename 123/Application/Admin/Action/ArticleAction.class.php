<?php
/**
 * 文章管理
 * author jasxun
 * date 2014-7-28
 * email 249543262@qq.com
 */
namespace Admin\Action;
 class ArticleAction extends CommonAction{
    Public function _initialize(){
      parent::_initialize();
         $article_cate = M('article_cate')->where(array('status'=>1))->select();
         $this->cate = _toFormatTree($article_cate);
    }
    function _filter(&$map){
    	 
    	if(isset($_GET['cate_id']) &&  !empty($_GET['cate_id'])){
           $map['cate_id'] = array('in',get_all_cate_id($_GET['cate_id'],'article_cate'));
    	} 
        if(isset($_GET['title']) &&  !empty($_GET['title'])){
               $map['title'] = array('like',"%{$_GET['title']}%");
        } 
     
    }
    function _before_insert(){
    	$map['add_time'] = time();
    }
 
 } 