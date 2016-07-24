<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
    <h2 class="biaoti" id="masked">微言碎语</h2>
    <div class="xiantiao2"><img src="<?php echo TEMPLATE_URL; ?>images/xiantiao2.png"></div>
      <div class="tw">
        <div class="plus"></div>
        <div class="plus2"></div>
        <ul class="archives-monthlisting">
          <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?>
          <li>
            <em1></em1>
            <div class="avatar" ><?php echo $val['date'];?></div>
            <div class="tw-content"><em></em><?php echo $val['t'].'<br/>'.$img;?>
              <div class="status-wall-meta"><span><?php echo $val['date'];?></span></div>
            </div>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    <div class="pagenavi"><?php echo $pageurl;?></div>
  <!--end #tw--> 
</div>
<!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>
