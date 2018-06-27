<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上海冠尚机电</title>
<link href="/Public/Home/css/public.css" rel="stylesheet" type="text/css">
<link href="/Public/Home/css/page.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=GSQILDhLAPOzno3cAC8wMbcZ"></script>
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
   <li><a href="index.html">首页</a></li>
   <li><a href="about.html">关于我们</a></li>
   <li><a href="news.html">新闻动态</a></li>
   <li><a href="service.html">解决方案</a></li>
   <li><a href="product.html">公司产品</a></li>
   <li><a href="case.html">案例展示</a></li>
   <li><a href="contact.html">联系我们</a></li>
   <li><a href="join.html">人才招聘</a></li>
  </ul>
 </nav>
 </div>
</header>
<div class="clearfix"></div>
<div class="pagebanner">
<img src="/Public/Home/images/pagebanner_02.png">
</div>

 <div class="main">
  <aside class="page-nav">
   <h2>联系我们</h2>
   <nav>
   <h2 class="none">联系我们导航</h2>
   <ul class="page-nav-list">
    <li><a href="about.html">公司介绍</a></li>
    <li><a href="rongyu.html">荣誉资质</a></li>
    <li><a href="zongzhi.html">公司宗旨</a></li>
    <li class="active"><a href="contact.html">联系我们</a></li>
    <li><a href="join.html">人才招聘</a></li>
   </ul>
   </nav>
   <div class="clearfix"></div>
   <div class="as-contact">
    021-54453585
    <p>fgi@fgilube.com</p>
   </div>
  </aside>
  <article class="page-content">
   <h2 class="none">上海冠尚联系我们</h2>
   <header>
   
    <div class="crumbs">您的当前位置：<a href="#">首页</a><a href="#">关于我们</a><a href="#">联系我们</a></div>
   </header>
   <section class="about-cotent">
   <h2 class="none">公司介绍</h2>
    <div class="contact">
     <ul>
      <li>联系电话：021-54453585</li>
      <li>Fax：021-54453580</li>
      <li>邮编：200233</li>
      <li>邮箱：fgi@fgilube.com</li>
      <li>地址：上海市徐汇区田林路487号20号楼1001室</li>
     </ul>
    </div>
    <div class="map">
    
    <div style="width:959px;height:350px;border:#ccc solid 1px;font-size:12px;" id="map"></div>
    
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
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      addMapOverlay();//向地图添加覆盖物
    }
    function createMap(){ 
      map = new BMap.Map("map"); 
      map.centerAndZoom(new BMap.Point(121.402585,31.170042),15);
    }
    function setMapEvent(){
      map.enableScrollWheelZoom();
      map.enableKeyboard();
      map.enableDragging();
      map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }
    function addMapOverlay(){
    }
    //向地图添加控件
    function addMapControl(){
      var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
      scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
      map.addControl(scaleControl);
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
      map.addControl(navControl);
      var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
      map.addControl(overviewControl);
    }
    var map;
      initMap();
  </script>
</html>