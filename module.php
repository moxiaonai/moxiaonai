<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
if (!function_exists('_g')) {emMsg('<div style="color: #BA3C2E; height:50px; line-height:40px; text-align: center; font-size:20px; font-family:\5FAE\8F6F\96C5\9ED1,\5b8b\4f53;"><strong>欢迎你使用莫小奈自适用版模板<span style="color: #EB4640;">【莫小奈1.0】</span></strong></div><div style="line-height: 2; font-size: 16px; color: #EB4640; font-family:\5FAE\8F6F\96C5\9ED1,\5b8b\4f53;"><strong>你现在无法正常使用本模板的原因：</strong><br><span style="color: #7F6856;">1、你还未安装【模板设置插件】，<a href="http://www.emlog.net/plugin/144" target="_blank">点击此处下载安装↓</a>，或登陆“后台”，進入“<strong>应用</strong>”，点“<strong>插件</strong>”找到“模板设置插件”并在线安装。</span><br><span style="color: #513529;">2、你还<strong>未启用</strong>模板设置插件，请在“<strong>后台</strong>”点“<strong>插件</strong>”，在<strong>“插件管理”</strong>中启用“<strong>模板设置插件</strong>”。</span><br><br><span style="font-size: 14px;color: #2F2114;">注：本主题由莫小奈负责维护，如有疑问请联系QQ：39784480</span></div>
', BLOG_URL . 'admin/plugin.php');}?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<div id="zhanzhang">
	<div id="zhanzhang_biaoti"><span class="icon"><i class="fa fa-user-md"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="zhanzhang_biankuang">
	<div id="zhanzhang_img">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<div id="zhanzhang_wenzi"><b>站长：</b><?php echo $name; ?><br>
    <b>签名：</b><?php echo $user_cache[1]['des']; ?></div>
	<div id="gaodu1"></div></div></div>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ 
    if (!blog_tool_ishome()) return;
    ?>
    <div id="rili">
	<div id="rili_biaoti"><span class="icon"><i class="fa fa-calendar"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="rili_biankuang">
	<div id="calendar">
	</div></div></div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<div id="fenlei">
	<div id="fenlei_biaoti"><span class="icon"><i class="fa fa-comments"></i></span><h3><?php echo $title; ?></h3></div>
	<ul id="blogsort">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?> (<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<ul>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li>
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?> (<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ul>
    </li>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul></div>
<?php }?>
<?php
//widget：最新微语
function t_twitter(){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>

	<ul>
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	
	  <li><a title="查看更多微言碎语" href="<?php echo BLOG_URL . 't/'; ?>"><?php echo $value['t']; ?> - <?php echo smartDate($value['date']); ?></a></li>
	
	<?php endforeach; ?>
  
	</ul>

<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div id="weiyu">
	<div id="weiyu_biaoti"><span class="icon"><i class="fa fa-comments"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="weiyu_biankuang">
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?><p><?php echo smartDate($value['date']); ?></p></li>
	<?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
	<?php endif;?>
	</ul></div></div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];$com_cache = $CACHE->readCache('comment');
$patterns = array ("/\[url\](.*?)\[\/url\]/","/\[qq\]([0-9]+)\[\/qq\]/","/\[img=?\]*(.*?)(\[\/img)?\]/e","/\[strong\](.*?)\[\/strong\]/","/\[em\](.*?)\[\/em\]/","/\[del\](.*?)\[\/del\]/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[u\](.*?)\[\/u\]/","/\[code\](.*?)\[\/code\]/","/\[F(([1-4]?[0-9])|50)\]/"); 
$replace = array ('$1 ','<img src="http://wpa.qq.com/pa?p=1:$1:52" alt="点击这里给我发消息" />','"<img class=\"comment-img\" src=\"$1\" alt=\"" . basename("$1") . "\" />"','<b>$1</b>','$1','<del>$1</del>','$1','<u>$1</u>','<code>$1</code>','<img alt="face" class="face1" src="'.TEMPLATE_URL.'images/face/$1.gif"  />'); 
?>
<div id="pinglun">
<div id="pinglun_biaoti"><span class="icon"><i class="fa fa-comments"></i></span><h3><?php echo $title; ?></h3></div>
<div id="pinglun_wenzi">
<ul id="newcomment">
  <?php foreach($com_cache as $value):$url = Url::comment($value['gid'], $value['page'], $value['cid']);?>
  <li id="comment"> <img alt="avatar" class="main_img" id="comment-img" src="<?php echo BYSB_getGravatar($value['mail'],40)?>"/>
    <p class="name" id="mzi"><?php echo $value['name']; ?></p>
    <p class="time" id="comment-time"><i class="fa fa-clock-o"></i> <?php echo date('Y年m月d日',$value['date']); ?></p>
    <div id="new_comment"><a id="new_comment_wenzi" title="查看被 <?php echo $value['name']; ?> 吐槽过的页面" pjax="<?php echo $value['name']; ?> 的吐槽"  href="<?php echo $url; ?>"><?php echo preg_replace($patterns, $replace,$value['content']); ?></a><trg></trg>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
</div></div>
<?php }?>

<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$i=1;
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div id="zuixinwenzhang">
	<div id="biaoti"><span class="icon"><i class="fa fa-music"></i></span><h3>最新文章</h3></div>
	<div id="biankuang"><ul>
	<?php foreach($newLogs_cache as $value): ?>
		<?php
		if ($i<=1) {
			$class='hotone' ;
		} else if ($i<=2) {
			$class='hottwo' ;
		} else if($i<=3){
			$class='hotthree' ;
		}else{
			$class='hotsoso' ;
		}
		 ?> <li><em class="<?php echo $class?>" ><?php echo($i++); ?></em>
	<a href="<?php echo Url::log($value['gid']); ?>"><?php echo subString(strip_tags($value['title']),0,20); ?></a></li>
	<?php endforeach; ?>
	</ul></div></div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$i=1;
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<div id="remenwenzhang">
	<div id="biaoti"><span class="icon"><i class="fa fa-music"></i></span><h3>热门文章</h3></div>
	<div id="biankuang">
	<ul>
	<?php foreach($randLogs as $value): ?>
	<?php
		if ($i<=1) {
			$class='hotone' ;
		} else if ($i<=2) {
			$class='hottwo' ;
		} else if($i<=3){
			$class='hotthree' ;
		}else{
			$class='hotsoso' ;
		}
		 ?> <li><em class="<?php echo $class?>" ><?php echo($i++); ?></em>
	<a href="<?php echo Url::log($value['gid']); ?>"><?php echo subString(strip_tags($value['title']),0,20); ?></a></li>
	<?php endforeach; ?>
	</ul></div></div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$i=1;
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div id="suijiwenzhang">
	<div id="biaoti"><span class="icon"><i class="fa fa-music"></i></span><h3>随机文章</h3></div>
	<div id="biankuang">
	<ul>
	<?php foreach($randLogs as $value): ?>
	<?php
		if ($i<=1) {
			$class='hotone' ;
		} else if ($i<=2) {
			$class='hottwo' ;
		} else if($i<=3){
			$class='hotthree' ;
		}else{
			$class='hotsoso' ;
		}
		 ?> <li><em class="<?php echo $class?>" ><?php echo($i++); ?></em>
	<a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['log_title']; ?>"><?php echo subString(strip_tags($value['title']),0,20); ?></a></li>
	<?php endforeach; ?>
	</ul></div></div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<div id="sousuo">
	<ul id="logsearch">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="keyword" class="search" type="text" onblur="if(this.value==''){this.value='请输入搜索关键字';}" onfocus="this.value='';" value="请输入搜索关键字" title="丘比龙小提示：如果你要搜索内容，请在搜索框中输入关键词，然后按“回车”即可查询到结果。">
    <input type="submit" name="submit" value="搜索" class="submit button" title="猛击我搜索">
	</form>
	</ul>
	</div>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div id="cundang">
	<div id="cundang_biaoti"><span class="icon"><i class="fa fa-book"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="cundang_biankuang">
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul><div id="gaodu1"></div></div></div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<div id="zidingyi">
    <div id="zidingyi_biaoti"><span class="icon"><i class="fa fa-book"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="zidingyi_content">
		<?php echo $content; ?>
	</div>
	</div>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    if (!blog_tool_ishome()) return;
	?>
	<div id="yqlj">
	<div id="yqlj_biaoti"><span class="icon"><i class="fa fa-link"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="yqlj_link">
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<?php 
	$urlinfo = parse_url($value['url']); 
	$urlHost = explode(".",$urlinfo['host']);
	$urlHost = array_reverse($urlHost);
    ?>
    <li>
    <img class="linkimg" src="<?=$urlinfo['scheme']?>://www.<?=$urlHost[1]?>.<?=$urlHost[0]?>/favicon.ico" onerror="javascript:this.src='<?php echo TEMPLATE_URL; ?>images/favicon.ico';"><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a> </li>&nbsp;&nbsp;&nbsp; 
	<?php endforeach; ?>
	</ul>
	<div id="gaodu1"></div></div>
	</div>
<?php }?> 
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul class="bar">
	<?php
	foreach($navi_cache as $value):
        if ($value['pid'] != 0) {
            continue;
        }
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>	
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li class="item <?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?> class="chaffle" data-lang="zh"><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-nav animated flipInY">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'" class="chaffle" data-lang="zh">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>
            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-nav animated flipInY">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a class="chaffle" data-lang="zh" href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
			
            <?php endif;?>
		</li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：导航
function blog_navi2(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<div class="menu">
	<ul>
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<li class="nvabar-item-index"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="nvabar-item-index"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'item-index' : 'category';
		?>
		<li class="navbar-<?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>>
<?php if($value['naviname'] == "首页"):?><i class="icon-home"></i>
<?php elseif($value['naviname'] =="微语"):?><i class="icon-coffee"></i>
<?php elseif($value['naviname'] =="相册"):?><i class="icon-camera"></i>
<?php elseif($value['naviname'] =="归档"):?><i class="icon-th-list"></i>
<?php elseif($value['naviname'] =="留言" || $value['naviname'] =="留言板"):?><i class="icon-comments"></i>
<?php elseif($value['naviname'] =="音乐" || $value['naviname'] =="聆听音乐"):?><i class="icon-music"></i>
<?php elseif($value['naviname'] =="友情链接"):?><i class="fa fa-link"></i>
<?php elseif($value['naviname'] =="读者排行" || $value['naviname'] =="读者墙"):?><i class="icon-windows"></i>
<?php elseif($value['naviname'] =="登录"):?><i class="icon-key"></i>
<?php elseif($value['naviname'] =="投稿"):?><i class="icon-share-alt"></i>
<?php elseif($value['naviname'] =="手机版"):?><i class="icon-mobile"></i>
<?php elseif($value['naviname'] =="Emlog主题" || $value['naviname'] =="主题"):?><i class="icon-desktop"></i>
<?php else:?><i class="icon-book"></i>
<?php endif;?><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-nav animated zoomInRight">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-nav animated zoomInRight">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

		</li>
	<?php endforeach; ?>
	</ul></div>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" title=\"首页置顶文章\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.gif\" title=\"分类置顶文章\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：日志页标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "<a rel=\"tag\" pjax=\"".$value['tagname']."\" href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag; }
	else {$tag = '这篇文章木有标签';
		echo $tag;}
}
?>
<?php
//widget：侧边栏标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<div id="biaoqian">
	<div id="biaoqian_biaoti"><span class="icon"><i class="fa fa-tags"></i></span><h3><?php echo $title; ?></h3></div>
	<div id="biaoqian_biankuang">
	<ul id="blogtags">
	  <li>
	    <?php shuffle ($tag_cache);
			$tag_cache = array_slice($tag_cache,0,28);foreach($tag_cache as $value):?>
	    <a href="<?php echo Url::tag($value['tagurl']); ?>" pjax="<?php echo $value['tagname']; ?>" title="<?php echo $value['usenum']; ?>篇文章">
	    <?php if(empty($value['tagname'])){ echo "无标签";}else{echo $value['tagname'];}?>
	    </a>
	    <?php endforeach; ?>
	  </li>
	</ul></div></div>
<?php }?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div id="sxpbk1">
<div id="wzlj1"><a href="<?php echo Url::log($prevLog['gid']) ?>">上一篇：<?php echo $prevLog['title'];?></a></div></div>
    <?php else:?>
    <div id="sxpbk1">
