<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Akina
 */

get_header(); 
wp_enqueue_style( 'page-patents', get_template_directory_uri() . '/inc/css/page-patents.css', '', true );
?>

<div id="primary" class="content-area">
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title">[<?php echo get_post_meta($post->ID, "petent-class", $single = true);?>] <?php the_title(); ?>
				</h1>
				<hr>
			</header><!-- .entry-header -->

			<div class="entry-content">
					<div id="baseinfo">
						<h3>基本信息</h3>
						<div id="info-left" style="float: right; width: 46%; display: block;">
							<span><label>申请号：</label><?php echo get_post_meta($post->ID, "petent-num", $single = true); /*专利号*/?></span><br>
							<span><label>申请日：</label><?php echo get_post_meta($post->ID, "petent-date", $single = true); ?></span><br>
							<span><label>发明人：</label><?php echo get_post_meta($post->ID, "petent-author", $single = true); ?></span><br>
							<span><label>主分类号：</label><?php echo get_post_meta($post->ID, "petent-classnum", $single = true); ?></span><br>
						</div>
						<div id="info-right" style="width: 46%; margin-right: 30px; position: relative;">
							<span><label>公开/公告号：</label><?php echo get_post_meta($post->ID, "petent-opennum", $single = true);?></span><br>
							<span><label>公开/公告日：</label><?php echo get_post_meta($post->ID, "petent-opendate", $single = true);?></span><br>
							<span><label>专利权人：</label><?php echo get_post_meta($post->ID, "petent-owner", $single = true); ?></span><br>
							<span><label>地址：</label><?php echo get_post_meta($post->ID, "petent-address", $single = true); ?></span><br>
						</div>
					</div>
					<div id='detailinfo' style="width: 100%; height: 500px;">
						<div id='abstruct' style="float: left; width: 46%; display: block;">
							<h3>摘要</h3>
							<p><?php echo get_the_content();?></p>
						</div>
						<div id='futu' style="float: right; width: 46%; display: block;">
							<h3>附图</h3>
							<p style="text-align: center;">
								<?php
									$arrary_img = get_post_meta($post->ID, "petent-futu", $single = false);
									for ($i=0; $i<count($arrary_img); $i++) {
										if (0 == $i) { 
											echo '<a href="'.$arrary_img[$i].'" class="MagicZoom" id="'.get_the_ID().'-patentimg" data-options="zoomMode: magnifier; variableZoom: true"><img src="'.$arrary_img[$i].'" style="width: auto; height: 400px; "></a>';
										} else {
											 echo '<a href="'.$arrary_img[$i].'" class="MagicZoom" data-zoom-id="'.get_the_ID().'-patentimg"><img src="'.$arrary_img[$i].'" style="width: auto; height: 400px; "></a>';
										}
									}
								?>
							</p>
						</div>
					</div>
					<div id='legalinfo'>
						<h3>主权项</h3>
						<p><?php echo get_post_meta($post->ID, "petent-charge", $single = true); ?></p>
					</div>

					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'ondemand' ),
						'after'  => '</div>',
					) );
					?>
			</div><!-- .entry-content -->
			<footer class="post-footer">
				<div class="post-tags">
					<?php if ( get_the_tags() ) { echo '<i class="iconfont">&#xe602;</i> '; the_tags('', ' ', ' ');}?>
				</div>
		    	<?php get_template_part('inc/sharelike'); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
	<?php endwhile; // End of the loop.?>
</div><!-- #primary -->


<?php
wp_reset_query();
get_footer();
?>