<?php
/**
 * Akina functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Akina
 */
 


if ( ! function_exists( 'akina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
 


function akina_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Akina, use a find and replace
	 * to change 'akina' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'akina', get_template_directory() . '/languages' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'akina' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'status',
		'video',
		'quote',
		'link',
		'gallery',
		'chat',
		'audio',
	) );
	// add post-formats to post_type 'page'   
	add_post_type_support( 'page', 'post-formats' );   
	// add post-formats to post_type 'my_custom_post_type'   
	add_post_type_support( 'my_custom_post_type', 'post-formats' ); 


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'akina_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_filter('pre_option_link_manager_enabled','__return_true');
	
	// 优化代码
	//去除头部冗余代码
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'wp_generator');
	remove_action( 'wp_head', 'wp_generator' ); //隐藏wordpress版本
        remove_filter('the_content', 'wptexturize'); //取消标点符号转义
    
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_filter('oembed_response_data', 'get_oembed_response_data_rich', 10, 4);
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	// Remove the Link header for the WP REST API
	// [link] => <http://cnzhx.net/wp-json/>; rel="https://api.w.org/"
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
	
	function coolwp_remove_open_sans_from_wp_core() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
		wp_enqueue_style('open-sans','');
	}
	add_action( 'init', 'coolwp_remove_open_sans_from_wp_core' );
	
	/**
	* Disable the emoji's
	*/
	function disable_emojis() {
	 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	 remove_action( 'wp_print_styles', 'print_emoji_styles' );
	 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	add_action( 'init', 'disable_emojis' );
	 
	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 * 
	 * @param    array  $plugins  
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
	 if ( is_array( $plugins ) ) {
	 return array_diff( $plugins, array( 'wpemoji' ) );
	 } else {
	 return array();
	 }
	}
	
	// 移除菜单冗余代码
	add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
	add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
	add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
	function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')) : '';
	}
		
}
endif;
add_action( 'after_setup_theme', 'akina_setup' );

function admin_lettering(){
    echo'<style type="text/css">
     body{ font-family: Microsoft YaHei;}
    </style>';
    }
