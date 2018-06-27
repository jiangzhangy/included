<?php
/**
 * 产品分类管理
 * author jasxun
 * date 2014-8-5 14:08
 * email 249543262@qq.com
 */
namespace Admin\Action;
class ProductCateAction extends CommonAction{
 Public function _initialize(){
      parent::_initialize();
     $product_cate = M('product_cate')->where(array('status'=>1))->select();
     $this->cate = _toFormatTree($product_cate);
 }
  //数据列表
 	protected function _list($model, $map) {
	$voList = $model->where($map)->select ();
	$voList = _toFormatTree($voList);
	//模板赋值显示
	$this->assign ( 'list', $voList );
 	}

}