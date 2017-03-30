<?php /*
Template Name: liuyan
author: lsycool
url: http://www.lsycool.cn
*/
get_header(); 
wp_enqueue_style( 'liuyan', get_template_directory_uri() . '/inc/css/liuyan.css', '', true );
?>
	</div><!-- #content -->
	<div class="bkbg">
		<img src="<?php echo get_template_directory_uri().'/images/liuyan1.jpg'?>" style="box-shadow: 0 0 4px -1px #000; width: 460px; height: auto;">
	</div>
	<?php if(akina_option('recent-friend')=='yes') {?>
		<div class="recent-info">
			<h2 style="font-size: 12px; width: 62px; background: #dddfc2; color: #848568; padding: 3px 5px; border-radius: 5px;">最近访友</h2>
			<ul class="ds-recent-visitors" data-num-items="30"></ul>
		</div>
		<script type="text/javascript">
			var duoshuoQuery = {short_name:"lsycool"};
			(function() {
			    var ds = document.createElement('script');
			    ds.type = 'text/javascript';
			    ds.async = true;
			    ds.src = 'http://static.duoshuo.com/embed.js';
			    ds.charset = 'UTF-8';
			    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
			})();
		</script>
	<?php }?>
	
	<div class="liuyan">
		<?php 
			comments_template('', true); 
		?>
	</div>
			

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php esc_attr_e('Copyright ©', 'lsycool'); ?> <?php esc_attr_e(date('Y')); ?> by Shiyong.Liu <?php esc_attr_e('. All rights reserved.', 'lsycool'); ?>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'lsycool' ), 'lsycool', '<a href="http://www.akina.pw" rel="Shiyong.Liu">Shiyong.Liu</a>' ); ?>
			<div class="footertext">
			<p><?php echo akina_option('footer_info', ''); ?></p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="#" id="scroll-to-top"><span class="icon-rocket"></span></a>

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