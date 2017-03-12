<?php /*
Template Name: shuoshuo
author: lsycool
url: http://www.mizuiren.com/141.html
*/
get_header(); 
wp_enqueue_style( 'shuoshuo', get_template_directory_uri() . '/inc/css/shuoshuo.css', '', true );?>

<div class="shuoshuo">
	<ul class="archives-monthlisting">
 		<?php query_posts("post_type=shuoshuo&post_status=publish&posts_per_page=-1");if (have_posts()) : while (have_posts()) : the_post(); ?>
		<li>
			<span class="author_img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?></span>
 			<span class="tt"><?php the_time('Y-n-j-G:i'); ?></span>
 			<div class="shuoshuo-content">
 				<img class="bolangxian" src="<?php echo get_template_directory_uri();?>/images/bolangxian.png"></img>
 				<?php the_title(); ?><br/>
 				<div class="shuoshuo-meta">
 					<span >— <i class="icon-user"></i><?php the_author() ?><a href="javascript:;" onclick="$('makecomments').not($('#makecomments-<?php the_ID()?>')).hide(); $('#makecomments-<?php the_ID()?>').toggle(300);" class="comment_toggle" title="评论" style="margin-left: 10px; color: #666;"><i class="icon-mail"></i>评论</a></span>
 				</div>
 			</div>
 			<div id="makecomments-<?php the_ID()?>" class="makecomments">
				<?php get_template_part('inc/comments-shuoshuo');; ?>
 			</div>
 			<?php endwhile;endif; ?>
 		</li>
 </ul>
</div>
<?php get_footer();?>

