<?php /*
Template Name: galllery
author: lsycool
url: http://www.mizuiren.com/141.html
*/
get_header(); 
wp_enqueue_style( 'gallery', get_template_directory_uri() . '/inc/css/gallery.css', '', true );
?>

<div class="baguetteBoxOne gallery">
        <?php 
                query_posts("post_type=shuoshuo&post_status=publish&posts_per_page=-1");
                if (have_posts()) {
                        while (have_posts()) { the_post(); 
        ?>
                <div class="box">
                        <div class="box-img">
                                <?php the_post_thumbnail('Thumbnail'); ?>
                        </div>
                        <a href="<?php the_permalink();?>">
                        <div class="box-content">
                                <h4 class="title"><?php the_title(); ?></h4>
                                <p class="description">
                                        <?php the_excerpt(); ?>
                                </p>
                        </div>
                        </a>
                </div>
        <?php } } ?>
</div>

<?php wp_reset_query(); get_footer();?>