<?php
/**
 *网站信息
 * author jasxun
 * date 2014-8-5
 */
namespace Admin\Action;
class SiteAction extends CommonAction{
 /**网站配置**/	
 public function index(){
  if(IS_POST){
  	$result = M('site')->find();
  	if($result){
  		M('site')->save($_POST);
       $this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>U('index')));
  	}else{
  		if(M('site')->add($_POST)){
          $this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>U('index')));
         }
  	}
   

  }else{
  	$this->site = M('site')->find();
  	$this->display();
  }
  
 }

private function _deleteDir($R){
      $handle = opendir($R);
      while(($item = readdir($handle)) !== false){
        if($item != '.' and $item != '..'){
          if(is_dir($R.'/'.$item)){
              $this->_deleteDir($R.'/'.$item);
          }else{
              if(!unlink($R.'/'.$item))die('error!');
          }
        }
      }
      closedir( $handle );
      return rmdir($R); 
  }
//删除缓存文件夹  
public function clearRuntime(){
  $R = $_GET['path']?$_GET['path']:RUNTIME_PATH;
  if($this->_deleteDir($R))$this->ajaxReturn(array('s'=>0,'msg'=>'操作成功','url'=>''));
  }
}