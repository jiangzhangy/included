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
<link rel="stylesheet" href="/Plugins/kindeditor-4.1.7/themes/default/default.css" />
<script src="/Plugins/kindeditor-4.1.7/kindeditor.js"></script>
<script src="/Plugins/kindeditor-4.1.7/zh_CN.js"></script>
    <script>
      KindEditor.ready(function(K) {
        var editor = K.create('textarea[name="copyright"]', {
          allowFileManager : true,
          urlType:'domain',
          afterBlur : function(){  
                    //编辑器失去焦点时直接同步，可以取到值  
                    this.sync();  
                }  
        });
        K('#upload').click(function() {
          editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
              showRemote : false,
              imageUrl : K('#site_logo').val(),
              clickFn : function(url, title, width, height, border, align) {
                K('#site_logo').val(url);
                <?php if($site['site_logo']){ ?>
                K('#pic').attr("src",url);
                <?php }else{ ?>
                     K('#pic').html("<img src="+url+" style='width:100px; height:60px;overflow:hidden;'/><br/>");
               <?php } ?>
                editor.hideDialog();
              }
            });
          });
        });
        K('#ewmupload').click(function() {
          editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
              showRemote : false,
              imageUrl : K('#ewm').val(),
              clickFn : function(url, title, width, height, border, align) {
                K('#ewm').val(url);
                <?php if($site['ewm']){ ?>
                K('#ewmpic').attr("src",url);
                <?php }else{ ?>
                     K('#ewmpic').html("<img src="+url+" style='width:100px; height:60px;overflow:hidden;'/><br/>");
               <?php } ?>
                editor.hideDialog();
              }
            });
          });
        });
      });
    </script>
<!-- main -->
<div class="main span10">
    <h4><i class="icon-wrench"></i>网站信息</h4>
<hr>
		<form action="<?php echo U(MODULE_NAME.'/Site/index');?>" method="post" accept-charset="utf-8" class="well form-inline" id="f" onSubmit="return ajaxform(this,function(d){opt_ok_return(d)})">   		
			<table class="table table-bordered table-wordpress postlist-table">
            <tbody>
            <tr><td>
				<label for="site_name">网站名称</label></td>
				<td><input type="text" name="site_name" value="<?php echo $site['site_name'];?>" id="site_name" class="span4"  /> 
                </td>
			</tr>
            <tr><td>
                <label for="site_url">网站地址</label></td>
                <td><input type="text" name="site_url" value="<?php echo $site['site_url'];?>" id="site_url" class="span4"  /> 
                </td>
            </tr>
             <tr><td>
                <label for="site_logo">二维码</label></td>
                <td><?php if($site['ewm'] == ''): ?><span id="ewmpic"></span>
                    <?php else: ?><img id="ewmpic" src="<?php echo $site['ewm'];?>" style="width:100px;height:60px;"><br/><?php endif; ?>
                    <input type="text" name="ewm" value="<?php echo $site['ewm'];?>" id="ewm" class="span6"  /> 
                    <span id="ewmupload" class="btn btn-primary"><i class="icon-folder-open"></i>选择图片</span>
                </td>
            </tr>
             <tr><td>
                <label for="site_logo">logo</label></td>
                <td><?php if($site['site_logo'] == ''): ?><span id="pic"></span>
                    <?php else: ?><img id="pic" src="<?php echo $site['site_logo'];?>" style="width:100px;height:60px;"><br/><?php endif; ?>
                    <input type="text" name="site_logo" value="<?php echo $site['site_logo'];?>" id="site_logo" class="span6"  /> 
                    <span id="upload" class="btn btn-primary"><i class="icon-folder-open">选择图片</i></span>
                </td>
            </tr>
             <tr><td>
                <label for="keyword">关键词</label></td>
                <td><input type="text" name="keyword" value="<?php echo $site['keyword'];?>" id="keyword" class="span8"  /> 
                </td>
            </tr>
             <tr><td>
                <label for="discription">网站描述</label></td>
                <td><textarea name="discription" id="discription" class="span8"  /><?php echo $site['discription'];?> </textarea>
                </td>
            </tr>
            <tr><td>
                <label for="site_url">咨询热线</label></td>
                <td><input type="text" name="tell" value="<?php echo $site['tell'];?>" id="site_url" class="span4"  /> 
                </td>
            </tr>
             <tr><td>
                <label for="copyright">版权信息</label></td>
                <td><textarea name="copyright" id="copyright" class="span8"  /><?php echo $site['copyright'];?> </textarea>
                </td>
            </tr>
            
            <tr><td></td><td>
             <input type="hidden" value="1" name="id">   
			<input type="submit" name="submit" value="保存" id="submit" class="btn btn-large btn-success"  />        </td></tr>
        </tbody>
        </table>
        
		</form></div>
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