add_action('admin_head', 'admin_lettering');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function akina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'akina_content_width', 640 );
}
add_action( 'after_setup_theme', 'akina_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/*function akina_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'akina' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'akina' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'akina_widgets_init' );
*/

/**
 * Enqueue scripts and styles.
 */
function akina_scripts() {
	wp_enqueue_style( 'akina-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jq', get_template_directory_uri() . '/js/jquery.min.js', array(), '2016429', true ); 
	
	wp_enqueue_script( 'baguetteBox', get_template_directory_uri() . '/js/baguetteBox.min.js', array(), '2016429', true );
	
    wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', array(), '2016429', true );
	
    wp_enqueue_script( 'akina-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'akina_scripts' );

/**
 * load .php.
 */
require_once('inc/fn.php');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * ajax-comments.
 */
require('ajax-comment/main.php');

/**
 * aboutfu.
 */
//require get_template_directory() . '/inc/aboutfu.php'; 

/*-----------------------------------------------------------------------------------*/
	/* COMMENT FORMATTING
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('akina_comment_format')){
		function akina_comment_format($comment, $args, $depth){
			$GLOBALS['comment'] = $comment;
			?>
				<li <?php comment_class(); ?> id="comment-<?php echo esc_attr(comment_ID()); ?>">
					<div class="contents">
						<div class="profile">
							<a href="<?php comment_author_url(); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?></a>
						</div>
						<div class="comment-arrow">
						<div class="main shadow">
							<div class="commentinfo">
								<section class="commeta">
									<div class="left">
										<h4 class="author"><a href="<?php comment_author_url(); ?>"><img src="//cn.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=24" class="gravatarsmall" alt="<?php comment_author(); ?>"><?php comment_author(); ?> <span class="isauthor" title="<?php esc_attr_e('Author', 'akina'); ?>"><i class="fa fa-user"></i></span></a></h4>
									</div>
									<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
									<div class="right">
										<div class="info"><time datetime="<?php comment_date('Y-m-d'); ?>"><?php comment_date(get_option('date_format')); ?></time></div>
									</div>
								</section>
							</div>
							<div class="body">
								<?php comment_text(); ?>
							</div>
						</div>
						<div class="arrow-left"></div>
						</div>
					</div>
					<hr>
			<?php
		}
	}

/**
 * post views.
 */
function get_post_views ($post_id, $out = true) {   
  
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if ($count == '') {   
        delete_post_meta($post_id, $count_key);   
        add_post_meta($post_id, $count_key, '0');   
        $count = '0';   
    }   
    if($out) {
    	echo number_format_i18n($count);
    } else {
 	   return number_format_i18n($count);       	
	}
}   
  
//设置文章浏览次数
function set_post_views () {   
  
    global $post;   
  
    $post_id = $post -> ID;   
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if (is_single() || is_page()) {   
  
        if ($count == '') {   
            delete_post_meta($post_id, $count_key);   
            add_post_meta($post_id, $count_key, '0');   
        } else {   
            update_post_meta($post_id, $count_key, $count + 1);   
        }   
  
    }   
  
}   
add_action('get_header', 'set_post_views');  



// Gravatar头像使用中国服务器
function gravatar_cn( $url ){ 
$gravatar_url = array('0.gravatar.com','1.gravatar.com','2.gravatar.com');
return str_replace( $gravatar_url, 'cn.gravatar.com', $url );
}
add_filter( 'get_avatar_url', 'gravatar_cn', 4 );
// 阻止站内文章互相Pingback 
function theme_noself_ping( &$links ) { 
$home = get_option( 'home' );
foreach ( $links as $l => $link )
if ( 0 === strpos( $link, $home ) )
unset($links[$l]); 
}
add_action('pre_ping','theme_noself_ping');


// 编辑器增强
 function enable_more_buttons($buttons) { 
 $buttons[] = 'hr'; 
 $buttons[] = 'del'; 
 $buttons[] = 'sub'; 
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 $buttons[] = 'wp_page';
 $buttons[] = 'anchor'; 
 $buttons[] = 'backcolor'; 
 return $buttons;
 } 
add_filter("mce_buttons_3", "enable_more_buttons");
// 拦截机器评论
class anti_spam { 
function anti_spam() {
if ( !current_user_can('level_0') ) {
add_action('template_redirect', array($this, 'w_tb'), 1);
add_action('init', array($this, 'gate'), 1);
add_action('preprocess_comment', array($this, 'sink'), 1);
}
}
function w_tb() {
if ( is_singular() ) {
ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
"textarea$1name=$2w$3$4/textarea><textarea name=\"comment\" cols=\"100%\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
}
}
function gate() {
if ( !empty($_POST['w']) && empty($_POST['comment']) ) {
$_POST['comment'] = $_POST['w'];
} else {
$request = $_SERVER['REQUEST_URI'];
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '隐瞒';
$IP= isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] . ' (透过代理)' : $_SERVER["REMOTE_ADDR"];
$way = isset($_POST['w'])? '手动操作' : '未经评论表格';
$spamcom = isset($_POST['comment'])? $_POST['comment']: null;
$_POST['spam_confirmed'] = "请求: ". $request. "\n来路: ". $referer. "\nIP: ". $IP. "\n方式: ". $way. "\n內容: ". $spamcom. "\n -- 已备案 --";
}
}
function sink( $comment ) {
if ( !empty($_POST['spam_confirmed']) ) {
if ( in_array( $comment['comment_type'], array('pingback', 'trackback') ) ) return $comment;
// 方法一: 直接挡掉, 將 die();
die();
// 方法二: 标记为 spam, 留在资料库检查是否误判.
// add_filter('pre_comment_approved', create_function('', 'return "spam";'));
// $comment['comment_content'] = "[ 防火墙提示：此条评论疑似Spam! ]\n". $_POST['spam_confirmed'];
}
return $comment;
	}
	}
	$anti_spam = new anti_spam();

function scp_comment_post( $incoming_comment ) { // 纯英文评论拦截
if(!preg_match('/[一-龥]/u', $incoming_comment['comment_content'])) exit('<p><span style="color:#f55;">  提交失败：</span>评论必须包含中文（Chinese），请再次尝试！</p>');
//die(); // 直接挡掉，无提示
return( $incoming_comment );
}
add_filter('preprocess_comment', 'scp_comment_post');

//自动添加缩略图
function autoset_featured() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
              if (!$already_has_thumb)  {
              $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                          if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
                           }
                        }
      }  //end function
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');