<div id="wzlj1"><a rel="prev">没有上一篇咯，看看别的吧！？</a></div></div>
    <?php endif;?>
	<?php if($nextLog):?>
	<div id="sxpbk2"><div id="wzlj2"><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?>：下一篇</a></div>
		</div>
	<?php else:?>
    <div id="sxpbk2"><div id="wzlj2"><a rel="next">没有下一篇咯，看看别的吧！？</a></div>
</div>
	<?php endif;?>
<?php }?>
<?php
//blog：相邻文章2 手机低分辨率下才显示
function neighbor_log2($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div id="shangxiapian3">
	<a href="<?php echo Url::log($prevLog['gid']) ?>">
</a></div>
	<?php else:?>
    <div id="shangxiapian3"><a rel="prev" class="shake shake-opacity">上一篇没咯！</a></div>
    <?php endif;?>
	<?php if($nextLog):?>
	<div id="shangxiapian4"><a href="<?php echo Url::log($nextLog['gid']) ?>"><img src="<?php echo TEMPLATE_URL; ?>images/xia2.png" onmouseover="this.src='<?php echo TEMPLATE_URL; ?>images/xia1.png'" onmouseout="this.src='<?php echo TEMPLATE_URL; ?>images/xia2.png'"></a></div>
	<?php else:?>
    <div id="shangxiapian4"><a rel="next" class="shake shake-opacity">下一篇没咯！</a></div>
	<?php endif;?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>
<?php
//试试手气代码
function rand_log() {
    $db = MySql::getInstance();
    $sql =         "SELECT gid,title,content FROM ".DB_PREFIX."blog WHERE type='blog' ORDER BY rand() LIMIT 0,1";
    $list = $db->query($sql);
    while($row = $db->fetch_array($list)){
        echo Url::log($row['gid']);
    }
}
?>
<?php
//格式化内容工具
function blog_tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读', '', strip_tags($content));
        if ($strlen) {
            $content = subString($content, 0, $strlen);
        }
        return $content;
}
?>
<?php
//友情链接
function index_link(){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    if (!blog_tool_ishome()) return;
	?>
	友情链接：<?php foreach($link_cache as $value): ?>
	<a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a>&nbsp;&nbsp;&nbsp;
	<?php endforeach; ?>
<?php }?>
<?php
//首页微语调用
function index_t($num){
	$t = MySql::getInstance();
	?>
	<?php
	$sql = "SELECT id,content,img,author,date,replynum FROM ".DB_PREFIX."twitter ORDER BY `date` DESC LIMIT $num";
	$list = $t->query($sql);
	while($row = $t->fetch_array($list)){
	?>
	<li>
	<a title="点击查看更多微语" href="<?php echo BLOG_URL; ?>t/"><?php echo date("Y年m月d日",$row['date']); ?> - <?php echo $row['content'];?></a</li>
	<?php }?>
<?php } ?>
<?php
//侧边栏统计
function ja_sta(){
  global $CACHE;
  $JA_STA = $CACHE->readCache('sta');
  $JA_STA['linknum'] = count($CACHE->readCache('link'));
  $JA_STA['sortnum'] = count($CACHE->readCache('sort'));
  $JA_STA['tagsnum'] = count($CACHE->readCache('tags'));
  $JA_STA['usernum'] = count($CACHE->readCache('user'));
  $JA_STA['days']    = round((time() - strtotime(_g('tjrq'))) / 3600 / 24);
  extract($JA_STA);
  echo "
  <li>立足江湖: $days 天</li>
  <li>鸿篇巨著: $lognum 篇</li>
  <li>草稿文章: $draftnum 篇</li>
  <li>江湖美誉: $comnum 条</li>
  <li>待审评论: $hidecomnum 条</li>
  <li>微语数量: $twnum 条</li>
  <li>友情链接: $linknum 个</li>
  <li>分类总数: $sortnum 个</li>
  <li>标签数量: $tagsnum 个</li>
  <li>管理掌教: $usernum 人</li>
  ";
}
//最后发表文章时间
function last_post_log(){
$db = MySql::getInstance();
$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='blog' ORDER BY date DESC LIMIT 0,1";
                $res = $db->query($sql);
                $row = $db->fetch_array($res);
                $date = date('Y-n-j H:i',$row['date']);
        return $date;        
}
?>
<?php
//首页文章缩略图
function mrxn_zwimg($str){
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $str, $match);
if(!empty($match[1])){echo $match[1][0];}else{
echo TEMPLATE_URL . 'images/rand/'.rand(1,11).'.jpg'; 
}}
?>
<?php
//最新文章
function new_log(){
$db = MySql::getInstance();
$sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE type='blog' ORDER BY date DESC LIMIT 0,8";
$list = $db->query($sql);
$i = 0;
?>
<ul>
<?php while($row = $db->fetch_array($list)){ 
$i++;
?>
<li><a href="<?php echo BLOG_URL; ?>?post=<?php echo $row['gid']; ?>" title="<?php echo $row['title']; ?>">
<?php if($i==1){?><em class="hotone"><?php echo $i;?></em>
<?php }else if($i==2){ ?><em class="hottwo"><?php echo $i;?></em>
<?php }else if($i==3){ ?><em class="hotthree"><?php echo $i;?></em>
<?php }else{ ?><em class="hotsoso"><?php echo $i;?></em>
<?php }?>
<?php echo $row['title']; ?></a></li>
<?php } ?>
</ul>
<?php } ?>
<?php
//30天按点击率排行文章
function hot_log(){
$db = MySql::getInstance();
$time = time();
$sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE type='blog' AND date > $time - 30*24*60*60 ORDER BY `views` DESC LIMIT 0,8";
$list = $db->query($sql);
$i = 0;
?>
<ul>
<?php while($row = $db->fetch_array($list)){ 
$i++;
?>
<li><a href="<?php echo BLOG_URL; ?>?post=<?php echo $row['gid']; ?>" title="<?php echo $row['title']; ?>">
<?php if($i==1){?><em class="hotone"><?php echo $i;?></em>
<?php }else if($i==2){ ?><em class="hottwo"><?php echo $i;?></em>
<?php }else if($i==3){ ?><em class="hotthree"><?php echo $i;?></em>
<?php }else{ ?><em class="hotsoso"><?php echo $i;?></em>
<?php }?>
<?php echo $row['title']; ?></a></li>
<?php } ?>
</ul>
<?php } ?>
<?php
//widget：随机文章
function random_log(){
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog(8);$i=1;
?><ul>
<?php foreach($randLogs as $value): ?>
<li><a href="<?php echo Url::log($value['gid']); ?>">
<?php if($i==1){?><em class="hotone"><?php echo $i;?></em>
<?php }else if($i==2){ ?><em class="hottwo"><?php echo $i;?></em>
<?php }else if($i==3){ ?><em class="hotthree"><?php echo $i;?></em>
<?php }else{ ?><em class="hotsoso"><?php echo $i;?></em>
<?php }?>
<?php echo $value['title']; ?></a></li>
<?php $i++; endforeach; ?>
</ul>
<?php }?>
<?php
//侧边栏评论时间获取
function cutome_call($gid,$type){
	$db = MySql::getInstance();
	$sql = "SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' and gid in ($gid) ORDER BY `date` DESC LIMIT 0,1";
	$list = $db->query($sql);
	while($row = $db->fetch_array($list)){
		if($type=='title'){
			return $row['title'];
		}elseif($type == 'time'){
			return $row['date'];
		}
	}
}
?>
<?php
//avatar缓存
function BYSB_getGravatar($email, $s = 44, $d = 'wavatar', $r = 'g') {
	$f = md5($email);
	$a = TEMPLATE_URL.'gravatar/'.$f.'.jpg';
	$e = EMLOG_ROOT.'/content/templates/moxiaonai/gravatar/'.$f.'.jpg';
	$t = 1296000;
	if (empty($email)) $a = TEMPLATE_URL.'gravatar/default.jpg';
	if (!is_file($e) || (time() - filemtime($e)) > $t ) {
	$g = sprintf("http://secure.gravatar.com",
	(hexdec($f{0})%2)).'/avatar/'.$f.'?s='.$s.'&d='.$d.'&r='.$r;
	copy($g,$e); $a=$g;
    }
	if (filesize($e) < 500) copy($d,$e);
	return $a;
}?>
<?php
//获取评论用户操作系统、浏览器等信息
function useragent($info){
	require_once 'useragent.class.php';
	$useragent = UserAgentFactory::analyze($info);
?>

<img src='<?php echo TEMPLATE_URL.$useragent->platform['image']?>'>&nbsp;<?php echo $useragent->platform['title']; ?>&nbsp; <img src='<?php echo TEMPLATE_URL.$useragent->browser['image']?>'>&nbsp;<?php echo $useragent->browser['title']; ?>
<?php
}
?>
<?php 
if (!isset($_SERVER['REQUEST_TIME_FLOAT'])) {
	$_SERVER['REQUEST_TIME_FLOAT'] = microtime(TRUE);
}
function runtime_display() {
	echo sprintf('%.2fms', (microtime(TRUE) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000);
}
?>

<?php
//blog：评论列表
function blog_comments($comments,$params){
    extract($comments);$comnum = count($comments);
    if($commentStacks): ?>
<a id="comments"></a>
<?php endif; ?>
<div class="commentlist">
  <?php if(empty($comments)){;}else{echo '
	<div class="timeline_container">
    <div class="timeline">
    <div class="plus"></div>
    <div class="plus2"></div>
    </div>
	</div>';} ?>
  <?php
    $count_comments = count($comments);
    $count_floors = $count_comments;
    foreach($comments as $value){
        if($value['pid'] != 0){ $count_floors--; }
    }
    $page = isset($params[5])?intval($params[5]):1;
    $i= $count_floors - ($page - 1)*Option::get('comment_pnum');
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];
    $comment['poster'] = $comment['url'] ? '<a title="点击访问：'.$comment['url'].'" href="'.$comment['url'].'" target="_blank" rel="nofollow">'.$comment['poster'].'</a>' : $comment['poster'];
	$patterns = array ("/\[url\](.*?)\[\/url\]/","/\[qq\]([0-9]+)\[\/qq\]/","/\[img=?\]*(.*?)(\[\/img)?\]/e","/\[strong\](.*?)\[\/strong\]/","/\[em\](.*?)\[\/em\]/","/\[del\](.*?)\[\/del\]/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[u\](.*?)\[\/u\]/","/\[code\](.*?)\[\/code\]/"); 
	$replace = array ('<a rel="external nofollow" target="_blank" href="$1">$1 </a>','<a title="点击这里给我发消息" rel="external nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=$1&site=qq&menu=yes"><img src="http://wpa.qq.com/pa?p=1:$1:52" alt="点击这里给我发消息" /></a>','"<a target=\"_blank\" href=\"$1\"><img class=\"comment-img\" src=\"$1\" alt=\"" . basename("$1") . "\" /></a>"','<b>$1</b>','<em>$1</em>','<del>$1</del>','<blockquote>$1</blockquote>','<u>$1</u>','<code>$1</code>'); 
	$comment['content']=preg_replace($patterns, $replace, $comment['content']);
	?>
  <p id="<?php echo $comment['cid']; ?>">
  <div class="comment" id="comment-<?php echo $comment['cid']; ?>">
    <div class="comment-body">
      <h4><?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?>
        <?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "<span class='myhkname'>".$comment['poster']."</span>";}else{echo "<span class='name'>".$comment['poster']."</span>";} ?> <span class="floor"><?php if($i>3) echo ''.$i.'楼';elseif($i==3) echo '地板';elseif($i==2) echo '板凳';elseif($i==1)echo '沙发'; ?></span></h4>
      <div class="timer"><i class="fa fa-clock-o"></i> <?php echo $comment['date']; ?> <span class="sign1"><i class='fa fa-map-marker'></i> <?php echo getaddress($comment['ip']);?></span></div>
      <div class="reply"> <a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-reply"></i>回复</a> </div>
      <div class="content"><?php echo preg_replace("/\[F(([1-4]?[0-9])|50)\]/",'<img class="face1" alt="face" src="'.TEMPLATE_URL.'images/face/$1.gif"  />',$comment['content']); ?><div class="sign2"><?php echo useragent($comment['useragent']); ?></div></div>
      <?php if($isGravatar == 'y'): ?>
      <img src="<?php echo BYSB_getGravatar($comment['mail'],35);?>" class="avatar1 xwcms" />
      <?php endif; ?>
      <myhk></myhk>
      <em1></em1>
    </div>
    <?php blog_comments_children($comments, $comment['children']); $ii=0;?>
  </div>
  </p>
  <?php $i--;endforeach; ?>
</div>
<div class="pagenavi"> <?php echo $commentPageUrl;?>
  <?php if($commentPageUrl): ?>
  <?php endif; ?>
</div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[1]['name'];
    $comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank" title="点击访问：'.$comment['url'].'" rel="nofollow">'.$comment['poster'].'</a>' : $comment['poster'];
	$patterns = array ("/\[url\](.*?)\[\/url\]/","/\[qq\]([0-9]+)\[\/qq\]/","/\[img=?\]*(.*?)(\[\/img)?\]/e","/\[strong\](.*?)\[\/strong\]/","/\[em\](.*?)\[\/em\]/","/\[del\](.*?)\[\/del\]/","/\[blockquote\](.*?)\[\/blockquote\]/","/\[u\](.*?)\[\/u\]/","/\[code\](.*?)\[\/code\]/"); 
	$replace = array ('<a rel="external nofollow" target="_blank" href="$1">$1 </a>','<a title="点击这里给我发消息" rel="external nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=$1&site=qq&menu=yes"><img src="http://wpa.qq.com/pa?p=1:$1:52" alt="点击这里给我发消息" /></a>','"<a target=\"_blank\" href=\"$1\"><img class=\"comment-img\" src=\"$1\" alt=\"" . basename("$1") . "\" /></a>"','<b>$1</b>','<em>$1</em>','<del>$1</del>','<blockquote>$1</blockquote>','<u>$1</u>','<code>$1</code>'); 
	$comment['content']=preg_replace($patterns, $replace, $comment['content']);
	?>
<p id="<?php echo $comment['cid']; ?>">
<div class="comment comment-children<?php if($ii==0):?> first<?php $ii++; endif; ?>" id="comment-<?php echo $comment['cid']; ?>">
  <?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "<div class='comment-body1'>";}else{echo "<div class='comment-body'>";} ?>
  <?php if($isGravatar == 'y'): ?>
  <img src="<?php echo BYSB_getGravatar($comment['mail'],35);?>" class="<?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "avatar";}else{echo "avatar1";} ?>" />
  <?php endif; ?>
  <h4>
    <?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?>
    <?php if(subString(strip_tags($comment['poster']),0,30)==$name){echo "<span class='myhkname'>".$comment['poster']."</span>";}else{echo "<span class='name'>".$comment['poster']."</span>";} ?>
  </h4>
  <div class="timer"><i class="fa fa-clock-o"></i> <?php echo $comment['date']; ?> <span class="sign1"><i class='fa fa-map-marker'></i> <?php echo getaddress($comment['ip']);?></span></div>
  <div class="reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-reply"></i>回复</a> </div>
  <div class="content"><?php echo preg_replace("/\[F(([1-4]?[0-9])|50)\]/",'<img class="face1" alt="face" src="'.TEMPLATE_URL.'images/face/$1.gif"  />',$comment['content']); ?><div class="sign2"><?php echo useragent($comment['useragent']); ?></div></div>
  <myhk></myhk>
  <em1></em1>
