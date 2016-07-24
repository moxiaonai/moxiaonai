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
		<script type="text/javascript">
jQuery(function(){
$('.archives').find('ul').hide();
$('.archives').find('ul:first').show();
$('.archives h4').click(function(){
  $(this).next('ul').slideToggle("fast");
});
})
</script>
<?php
function displayRecord(){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	$output = '';
	foreach($record_cache as $value){
		$output .= '<h4>'.$value['record'].'('.$value['lognum'].')</h4>'.displayRecordItem($value['date']).'';
	}
	$output = '<div class="archives">'.$output.'</div>';
	return $output;
}
function displayRecordItem($record){
	if (preg_match("/^([\d]{4})([\d]{2})$/", $record, $match)) {
		$days = getMonthDayNum($match[2], $match[1]);
		$record_stime = emStrtotime($record . '01');
		$record_etime = $record_stime + 3600 * 24 * $days;
	} else {
		$record_stime = emStrtotime($record);
		$record_etime = $record_stime + 3600 * 24;
	}
	$sql = "and date>=$record_stime and date<$record_etime order by top desc ,date desc";
	$result = archiver_db($sql);
	return $result;
}
function archiver_db($condition = ''){
	$DB = MySql::getInstance();
	$sql = "SELECT gid, title, date, views FROM " . DB_PREFIX . "blog WHERE type='blog' and hide='n' $condition";
	$result = $DB->query($sql);
	$output = '';
	while ($row = $DB->fetch_array($result)) {
		$log_url = Url::log($row['gid']);
		$output .= '<li><a href="'.$log_url.'"><span>'.date('Y年m月d日',$row['date']).'</span><div class="atitle">'.$row['title'].'</div></a></li>';
	}
	$output = empty($output) ? '<li>暂无文章</li>' : $output;
	$output = '<ul>'.$output.'</ul>';
	return $output;
}
?>
<?php
if($res['hide'] == 'y' || !function_exists('displayRecord')) emMsg('不存在的页面！');
$show_type == 'sort' ? $log_content .= displaySort() : $log_content .= displayRecord();
?>
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