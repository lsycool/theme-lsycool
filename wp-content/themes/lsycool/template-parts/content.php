<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Akina
 */

?>

<article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
<div class="post-entry">
  <div class="feature">
	<?php if ( has_post_thumbnail() ) { global $post; /*判断是否有缩略图，如果没有则查找文章中的第一张图，如果文章中没有图则使用默认图像*/?>
		<a href="<?php the_permalink();?>"><div class="overlay"><i class="iconfont">&#xe61e;</i></div><?php the_post_thumbnail(); ?></a>
		<?php } else { $content = $post->post_content; preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER); $n = count($strResult[1]); if($n > 0){ ?>
		<a href="<?php the_permalink();?>"><div class="overlay"><i class="iconfont">&#xe61e;</i></div><img src="<?php echo $strResult[1][0]; ?>" /></a>
		<?php } else {?>
		<a href="<?php the_permalink();?>"><div class="overlay"><i class="iconfont">&#xe61e;</i></div><img src="<?php bloginfo('template_url'); ?>/images/default.jpg" /></a>
		<?php } } ?>
	</div>	
	<h1 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
	<div class="p-time">
		<?php if(is_sticky()) : ?>
			<i class="iconfont hotpost">&#xe618;</i>
		 <?php endif ?>
	  <i class="iconfont">&#xe604;</i> <?php the_time('Y-m-d');?>
	  </div>
		<p><?php echo mb_strimwidth(strip_shortcodes(strip_tags(apply_filters('the_content', $post->post_content))), 0, 150,"...");?></p>
	
	

	<footer class="entry-footer">
	<div class="post-more">
			<a href="<?php the_permalink(); ?>"><i class="iconfont">&#xe61c;</i></a>
		</div>
	<div class="info-meta">
       <div class="comnum">  
        <span><i class="iconfont">&#xe610;</i> <?php comments_popup_link('NOTHING', '1 条评论', '% 条评论'); ?></span>
		</div>
		<div class="views"> 
		<span><i class="iconfont">&#xe614;</i> <?php get_post_views($post -> ID); ?> 热度</span>
		 </div>   
        </div>		
	</footer><!-- .entry-footer -->
	</div>	
	<hr>
</article><!-- #post-## -->

