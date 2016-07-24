<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<style type="text/css">
#content {
  width: 100%;
  border-right: 0px
}
</style>
<div id="content">
<div id="contentleft">
  <h2 class="biaoti" id="masked">
    <?php echo $log_title; ?></h2>
     <address class="entry-meta" id="content_date">
      <i class="fa fa-home"></i><a href="<?php echo BLOG_URL;?>" title="返回首页">首页</a> &raquo; <i class="fa fa-file-text-o"></i><?php echo $log_title; ?> &raquo; <i class="fa fa-clock-o"></i>
      <?php $time = time();
    echo date("y-m-d h:i:s",$time); ?>
      </address>
  <article class="post-context">
    <div class="blue">
       <?php echo $log_content; ?>
 
    </div>
  </article>
  <?php echo ny_link(); ?>

<div class="clear"></div>
 <div id="comments">
      <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
      <?php if(empty($comnum)){ echo "<br/><span class='nop'><i class='fa fa-pencil'></i> 既然没有吐槽，那就赶紧抢沙发吧！</span>";}else{echo"<h3><i class='fa fa-comments-o'></i> 已有";echo $comnum;echo"条吐槽</h3>";} ?>
      <?php blog_comments($comments,$params); ?>
    </div>
  </div>
<?php
include View::getView('side');
 include View::getView('footer');
?>