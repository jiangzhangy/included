<?php
/**
 * 产品管理
 * author jasxun
 * date 2014-8-5 14:01
 * email 249543262@qq.com
 */
namespace Admin\Action;
use Think\Page;
class ProductAction extends CommonAction{
	Public function _initialize(){
		parent::_initialize();
        $product_cate = M('product_cate')->where(array('status'=>1))->select();
        $this->cate = _toFormatTree($product_cate);
	}
	function _filter(&$map){
		 
		if(isset($_GET['cate_id']) &&  !empty($_GET['cate_id'])){
	       $map['cate_id'] = array('in',get_all_cate_id($_GET['cate_id'],'product_cate'));
		} 
	    if(isset($_GET['title']) &&  !empty($_GET['title'])){
	           $map['title'] = array('like',"%{$_GET['title']}%");
	    } 
	 
	}
   function _before_insert(){
   	$map['add_time'] = time();
   }

}