<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
<?php doAction('index_loglist_top'); ?>
<?php if (_g('focus_img') == "yes"): ?>
<div class="rslides_container">
<ul id="slider" class="rslides centered-btns centered-btns1">
    <li id="centered-btns1_s0" style="display: block; float: left; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out 0s;"
    class="">
        <a title="<?php echo _g('hdt1');?>" target="_blank" href="<?php echo _g('hda1');?>">
            <img alt="<?php echo _g('hdt1');?>" src="<?php echo _g('hd1');?>">
        </a>
    </li>
    <li id="centered-btns1_s1" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 500ms ease-in-out 0s;"
    class="">
        <a title="<?php echo _g('hdt2');?>" target="_blank" href="<?php echo _g('hda2');?>">
            <img alt="<?php echo _g('hdt2');?>" src="<?php echo _g('hd2');?>">
        </a>
    </li>
    <li id="centered-btns1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 500ms ease-in-out 0s;"
    class="">
        <a title="<?php echo _g('hdt3');?>" target="_blank" href="<?php echo _g('hda3');?>">
            <img alt="<?php echo _g('hdt3');?>" src="<?php echo _g('hd3');?>">
        </a>
    </li>
</ul>
</div><?php endif; ?>
<?php if (_g('index_top') == "yes"): ?>
<div class="post istop">
	<h2>
		<span>推荐声明：</span>
		<a href="<?php echo _g('index_top1');?>
			" target="_blank" title="
			<?php echo _g('index_title');?>
			">
			<?php echo _g('index_title');?></a>
	</h2>
</div>
<?php endif; ?>
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<div class="post-list">
<h2 class="loading">	
<!-- 说明：判断时间 -->
<?php 
$t=time() - 1*24*60*60;
$log_t=gmdate('Y-m-d',$value['date']);
$diy_t=date("Y-m-d",$t);
if($log_t > $diy_t) echo '<img src="'.TEMPLATE_URL.'images/new.gif" alt="最新文章">';
?>
<!-- 说明：判断浏览量 -->
<?php 
if ($value['views'] >= 500) echo '<img src="'.TEMPLATE_URL.'images/hot.gif" alt="热门文章">';
?>		
<!-- 判断代码完 -->
	<?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></h2>
	<div class="date1"><span class="ptime"></span>时间：<?php echo gmdate('Y-n-j', $value['date']); ?>&nbsp;&nbsp;
	<span class="pauthor"></span>作者：<?php blog_author($value['author']); ?>&nbsp;&nbsp;
	<span class="pcata"></span>分类：<?php blog_sort($value['logid']); ?>&nbsp;
	<span class="pview"></span>热度：<a href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?></a>°&nbsp;
<span class="plun"></span><a href="<?php echo $value['log_url']; ?>#comments">评论：<?php echo $value['comnum']; ?></a>&nbsp;&nbsp;
	<?php editflg($value['logid'],$value['author']); ?> <!-- 当管理员或作者登陆时显示“编辑”链接 -->
	</div>
    <!-- 分辨率低于600px才显示，小于390px就隐藏。 -->
	<div class="date3">
    时间：<?php echo gmdate('Y-n-j', $value['date']); ?>&nbsp;&nbsp;
	分类：<?php blog_sort($value['logid']); ?>&nbsp;&nbsp;
	热度：<a href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?></a>&nbsp;&nbsp;
	<a href="<?php echo $value['log_url']; ?>#comments">评论：<?php echo $value['comnum']; ?></a> 
	</div>
	<div id="article_content">
		<div id="thumbnail"><a href="<?php echo $value['log_url']; ?>"><img src="<?php mrxn_zwimg($value['content']); ?>"></a></div>
		<div id="arcticle_thumb"><?php echo $value['log_description']; ?> </div> <!-- 输出日志摘要（没有摘要则输出全文 -->
	</div>
	<div style="clear:both;"></div>
	<div class="goon"> <a  href="<?php echo $value['log_url']; ?>">继续阅读&raquo;</a> </div>
</div>
<?php 
endforeach;
else:
?>
	<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>
<?php endif;?>

<div class="pagenavi">
	<?php echo $page_url;?>
</div>

</div><!-- end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>