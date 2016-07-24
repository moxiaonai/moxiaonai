<?php 
/**
 * 自定义404页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <title>404错误页面</title>
    <style type="text/css" media="screen">
    *{margin:0;padding:0;font-family:arial,sans-serif;font-size:14px;}
    body,html{height:100%;}
    body{background:url(content/templates/bowen/images/bg.jpg);}
    .wrapper{margin: 0 auto; background:#fff url(content/templates/bowen/images/404.png) no-repeat center; width:254px; height:103px; padding:0px; top:50%; margin-top:-150px; position:relative;}
    .zi1{font-weight:700; font-size:16px; margin: 0px; padding: 28px 15px 0px 27px;}
    .tm{padding:15px 10px 0px 15px;}
    .tm span{color:#e10602; padding:0 5px; font-weight:700;}
    </style>
  </head>
  <body>
      <div class="wrapper">
          <div class="zi1">该页未找到，即将转首页。</div>
          <p class="tm"><span id="time">5</span>秒内自动跳转...
          &nbsp; <a id="Btn" href="/">前往本站首页</a></p>
      </div>
      <script type="text/javascript">
function sendStats(url){
    var n = "log_"+ (new Date()).getTime();
    var c = window[n] = new Image();
    c.onload = (c.onerror=function(){window[n] = null;});
    c.src = '/' + url;
    c = null;  
}
var time = document.getElementById('time');
var btn = document.getElementById('Btn');
function count(){
    if( +time.innerHTML > 0 ){
        time.innerHTML = time.innerHTML - 1;
    }else{
        sendStats('gotobaidu');
        location.href = btn.href;
    }
}
setInterval(count , 1000);
btn.onclick = function(){
    sendStats('gotobaidu');
};
      </script>
  </body>
</html>