</div>
<?php blog_comments_children($comments, $comment['children']); $ii++;?>
</div>
</p>
<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-place">
  <div class="comment-post" id="comment-post">
    <h3><i class="fa fa-pencil"></i> 发表吐槽</h3>
    <div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()"><i class="fa fa-share"></i>取消回复</a></div>
    <h1>
      <?php if(empty($ckname)){ echo "你肿么看？";}else if($ckname=='匿名'){ echo "匿名评论&nbsp;请叫我雷锋~";}else{echo $ckname;echo "欢迎回来...";} ?>
      <a name="respond"></a></h1>

    <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
      <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
      <?php if(ROLE == 'visitor'): ?>
		
      <?php endif; ?>
      <p class="num1">你还可以输入 <i id="num" class="num">250 </i> / 250 个字</p>
      <p>
        <textarea onkeyup="checkLength(this);" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"name="comment" id="comment" class="post-area" rows="10" tabindex="99" placeholder="让评论变得如此简单。"></textarea>
      <div class="smilebg">
        <div class="smile">
          <div class="arrow"></div>
          <?php include View::getView('smiley');?>
        </div>
      </div>
      <div class="sbsb">
        <div title="插入表情" onclick="embedSmiley()" class="face"><i class="fa fa-smile-o"></i></div>
		<div title="插入粗体文字" onclick="strong()" class="zujian"><i class="fa fa-bold"></i></div>
		<div title="插入斜体文字" onclick="em()" class="zujian"><i class="fa fa-italic"></i></div>
		<div title="插入删除线文字" onclick="del()" class="zujian"><i class="fa fa-strikethrough"></i></div>
		<div title="插入下划线文字" onclick="underline()" class="zujian"><i class="fa fa-text-width"></i></div>
        <div title="插入图片" onclick="embedImage()" class="zujian"><i class="fa fa-image"></i></div>
        <div title="插入链接" onclick="url1()" class="zujian"><i class="fa fa-link"></i></div>
        <div title="签到" onclick="javascript:SIMPALED.Editor.qiandao();this.style.display='none'" class="zujian"><i class="fa fa-pencil"></i></div>
        <div title="赞一个" onclick="javascript:SIMPALED.Editor.good();this.style.display='none'" class="zujian"><i class="fa fa-thumbs-o-up"></i></div>
        <div title="踩一个" onclick="javascript:SIMPALED.Editor.bad();this.style.display='none'" class="zujian"><i class="fa fa-thumbs-o-down"></i></div>
        <?php echo $verifyCode; ?>
        <button class="open2" type="button" id="submit" tabindex="6"><i class="fa fa-check"></i> 提交评论</button>
        <button type="reset"  id="reset" name="reset" tabindex="7"><i class="fa fa-trash-o"></i> 清除</button>
      </div>
      </p>
      <div class="tijiao">

        <p class="close2">评论信息框<a href="javascript:;" title="关闭"></a></p>
		<?php if(ROLE == 'admin' || ROLE == 'writer'):?>
		账户已登录，可直接发表评论！
		<?php else:?>

        <div id="guest_avatar"> <img src="<?php echo BYSB_getGravatar($ckmail, 80); ?>" id="realtime_avatar" class="avatar" /> </div>
        <p>

          <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="text" name="comname" maxlength="49" value="<?php if(empty($ckname)){ echo "匿名";}else{echo $ckname;} ?>" size="22" tabindex="1" placeholder="必填">
          <label for="author"><i class="fa fa-user"></i> 昵称:</label>
        </p>
        <p>
          <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="email" name="commail" id="email" maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="3" placeholder="选填">
          <label for="email"><i class="fa fa-envelope"></i> 邮箱:</label>
        </p>
        <p>
          <input onkeydown="if(event.keyCode==13){event.returnValue=false;}" class="tex" type="text" id="comurl" name="comurl" maxlength="128" class="respondtext" value="<?php echo $ckurl; ?>" size="22" tabindex="4" placeholder="选填" pattern="((http|https)://|)+([\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?"/>
          <label for="url"><i class="fa fa-globe"></i> 网址:</label>
        </p>
		<?php endif;?>
        <p>
        <div class="error"></div>
        </p>

        <p>
          <button type="submit" id="usb" tabindex="5">发表评论</button>
        </p>
        <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
      </div>
    </form>
  </div>
