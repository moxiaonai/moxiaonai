<?php
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>

<div id="content">
  <h2 class="biaoti" id="masked"><?php echo $log_title; ?></h2>
  <div class="xiantiao2"><img src="<?php echo TEMPLATE_URL; ?>images/xiantiao2.png"></div>
      <div class="post-context"><?php echo content($log_content); ?></div>
<?php
 include View::getView('footer');
?>