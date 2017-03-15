<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Akina
 */

?>

	</div><!-- #content -->
	
	
	 <?php 
			if(akina_option('general_disqus_plugin_support')=='1'){
				get_template_part('layouts/duoshuo');
			}else{
				comments_template('', true); 
			}
	?>
			

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php esc_attr_e('Copyright ©', 'lsycool'); ?> <?php esc_attr_e(date('Y')); ?> by Shiyong. Liu <?php esc_attr_e(' All rights reserved.', 'lsycool'); ?>
			<div class="footertext">
			<p><?php echo akina_option('footer_info', ''); ?> | <?php echo akina_option('lsycool_icp', ''); ?></p>
			</div>
			<script type="text/javascript"><?php echo stripslashes(akina_option('analytics')); ?></script>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="#" id="scroll-to-top"><span class="icon-rocket"></span></a>

<?php if (is_single()) {?>
	<div class="fixed-btn">
	    <a class="home" href="<?php echo home_url()?>">
	      <i class="fa fa-home fa-fw" aria-hidden="true"></i>
	        <span class="back-home">
	          返回主页看更多 
	        </span>
	    </a>
        <a class="reward">
            <i class="icon-hongbao"></i>
            <div>打赏楼主
              <span class="code">
              		<img alt="" src="<?php echo get_bloginfo('template_directory'). '/images/zhifubao.jpg'?>">
              		<b>支付宝 扫一扫</b>
              </span>
            </div>
        </a><!-- 红包打赏 -->
  	</div>
<?php }?>

<?php if(is_home() && !is_paged()) {?>
	<div class="sidebar-right"></div>
	<div class="sidebar-popu">
	    <a class="navicon" href="<?php echo home_url()?>/navigation">
	      <i class="fa fa-navicon fa-fw"></i>
	        <span class="back-navicon">
	          返回导航页 
	        </span>
	    </a>
	    <a class="archive" href="<?php echo home_url()?>/archive">
	      <i class="fa fa-archive fa-fw"></i>
	        <span class="back-archive">
	          返回归档页 
	        </span>
	    </a>
	    <a class="links" href="<?php echo home_url()?>/friends-link">
	      <i class="fa fa-link fa-fw"></i>
	        <span class="back-links">
	          友情链接 
	        </span>
	    </a>
	    <a class="sitemap" href="<?php echo home_url()?>/site-map">
	      <i class="fa fa-street-view fa-fw"></i>
	        <span class="back-sitemap">
	          站点地图 
	        </span>
	    </a>
  	</div>
<?php }?>

<!-- search start -->
  <form class="js-search search-form search-form--modal" method="get" action="<?php echo home_url(); ?>" role="search">
	<div class="search-form__inner">
		<div>
			<p class="micro mb-"><?php _e('你想搜索什么...', 'akina') ?></p>
			<i class="iconfont">&#xe603;</i>
			<input class="text-input" type="search" name="s" placeholder="<?php _e('搜索...', 'akina') ?>">
		</div>
	</div>
</form>
<!-- search end -->

<div id="loading">
  <div id="loading-center">
    <div id="loading-center-absolute">
      <div class="object" id="object_one"></div>
      <div class="object" id="object_two"></div>
      <div class="object" id="object_three"></div>
      <div class="object" id="object_four"></div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>


</body>
</html>
