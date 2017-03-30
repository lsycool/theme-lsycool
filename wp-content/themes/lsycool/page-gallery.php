<?php /*
Template Name: galllery
author: lsycool
url: http://www.lsycool.cn
*/
get_header(); 
wp_enqueue_style( 'gallery', get_template_directory_uri() . '/inc/css/gallery.css', '', true );
?>

<div class="baguetteBoxOne gallery">
        <?php 
                query_posts("post_type=album&post_status=publish&posts_per_page=-1");
                if (have_posts()) {
                        while (have_posts()) { the_post(); 
        ?>
                <div class="box">
                        <div class="box-img">
                                <?php if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('Thumbnail'); 
                                        } else {
                                                global $post;
                                                $content = $post->post_content; preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER); $n = count($strResult[1]); 
                                                if($n > 0){ 
                                                        echo $strResult[1][0];     
                                                } else {?>
                                                        <img src="<?php bloginfo('template_url'); ?>/images/gallery_default.jpg" />
                                <?php           }
                                        }
                                ?>
                        </div>
                        <a href="<?php the_permalink();?>">
                        <div class="box-content">
                                <h4 class="title"><?php the_title(); ?></h4>
                                <p class="description">
                                        <?php echo get_the_excerpt(); ?>
                                </p>
                        </div>
                        </a>
                </div>
        <?php } } ?>
</div>

<?php wp_reset_query(); get_footer();?>