<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
	<h2 class="biaoti" id="masked"><?php echo $log_title; ?></h2>
	<div class="xiantiao2"><img src="<?php echo TEMPLATE_URL; ?>images/xiantiao2.png"></div>
	  <?php echo $log_content; ?>
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