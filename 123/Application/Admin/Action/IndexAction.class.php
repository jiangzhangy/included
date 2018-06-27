<?php
/**
 *后台管理首页
 */
namespace Admin\Action;
class IndexAction extends CommonAction{
  public function index(){

  $this->display();
}
 /**修改密码**/
 public function changepassword(){
   if(IS_POST){
    $result = M('admin')->where(array('id'=>session("admin.id")))->find();
    $password = I('password','trim');
    $newpassword = I('newpassword','trim');
    $cnewpassword = I('cnewpassword','trim');
    if(empty($password)){
      echo json_encode(array('s'=>1,'msg'=>'请输入原密码'));exit();
    }
    if(empty($newpassword)){
      echo json_encode(array('s'=>1,'msg'=>'请输入新密码'));exit();
    }
    if(empty($cnewpassword)){
      echo json_encode(array('s'=>1,'msg'=>'请输入确认新密码'));exit();
    }
    if($result['password']==md5(md5($password).$result['addtime'])){
       if($newpassword==$cnewpassword){
        $data = array('password'=>md5(md5($newpassword).$result['addtime']));
       	$aff_id = M('admin')->where(array('id'=>session("admin.id")))->save($data);
	       	if($aff_id){
           session(null);
           echo json_encode(array('s'=>0,'msg'=>'操作成功,请重新登录！','url'=>U('Login/index')));exit();
	       	}else{
           echo json_encode(array('s'=>1,'msg'=>'操作失败'));exit();
	       	}
       }else{
           echo json_encode(array('s'=>1,'msg'=>'两次密码不一致！'));exit();
       }
    }else{
      echo json_encode(array('s'=>1,'msg'=>'原密码有误！'));exit();
    }
   }else{
   	$this->display();
   }
 }
 
}