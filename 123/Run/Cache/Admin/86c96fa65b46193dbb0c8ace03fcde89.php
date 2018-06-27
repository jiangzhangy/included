<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<link href="/Public/Admin/css/bootstrap.css" rel="stylesheet" />
<link href="/Public/Admin/css/font-awesome.css" rel="stylesheet" />
<link href="/Public/Admin/css/admin.css" rel="stylesheet" />
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
</head>
<body>
<!-- header -->
<div class="header navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="<?php echo U(MODULE_NAME.'/Index/index');?>">后台管理</a>
			<ul class="nav pull-right">
				<li><a href="<?php echo U(MODULE_NAME.'/Index/index');?>">Hi，<?php echo session('admin.username');?></a>
				</li>
				<li><a href="<?php echo U(MODULE_NAME.'/Index/index');?>">桌面管理</a>
				</li>
				<li><a href="<?php echo U(MODULE_NAME.'/Index/changepassword');?>"><i class="icon-key"></i>密码修改</a>
				</li>
				<li><a href="javascript:void(0)" id="clear"><i class="icon-trash"></i>清空缓存</a>
        </li>
				<li><a target="_brank" href="<?php echo C('site_url');?>"><i class="icon-forward"></i>前台首页</a>
				</li>
				
                <li><a href="<?php echo U(MODULE_NAME.'/Login/Logout');?>"><i class="icon-off" ></i>安全退出</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- header -->
<div class="container-fluid">
	<!-- row-fluid -->
	<div class="row-fluid wrap">
		<!-- sidebar -->
<div class="span2 sidebar">
	<div class="menu">
	<ul class="nav nav-tabs nav-stacked">
		<li class="header"><a href="javascript:void(0);"><i class="icon-plus" ></i>网站信息</a></li>
		<li <?php if(CONTROLLER_NAME == Site): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Site/index');?>">系统设置</a></li>
		<li <?php if(CONTROLLER_NAME == Nav): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Nav/index');?>">导航管理</a></li>
		<li <?php if(CONTROLLER_NAME == Page): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Page/index');?>">页面管理</a></li>
		<li <?php if(CONTROLLER_NAME == Links): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Links/index');?>">友情链接</a></li>
       <li <?php if(CONTROLLER_NAME == Message): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Message/index');?>">留言管理</a></li>
	</ul>		
    	<ul class="nav nav-tabs nav-stacked">
    		<li class="header"><a href="javascript:void(0);"><i class="icon-plus"></i></i>文章管理</a></li>	
    		<li <?php if(CONTROLLER_NAME == Article): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Article/index');?>">文章列表</a></li>
            <li <?php if(CONTROLLER_NAME == ArticleCate): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/ArticleCate/index');?>">文章栏目</a></li>
    	</ul>
    		<ul class="nav nav-tabs nav-stacked">
    			<li class="header"><a href="javascript:void(0);"><i class=" icon-plus" ></i>产品管理</a></li>	
    			<li <?php if(CONTROLLER_NAME == Product): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Product/index');?>">产品列表</a></li>
    	        <li <?php if(CONTROLLER_NAME == ProductCate): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/ProductCate/index');?>">产品栏目</a></li>
    		</ul>
    <ul class="nav nav-tabs nav-stacked">
    		<li class="header"><a href="javascript:void(0);"><i class="icon-plus"></i></i>广告管理</a></li>	
    		<li <?php if(CONTROLLER_NAME == Advertise): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/Advertise/index');?>">广告管理</a></li>
            <li <?php if(CONTROLLER_NAME == AdvertiseCate): ?>class="cur"<?php endif; ?>><a href="<?php echo U(MODULE_NAME.'/AdvertiseCate/index');?>">广告位置</a></li>
    	</ul>			
    </div>
