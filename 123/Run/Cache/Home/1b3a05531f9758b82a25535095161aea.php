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
  <aside class="page-nav news-nav">
   <h2><?php echo getCateName($parent_id);?></h2>
   <nav>
   <h2 class="none">新闻中心导航</h2>
   <ul class="page-nav-list">
    <?php if(is_array($catelist)): foreach($catelist as $key=>$catelist): ?><li <?php if($_GET['cate_id'] == $catelist['id']): ?>class="active"<?php endif; ?>><a href="/news/<?php echo $catelist['id']; echo C('URL_HTML_SUFFIX');?>"><?php echo $catelist['subject'];?></a></li><?php endforeach; endif; ?>
   </ul>
   </nav>
   <div class="clearfix"></div>
   <div class="as-contact">
    021-54453585
    <p>fgi@fgilube.com</p>
   </div>
  </aside>
  <article class="page-content">
   <h2 class="none">上海冠尚新闻中心</h2>
   <header>
   
    <div class="crumbs">您的当前位置：<a href="#">首页</a><a href="#"><?php echo getCateName($parent_id);?></a><a href="#"><?php echo getCateName($_GET['cate_id']);?></a></div>
   </header>
   <section class="about-cotent" style="padding-top:0px;">
   <h2 class="none">新闻列表</h2>
    <ul class="news-list">
    <?php if(is_array($news)): foreach($news as $key=>$news): ?><li>
      <a href="/content/<?php echo $news['id']; echo C('URL_HTML_SUFFIX');?>">
       <img src="<?php echo $news['thumb'];?>" width="149" height="100">
       <div class="news-txt">
        <h3><?php echo $news['title'];?></h3>
        <p><?php echo $news['discription'];?></p>
        <time><span><?php echo (date($news['addtime'],'Y-m-d')); ?></span><span>已有<?php echo $news['hits'];?>人浏览</span></time>
       </div>
      </a>
     </li><?php endforeach; endif; ?>
    </ul>
    <div class="fy">
    <?php echo $page;?>
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