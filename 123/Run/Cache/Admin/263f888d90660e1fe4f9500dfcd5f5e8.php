<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>后台管理</title>
<link type="text/css" rel="stylesheet" href="/Public/Admin/css/login.css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
</head>

<body style="background:#f6f6f6 url('/Public/Admin/images/loginbg/bg10.jpg') no-repeat center top;">

<div class="login">
	<h1 style="background:url('/Public/Admin/images/default_logo.png') no-repeat center;">后台管理</h1>
	<form method="post" action="<?php echo U(MODULE_NAME.'/Login/checkLogin');?>" onSubmit="return ajaxform(this,function(d){opt_ok_return(d)})">
	<ul>
		<p><label><input type="text" id="name" name="username" placeholder="请输入您的用户名" value=""/></label></p>
		<p><label><input type="password" id="password" name="password" placeholder="请输入密码" /></label></p>
		<p><label><input type="text" id="verify" name="verify" placeholder="请输入验证码"/>
		<img src="<?php echo U(MODULE_NAME.'/Login/verify_code');?>" class="codeimg" alt="验证码" onclick="this.src='<?php echo U(MODULE_NAME.'/Login/verify_code');?>#'+Math.random()" title="看不清？点击更换验证码!" /></label></p>
	</ul>
	<ol>
		<p><button type="submit">登 录</button></p>
        <p><a href="">忘记了密码？从这里找回</a></p>
	</ol>
	</form>
</div>

<div class="iediv"></div>



<div class="footer">
<ul>
	<span>技术支持<strong>249543262</strong></span>
	<span>&copy; 后台管理</span>
</ul>
</div>


<script type="text/javascript" src="/Public/Admin/js/jquery.placeholder.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	GetSize();
	$(window).resize(function(){GetSize();});
	//$(window).onresize(function(){GetSize();});
	$('input, textarea').placeholder();	/* 兼容表单占位符 */
	$('#name').focus();	/* 设置焦点 */
	$(document).bind("contextmenu",function(e){return false;}); /* 禁止右键 */
});



function GetSize(){
	loginBodyHeight=($(document).height()-$('.login').height())/2.5;
	$('.login').css('margin-top',loginBodyHeight);	
	if($(document).height()<435){
		$('.footer').css('display','none');
	}else{
		$('.footer').css('display','block');
	}
}

var userAgent = navigator.userAgent.toLowerCase();
var browserId = userAgent.match(/(firefox|chrome|safari|opera|msie)/)[1];
var browserVersion = (userAgent.match(new RegExp('.+(?:version)[\/: ]([\\d.]+)')) || userAgent.match(new RegExp('(?:'+browserId+')[\/: ]([\\d.]+)')) || [0,'0'])[1];
var isIe6 = (browserId + browserVersion == "msie6.0");
var isIe7 = (browserId + browserVersion == "msie7.0");
if (isIe6 || isIe7){ /*是IE6时*/
	$('.login').addClass("ie6");
	$('.login').html('<h3>提示：</h3>'+
	'<ul>'+
	'<li>你使用了过时的IE'+browserVersion+'浏览器，为保障您的数据安全及更佳体验，请升级到：</li>'+
	'<li>'+
	'<a href="https://www.google.com/intl/zh-CN/chrome/browser/index.html?hl=zh-CN&standalone=1#eula" target="_blank" title="Google Chrome">Google Chrome</a>或'+
	'<a href="http://www.microsoft.com/china/windows/internet-explorer/"target="_blank" title="Internet Explorer 8.0">Internet Explorer 8.0</a>以上版本，'+
	'</li>'+
	'<li>感谢您的支持与理解。</li>'+
	'<li class="liRight">UED Team</li>'+
	'</ul>'
	);
	document.execCommand("stop");
}
</script>