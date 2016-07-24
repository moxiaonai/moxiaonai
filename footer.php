<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->
<div style="clear:both;"></div>
<div id="footerbar">
<div id="dibu">
	<a onclick="goTop();" href="javascript:void(0);">返回顶部</a> &nbsp;&nbsp;
	<a href="/">首页</a> &nbsp;&nbsp;
	<a href="<?php echo rand_log(); ?>">手气不错</a>  &nbsp;&nbsp;
<?php echo _g('dibu-zdywz');?>
<a href="<?php echo BLOG_URL; ?>admin/" class="hint--left hint--error" title="站长的后花园，闲人止步！ ^_^">后花园</a> &nbsp;&nbsp;
<br>版权所有：<a href="<?php echo BLOG_URL; ?>" class="chaffle" data-lang="zh"><?php echo $blogname; ?></a>&nbsp;&nbsp;&nbsp;
站长：<span class="chaffle" data-lang="zh">
<?php
if (!empty($tws)):
    echo $author; //微语;
else:
    blog_author($value['author']); //列表页
endif;
?>
</span>&nbsp;&nbsp;&nbsp;
<a href="http://blog.moxiaonai.cn/" target="_blank" class="hint--top hint--rounded" title="看看官网还有什么新鲜的“主题”？">主题</a>：<a href="http://moxiaonai.cn/" class="hint--top hint--bounce" title="莫小奈自适用版变异版- 发布时间：2016.7.23" target="_blank">莫小奈自适用版变异版</a>&nbsp;&nbsp;
	<a href="http://www.emlog.net" class="hint--top hint--bounce" title="大名鼎鼎的emlog博客系统，地球人都在用。" target="_blank">程序：emlog</a>&nbsp;&nbsp;<progress id="mypro" value="<?php echo _g('progress');?>" max="100%"></progress>
<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>&nbsp;&nbsp;<?php echo $footer_info; ?>&nbsp;&nbsp;
	<?php doAction('index_footer'); ?>
<?php if (_g('yqlj') == "yes"): ?><div id="link2"><?php index_link();?></div><?php else: ?><?php endif; ?>
	</div><!--end #dibu-->
</div><!--end #footerbar-->
</div><!--end #wrap-->
<!-- 返回顶部代码开始 -->
<ul id="scroll" class=""> <li><a class="scroll_t" id="scroll_t" href="javascript:void(0);"><i class="fa fa-chevron-up"></i></a></li> <li><a class="cboxElement" id="qrcode_p" href="<?php echo _g('weixin');?>" rel="example_group"><i class="fa fa-qrcode"></i></a> <li><a class="scroll_c" href="http://blog.moxiaonai.cn/?post=15"><i class="fa fa-comments"></i></a></li> <li><a class="scroll_b" id="scroll_b" href="javascript:void(0);"><i class="fa fa-chevron-down"></i></a></li> </ul>
<!-- <div class="colorful_loading_frame" style="display: none;">
  <div class="colorful_loading" style="display: none;"><i class="rect1"></i><i class="rect2"></i><i class="rect3"></i><i class="rect4"></i><i class="rect5"></i></div>
