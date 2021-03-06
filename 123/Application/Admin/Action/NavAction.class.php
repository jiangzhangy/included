<?php
/**
 * 导航管理
 * author jasxun<249543262@qq.com>
 * date 2014-8-5
 */
namespace Admin\Action;
class NavAction extends CommonAction{
 public function get_module(){
 	$moudle = I('moudle','strtolower');
    switch ($moudle) {
    	case 'news':
    		$list = M('article_cate')->field('id,parent_id,subject')->where(array('status'=>1))->select();
    		break;
    	case 'page':
    		$list = M('page')->field('id,title as subject')->where(array('status'=>1))->select();
    		break;
    	case 'product':
    		$list = M('product_cate')->field('id,parent_id,subject')->where(array('status'=>1))->select();
    		break;		
    }
    $html = "<option value=''>请选择</option>";
    if(!empty($list)){
    	
    	foreach ($list as $key => $val) {
    		 $html .="<option value='".$val['id']."'>".$val['subject']."</option>";
    	}
    	$this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','html'=>$html));
    }else{
    	$this->ajaxReturn(array('s'=>1,'msg'=>'暂无数据','url'=>''));
    }
 
 }
  //编辑   
  public function edit(){
     	if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}

     	$model = D($name);
     	$id = $_REQUEST [$model->getPk()];
     	$vo = $model->getById($id);
     	switch ($vo['moudle']) {
     		case 'news':
     			$list = M('article_cate')->field('id,parent_id,subject')->where(array('status'=>1))->select();
                $list = _toFormatTree($list);
     			break;
     		case 'page':
     			$list = M('page')->field('id,title as subject')->where(array('status'=>1))->select();
     			break;
     		case 'product':
     			$list = M('article_cate')->field('id,parent_id,subject')->where(array('status'=>1))->select();
     			break;		
     	}
     	$this->assign('moudle', $list);
     	$this->assign('vo', $vo);
     	$this->display ();
     }
}