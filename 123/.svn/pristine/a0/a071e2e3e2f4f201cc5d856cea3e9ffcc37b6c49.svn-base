<?php
/**
 * 广告管理
 * author jasxun
 * date 2014-8-4 22:48
 * email 249543262@qq.com
 */
namespace Admin\Action;
 class AdvertiseAction extends CommonAction{
    Public function _initialize(){
      parent::_initialize();
         $this->cate = M('advertise_cate')->where(array('status'=>1))->select();
    }
 
 } 