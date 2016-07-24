<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
		 'focus_img' => array(
	    'type' => 'radio',
		'name' => '首页幻灯片开关',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'yes',
	),

		 'voice_ct' => array(
	    'type' => 'radio',
		'name' => '文章标题语音朗读开关',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
		         	'hda1' => array(
		'type' => 'text',
		'name' => '首页幻灯1地址',
		'description' => '填写链接',
		'default' => 'http://blog.moxiaonai.cn/',
        ),
	
		        	'hdt1' => array(
		'type' => 'text',
		'name' => '首页幻灯1标题',
		'description' => '填写标题',
		'default' => '一个emlog新模板',
        ),
        		'hd1' => array(
		'type' => 'image',
		'name' => '幻灯图片',
		'values' => array(
            TEMPLATE_URL . 'style/images/1.jpg',
        ),
	),  
        		'hda2' => array(
		'type' => 'text',
		'name' => '首页幻灯2地址',
		'description' => '填写链接',
		'default' => 'http://blog.moxiaonai.cn/',
        ),
				        	'hdt2' => array(
		'type' => 'text',
		'name' => '首页幻灯2标题',
		'description' => '填写标题',
		'default' => '一个emlog新模板',
        ),
        	'hd2' => array(
		'type' => 'image',
		'name' => '幻灯图片',
		'values' => array(
            TEMPLATE_URL . 'style/images/2.jpg',
        ),
	),  
        		'hda3' => array(
		'type' => 'text',
		'name' => '首页幻灯3地址',
		'description' => '填写链接',
		'default' => 'http://blog.moxiaonai.cn/',
        ),
		        	'hdt3' => array(
		'type' => 'text',
		'name' => '首页幻灯3标题',
		'description' => '填写标题',
		'default' => '一个emlog新模板',
        ),        	
			'hd3' => array(
		'type' => 'image',
		'name' => '幻灯图片',
		'values' => array(
            TEMPLATE_URL . 'style/images/2.jpg',
        ),
	),  
		'index_top' => array(
	    'type' => 'radio',
		'name' => '首页置顶推荐',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'yes',
	),
	    'index_title' => array(
		'type' => 'text',
				'name' => '置顶标题',
				'description' => '填写标题',
				'default' => '访问作者博客',
		        ),
						    'index_top1' => array(
		'type' => 'text',
				'name' => '置顶标题链接',
				'description' => '填写链接',
				'default' => 'http://blog.moxiaonai.cn',
		        ),
				 
	    'logo' => array(
        'type' => 'image',
        'name' => 'LOGO',
        'values' => array(
            TEMPLATE_URL . 'images/logo.jpg',
        ),
		'description' => '<span style="color:#484848; font-size:14px;">该logo只会在浏览器低分辨低于<b>800px</b>下显示。<b>默认宽高：260X63  </b>宽高没有限制，建议用png格式，若不能上传请改用ftp手动上传。</span><br><br>',
    ),
	    'icon'      =>  array(
        'type'          =>  'image',
        'name'          =>  'icon旋转头像',
        'values' => array(
            TEMPLATE_URL . 'images/icon.png',
        ),
        'description'   =>  '设置你icon头像，该头像为>800px像素下，页头部分的hover旋转头像,建议大小为180*180',
    ),
	'sina_wb'      =>  array(
        'type'          =>  'text',
        'name'          =>  '微博',
        'default'       =>  'http://weibo.com/52moxiaonai',
        'description'   =>  '设置你的新浪微薄地址',
    ),
    'qq'   =>  array(
        'type'          =>  'text',
        'name'          =>  'QQ',
        'default'       =>  '39784480',
        'description'   =>  '设置你的QQ号码',
    ),
    'weixin'      =>  array(
        'type'          =>  'image',
        'name'          =>  '微信',
        'values' => array(
            TEMPLATE_URL . 'img/weixin.jpg',
        ),
        'description'   =>  '设置你微信账号二维码',
    ),
    'rss'   =>  array(
        'type'          =>  'text',
        'name'          =>  'RSS',
        'default'       =>   BLOG_URL . 'rss.php',
        'description'   =>  '设置你的rss地址',
    ),
    'bgimage'      =>  array(
        'type'          =>  'image',
        'name'          =>  '网站背景',
        'values' => array(
            TEMPLATE_URL . 'images/bg1.jpg',
        ),
        'description'   =>  '上传网站背景图片',
    ),
    'bybg' => array(
	    'type' => 'radio',
		'name' => '必应背景开关',
		'description' => '<span style="color:#579184;">默认是关闭的，开启网站则调用必应背景，每天自动切换</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'no',
	),
    'progress'      =>  array(
        'type'          =>  'text',
        'name'          =>  '整站透明度',
        'default' => '0.3',
        'description'   =>  '设置网站透明度，1.0为不透明，0为完全透明',
    ),
    'admine' => array(
	    'type' => 'text',
		'name' => '站长Email',
		'description' => '跟个人设置里管理员邮箱一致，用于评论识别博主身份',
		'default' => 'admin@moxiaonai.cn',
	), 
	'yqlj' => array(
	    'type' => 'radio',
		'name' => '底部友情链接开关',
		'description' => '<span style="color:#579184;">默认是关闭的，如果想在底部显示就开启它。那么就要“登陆后台”，点“侧边栏”，把“链接关闭”，不然就重复了。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'no',
	),
	'juanzeng-link' => array(
	    'type' => 'text',
		'name' => '网站所有“捐赠”链接地址',
		'description' => '<span style="color:#579184;">捐赠链接地址也可以改成“支付宝收款地址”，如果没有收款地址可以用这个 https://shenghuo.alipay.com/send/payment/fill.htm</span>',
		'default' => 'http://blog.moxiaonai.cn/?post=13',
	),
	  'juanzeng1-kh' => array(
	    'type' => 'radio',
		'name' => '日志页“捐赠”图片模式',
		'description' => '<span style="color:#579184;">此“捐赠”是以卷轴显示的，用于高分辨率下的平板、PC，<b>540px</b>以上显示。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	), 
	  'juanzeng2-kh' => array(
	    'type' => 'radio',
		'name' => '日志页“捐赠”文字模式',
		'description' => '<span style="color:#579184;">此“捐赠”是以文字显示的，用于低分辨率下的手机、平板，540px以下才显示。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	), 
	 'fenxiang1-kh' => array(
	    'type' => 'radio',
		'name' => '日志页“JiaThis分享条”',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'xgrz-kh' => array(
	    'type' => 'radio',
		'name' => '日志页“相关文章”',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
		'banquan-kh' => array(
	    'type' => 'radio',
		'name' => '日志页“版权信息”',
		'description' => '<span style="color:#579184;">版权信息包括二维码、作者、网址、声明等，对于原创性较高的博客比较有用。现在网民版权意识很弱，建议开启。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'tongji-kh' => array(
	    'type' => 'radio',
		'name' => '侧边栏“网站统计”',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'tjrq' => array(
	    'type' => 'text',
		'name' => '侧边栏“网站统计” - 建站日期',
		'default' => '2014-04-24',
	),
	'ad-kh' => array(
	    'type' => 'radio',
		'name' => '侧边栏“跟随广告”',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
'cb-ad' => array(
		'type' => 'text',
		'name' => '侧边栏跟随浮动广告',
		'description' => '<span style="color:#579184;">广告宽不要超过250px，侧边栏最大宽是250px。广告类型不限，自己琢磨。</span>',
		'multi' => true,
		'default' => '<a href="#" title="图片广告招租，150元1月。" target="_blank"><img src="http://blog.moxiaonai.cn/content/templates/moxiaonai/images/guanggao.gif"></a><br>
<li class="wzgg1"><a href="#" class="shake shake-little" title="文字招租：1月30元起" target="_blank">
文字招租1：1月30元起
</a></li>
<li class="wzgg2"><a href="#" class="shake shake-little" title="文字招租：1月30元起" target="_blank">
文字招租2：1月30元起
</a></li>
<li class="wzgg3"><a href="#" class="shake shake-little" title="本广告文字招租" target="_blank">
文字招租3：1月30元起
</a></li>
<li class="wzgg4"><a href="/" title="返回首页">返回首页</a>&nbsp;&nbsp;<a href="#" title="喜欢本站就捐赠支持我们吧！">捐赠支持</a>&nbsp;&nbsp;
<a title="返回顶部" href="javascript:void(0);" onclick="goTop();">返回顶部</a></li>',
	),
	'dibu-zdywz' => array(
		'type' => 'text',
		'name' => '自定义底部一些文字导航',
		'description' => '<span style="color:#579184;">你可以随便添加、删除，这里的链接仅是演示。</span>',
		'multi' => true,
		'default' => '<a href="http://blog.moxiaonai.cn/?post=13" title="喜欢本站，捐赠支持！">捐赠支持</a> &nbsp;&nbsp;	
<a href="http://#" title="自定义链接">自定义链接</a> &nbsp;&nbsp;
<a href="http://#" title="自定义链接！">自定义链接</a> &nbsp;&nbsp;
<a href="http://#" title="站长到底是何方人物！？">自定义链接</a> &nbsp;&nbsp;
<a href="m/" title="手机版本">手机版本</a> &nbsp;&nbsp;',
	),
	);