<?php 
/**
 * 阅读文章页面 
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
<!-- 显示置顶标记,日志标题 -->
<?php if (_g('voice_ct') == "yes"): ?>
<embed height="0" width="0" src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&text=<?php echo $log_title; ?>"/>
<?php endif; ?>
<div class="biaoti" id="masked"><?php topflg($top); ?><?php echo $log_title; ?></div>
<!-- 标题下文章信息 -->
	<div class="date2">
	<span class="home"></span><a href="/" title="返回网站首页">首页</a> <b>></b>
    <?php 
     //父分类和子分类
     $ery = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='$sortid'"); $rest = mysql_fetch_array($ery); if($rest['pid'] == "0"){
   echo '<a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>'; 
  }else{
  $ery1 = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='".$rest['pid']."'"); $rest1 = mysql_fetch_array($ery1); echo '<a href="'.Url::sort($rest1['sid']).'">'.$rest1['sortname'].'</a>'; echo ' <b>></b> <a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>';}
    ?>
	<!--分类原代码 <?php blog_sort($logid); ?> -->
	<span class="pauthor"></span>作者：<?php blog_author($author); ?>&nbsp;
	<span class="ptime"></span> <?php  echo gmdate('Y年n月j日', $date);?>&nbsp;
	<span class="pview"></span>热度：<?php echo $views; ?>°&nbsp;
	<span class="zihao"></span>字号：<a href="javascript:doZoom(14)" class="hint--top  hint--success" data-hint="缩小到五号字体">小</a>
    <a href="javascript:doZoom(16)" class="hint--top  hint--info" data-hint="适合阅读的小四字体">中</a>
    <a href="javascript:doZoom(18)" class="hint--top  hint--error" data-hint="放大到四号字体">大</a>&nbsp; 
<span class="plun"></span>评论：<?php echo $comnum; ?> 条</li>&nbsp;<i class="fa fa-paw"></i>&nbsp;<?php echo checkbaidu($logid); ?>
	<!-- editflg编辑 --><?php editflg($logid,$author); ?></div>
	
	<!--分辨率小于600px时才出现，低于320px自动消失。-->
    <div class="date4">
	时间：<?php echo gmdate('Y-n-j G:i', $date); ?>&nbsp;&nbsp;
	热度：<?php echo $views; ?>°&nbsp; 
	评论：<?php echo $comnum; ?> 条&nbsp;
	</div>
	<div class="xiantiao"><img src="<?php echo TEMPLATE_URL; ?>images/xiantiao1.png"></div>
	
	<!--  改变正文字号代码  -->
<script type="text/javascript">function doZoom(size){document.getElementById('zoom').style.fontSize=size+'px'}</script>
    <!-- 改变字号代码结束 -->
	
	<!-- 日志全文内容 --><div id="zoom"><?php echo $log_content; ?></div>
	
	<!-- 统计访客停留时间 -->
	<div id="tingliu"></span> &nbsp;<span class="tingliu2">您阅读这篇文章共花了：</span>&nbsp;<span class="tingliu3" id="stime"></span></div>
<script language="JavaScript">var ss=0,mm=0,hh=0;function TimeGo(){ss++;if(ss>=60){mm+=1;ss=0}if(mm>=60){hh+=1;mm=0}ss_str=(ss<10?"0"+ss:ss);mm_str=(mm<10?"0"+mm:mm);tMsg=""+hh+"小时"+mm_str+"分"+ss_str+"秒";document.getElementById("stime").innerHTML=tMsg;setTimeout("TimeGo()",1000)}TimeGo();</script>
    <!-- 统计访客停留时间结束 -->
	<?php if (_g('fenxiang1-kh') == "yes"): ?><div class="fenxiang">
<!-- JiaThis Button BEGIN -->
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{"bdSize":16},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script><!-- JiaThis Button END --></div>
<?php endif; ?>
	<!-- 结束分割线 -->
 <div class="cutline"><span>正文到此结束</span></div>
	
	<!-- 上一篇及下一篇 -->
	<div id="shangxiapian_2"><?php neighbor_log2($neighborLog); ?><div id="gaodu1"></div></div>
	<div id="shangxiapian"><?php neighbor_log($neighborLog); ?><div id="gaodu1"></div></div> 
	
	<!-- 捐赠。分为文字和图片，文字只在小分辨率下显示，图片则是大分辨率。 -->
	<?php if (_g('juanzeng1-kh') == "yes"): ?>
	<div class="juanzhu"><a href="<?php echo _g('juanzeng-link');?>" title="捐赠支持作者！点击進入。" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>images/juanzeng1.gif"></a></div>
	<?php else: ?><?php endif; ?>
	<?php if (_g('juanzeng2-kh') == "yes"): ?>
	<div class="juanzhu2"><b>捐赠支持：</b>如果觉得这篇文章对您有帮助，请<b><a href="<?php echo _g('juanzeng-link');?>" class="shake shake-little" title="去看看有谁捐赠了。">“扫一扫”</a></b>鼓励作者！</div>
	<?php else: ?><?php endif; ?>
	<!-- 感兴趣文章 -->
	<?php if (_g('xgrz-kh') == "yes"): ?>
    <div class="post-related">
      <h3><i class="fa fa-fire"></i> 热门推荐</h3>
      <ul>
        <?php $date = time() - 3600 * 24 * 360;$Log_Model = new Log_Model();$viewslogs = $Log_Model->getLogsForHome("AND date > {$date} ORDER BY views DESC,date DESC", 1, 6);?>
        <?php foreach($viewslogs as $value): ?>
        <li>
          <div id="thumb"><a href="<?php echo $value['log_url']; ?>"><img src="<?php mrxn_zwimg($value['content']); ?>"></a></div>
          <div class="title"><a pjax="<?php echo $value['log_title']; ?>" href="<?php echo $value['log_url']; ?>" title="查看文章：<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></div>
          <div class="modified">热门指数：
            <?php if($value['comnum']>70){ echo '<span class="five-star"></span>'; }else if($value['comnum']>50){ echo '<span class="four-star"></span>'; }else if($value['comnum']>30){ echo '<span class="three-star"></span>'; }else if($value['comnum']>10){ echo '<span class="two-star"></span>'; }else{ echo '<span class="one-star"></span>'; }; ?>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
     <?php else: ?><?php endif; ?>
     <!-- 感兴趣文章代码结束 -->
     <div class="clear"></div></div>
<?php if (_g('banquan-kh') == "yes"): ?>
<div class="post-lisence">
<div class="qring">
	<img src="http://qr.liantu.com/api.php?&bg=ffffff&w=100&m=6&fg=000000&text=<?php $url_this =  "http://".$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI'];echo $url_this; ?>" alt="二维码加载中...">
</div>
		  <div class="post-tags"><i class="fa fa-tags"></i> 本文标签：<?php blog_tag($logid);?></div>
          <i class="fa fa-bullhorn"></i> 版权声明：若无特殊注明，本文皆为《
          <?php blog_author($author); ?>
          》原创，转载请保留文章出处。</br>
          <i class="fa fa-share-alt-square"></i> 本文链接：<?php echo $log_title; ?> <?php echo Url::log($logid); ?>
	<div id="gaodu1"></div></div><?php else: ?><?php endif; ?>
	<?php doAction('log_related', $logData); ?> <!-- 相关日志的挂载点 -->
	 <div id="comments">
      <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
      <?php if(empty($comnum)){ echo "<br/><span class='nop'><i class='fa fa-pencil'></i> 既然没有吐槽，那就赶紧抢沙发吧！</span>";}else{echo"<h3><i class='fa fa-comments-o'></i> 已有";echo $comnum;echo"条吐槽</h3>";} ?>
      <?php blog_comments($comments,$params); ?>
    </div>
	<div style="clear:both;"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>