<?php /*
Template Name: shuoshuo
author: lsycool
url: http://www.lsycool.cn
*/
get_header(); 
wp_reset_query();
wp_enqueue_style( 'shuoshuo', get_template_directory_uri() . '/css/shuoshuo.css', '', true );?>

<div id="container">

<!-- Sidebar -->
<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

<section id="content-container">

	<!-- Toolbar -->
	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

	<div class="shuoshuo">
		<ul class="archives-monthlisting">
	 		<?php query_posts("post_type=shuoshuo&post_status=publish&posts_per_page=-1");
	 			  if (have_posts()) : while (have_posts()) : the_post(); 
	 		?>
			<li>
	 			<div class="shuoshuo-content">
		 			<span class="tt"><?php the_time('Y-n-j-G:i'); ?></span>
	 				<?php the_title(); ?><br/>
	 				<div class="shuoshuo-meta">
	 					<span >— <i class="icon-user"></i><?php the_author() ?><a href="javascript:;" onclick="$('makecomments').not($('#makecomments-<?php the_ID()?>')).hide(); $('#makecomments-<?php the_ID()?>').toggle(300);" class="comment_toggle" title="评论" style="margin-left: 10px; color: #666;"><i class="icon-mail"></i>评论</a></span>
	 				</div>
	 			</div>
	 			<?php if( comments_open() && get_option('now_comments_page', 'false') == 'true') { ?>
	 			<div id="makecomments-<?php the_ID()?>" class="makecomments" style="display: none;">
					<?php get_template_part('includes/comments-shuoshuo'); ?>
	 			</div>
	 			<?php } ?>
	 			<?php endwhile;endif; ?>
	 		</li>
	 </ul>
	</div>
</section>
</div>
<?php get_footer();?>

