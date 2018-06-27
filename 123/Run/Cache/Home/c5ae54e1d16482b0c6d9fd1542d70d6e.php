<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上海冠尚机电</title>
<link href="/Public/Home/css/public.css" rel="stylesheet" type="text/css">
<link href="/Public/Home/css/page.css" rel="stylesheet" type="text/css">

</head>

<body>
<header class="index-head">
 <div class="main">
 <h1 class="none">上海冠尚机电</h1>
 <img src="/Public/Home/images/logo_03.png" width="254" height="70" class="logo">
 <div class="tel">400-000-0000</div>
 <nav>
  <h2 class="none">上海冠尚网站导航</h2>
  <ul>
   <?php if(is_array($nav)): foreach($nav as $key=>$list): ?><li><a href="/<?php echo $list['moudle'];?>/<?php echo $list['moudle_id']; echo C('URL_HTML_SUFFIX');?>"><?php echo $list['name'];?></a></li><?php endforeach; endif; ?>
  </ul>
 </nav>
 </div>
</header>
<div class="clearfix"></div>
<div class="pagebanner">
<img src="/Public/Home/images/pagebanner_02.png">
</div>

 <div class="main">
  <aside class="page-nav pro-nav">
   <h2>公司产品</h2>
   <nav>
   <h2 class="none">公司产品导航</h2>
   <dl class="page-nav-list">
    <dt class="active"><a href="product.html">机电部产品</a></dt>
       <dd><a href="#">ProLubwell 合成工业油</a></dd>
       <dd><a href="#">TopWellube 高级润滑油</a></dd>
       <dd><a href="#">TopWellube 高级润滑油</a></dd>
    <dt><a href="product.html">润滑油产品部</a></dt>
       <dd><a href="#">ProLubwell 合成工业油</a></dd>
       <dd><a href="#">TopWellube 高级润滑油</a></dd>
       <dd><a href="#">TopWellube 高级润滑油</a></dd>
    <dt><a href="product.html">接着剂产品部</a></dt>
       <dd><a href="#">ProLubwell 合成工业油</a></dd>
       <dd><a href="#">TopWellube 高级润滑油</a></dd>
       <dd><a href="#">TopWellube 高级润滑油</a></dd>
   </dl>
   </nav>
   <div class="clearfix"></div>
   <div class="as-contact">
    021-54453585
    <p>fgi@fgilube.com</p>
   </div>
  </aside>
  <article class="page-content">
   <h2 class="none">上海冠尚产品展示</h2>
   <header>
   
    <div class="crumbs">您的当前位置：<a href="#">首页</a><a href="#">公司产品</a><a href="#">机电部产品</a></div>
   </header>
   <section class="about-cotent" style="padding-top:0px;">
   <h2 class="none">公司产品列表</h2>
    <ul class="pro-list">
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
     <li><a href="pro_info.html"><span><img src="/Public/Home/images/p01_03.png" width="225" height="175"></span><h3>上海冠尚公司产品</h3></a></li>
    </ul>
    <div class="fy">
    <ul>
     <li>1</li>
     <li><a href="#">2</a></li>
     <li><a href="#">3</a></li>
     <li><a href="#">4</a></li>
     <li><a href="#">5</a></li>
     <li><a href="#">6</a></li>
    </ul>
   </div>
   </section>
  </article>
 </div>

<footer class="index-bottom">
 <div class="main">
  <img src="/Public/Home/images/bottomlogo_25.png" width="201" height="55">
  <div class="bottom-txt">
   冠尚机电有限公司版权所有
<br>
电话：021-021-54453585 传真：021-54453580 邮箱：fgi@fgilube.com
<br>Copyright 2007 by www.fgilube.com 沪ICP备08015241号 | 技术支持：上海登罄耘网络科技有限公司
  </div>
 </div>
</footer>

</body>
</html>