<?php
/**
 *公共类
 *author jasxun
 *date 2014-8-13
 */
namespace Home\Action;
use Think\Action;
class CommonAction extends Action{
  Public function _initialize(){
  	filter_injection($_POST);
  	filter_injection($_GET);
  	filter_injection($_REQUEST);
  	filter_injection($_COOKIE);
  	$_POST = trim_script($_POST);
  	$_GET = trim_script($_GET);
  	$_REQUEST = trim_script($_REQUEST);
  	$_COOKIE = trim_script($_COOKIE);  

  	 /**网站信息**/
     $this->site = M('site')->find();
     $this->link = M('links')->order('sort desc')->where(array('status'=>1))->select();
     $this->nav  = M('nav')->order('sort desc')->where(array('status'=>1))->limit(8)->select();

   //广告
   $this->side_adv = M('advertise a')->join('left join advertise_cate c on a.cate_id=c.id')
                            ->field('a.site_url,a.img_url,a.title')
                            ->where(array('c.flag'=>'side_adv','a.status'=>1,'c.status'=>1))
                            ->find(); 
                                              

 }
 

}