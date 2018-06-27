<?php
/**
 * 公共类控制器
 * author jasxun
 * date 2014-7-29  
 */
namespace Admin\Action;
use Think\Action;
use Common\Util\Page;
class CommonAction extends Action{
   protected $model_name = '';	//模型名称，如果为空则取控制器名称
   Public function _initialize(){
     //检测登录
     self::checkLogin();
     $this->assign ('controller_name', CONTROLLER_NAME);
   }
//检测是否登录
 private function checkLogin(){
  if(!session('admin.id')&& !session('admin.username')){
    $this->redirect(MODULE_NAME.'/Login/index');
  }
 }
 //首页
 public function index() {
 		if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}
 		$model = D($name);
 		//列表过滤器，生成查询Map对象
 		$map = $this->_search($name);
 		
 		if (method_exists ( $this, '_filter' )) {
 			     $this->_filter($map);
 		}
 	
 		if (!empty($model)) {
 			$this->_list($model, $map);
 		}
 		$this->display ();
 		return;
 	}
  //数据列表
 	protected function _list($model, $map) {
 		//取得满足条件的记录数
 		$count = $model->where($map)->count($model->getPk());
 		if ($count > 0) {
 			//创建分页对象
 			$listRows = 20;
 			$p = new Page ( $count, $listRows );
 			//分页查询数据
 			$voList = $model->where($map)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select ();
 			//分页显示
 			$page = $p->show ();
 			//模板赋值显示
 			$this->assign ( 'list', $voList );
      $this->assign ( 'count', $count );
 			$this->assign ( "page", $page );
 		}
 		return;
 	}
  //搜索
  protected function _search($name='') {
     	//生成查询条件
    		if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}
     	$model = D($name);
     	$map = array();
     	foreach($model->getDbFields() as $key => $val) {
     		if (isset($_REQUEST[$val]) && $_REQUEST[$val] != '') {
     			$map[$val] = $_REQUEST[$val];
     		}
     	}
     	return $map;
     }
 public function add(){
    $this->display();	
 }
  public function insert(){
 		if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}
 		$model = D($name);
     $_POST['addtime'] = time();
    if(false ===$model->create()){
       $this->ajaxReturn(array('s'=>1,'msg'=>$model->getError(),'url'=>''));
    }
 		if ($model->add($_POST)>0){
        $this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>U('index')));
 		} else {
        $this->ajaxReturn(array('s'=>1,'msg'=>'操作失败','url'=>''));
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
     	$this->assign('vo', $vo);
     	$this->display ();
     }
     //更新
  public function update(){
 		if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}
 		$model = D($name);
    if(false ===$model->create()){
       $this->ajaxReturn(array('s'=>1,'msg'=>$model->getError(),'url'=>''));
    }
 		if (false !== $model->save($_POST)) {
 			if(isset($_REQUEST['p'])&&!empty($_REQUEST['p'])){
 				$url = U('index',array('p'=>$_REQUEST['p']));
 			}else{
 				$url =  U('index');
 			}
           $this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>$url));
 		} else {
           $this->ajaxReturn(array('s'=>1,'msg'=>'操作失败','url'=>''));
 		}	
     }
  //删除   
  public function delete() {
 		if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}
 		
 		$model = D($name);
 		$pk = $model->getPk();
 		$id = $_REQUEST[$pk];
 		$condition = array ($pk => array ('in', $id));
 		$list = $model->where($condition)->delete();
   if ($list>0){
            $this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>U('index')));
    } else {
             $this->ajaxReturn(array('s'=>1,'msg'=>'操作失败','url'=>''));
    } 
 	}
   //删除   
   public function set() {
      if (isset($this->model_name) && $this->model_name){
        $name = $this->model_name;
      }else{
        $name = CONTROLLER_NAME;
      }
      
      $model = D($name);
      $pk = $model->getPk();
      $id = $_REQUEST[$pk];
      $status = $_REQUEST['status'];
      $condition = array ($pk => array ('in', $id));
      $model->where($condition)->save(array('status'=>$status));
      $this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>U('index')));

    }
  //异步改变状态
   public function ajax_status(){
    if(IS_AJAX){
    	if (isset($this->model_name) && $this->model_name){
 			$name = $this->model_name;
 		}else{
 			$name = CONTROLLER_NAME;
 		}
 		
 	 $model = D($name);
 	  $pk = $model->getPk();
      $id = I('id','trim');
      $result = $model->where(array('id'=>$id))->find();
      if ($result['status']==1){
           $row = $model->where(array('id'=>$id))->setField('status',0);
           $data['html'] = '<span style="cursor:pointer;" class="btn disabled btn-mini"><i class="icon-ban-circle"></i></span>';
      }else{
          $row = $model->where(array('id'=>$id))->setField('status',1);
           $data['html'] = '<span style="cursor:pointer;" class="btn btn-success disabled btn-mini"><i class="icon-ok"></i></span>';
      }   

         $data['status'] = 1;
         $this->ajaxReturn($data,'JSON');
     }
   }

}