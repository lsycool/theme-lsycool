<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Akina
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title itemprop="name"><?php global $page, $paged;wp_title( '|', true, 'right' );
bloginfo( 'name' );$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( '第 %s 页'), max( $paged, $page ) );?>
</title>

<?php
if (akina_option('akina_meta') == true) {
	$keywords = '';
	$description = '';
	if ( is_singular() ) {
		$keywords = '';
		$tags = get_the_tags();
		$categories = get_the_category();
		if ($tags) {
			foreach($tags as $tag) {
				$keywords .= $tag->name . ','; 
			};
		};
		if ($categories) {
			foreach($categories as $category) {
				$keywords .= $category->name . ','; 
			};
		};
		$description = mb_strimwidth( str_replace("\r\n", '', strip_tags($post->post_content)), 0, 240, '…');
	} else {
		$keywords = akina_option('akina_meta_keywords');
		$description = akina_option('akina_meta_description');
	};
?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<!-- 顶部加载条 -->
	<div id="progress">
	</div>
<!-- 移动端导航 -->
  		<div id="mo-nav">
				<?php wp_nav_menu( array( 'depth' => 2, 'theme_location' => 'primary', 'container' => false ) ); ?>
		</div>	
    	
	 <div class="openNav">
     <div class="iconflat">	 
	     <div class="icon"></div>
		 </div>
		 <div class="site-branding">
		<!-- 如果设置logo则显示，反之显示博客名 -->
		  <?php if (akina_option('akina_logo')):?>
		     <div class="site-title"><a href="<?php bloginfo('url');?>" ><img src="<?php echo akina_option('akina_logo', ''); ?>"></a></div>
		  <?php else :?>
             <h1 class="site-title"><a href="<?php bloginfo('url');?>" ><?php bloginfo('name');?></a></h1>	
          <?php endif ;?>	
        <!-- logo end -->		  
			</div><!-- .site-branding -->
	   </div>
	  
<div id="page" class="site wrapper">

	<header id="site-header" class="site-header" role="banner">
	<img id="bkimage" style="position: absolute; top: 0px; left: 0px; z-index: -2; opacity: 1; display: none; visibility: hidden;" src="http://www.lsycool.cn:9090/wp-content/uploads/2017/03/18.png">
	<canvas id="canvas-rain" style="width: 100%; height: 80px; position: absolute; top: 0px; left: 0px; z-index: -2; opacity: 0.6;display: none; visibility: hidden;"></canvas>

	<span id="navLogin">
		<?php
			if( is_user_logged_in() ) {//如果登录
		?>
			<i class="icon-setup" style="margin-right: 3px;"></i><?php wp_register('', ''); ?>
			<i class="icon-user" style="margin-right: 3px; margin-left:10px;"></i><a rel="nofollow" href="<?php echo wp_logout_url(home_url());?>" title="">注销</a>
		<?php } else { ?>
			<i class="icon-setup" style="margin-right: 2px;"></i>
			<a id="mStats" class="stats_click" href="javascript:;" >统计
				<div class="stats">
					<ul>
						<li>建站日期：2017-3-6</li>
						<li>运行天数：<?php echo floor((time()-strtotime("2017-1-22"))/86400); ?> 天</li>
						<li>分类总数：<?php echo $count_categories = wp_count_terms('category'); ?> 个</li>
						<li>日志总数：<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?> 篇</li>
						<li>标签数量：<?php echo $count_tags = wp_count_terms('post_tag'); ?> 个</li>
						<li>评论总数：<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?> 条</li>
						<li>链接数量：<?php $link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'"); echo $link; ?> 个</li>
						<li>最后更新：<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y-n-j', strtotime($last[0]->MAX_m));echo $last; ?></li>
					</ul>
				</div>	
			</a>
			<i class="icon-user" style="margin-right: 3px;"></i><a href="<?php echo wp_login_url();?>" >登录</a>
		<?php } ?>
	</span>	

	 <div class="site-top">
		<div class="site-branding">
		<!-- 如果设置logo则显示，反之显示博客名 -->
		  <?php if (akina_option('akina_logo')):?>
		     <div class="site-title"><a href="<?php bloginfo('url');?>" ><img src="<?php echo akina_option('akina_logo', ''); ?>"></a></div>
		  <?php else :?>
             <h1 class="site-title"><a href="<?php bloginfo('url');?>" ><?php bloginfo('name');?></a></h1>	
          <?php endif ;?>	
        <!-- logo end -->		  	
		</div><!-- .site-branding -->

		<div class="searchbox">
			<i class="iconfont js-toggle-search iconsearch">&#xe603;</i>
		</div> 
		
       <div class="lower">
			 <nav>
				<?php wp_nav_menu( array( 'depth' => 2, 'theme_location' => 'primary', 'container' => false ) ); ?>
				<i class="iconfont show-nav">&#xe613;</i>
			 </nav><!-- #site-navigation -->
			</div>
				
		</div>		
	</header><!-- #masthead -->
	
	
	<div class="blank"></div>
	
	
	<div class="headertop">
	<!-- #imgbox -->
	<?php if ( is_home() ){ ?>
	<?php get_template_part('layouts/imgbox'); ?>	
	<?php } ?>
	<!-- #imgbox -->
	</div>
	
    <div id="content" class="site-content">
	