</div> -->
<?php if (_g('bybg') == "yes"): ?><img class="bg-image" src="http://www.dujin.org/sys/bing/1366.php" alt="" width="1366" height="768" />
<?php else: ?><img   class="bg-image"  src="<?php echo _g('bgimage');?>"><?php endif; ?>
<div class="bg-image-pattern"></div>
<script src="<?php echo TEMPLATE_URL; ?>js/bowen.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/mypjax.js" type="text/javascript"></script>
<link href="<?php echo TEMPLATE_URL; ?>js/highslide/highslide.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/highslide/highslide.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/prettify.js" type="text/javascript"></script>
<!-- 代码高亮 -->
<script type="text/javascript">
$(function() {
$('pre').addClass('prettyprint linenums').attr('style', 'overflow:auto');
window.prettyPrint && prettyPrint();
});
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    hs.graphicsDir = "<?php echo TEMPLATE_URL; ?>js/highslide/graphics/";
	hs.align = "center";
	hs.transitions = ["expand", "crossfade"];
	hs.outlineType = "rounded-white";
	hs.wrapperClassName = "dark borderless floating-caption";
	hs.fadeInOut = !0;
	hs.dimmingOpacity = .75;
    hs.addSlideshow({
        interval: 5000,
        repeat: true,
        useControls: true,
        fixedControls: "fit",
        overlayOptions: {
            opacity: 0.75,
            position: "bottom center",
            hideOnMouseOut: true
        }
    });
	jQuery(function($){$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").addClass("highslide").each(function(){this.onclick=function(){return hs.expand(this)}});})
});
</script>
<script type="text/javascript">
$(function(){
	$("#slider").responsiveSlides({
		auto: true,
		pager: true,
		nav: false,
		speed: 500,
		timeout: 5000,
		namespace: "centered-btns"
	});
});
</script>
<script src="http://myhk.xlch520.cn/WebConfig.php?Key=5b79747315163611bfb4e5b3085269e3"></script>
<link rel="stylesheet" href="http://myhk.xlch520.cn/assets/v20160714/css/player.css?v=486"><link href="https://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="wenkmPlayer">
        <div class="player">
                <div class="infos">
                        <div class="songstyle"><i class="fa fa-music"></i> <span class="song"></span></div>
            <div class="timestyle"><i class="fa fa-clock-o"></i> <span class="time">00:00 / 00:00</span></div>
                        <div class="artiststyle"><i class="fa fa-user"></i> <span class="artist"></span><span class="moshi"><i class="loop fa fa-random current"></i> 随机播放</span></div>
            <div class="artiststyle"><i class="fa fa-folder"></i> <span class="artist1"></span><span class="geci"></span></div>
                </div>
                <div class="control">
                        <i class="loop fa fa-retweet " title="顺序播放"></i>
                        <i class="prev fa fa-backward" title="上一首"></i>
                        <div class="status">
                                <b>
                                        <i class="play fa fa-play" title="播放"></i>
                                        <i class="pause fa fa-pause" title="暂停"></i>
                                </b>
                        </div>
                        <i class="next fa fa-forward" title="下一首"></i>
                        <i class="random fa fa-random  current" title="随机播放"></i>
                </div>
                <div class="musicbottom">
                        <div class="volume">
                                <i class="mute fa fa-volume-off"></i>
                                <i class="volumeup fa fa-volume-up"></i>
                                <div class="progress">
                                        <div class="volume-on ts5">
                                                <div class="drag" title="音量"></div>
                                        </div>
                                </div>
                        </div>
                        <div class="switch-playlist">
                                <i class="fa fa-bars" title="播放列表"></i>
                        </div>
            <div class="switch-ksclrc">
                                <i class="fa fa-toggle-on" title="关闭歌词"></i>
                        </div>
                        <div class="switch-default">
                                <i class="fa fa-refresh" title="切换默认专辑"></i>
                        </div>
                        <div class="switch-down">
                                <a class="down"><i class="fa fa-cloud-download" title="歌曲下载"></i></a>
                        </div>
                </div>
                <div class="cover"></div>
        </div>
        <div class="playlist">
                <div class="playlist-bd">
                        <div class="album-list">
                                <div class="musicheader"></div>
                                        <div class="list"></div>
                        </div>
                        <div class="song-list">
                                <div class="musicheader"><i class="fa fa-angle-right"></i><span></span></div>
                        <div class="list"><ul></ul></div>
                        </div>
                </div>
        </div>
        <div class="switch-player">
                <i class="fa fa-angle-right" style="margin-top: 20px;"></i>
        </div>
</div>
<div id="wenkmTips"></div>
<div id="wenkmLrc"></div>
<div id="wenkmKsc"></div>
<div class="myhk_pjax_loading_frame"></div>
<div class="myhk_pjax_loading"></div>
<script type="text/javascript"> window.onbeforeunload = function() {RootCookies.SetCookie("myhk_player_show", "no", -1)};window.onunload = function() {RootCookies.SetCookie("myhk_player_show", "no", -1)};</script>
<script src="https://cdn.bootcss.com/jquery-mousewheel/3.1.9/jquery.mousewheel.min.js"></script>
<script src="https://cdn.bootcss.com/pace/1.0.2/pace.min.js"></script>
<script src="http://myhk.xlch520.cn/assets/v20160714/js/scrollbar.js"></script>
<script language="javascript" src="http://myhk.xlch520.cn/assets/v20160714/js/player.js?v=08570.4636"></script>
</body>
</html>