</div>
<script type="text/javascript">
$(function(){ 
 $(".cur").parent().find('li').show();
 $(".cur").parent('ul').siblings('ul').find('li:not(.header)').hide();
  $(".menu .header").click(function(){
  	if($(this).siblings().css("display")=='none'){
  		$(this).find('i').removeClass('icon-plus');
  		$(this).find('i').addClass('icon-minus');
       $(this).parent().find('li').show();
       $(this).parent('ul').siblings('ul:last-child').find('li:not(.header)').show();
  	}else{
  	  $(this).find('i').removeClass('icon-minus');
  	  $(this).find('i').addClass('icon-plus');
      $(this).parent().find('li:not(.header)').hide();
      $(this).parent('ul').siblings('ul:last-child').find('li:not(.header)').show();
  	}
       
  });
   $(".menu .header").parent('ul').siblings('ul:last-child').find('li:not(.header)').show();
   $(".menu .header").each(function(){
    if($(this).siblings().css("display")!='none'){
      $(this).find('i').removeClass('icon-plus');
      $(this).find('i').addClass('icon-minus');	
    }
   });


});

</script>
<!-- sidebar -->
<!-- main -->
<div class="main span10">
<div class="btn-group pull-right">
<a href="<?php echo U(MODULE_NAME.'/'.$controller_name.'/add');?>" class="btn btn-success"><i class="icon-plus icon-white"></i>新增产品</a>
</div>
<h4><i class="icon-home"></i>产品列表</h4>
<hr/>
     <div id="search" style="margin-left:20px;">
		<form action="<?php echo U(MODULE_NAME.'/'.$controller_name.'/index');?>" method="get" accept-charset="utf-8" class="form-search">
		栏目：
		<select class="span2" style="margin-right:10px;" name="cate_id">
		<option value="">全部--------------------------------------</option>
		 <?php if(is_array($cate)): foreach($cate as $key=>$cate): ?><option value="<?php echo $cate['id'];?>" <?php if($_REQUEST['cate_id'] == $cate['id']): ?>selected="selected"<?php endif; ?>><?php if($cate['level'] > 1): echo $cate['name']; endif; echo $cate['subject'];?></option><?php endforeach; endif; ?>
		</select>
		
		标题：<input type="text" value="<?php echo $_REQUEST['title'];?>" class="span3" name="title" placeholder="请输入标题:）">
		 <button type="submit" class="btn btn-info"><i class="icon-search"></i>搜索</button>
		 <span class="btn btn-danger" onclick="delAll()"><i class="icon-trash"></i>删除</span>
		 <span class="btn btn-success" onclick="setAll('',1)"><i class="icon-ok"></i>显示</span>
		 <span class="btn btn-warning" onclick="setAll('',0)"><i class="icon-ban-circle"></i>隐藏</span>
		</form>
	</div>
	<table class="table table-bordered table-wordpress postlist-table">
		<thead>
			<tr>
			    <th><label><input onclick="checkAll(this)" type="checkbox">全选</label></th>
				<th>编号</th>
				<th>标题</th>
				<th>缩略图</th>	
				<th>栏目</th>
                <th>显示</th>	
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		    <?php if(is_array($list)): foreach($list as $key=>$list): ?><tr class="tr-publish">
			    <td width="50"><input type="checkbox" name="checkbox"  value="<?php echo $list['id'];?>"/></td>
                <td><?php echo $list['id'];?></td>
				<td><a target="_blank" href="<?php echo U('Home/Index/show',array('id'=>$list['id']));?>"><?php echo $list['title'];?></a></td>
				<td><img src="<?php echo $list['thumb'];?>" style="width:30px;height:30px;"/></td>
                <td><?php echo getProductName($list['cate_id']);?></td>
				<td onclick="status(<?php echo $list['id'];?>)" id="status_<?php echo $list['id'];?>">
               <?php if($list['status'] == 1): ?><span style="cursor:pointer;" class="btn btn-success disabled btn-mini"><i class="icon-ok"></i></span>
               <?php else: ?>
               <span style="cursor:pointer;" class="btn disabled btn-mini"><i class="icon-ban-circle"></i></span><?php endif; ?>
				</td>
				<td>
					<div class="btn-toolbar">
						<div class="btn-group">
							<a href="<?php echo U(MODULE_NAME.'/'.$controller_name.'/edit',array('id'=>$list['id'],'p'=>$_GET['p']));?>" class="btn btn-mini" ><i class="icon-edit"></i> 更改</a>
							 <a href="javascript:void(0);" class="btn btn-mini btn-danger" onclick="return confirm('确定删除此记录吗？',function(){del(<?php echo $list['id'] ?>)});"><i class="icon-remove"></i> 删除</a>
						</div>
					</div>
				</td>
			</tr><?php endforeach; endif; ?>
             <tr class="text-center">
             <td colspan="6">
             <?php if(!empty($list)): ?><div class="pagination"><?php echo $page;?></div>
             <?php else: ?>  
                 <i class="icon-ban-circle"></i> 暂时没有数据<?php endif; ?>
             </td>
             </tr>		
		</tbody>
	</table>
