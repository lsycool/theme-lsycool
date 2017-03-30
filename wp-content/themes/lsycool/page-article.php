/<?php /*
Template Name: article
author: lsycool
url: http://www.mizuiren.com/141.html
*/
get_header(); 
wp_enqueue_style( 'patents', get_template_directory_uri() . '/inc/css/patents.css', '', true );
wp_enqueue_style( 'magiczoomplus', get_template_directory_uri() . '/inc/css/magiczoomplus.css', '', true );
wp_enqueue_script( 'magiczoomplus', get_template_directory_uri() . '/js/magiczoomplus.js', '', true );
?>

<div class="patents">
 		<?php query_posts("post_type=articles&post_status=publish&posts_per_page=-1&orderby=modified");
 		if (have_posts()) { 
	 			while (have_posts()) { the_post(); ?>
	 			<div id="box-patent">
	 				<div id='patent-img-left'>
	                    <?php   if ( has_post_thumbnail() ) {
	                                    the_post_thumbnail('Thumbnail'); 
	                           	} else {
	                                    global $post;
	                                    $content = $post->post_content; preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER); $n = count($strResult[1]); 
	                                    if($n > 0){ 
	                                            echo $strResult[1][0];     
	                                    } else {?>
	                                            <img src="<?php bloginfo('template_url'); ?>/images/article_default.jpg" />
	                    <?php           }
	                            }
	                    ?>
	 				</div>
	 				<ul id="patent-info-right">
	 					<li>
	 						<?php echo get_the_title(); /*论文名称*/?>
	 					</li>
	 					<li>
	 						<label>作者：</label>
	 						<span><?php echo get_post_meta($post->ID, "article-author", $single = true);?></span>
	 					</li>
	 					<li>
	 						<label>期刊名：</label>
	 						<span><?php echo get_post_meta($post->ID, "article-name", $single = true); ?></span>
	 						<span style="margin-left: 6px;"><?php echo get_post_meta($post->ID, "article-class", $single = true); ?></span>
	 						<a href="<?php echo get_template_directory_uri().'/articles/'.get_post_meta($post->ID, "article-searchlink", $single = true); ?>" style="margin-left: 6px;"><i class="fa fa-link" aria-hidden="true"></i>下载</a>
	 						<?php 
	 							$state=get_post_meta($post->ID, "article-state", $single = true); 
	 							if ($state != '') {
	 								echo '<span id="article-state" style="padding: 1px 10px;line-height: 25px;background: #ffeddf;border: 1px solid #ffeddf;color: #f1722c;border-radius: 14px;margin-left: 6px;">'.$state.'</span>';
	 							}
	 						?>
	 					</li>
	 					<li>
	 						<p style="margin: 0;">
	 							<label>摘要：</label>
	 							<span><?php echo get_the_content();?></span>
	 						</p>
	 					</li>
	 				</ul>
	 			</div>
		<?php } } ?>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {

		var $imgs_src = $("#patent-img-left img");

		if ($imgs_src.length > 0) {
			
			$("#patent-img-left img").wrap('<a></a>');
			var $img_link = $("#patent-img-left a");

			$img_link.each(function(i,item){  
         		   $(this).attr('href', $imgs_src.eq(i).attr('src')); 
         		   $(this).addClass('MagicZoom');
         		   $(this).css({"width":"86px","height":"auto"});
         		   $(this).attr('data-options', 'zoomWidth:300px; zoomHeight:400px'); 
        	});  
		}
	});
</script>
<?php wp_reset_query(); get_footer();?>