/**
 * @Author M.J
 * @Date 2013-12-24
 */	
	//Login Page
	function custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/inc/login.css" />'."\n";
		echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/jquery.min.js"></script>'."\n";
	}
	add_action('login_head', 'custom_login');

	//Login Page Title
	function custom_headertitle ( $title ) {
		return get_bloginfo('name');
	}
	add_filter('login_headertitle','custom_headertitle');

	//Login Page Link
	function custom_loginlogo_url($url) {
		return esc_url( home_url('/') );
	}
	add_filter( 'login_headerurl', 'custom_loginlogo_url' );

	//Login Page Footer
	function custom_html() {
		echo '<div class="footer">'."\n";
		echo '<p>Copyright &copy; '.date('Y').' All Rights | Author by <a href="http://www.lsycool.cn" target="_blank">lsycool</a></p>'."\n";
		echo '</div>'."\n";
		echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/resizeBg.js"></script>'."\n";
		echo '<script type="text/javascript">$(document).ready(function() { $(\'#wp-submit\').click( function() {var user = $("#user_login").val(); user = $.trim(user); var pwd = $("#user_pass").val(); pwd = $.trim(pwd); if (user == "" || pwd == "" ) { alert("账号和密码不能为空!"); return false; }})}); </script>'."\n";
		echo '<script type="text/javascript">'."\n";
		echo 'jQuery("body").prepend("<div class=\"loading\"><img src=\"'.get_bloginfo('template_directory').'/images/login_loading.gif\" width=\"58\" height=\"10\"></div><div id=\"bg\"><img /></div>");'."\n";
		echo 'jQuery(\'#bg\').children(\'img\').attr(\'src\', \''.get_bloginfo('template_directory').'/images/loginbg.jpg\').load(function(){'."\n";
		echo '	resizeImage(\'bg\');'."\n";
		echo '	jQuery(window).bind("resize", function() { resizeImage(\'bg\'); });'."\n";
		echo '	jQuery(\'.loading\').fadeOut();'."\n";
		echo '});';
		echo '</script>'."\n";
	}
	add_action('login_footer', 'custom_html');

//后台登陆数学验证码
function myplugin_add_login_fields() {
	global $num1;
	global $num2;
	$num1=rand(0,9);
	$num2=rand(0,9);
	echo "<p><label for='math' class='small'>验证码</label> $num1 + $num2 = ?<input type='text' name='sum' class='input' value='' size='25' tabindex='4'></p>";
}
add_action('login_form','myplugin_add_login_fields');

function login_val() {
	global $num1;
	global $num2;
	$out='<script type="text/javascript">$(\'#wp-submit\').unbind("click").click( function() {var num1=parseInt('.$num1.'); var num2=parseInt('.$num2.'); var input = $("input[name=\'sum\']").val(); if("" == input) { alert(\'请输入验证码!\'); return false; } else if (num1+num2 != input) { alert(\'错误: 验证码错误,请重试!\'); return false; } });</script>'."\n";
	$out = $out.'<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/login_input.js"></script>'."\n";
	$out = $out.'<link href="'.get_bloginfo('template_directory').'/inc/css/login_input.css" type="text/css" rel="stylesheet"/>'."\n";
	echo $out;
}
add_action('login_footer','login_val');

function download($atts, $content = null) {  
	return '<a class="download" href="'.$content.'" rel="external"  
	target="_blank" title="下载地址">  
	<span><i class="iconfont down">&#xe60a;</i>Download</span></a>';
}  
add_shortcode("download", "download"); 

//后台HTML编辑器中加入自定义按钮
add_action('after_wp_tiny_mce', 'bolo_after_wp_tiny_mce');  
function bolo_after_wp_tiny_mce($mce_settings) {  
	?>  
	<script type="text/javascript">  
		QTags.addButton( 'download', '下载按钮', "[download]下载地址[/download]" );
	    QTags.addButton('hr', '横线', "<hr />\n");//添加横线
        QTags.addButton('h3', 'H3标签', "<h3>", "</h3>\n"); //添加标题3
        QTags.addButton('h4', 'H4标签', "<h4>", "</h4>\n"); //添加标题3
        QTags.addButton('sb', '上标', "<sup>", "</sup>");
        QTags.addButton('xb', '下标', "<sub>", "</sub>");
        QTags.addButton('shsj', '首行缩进', "&nbsp;&nbsp;");
        QTags.addButton('hc', '回车', "<br />");
        QTags.addButton('jz', '居中', "<center>", "</center>");
        QTags.addButton('mark', '黄字', "<mark>", "</mark>");
        QTags.addButton('xhx', '下划线', "<u>", "</u>");
        QTags.addButton('embed', '文章引用', "[mimelove_insert_post ids=文章id]");
	function bolo_QTnextpage_arg1() {
	}  
	</script>  
	<?php 
} 

