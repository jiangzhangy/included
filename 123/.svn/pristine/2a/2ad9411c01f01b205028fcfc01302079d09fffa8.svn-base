<?php
/**
 * 后台登录
 * author jasxun
 * date 2014-8-5 12:04
 */
namespace Admin\Action;
use Think\Action;
class LoginAction extends Action{
 public function index(){
    $this->display(); 	
 }
  //登录检测
  public function checklogin(){
         //用户登录检测
       if(is_POST){
           $username = I('username','trim');//用户名
           $password = I('password','trim');//密码
           $verify  = I('verify','trim');//验证码
          if(empty($username)){
            $this->ajaxReturn(array('s'=>1,'msg'=>'请输入用户名'),'json');
          }
          if(empty($password)){
            $this->ajaxReturn(array('s'=>1,'msg'=>'请输入密码'),'json');
          }
          if(empty($verify)){
            $this->ajaxReturn(array('s'=>1,'msg'=>'请输入验证码'),'json');
          }
          if($verify != $this->check_verify($verify)){
              $this->ajaxReturn(array('s'=>1,'msg'=>'验证码不正确'),'json');
          }
           $result=M('admin')->where(array('username'=>$username))->find();
           if($result){
              if($result['password']==md5(md5($password).$result['addtime'])){
                  session('admin',array('id'=>$result['id'],'username'=>$result['username'],'last_login_time'=>$result['last_login_time']));
                  M('admin')->where(array('username'=>$username))->save(array('last_login_time'=>time()));
                  $this->ajaxReturn(array('s'=>0,'msg'=>'登录成功','url'=>U('Index/index')),'json');
              }else{
                $this->ajaxReturn(array('s'=>1,'msg'=>'密码错误'),'json');
              }
           }else{
            $this->ajaxReturn(array('s'=>1,'msg'=>'用户名不存在'),'json');
           }
    }

 }
 //验证码
  public function verify_code() {
    $config =    array(
        'fontSize'    => 18,    // 验证码字体大小
        'length'      => 4,     // 验证码位数
        'useNoise'    => true,  // 关闭验证码杂点
        'imageW'      => 150,  //验证码宽度
        'imageH'     =>40,//验证码高度
    );
    $Verify =     new \Think\Verify($config);
    $Verify->entry();
     }
//验证码校验
public function check_verify($code){
   $verify = new \Think\Verify();
   return $verify->check($code);
}
//退出登录
public function Logout(){
    session(null);
    $this->redirect(MODULE_NAME.'/Login/index');
 }

}