</div>

<script>
$(function(){
	$('.postlist-table td').hover(
		function() {
			$(this).parent().addClass('tr-active');
		},
		function() {
			$(this).parent().removeClass('tr-active');
		}
	);
});
</script>
<!-- main -->
</div>
<!-- row-fluid -->
</div>
<script type="text/javascript">
$(function(){
  //鼠标移动
  $('.postlist-table td').hover(
    function() {
      $(this).parent().addClass('tr-active');
    },
    function() {
      $(this).parent().removeClass('tr-active');
    }
  );
  //清理缓存
  var clearurl = "<?php echo U(MODULE_NAME.'/Site/clearRuntime');?>";
  $("#clear").click(function(){
     $.get(clearurl,function(data){
        opt_tips({w: data.msg,t: data.s,url: data.url});         
     });
  });

});

//全选   
function checkAll(o){
      if( o.checked == true ){
          $('input[name="checkbox"]').attr('checked','true');
          
      }else{
          $('input[name="checkbox"]').removeAttr('checked');
         
      }
}  
  
//获取已选择的ID数组
function getChecked() {
      var ids = new Array();
      $.each($('.table tbody input:checked'), function(i, n){
          if($(n).val()!=0)
          {
              ids.push( $(n).val() );
          }
          
      });
      return ids;
} 
//批量删除      
function delAll(ids) {
      var length = 0;
     
      if(ids) {
          length = 1;
      }else {
          ids    = getChecked();
          length = ids[0] == 0 ? ids.length - 1 : ids.length;
          ids    = ids.toString();
      }
      if(ids=='') {
          opt_tips({w: '请选择删除的数据',t: 1,url: ''}); 
          return false;
      }
      return confirm('您将删除'+length+'条记录,确定继续？',function(){del(ids)});
}
//批量显示      
function setAll(ids,status) {
      var length = 0;
     
      if(ids) {
          length = 1;
      }else {
          ids    = getChecked();
          length = ids[0] == 0 ? ids.length - 1 : ids.length;
          ids    = ids.toString();
      }
      if(status==1){
        var remark = "显示";
      }else{
        var remark = "隐藏"
      }
      if(ids=='') {
          opt_tips({w: '请选择'+remark+'的数据',t: 1,url: ''}); 
          return false;
      }
      return confirm('您将'+remark+length+'条记录,确定继续？',function(){set(ids,status)});
}
//删除
function del(id){
  var url="<?php echo U(MODULE_NAME.'/'.$controller_name.'/delete');?>";
  $.post(url,{'id':id},function(d){
       opt_tips({w: d.msg,t: d.s,url: d.url});     
  });
} 
//删除
function set(id,status){
  var url="<?php echo U(MODULE_NAME.'/'.$controller_name.'/set');?>";
  $.post(url,{'id':id,'status':status},function(d){
       opt_tips({w: d.msg,t: d.s,url: d.url});     
  });
} 
//显示
function status(id){
  var url="<?php echo U(MODULE_NAME.'/'.$controller_name.'/ajax_status');?>";
  $.post(url,{'id':id},function(data){
       if(data.status==1){
          $("#status_"+id).html(data.html);
       }

  });
} 

</script>
<div class="footer">
  <div class="footer_message container">
	  <span>技术支持：249543262</span>
	  <span><a href="">新浪微博</a></span>
	  <span style="margin-left:10px;">微信公众号：jasxun</span>
	  <span style="margin-left:10px;">微信号：jas-xun</span>
	  <p style="padding-left: 5px;">2005 - 2016 @版权所有  </a></p>
  </div>
</div>
</body>
</html>