<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Akina
 */

 ?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title itemprop="name"><?php global $page, $paged;wp_title( '|', true, 'right' );
bloginfo( 'name' );$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( '第 %s 页'), max( $paged, $page ) );?>
</title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="error-404 not-found">
<div class="error-img">
<img src="<?php echo get_bloginfo('template_directory').'/images/404bg.jpg';?>">
</div>
<div class="err-button back">
<a id="golast" href=javascript:history.go(-1);>返回上一页</a>
<a id="gohome" href="<?php bloginfo('url');?>">返回主页</a>  
</div>
</section>
</body>

<?php
//WordPress实现自动记录死链地址
if (is_404 && strpos($_SERVER['HTTP_USER_AGENT'], 'Baiduspider') !== false) {
    $fp = fopen("death.txt", "a");//death.txt就是在网站根目录的记录死链的文件，名字可以随意了
    flock($fp, LOCK_EX);
    fwrite($fp, home_url($_SERVER['REQUEST_URI']) . "\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}
?>
