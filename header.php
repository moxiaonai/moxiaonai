<?php
/*
Template Name:MOXIAONAI
<!--  【博客程序】：emlog      【主题模板】：莫小奈7.22   【作者网站】：blog.moxiaonai.cn  -->
Description:一款高端大气、古典优雅的主题，采用html5+css3响应式、智能化设计，兼容IE8、9、10、11和各种现代浏览器。在手机、平板、PC上都能完美显示.
Version:<span style="color:#E60026;">7.22</span>
Author:莫小奈
Author Url:http://blog.moxiaonai.cn
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>">
<meta name="description" content="<?php echo $site_description; ?>">
<meta name="baidu_union_verify" content="3400b48e0ac348f766f731420dc924eb">
<meta name="generator" content="emlog">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<!-- 引用百度cdn公共库网站托管的Jquery，不成功则使用本地Jquery。 -->
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<script>!window.jQuery && document.write('<script src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"><\/script >');</script>
<link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>js/responsiveslides.css" media="screen"/>
<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml">
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php">
<script src="<?php echo TEMPLATE_URL; ?>js/pjax.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/responsiveslides.min.js" type="text/javascript"></script>
<!-- css3动画库，它能让网页所有元素舞动起来，你将愛上它。 -->
<link href="<?php echo TEMPLATE_URL; ?>js/animate.min.css" rel="stylesheet">
<?php doAction('index_head'); ?>
</head>
<body>
<header id="header">
<div class="box">
    <div class="logo"> <a rel="index"  title="莫小奈博客" href="<?php echo BLOG_URL; ?>">
    <img class="xwcms" src="<?php echo _g('icon');?>" alt="莫小奈博客"></a></div>
    <h2 title="莫小奈博客"><a title="莫小奈博客" href="<?php echo BLOG_URL; ?>"><?php echo $site_title; ?></a></h2>
      <div class="text">
          <ul><?php echo index_t(10); ?></ul>
      </div> 
</div>
</header>
<!-- 导航菜单 -->
<nav id="navbar">
<div id="nav"><?php blog_navi();?>
   <ul class="m-nav">
    <li><a id="showbox"  title="设置网站背景图片"><i class="fa fa-cogs"></i> 背景</a></li>
      <!-- <li> <a class="rss" rel="nofollow" title="RSS订阅" href="<?php echo _g('rss');?>" target="_blank"><i class="fa fa-rss"></i> 订阅</a> </li> -->
     <li><a class="wechat highslide" rel="nofollow" title="点击查看微信二维码" href="<?php echo _g('weixin');?>" target="_blank"><i class="fa fa-wechat"></i> 微信</a></li>
      <li> <a rel="nofollow" title="QQ：39784480 [点击临时会话]" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo _g('qq');?>&amp;site=qq&amp;menu=yes" target="_blank"><i class="fa fa-qq"></i> QQ</a></li>
      <li><a rel="nofollow" title="新浪微博：@Dev-莫小奈博客 [点击访问]" href="<?php echo _g('sina_wb');?>" target="_blank"><i class="fa fa-weibo"></i> 微博</a></li>
    </ul>
  <div id="bg-images_tanchu">
   <div id="changebg" class="changebg">
    <div class="tiphead"><i class="fa fa-cogs"></i> 设置背景图片<a id="kaiguan"  title="关闭"></a></div>
    <div class="tipbody">
      <ul id="imgul">
      <li id="imgli_1" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>/images/bg/1.jpg)';RootCookies.SetCookie('blog_bg', '1', 30);bgid='1'"><i class="fa fa-check-circle fa-2x checkit"></i><i></i></li>
      <li id="imgli_2" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/2.jpg)';RootCookies.SetCookie('blog_bg', '2', 30);bgid='2'"><i></i></li>
      <li id="imgli_3" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/3.jpg)';RootCookies.SetCookie('blog_bg', '3', 30);bgid='3'"><i></i></li>
      <li id="imgli_4" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/4.jpg)';RootCookies.SetCookie('blog_bg', '4', 30);bgid='4'"><i></i></li>
      <li id="imgli_5" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/5.jpg)';RootCookies.SetCookie('blog_bg', '5', 30);bgid='5'"><i></i></li>
      <li id="imgli_6" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/6.jpg)';RootCookies.SetCookie('blog_bg', '6', 30);bgid='6'"><i></i></li>
      <li id="imgli_7" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/7.jpg)';RootCookies.SetCookie('blog_bg', '7', 30);bgid='7'"><i></i></li>
      <li id="imgli_8" onclick="javascript:document.body.style.backgroundImage='url(<?php echo TEMPLATE_URL; ?>images/bg/8.jpg)';RootCookies.SetCookie('blog_bg', '8', 30);bgid='8'"><i></i></li>
        </ul>
      </div>
      <div class="tmdiv">
      <div class="tm_info">模块透明度调整：</div>
      <div class="tm_du">
        <i class="tm_zuo fa fa-circle-thin fa-2x"></i>
        <i class="tm_you fa fa-circle fa-2x"></i>
        <div class="tm_cd">
          <div class="changdu ts5" style="width: 60%;">
            <div class="cddrag" title="透明度60%"></div>
          </div>
        </div>
      </div>
    </div>
   </div>
</div> 
    <div style="clear:both;"></div>
</div>
</nav>
<div id="mheader">
  <a id="logo" href="<?php echo BLOG_URL; ?>"><img src="<?php echo _g('logo');?>"/></a>
  <i id="open-nav2" class=" fa fa-2x fa-list-ul"></i>
</div>
<div id="nav2">
<div id="sousuo2" title="在搜索框中输入关键字后，按“回车”即可搜到结果。">
<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
<input name="keyword" type="search" placeholder="框中输文字，回车索结果。"></form></div>
<?php blog_navi2();?>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('.nav .menu li ul').prepend('<span class="arrow-top"></span>');
  $('.nav .menu li ul').before(' <i class="icon-angle-down"></i>');
  $('.nav .menu').clone(false).appendTo('.mobile-nav'); 
  $("#open-nav2").click(function(){
    $("#nav2").toggleClass("open");
  });
});
</script>
<div id="wrap">
