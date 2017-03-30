<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Akina
 */

get_header(); 
wp_enqueue_style( 'album', get_template_directory_uri() . '/inc/css/album.css', '', true );
?>

	<div class="baguetteBoxOne album">

		<?php while ( have_posts() ) : the_post();?>
			<?php 
				$content = get_the_content(); 
				preg_replace('/<p>\s*(<img .* \/>)\s*<\/p>/iU', '\1', $content); //去除掉标签中的P标签
				echo $content;
			
			?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'ondemand' ),
					'after'  => '</div>',
				) );
			?>
		<?php endwhile; // End of the loop.?>
		
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($) {

			var $imgs_src = $(".album").find("img");

			if ($imgs_src.length > 0) {
				
				$(".album img").wrap('<figure></figure>');
				$("figure").wrap('<a></a>');
				$(".album figure").append('<figcaption></figcaption>');

				var $img_link = $(".album").find("a");
				var $img_title = $(".album").find("figcaption");

				$img_link.each(function(i,item){  
	         		   $(this).attr('href', $imgs_src.eq(i).attr('src'));       
	        	});  
	       		$img_title.each(function(i,item){  
	       			   var $url = 'url('+$imgs_src.eq(i).attr('src')+')';
	         		   $(this).css({"background": $url, "background-repeat": "no-repeat", "background-position": "bottom", "background-size": "100%"});  
	         		   var $alt = $imgs_src.eq(i).attr('alt');
	         		   if ($alt != "") {
		         		   $(this).html($alt);     
	         		   } else {
	         		   		$(this).html("<?php the_time('Y-m-d'); ?>");
	         		   }
	        	});  

	        	baguetteBox.run('.baguetteBoxOne', {
	    			animation: 'fadeIn',
	    			async: true,
	    			noScrollbars: true,
	    			fullScreen: true	
	    		});
    		}
		});
	</script>
	

<?php
wp_reset_query();
get_footer();
?>