function add_editor_buttons($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cut';
	$buttons[] = 'undo';
	$buttons[] = 'image';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	$buttons[] = 'wp_page';
	$buttons[] = 'charmap';
	return $buttons;
}
add_filter("mce_buttons", "add_editor_buttons");

//添加更多的HTML标签支持
// function fb_change_mce_options($initArray) {
// 	$ext = 'pre[id|name|class|style],iframe[align|longdesc|
// 	name|width|height|frameborder|scrolling|marginheight|
// 	marginwidth|src]';  //注意：格式为“标签一[属性一|属性二],标签二[属性一|属性二|属性三]”
// 	if ( isset( $initArray['extended_valid_elements'] ) ) {
// 		$initArray['extended_valid_elements'] .= ',' . $ext;
// 	} else {
// 		$initArray['extended_valid_elements'] = $ext;
// 	}
// 	return $initArray;
// }
// add_filter('tiny_mce_before_init', 'fb_change_mce_options');

//让编辑器支持中文拼写检查
// function fb_mce_external_languages($initArray){
// 	$initArray['spellchecker_languages'] = '+Chinese=zh,
// 	English=en'; 
// 	return $initArray;
// }
// add_filter('tiny_mce_before_init', 'fb_mce_external_languages');

//评论邮件回复
function comment_mail_notify($comment_id){
    $comment = get_comment($comment_id);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $spam_confirmed = $comment->comment_approved;
    if(($parent_id != '') && ($spam_confirmed != 'spam')){
    $wp_email = 'webmaster@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '你在 [' . get_option("blogname") . '] 的留言有了回应';
    $message = '
    <table border="1" cellpadding="0" cellspacing="0" width="600" align="center" style="border-collapse: collapse; border-style: solid; border-width: 1;border-color:#ddd;">
	<tbody>
          <tr>
            <td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" height="48" >
                    <tbody><tr>
                        <td width="100" align="center" style="border-right:1px solid #ddd;">
                            <a href="'.home_url().'/" target="_blank">'. get_option("blogname") .'</a></td>
                        <td width="300" style="padding-left:20px;"><strong>您有一条来自 <a href="'.home_url().'" target="_blank" style="color:#6ec3c8;text-decoration:none;">' . get_option("blogname") . '</a> 的回复</strong></td>
						</tr>
					</tbody>
				</table>
			</td>
          </tr>
          <tr>
            <td  style="padding:15px;"><p><strong>' . trim(get_comment($parent_id)->comment_author) . '</strong>, 你好!</span>
              <p>你在《' . get_the_title($comment->comment_post_ID) . '》的留言:</p><p style="border-left:3px solid #ddd;padding-left:1rem;color:#999;">'
        . trim(get_comment($parent_id)->comment_content) . '</p><p>
              ' . trim($comment->comment_author) . ' 给你的回复:</p><p style="border-left:3px solid #ddd;padding-left:1rem;color:#999;">'
        . trim($comment->comment_content) . '</p>
        <center ><a href="' . htmlspecialchars(get_comment_link($parent_id)) . '" target="_blank" style="background-color:#6ec3c8; border-radius:10px; display:inline-block; color:#fff; padding:15px 20px 15px 20px; text-decoration:none;margin-top:20px; margin-bottom:20px;">点击查看完整内容</a></center>
</td>
          </tr>
          <tr>
            <td align="center" valign="center" height="38" style="font-size:0.8rem; color:#999;">Copyright © '.get_option("blogname").'</td>
          </tr>
		  </tbody>
  </table>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
  }
}
add_action('comment_post', 'comment_mail_notify');