</div>
<?php endif; ?>
<?php }?>
<?php
//comment：输出等级
function echo_levels($comment_author_email){
global $CACHE;$user_cache = $CACHE->readCache('user');$mail = $user_cache[1]['mail'];
  $DB = MySql::getInstance();
  $adminEmail = '"'._g('admine').'"';
  $adminEmail1 = '" "';
  if($comment_author_email==$adminEmail)
  { echo '<a class="admin" title="博客管理员"><img src="./content/templates/moxiaonai/images/admin.png"></a>';}
  $sql = "SELECT cid as author_count FROM emlog_comment WHERE mail = ".$comment_author_email;
  $res = $DB->query($sql);
  $author_count = mysql_num_rows($res);
  if($author_count>=1 && $author_count<10 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv1" title="访客等级 LV.1"></a>';
  else if($author_count>=10 && $author_count<20 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv2" title="访客等级 LV.2"></a>';
  else if($author_count>=20 && $author_count<30 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv3" title="访客等级 LV.3"></a>';
  else if($author_count>=30 && $author_count<40 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv4" title="访客等级 LV.4"></a>';
  else if($author_count>=40 && $author_count<50 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv5" title="访客等级 LV.5"></a>';
  else if($author_count>=50 && $author_count<60 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv6" title="访客等级 LV.6"></a>';
  else if($author_count>=60 && $author_count<70 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv7" title="访客等级 LV.7"></a>';
  else if($author_count>=70 && $author_count<80 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv8" title="访客等级 LV.8"></a>';
  else if($author_count>=80 && $author_count<90 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv9" title="访客等级 LV.9"></a>';
  else if($author_count>=90 && $author_count<100 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv10" title="访客等级 LV.10"></a>';
  else if($author_count>=100 && $author_count<125 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv11" title="访客等级 LV.11"></a>';
  else if($author_count>=125 && $author_count<150 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv12" title="访客等级 LV.12"></a>';
  else if($author_count>=150 && $author_count<175 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv13" title="访客等级 LV.13"></a>';
  else if($author_count>=175 && $author_count<200 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv14" title="访客等级 LV.14"></a>';
  else if($author_count>=200 && $author_count<225 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv15" title="访客等级 LV.15"></a>';
  else if($author_count>=225 && $author_count<250 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv16" title="访客等级 LV.16"></a>';
  else if($author_count>=250 && $author_count<275 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv17" title="访客等级 LV.17"></a>';
  else if($author_count>=275 && $author_count<300 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv18" title="访客等级 LV.18"></a>';
  else if($author_count>=200 && $author_count<250 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv19" title="访客等级 LV.19"></a>';
  else if($author_count>=250 && $author_count<88888 && $comment_author_email!=$adminEmail&& $comment_author_email!=$adminEmail1)
    echo '<a class="forum_level lv20" title="访客等级 LV.20"></a>';
  else if($comment_author_email==$adminEmail1)
    echo '<div class="lvnull" title="访客等级 LV.0"><i class="fa fa-user"></i></div>';
}
?>
<?php
//获取IP地理地址
$data = '254.254.254.254';
class IpLocation {
     var $fp;
     var $firstip;
     var $lastip;
     var $totalip;
         
     function getlong() {
        $result = unpack('Vlong', fread($this->fp, 4));
        return $result['long'];
     }

    function getlong3() {
        $result = unpack('Vlong', fread($this->fp, 3).chr(0));
        return $result['long'];
     }

     function packip($ip) {
        return pack('N', intval(ip2long($ip)));
     }
         
     function getstring($data = "") {
        $char = fread($this->fp, 1);
        while (ord($char) > 0) {
            $data .= $char;
            $char = fread($this->fp, 1);
        }
        return $data;
     }
         
     function getarea() {
        $byte = fread($this->fp, 1);
        switch (ord($byte)) {
            case 0:
               $area = "";
               break;
            case 1:
            case 2:
               fseek($this->fp, $this->getlong3());
               $area = $this->getstring();
               break;
            default: 
               $area = $this->getstring($byte);
               break;
        }
        return $area;
        }
         
     function getlocation($ip) {
        
        if (!$this->fp) return null;
        $location['ip'] = gethostbyname($ip); 
        $ip = $this->packip($location['ip']);
        $l = 0; 
        $u = $this->totalip;
        $findip = $this->lastip;
        while ($l <= $u) { 
            $i = floor(($l + $u) / 2); 
            fseek($this->fp, $this->firstip + $i * 7);
            $beginip = strrev(fread($this->fp, 4));
            if ($ip < $beginip) {
               $u = $i - 1;
            }
            else {
               fseek($this->fp, $this->getlong3());
               $endip = strrev(fread($this->fp, 4));
               if ($ip > $endip) {
                   $l = $i + 1; 
               }
               else {
                   $findip = $this->firstip + $i * 7;
                   break;
               }
            }
        }
        fseek($this->fp, $findip);
        $location['beginip'] = long2ip($this->getlong()); 
        $offset = $this->getlong3();
        fseek($this->fp, $offset);
        $location['endip'] = long2ip($this->getlong());
        $byte = fread($this->fp, 1); 
        switch (ord($byte)) {
            case 1: 
               $countryOffset = $this->getlong3();
               fseek($this->fp, $countryOffset);
               $byte = fread($this->fp, 1);
               switch (ord($byte)) {
                   case 2: 
                      fseek($this->fp, $this->getlong3());
                      $location['country'] = $this->getstring();
                      fseek($this->fp, $countryOffset + 4);
                      $location['area'] = $this->getarea();
                      break;
                   default: 
                      $location['country'] = $this->getstring($byte);
                      $location['area'] = $this->getarea();
                      break;
               }
               break;
            case 2:
               fseek($this->fp, $this->getlong3());
               $location['country'] = $this->getstring();
               fseek($this->fp, $offset + 8);
               $location['area'] = $this->getarea();
               break;
            default: 
               $location['country'] = $this->getstring($byte);
               $location['area'] = $this->getarea();
               break;
        }
        if ($location['country'] == " CZNET") { 
            $location['country'] = "未知";
        }
        if ($location['area'] == " CZNET") {
            $location['area'] = "";
        }
        return $location;
     }
         
     function IpLocation($filename = "./content/templates/moxiaonai/ip/qqwry.dat") {
        $this->fp = 0;
        if (($this->fp = @fopen($filename, 'rb')) !== false) {
            $this->firstip = $this->getlong();
            $this->lastip = $this->getlong();
            $this->totalip = ($this->lastip - $this->firstip) / 7;
            register_shutdown_function(array(&$this, '_IpLocation'));
        }
     }
         
     function _IpLocation() {
        if ($this->fp) {
            fclose($this->fp);
        }
        $this->fp = 0;
     }
}

function getaddress($myip){
$ipOrDomain=$myip;
$iplocation = new IpLocation();
$location = $iplocation->getlocation($ipOrDomain);
$address=mb_convert_encoding($location['country'].$location['area'], "utf-8", "gbk");
return $address;
}
?>
<?php
//友情链接
function ny_link(){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
	<ul class="link-content">
	<?php foreach($link_cache as $value): ?>
	<?php 
	$urlinfo = parse_url($value['url']); 
	$urlHost = explode(".",$urlinfo['host']);
	$urlHost = array_reverse($urlHost);
    ?>
    <li>
    <img class="linkimg" src="<?=$urlinfo['scheme']?>://www.<?=$urlHost[1]?>.<?=$urlHost[0]?>/favicon.ico" onerror="javascript:this.src='<?php echo TEMPLATE_URL; ?>images/favicon.ico';"><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a> <p><?php echo $value['url']; ?></p></li>&nbsp;&nbsp;&nbsp; 
	<?php endforeach; ?></ul>
<?php }?>
<?php
//判断内容页是否百度收录,并且以博主和或者理员身份访问博客文章时自动向百度提交未收录的文章
function baidu($url){
 $url='http://www.baidu.com/s?wd='.$url;
 $curl=curl_init();
 curl_setopt($curl,CURLOPT_URL,$url);
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
 $rs=curl_exec($curl);
 curl_close($curl);
 if(!strpos($rs,'没有找到')){
     return 1;
   }
 else{
     return 0;
  }   
     }
  function checkbaidu($id){
  $url=Url::log($id);
  if(baidu($url)==1){
   echo "百度已收录";
  } else {
   if (ROLE == 'admin' || ROLE == 'writer') {
    $urls = array(
      $url,
  );
 // $api = 'http://data.zz.baidu.com/urls?site=blog.moxiaonai.cn&token=11111111111111111111';
   $api = '这里替换为你自己的APi连接';
  $ch = curl_init();
  $options =  array(
     CURLOPT_URL => $api,
     CURLOPT_POST => true,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_POSTFIELDS => implode("\n", $urls),
     CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),);
  curl_setopt_array($ch, $options);
  $result = curl_exec($ch);
   }
     echo "<a style=\"color:#8c8c8c;\" rel=\"external nofollow\" title=\"点击提交收录\" target=\"_blank\" href=\"http://zhanzhang.baidu.com/sitesubmit/index?sitename=$url\">百度未收录</a>";
  }
 }
?>