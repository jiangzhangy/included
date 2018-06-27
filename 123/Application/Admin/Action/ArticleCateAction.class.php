<?php
/**
 * 栏目管理
 * author jasxun
 * date 2014-7-29
 */
namespace Admin\Action;
 class ArticleCateAction extends CommonAction{
 Public function _initialize(){
      parent::_initialize();
     $article_cate = M('article_cate')->where(array('status'=>1))->select();
     $this->cate = _toFormatTree($article_cate);
 }
  //数据列表
 	protected function _list($model, $map) {
	$voList = $model->where($map)->select ();
	$voList = _toFormatTree($voList);
	//模板赋值显示
	$this->assign ( 'list', $voList );
 	}

 }