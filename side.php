<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="sidebar">
	<?php widget_search($title);?>
<div id="widget">
  <div id="big" class="tab_nav">
  <UL id="tags">
    <LI class="selectTag"><A onMouseover="selectTag('tagContent0',this)" href="javascript:void(0)"><i class="fa fa-paint-brush"></i><span>最新发表</span></A> </LI>
    <LI><A onMouseover="selectTag('tagContent1',this)" href="javascript:void(0)"><i class="fa fa-fire"></i><span>热门推荐</span></A> </LI>
    <LI><A onMouseover="selectTag('tagContent2',this)" href="javascript:void(0)"><i class="fa fa-angellist"></i><span>手气不错</span></A> </LI>
  </UL>
  </div>
    <DIV id="tagContent">
    <DIV class="tagContent" id="tagContent0"><?php new_log();?><!--最新文章--></DIV>
    <DIV class="tagContent hide selectTag" id="tagContent1"><?php hot_log();?><!--30天热门文章--></DIV>
    <DIV class="tagContent hide" id="tagContent2"><?php random_log();?><!--随机文章--></DIV>
  </DIV>
</div>
<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
doAction('diff_side');
foreach ($widgets as $val)
{
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
}
?>
<?php if (_g('tongji-kh') == "yes"): ?>
<div id="tongji">
<div id="tongji_biaoti"><span class="icon"><i class="fa fa-comments"></i></span><h3>网站统计</h3></div>
<div id="tongjibiankuang"><div class="neirong">
<li>建站日期：<?php echo _g('tjrq');?></li>
 <?php ja_sta(); ?>
<?php
$Log_Model = new Log_Model();
$today = strtotime(date('Y-m-d'));
$threeday = strtotime(date('Y-m-d',strtotime('-3 day')));
$tenday = strtotime(date('Y-m-d',strtotime('-10 day')));
$today_sql = "and date>$today";
$today_num = $Log_Model->getLogNum('n', $today_sql);
$threeday_sql = "and date>$threeday";
$threeday_num = $Log_Model->getLogNum('n', $threeday_sql);
$tenday_sql = "and date>$tenday";
$tenday_num = $Log_Model->getLogNum('n', $tenday_sql);
if($tenday_num=='0'){echo '<li>站长好勤快！长达<span id="hongsezi" class="shake shake-little shake-constant"><b>10</b></span>天未更新内容了</li>';}
elseif($threeday_num=='0'){echo '<li>站长很牛逼！连续<span id="hongsezi" class="shake shake-little shake-constant"><b>3</b></span>天没打理网站了</li>';}
elseif($today_num=='0'){echo '<li>今日站长很懒，<span id="hongsezi" class="shake shake-little shake-constant"><b>1</b></span>篇文章都没更新</li>';}
else{echo '<li>站长今日很勤快，更新了<span id="hongsezi" class="shake shake-little shake-constant"><b>'.$today_num.'</b></span>篇文章</li>';}
?>
<li>最后更新时间：<span id="gxsj"><?php echo last_post_log();?></span></li>
<li>本站已被地球人看过<span id="hongsezi"> 
<?php
/*使用文本文件记录数据的简单实现*/
$counter=1;
if(file_exists("mycounter.txt")){
$fp=fopen("mycounter.txt","r");
$counter=fgets($fp,9);
$counter++;
fclose($fp);
}
$fp=fopen("mycounter.txt","w");
fputs($fp,$counter);
fclose($fp);
echo "".$counter."";
?> </span>次</li>
</div></div></div>
<?php endif;?>
<?php if (_g('ad-kh') == "yes"): ?><div id="cb_gg"><div class="gg_nr">
<?php echo _g('cb-ad');?>
</div></div>
<?php endif; ?>
</div><!--end #siderbar-->