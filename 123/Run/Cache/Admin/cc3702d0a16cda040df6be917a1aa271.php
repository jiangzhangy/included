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
<body style="background:#f6f6f6 url('/Public/Admin/images/loginbg/bg3.jpg') no-repeat center top;">
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
                
                <li><a href="<?php echo U(MODULE_NAME.'/Login/Logout');?>"><i class="icon-off" ></i>安全退出</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- header -->
<div class="container-fluid">
<!-- row-fluid -->
<div class="row-fluid wrap">
<div class="span12">
     <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Site/index');?>"><img src="/Public/Admin/images/icons/notice.png"><span>进入系统</span></a></div>
      <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/ArticleCate/index');?>"><img src="/Public/Admin/images/icons/sign.png"><span>文章栏目</span></a></div>
  <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/ProductCate/index');?>"><img src="/Public/Admin/images/icons/task.png"><span>产品栏目</span></a></div>
   <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Article/index');?>"><img src="/Public/Admin/images/icons/article.png"><span>文章管理</span></a></div>

  <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Product/index');?>"><img src="/Public/Admin/images/icons/area.png"><span>产品管理<span></a></div>
  <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Nav/index');?>"><img src="/Public/Admin/images/icons/group.png"><span>网站导航</span></a></div>



           </div>
</div>
<!-- row-fluid -->
<!-- row-fluid -->
<div class="row-fluid wrap">
<div class="span12">
    <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Page/index');?>"><img src="/Public/Admin/images/icons/department.png"><span>页面管理</span></a></div>
 <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Message/index');?>"><img src="/Public/Admin/images/icons/msgbox.png"><span>留言管理</span></a></div>
  <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Index/changepassword');?>"><img src="/Public/Admin/images/icons/notes.png"><span>密码修改</span></a></div>
 <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Site/index');?>"><img src="/Public/Admin/images/icons/seting.png"><span>系统设置</span></a></div>
    <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Advertise/index');?>"><img src="/Public/Admin/images/icons/company.png"><span>广告管理</span></a></div>
    <div class="span2 icons"><a href="<?php echo U(MODULE_NAME.'/Links/index');?>"><img src="/Public/Admin/images/icons/forum.png"><span>友情链接</span></a></div>

           </div>
           
</div>
<!-- row-fluid -->

</div>

</body>
</html>