//新建说说功能 
add_action('init', 'my_custom_init');
function my_custom_init() {
	
	$labels = array( 'name' => '说说',
	'singular_name' => '说说', 
	'add_new' => '发表说说', 
	'add_new_item' => '发表说说',
	'edit_item' => '编辑说说', 
	'new_item' => '新说说',
	'view_item' => '查看说说',
	'search_items' => '?索说说', 
	'not_found' => '暂无说说',
	'not_found_in_trash' => '没有已遗弃的说说',
	'parent_item_colon' => '', 'menu_name' => '说说' );

	$args = array( 'labels' => $labels,
	'public' => true, 
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true, 
	'exclude_from_search' =>true,
	'query_var' => true, 
	'rewrite' => true, 'capability_type' => 'post',
	'has_archive' => false, 'hierarchical' => false, 
	'menu_position' => null, 'supports' => array('editor','author','title', 'custom-fields', 'comments', 'thumbnail') );
	register_post_type('shuoshuo',$args); 
}

//新建专利 
add_action('init', 'my_custom_init_zl');
function my_custom_init_zl() {
	
	$labels = array( 'name' => '专利',
	'singular_name' => '专利', 
	'add_new' => '发表专利', 
	'add_new_item' => '发表专利',
	'edit_item' => '编辑专利', 
	'new_item' => '新专利',
	'view_item' => '查看专利',
	'search_items' => '?索专利', 
	'not_found' => '暂无专利',
	'not_found_in_trash' => '没有已遗弃的专利',
	'parent_item_colon' => '', 'menu_name' => '专利' );

	$args = array( 'labels' => $labels,
	'public' => true, 
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true, 
	'exclude_from_search' =>true,
	'query_var' => true, 
	'rewrite' => true, 'capability_type' => 'post',
	'has_archive' => false, 'hierarchical' => false, 
	'menu_position' => null, 'supports' => array('editor','author','title', 'custom-fields', 'comments') );
	register_post_type('patents',$args); 
}

//新建论文 
add_action('init', 'my_custom_init_lw');
function my_custom_init_lw() {
	
	$labels = array( 'name' => '论文',
	'singular_name' => '论文', 
	'add_new' => '发表论文', 
	'add_new_item' => '发表论文',
	'edit_item' => '编辑论文', 
	'new_item' => '新论文',
	'view_item' => '查看论文',
	'search_items' => '检索论文', 
	'not_found' => '暂无论文',
	'not_found_in_trash' => '没有已遗弃的论文',
	'parent_item_colon' => '', 'menu_name' => '论文' );

	$args = array( 'labels' => $labels,
	'public' => true, 
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true, 
	'exclude_from_search' =>true,
	'query_var' => true, 
	'rewrite' => true, 'capability_type' => 'post',
	'has_archive' => false, 'hierarchical' => false, 
	'menu_position' => null, 'supports' => array('editor','author','title', 'custom-fields', 'comments') );
	register_post_type('articles',$args); 
}

//开源贡献 
add_action('init', 'my_custom_init_ky');
function my_custom_init_ky() {
	
	$labels = array( 'name' => '开源',
	'singular_name' => '开源', 
	'add_new' => '发表开源', 
	'add_new_item' => '发表开源',
	'edit_item' => '编辑开源', 
	'new_item' => '新开源',
	'view_item' => '查看开源',
	'search_items' => '?索开源', 
	'not_found' => '暂无开源',
	'not_found_in_trash' => '没有已遗弃的开源',
	'parent_item_colon' => '', 'menu_name' => '开源' );

	$args = array( 'labels' => $labels,
	'public' => true, 
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true, 
	'exclude_from_search' =>true,
	'query_var' => true, 
	'rewrite' => true, 'capability_type' => 'post',
	'has_archive' => false, 'hierarchical' => false, 
	'menu_position' => null, 'supports' => array('editor','author','title', 'custom-fields', 'comments') );
	register_post_type('opensource',$args); 
}

