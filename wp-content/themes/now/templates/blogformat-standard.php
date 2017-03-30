<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrapped-content">
		
		<?php 
			$date_format = get_option('now_blog_dateformat') ? get_option('now_blog_dateformat') : 'M, j Y';
			$category_separator = get_option('now_blog_categorysep') ? get_option('now_blog_categorysep') : ' ,';
		?>

		<p class="title">
			<span class="category"><?php the_category($category_separator); ?></span>
			<span class="time"><?php the_date($date_format); ?></span>
		</p>
		
		<?php if(is_single()): ?>

			<h2 class="blog-title"><?php the_title(); ?></h2>
		
		<?php else: ?>

			<h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php endif; ?>

	</div>

	<?php 
		if(has_post_thumbnail()):
			$image = get_the_post_thumbnail(null, 'featured-blog', array('class' => 'featured-image'));
	?>
		<figure>
			<?php echo $image; ?>
		</figure>
	<?php endif; ?>

	<div class="wrapped-content">

		<?php 
			if(!is_single()) {
				global $more;
				$more = 0;

				if ( has_excerpt() ) {
					echo mb_strimwidth( get_the_excerpt(), 0, 260 );
				} else {
					echo mb_strimwidth( get_the_content(), 0, 260 );
				}
			} else {
				echo get_the_content();
			}
		?>

		<div class="clear-fix"></div>

		<?php wp_link_pages(); ?>

		<?php if(!is_single()): ?>
			<hr>
			<p class="read-more">
				<a href="<?php the_permalink(); ?>"><?php echo __( 'Read More', 'now' ); ?></a>
				<?php edit_post_link(null,'<span class="align-right">', '</span>'); ?>
			</p>

		<?php else: get_blog_share(); endif; ?>

	</div>
</article>

<?php if(is_single()) {?>
	<div id='back-to-top-bottom' style="position: fixed;right: 10px;bottom: 30px;width: 52px;z-index: 16;text-align: center; filter:alpha(opacity:60); opacity:0.6;">
		<a id='top-dock' href="#" style="position: relative;display: block;width: 44px;height: 44px;padding:2px;text-align: center;line-height: 50px;border: 2px solid rgba(0,0,0,.05);">
			<i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i>
		</a>
		<a id='down-dock' href="#comments-area" style="position: relative;display: block;width: 44px;height: 44px;padding:2px;text-align: center;line-height: 50px;border: 2px solid rgba(0,0,0,.05);margin-top: 5px">
			<i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
		</a>
	</div>
	<?php if(get_option('now_comments_disable', 'false') == 'false') { ?>
		<div id="comments-area" style="padding:0 10px;">
			<?php comments_template('', true); ?>
		</div>
	<?php } ?>
<?php }?>

