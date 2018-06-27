<?php
/**
 *官网首页
 */
namespace Home\Action; 
use Common\Util\Page;
class IndexAction extends CommonAction{
      public function _initialize(){
      parent::_initialize();

      } 
  //首页    
  public function index(){              
     $this->display();
  }
  //新闻栏目
  public function news(){
     $model = "article";
     $map['status'] = 1;
     if(isset($_GET['cate_id']) &&  !empty($_GET['cate_id'])){
        $map['cate_id'] = array('in',get_all_cate_id($_GET['cate_id'],'article_cate'));
     }
     //取得满足条件的记录数
      $count = M($model)->where($map)->count();
      //创建分页对象
      $listRows = 10;
      $p = new Page ( $count, $listRows );
      //分页查询数据
      $news = M($model)->where($map)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select ();
      //分页显示
      $page = $p->show ();
      if($_GET['cate_id']){
        $article_cate = M('article_cate')->field('id,parent_id')->where(array('id'=>$_GET['cate_id']))->find();
        if($article_cate['parent_id']>0){
          $parent_id = $article_cate['parent_id'];
        }else{
          $parent_id =$_GET['cate_id'];
        }
      }
      $catelist = M('article_cate')->field('id,parent_id,subject')->order('sort asc')->where(array('parent_id'=>$parent_id))->select();
      //模板赋值显示
      $this->assign ( 'news', $news );
       $this->assign ( 'parent_id', $parent_id );
      $this->assign ( 'catelist', $catelist );
      $this->assign ( "page", $page );
      $this->assign ( "seo_title", getCateName($_GET['cate_id'])."-");
      $this->display();
  }
  //新闻内容
 public function content(){
     $id = I('id','intval,trim');
     M('article')->where(array('id'=>$id))->setInc('hits');
     $this->data = M('article')->where(array('id'=>$id))->find();
     $this->assign ( "seo_title", $this->data['title']."-");
     $this->display();
  }
   //产品栏目
   public function product(){
      $model = "product";
      $map['status'] = 1;
      if(isset($_GET['cate_id']) &&  !empty($_GET['cate_id'])){
         $map['cate_id'] = array('in',get_all_cate_id($_GET['cate_id'],'product_cate'));
      }
      //取得满足条件的记录数
       $count = M($model)->where($map)->count();
       //创建分页对象
       $listRows = 20;
       $p = new Page ( $count, $listRows );
       //分页查询数据
       $voList = M($model)->where($map)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select ();
       //分页显示
       $page = $p->show ();
       //模板赋值显示
       $this->assign ( 'list', $voList );
       $this->assign ( "page", $page );
       $this->display();
   }
   //产品内容
  public function show(){
      $id = I('id','intval,trim');
      $this->data = M('product')->where(array('id'=>$id))->find();
      $this->display();
   }
  //留言
   public function message(){
    if(IS_POST){
      $insert_id = M('message')->add($_POST);
      if ($insert_id>0){
              $this->success("提交成功",U('index'));
      } else {
              $this->error("提交失败");
      } 
    }else{
      $this->display();
    }
   }
  
  public function page(){
     $id = I('id','intval,trim');
     $this->data = M('page')->where(array('id'=>$id))->find();
     $this->display();
  }
  public function search(){
    $keyword = $_GET['keyword'];
    $model = "article";
    $where="status=1";
    if(isset($_GET['keyword']) &&  !empty($_GET['keyword'])){
       $where .= " and title like'%{$keyword}%'";
    }
    //取得满足条件的记录数
     $count = M($model)->where($where)->count();
     //创建分页对象
     $listRows = 38;
     $p = new Page ( $count, $listRows );
     //分页查询数据
     $news = M($model)->where($where)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select ();
     if(!empty($news) && !empty($keyword)){
      foreach($news as $key => $val){
       $val['title']=preg_replace("/({$keyword})/i","<font color=red>\\1</font>",$val['title']);//关键字加亮
       $news[$key]['title']=$val['title'];
      }
     }
     //分页显示
     $page = $p->show ();
     //模板赋值显示
     $this->assign ( 'news', $news );
     $this->assign ( 'count', $count );
     $this->assign ( "page", $page );
     $this->assign ( "seo_title", "搜索关键词{$_GET['keyword']}-");
     $this->display();
  }


}