function my_custom_init_footer() {
	echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/script.js"></script>'."\n";
	echo '<script type="text/javascript" color="230,116,116" opacity="0.8" zIndex="-2" count="100" src="//cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js"></script>';
	if(is_home() && !is_paged()) {
		echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/rainyday.js"></script>'."\n";
			
	} else if (is_single()) {
		// echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/prettify.js"></script>'."\n";
		// echo '<link href="'.get_bloginfo('template_directory').'/inc/css/atelier-savanna-dark.min.css" type="text/css" rel="stylesheet" />'."\n";
		// echo '<script type="text/javascript">prettyPrint();</script>'."\n";

	} else if (is_page('about')) {
		echo "<link href='//cdn.webfont.youziku.com/webfonts/nomal/99620/47031/58c0cc66f629d800d46249e4.css' rel='stylesheet' type='text/css' />"."\n";
		// echo "<link href='//cdn.webfont.youziku.com/webfonts/nomal/99620/149/58c0dc7ef629d800d46249f3.css' rel='stylesheet' type='text/css' />"."\n";
		echo '<script type="text/javascript"> $youziku.load("#fu-headtitle", "9e2d7e6400ba4cf387db3dab06e8aabb", "zsxsbainianjnb"); /*$youziku.load("#id1,.class1,h1", "9e2d7e6400ba4cf387db3dab06e8aabb", "zsxsbainianjnb");*/ /*．．．*/ $youziku.draw();</script>'."\n";
	}
}
add_action('wp_footer','my_custom_init_footer');

function my_custom_init_header() {
	echo '<link rel="icon" href="'.get_bloginfo('template_directory').'/images/favicon.png" type="image/x-icon">'."\n";
	echo '<link rel="Bookmark" href="'.get_bloginfo('template_directory').'/images/favicon.png">'."\n";
	if (is_page('about')) {
		echo '<script type="text/javascript" src="http://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js"></script>'."\n";
	}
}
add_action('wp_head','my_custom_init_header');
/*
 * 禁用快速编辑功能
 * 否则会导致 Markdown 格式的文章内容变为 HTML 代码
 */
// add_filter( 'post_row_actions', 'power_remove_row_actions', 10, 2 );
// function power_remove_row_actions( $actions )
// {
//     if( get_post_type() === 'post' ) {
//     unset( $actions['inline hide-if-no-js'] );
//     }
//     return $actions;
// }

//修改头像服务器到多说
function mytheme_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );

//代码页面调用codepretty
function Crayon_Resources($content) {
    $pre = "/(prettyprint)/";
    if(preg_match_all($pre, $content, $matches) && is_single()) {
        $content.= '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/prettify.js"></script>'."\n".
					'<link href="'.get_bloginfo('template_directory').'/inc/css/atelier-estuary-light.min.css" type="text/css" rel="stylesheet" />'."\n".'<script type="text/javascript">prettyPrint();</script>';
    }
    return $content;
}
add_filter( "the_content", "Crayon_Resources");


// 函数作用：取得文章的阅读次数
function post_views($before = '', $after = '', $echo = 1) {
    global $post;
    $post_ID = $post->ID;
    $views = (int) get_post_meta($post_ID, 'views', true);
    if ($echo)
        echo $before, number_format($views), $after;
    else
        return $views;
}

//后台可视化编辑器模式下直接预览日志内容的编排
add_editor_style('/inc/css/editor-style.css');

/*
为特定文章添加特定css最简单的方式.
*/
/*添加自定义CSS的meta box*/
add_action('admin_menu', 'cwp_add_my_custom_css_meta_box');
/*保存自定义CSS的内容*/
add_action('save_post', 'cwp_save_my_custom_css');
/*将自定义CSS添加到特定文章(适用于Wordpress中文章、页面、自定义文章类型等)的头部*/
add_action('wp_head','cwp_insert_my_custom_css');
function cwp_add_my_custom_css_meta_box() {
	add_meta_box('my_custom_css', '自定义CSS', 'cwp_output_my_custom_css_input_fields', 'post', 'normal', 'high');
	add_meta_box('my_custom_css', '自定义CSS', 'cwp_output_my_custom_css_input_fields', 'page', 'normal', 'high');
}
function cwp_output_my_custom_css_input_fields() {
	global $post;
	echo '<input type="hidden" name="my_custom_css_noncename" id="my_custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="my_custom_css" id="my_custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_my_custom_css',true).'</textarea>';
}
function cwp_save_my_custom_css($post_id) {
	if (!wp_verify_nonce($_POST['my_custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$my_custom_css = $_POST['my_custom_css'];
	update_post_meta($post_id, '_my_custom_css', $my_custom_css);
}
function cwp_insert_my_custom_css() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
		echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_my_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}

//code end 


