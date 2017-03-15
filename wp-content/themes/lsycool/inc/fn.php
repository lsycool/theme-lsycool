<?php

function customizer_css() {
    ?>
	<style type="text/css">
<?php 
// Style Settings
if ( akina_option('shownav') == true) { ?>
	.site-top ul {
    opacity: 1 !important;
}
    .site-top .show-nav {
		display:none !important; 
	}   
<?php }?>

<?php 
// slider
if ( akina_option('head_focus') == true) { ?>
	.headertop{
    display: none !important;
}
<?php }?>

<?php 
// liststyle
if ( akina_option('list_type') == 'square') { ?>
	.feature img{
    border-radius: 0px; !important;
}
    .feature i {
	border-radius: 0px; !important;	
	}
<?php }?>

<?php 
// menu
if ( akina_option('toggle-menu') == 'no') { ?>
  .comments .comments-main {
	  		  display:block !important
  }
  .comments .comments-hidden {
	   display:none !important
  }
<?php }?>

<?php 
// like
if ( akina_option('post_like') == 'no') { ?>
  .post-like {
	  		  display:none !important
  }
<?php }?>

<?php 
// share
if ( akina_option('post_share') == 'no') { ?>
  .post-share {
	  		  display:none !important
  }
<?php }?>

<?php 
// nextpre
if ( akina_option('post_nepre') == 'no') { ?>
  .post-squares {
	  		  display:none !important
  }
<?php }?>

<?php 
// nextpre
if ( akina_option('author_profile') == 'no') { ?>
  .author-profile {
	  		  display:none !important
  }
<?php }?>

<?php 
  
if ( akina_option('post_header') == true) { ?>
	h1.entry-title  { color: <?php echo akina_option('post_header'); ?>;}
<?php 
}?>

<?php 
// notice
if ( akina_option('head_notice') == '0') { ?>
  .notice {
	  		  display:none !important
  }
<?php }?>

<?php 
// preloader
if ( akina_option('preloader') == 'no') { ?>
  #loading {
		display:none !important
	}
	@keyframes fade-in {  
    0% {opacity: 0;}/*初始状态 透明度为0*/  
    40% {opacity: 0;}/*过渡状态 透明度为0*/  
    100% {opacity: 1;}/*结束状态 透明度为1*/  
}  
@-webkit-keyframes fade-in {/*针对webkit内核*/  
    0% {opacity: 0;}  
    40% {opacity: 0;}  
    100% {opacity: 1;}  
}  
.wrapper {    
    animation: fade-in;/*动画名称*/  
    animation-duration: 0.5s;/*动画持续时间*/  
    -webkit-animation:fade-in 0.5s;/*针对webkit内核*/  
}  
#progress {
	display:block !important
}
<?php }?>

<?php 
// search
if ( akina_option('top_search') == 'no') { ?>
  .searchbox {
	  display:none !important
  }

<?php }?>

<?php 
// headerbg
if ( akina_option('focus_img') == true ) { ?>
  #centerbg {
  background-image: url(<?php echo akina_option('focus_img');?>)
  }
<?php }?>

<?php 
// theme-skin
  
if ( akina_option('theme_skin') == true) { ?>
	.post-more i , .author-profile i , .sub-text , .we-info a , span.sitename , #pagination a:hover{ color: #<?php echo akina_option('theme_skin'); ?> }
	.feature i , .feature-title span , .download , ::-webkit-scrollbar-thumb , .navigator i:hover , .links ul li:before , .ar-time i , span.ar-circle , .object , #progress{ background: #<?php echo akina_option('theme_skin'); ?> }
	.download , .navigator i:hover , .link-title , .links ul li:hover ,#pagination a:hover { border-color: #<?php echo akina_option('theme_skin'); ?> }
	.entry-content a:hover , .site-info a:hover , .comment h4 a:hover , .site-top ul li a:hover , .entry-title a:hover , #archives-temp h3 , span.page-numbers.current , .sorry li a:hover , .site-title a:hover{ color: #<?php echo akina_option('theme_skin'); ?> }
<?php }?>

<?php 
// pagenav-style
if ( akina_option('pagenav_style') == 'np') { ?>
	.navigator {
	display:block !important
}
    #pagination {
		display:none !important
	}
<?php }?>

<?php 
// youset-logo
if ( akina_option('youset_logo') == true) { ?>
	.we-youset {
    background-image: url(<?php echo akina_option('youset_logo'); ?>);
}
<?php }?>

	</style>
    <?php
}
add_action('wp_head', 'customizer_css');

//标题翻译
abstract class Translate{
    function curlRequest($url, $header = array(), $postData = ''){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        if (!empty($postData)) {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($postData) ? http_build_query($postData) : $postData);
        }
        $curlResponse = curl_exec($ch);
        $curlErrno = curl_errno($ch);
        if ($curlErrno) {
            $curlError = curl_error($ch);
            throw new Exception($curlError);
        }
        curl_close($ch);
        return $curlResponse;
    }
    abstract function translate($text);
};

class BingTranslator extends Translate{
    private $_clientID = 'itbobotranslate';
    private $_clientSecret = '/V2wGk57hwAHkVwyDbgyAsVuJRaDlJACZn7fxvikF8c=';
    private $_fromLanguage = 'zh-CHS';
    private $_toLanguage = 'en';

    private $_authUrl = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
    private $_scopeUrl = "http://api.microsofttranslator.com";
    private $_grantType = "client_credentials";
    private $_via = 0;

    function __construct($via = 0){
        $this->_via = empty($via) ? 0 : $via;
    }
    public function setLocal($loc){
        $this->_fromLanguage = $loc;
    }
    public function setToLanguange($to){
        $this->_toLanguage = $to;
    }
    public function translate($inputStr){
      return $this->_viaApi($inputStr);
    }

    private function _getTokens(){
        try{
            $postData = array(
                'grant_type' => $this->_grantType,
                'scope' => $this->_scopeUrl,
                'client_id' => $this->_clientID,
                'client_secret' => $this->_clientSecret
            );
            $header = array('User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:6.0.1) Gecko/20100101 Firefox/6.0.1');
            $response = $this->curlRequest($this->_authUrl, $header, $postData);
            $jsonObj = json_decode($response);
            return $jsonObj->access_token;
        }
    catch(Exception $e){
            echo "Exception-" . $e->getMessage();
        }
    }

    private function _viaApi($inputStr){
        $params = "appId=&text=" . urlencode($inputStr) . "&to=" . $this->_toLanguage . "&from=" . $this->_fromLanguage;
        $translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
        $accessToken = $this->_getTokens();
        $authHeader = "Authorization: Bearer " . $accessToken;
        $header = array($authHeader, "Content-Type: text/xml");
        $curlResponse = $this->curlRequest($translateUrl, $header);
    
        $xmlObj = simplexml_load_string($curlResponse);
        $translatedStr = '';
        foreach ((array)$xmlObj[0] as $val) {
            $translatedStr = $val;
        }

        return $translatedStr;
    }
};

function wp_slug_translate($postID){
    global $wpdb;
    $tableposts = $wpdb->posts ;
    $sql = "SELECT post_title,post_name FROM $tableposts WHERE ID=$postID";
    $res = $wpdb->get_results($sql);  
    $post_title = $res[0]->post_title;
    $post_name = $res[0]->post_name;

    if( sanitize_title($post_title) != $post_name ) {
      if( !substr_count($post_name,'%') )
        return true;
    }
    
    $bing= new BingTranslator();
    $wst_title = sanitize_title( $bing->translate($post_title) );
    if( strlen($wst_title) < 2 ) {
      $wst_title = $postID;
    }
    
    $sql ="UPDATE ".$tableposts." SET `post_name` = '".$wst_title."' WHERE ID =$postID;";   
    $res = $wpdb->query($sql);
};


/*
*ajax点赞
*/
add_action('wp_ajax_nopriv_specs_zan', 'specs_zan');
add_action('wp_ajax_specs_zan', 'specs_zan');
function specs_zan(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
        $specs_raters = get_post_meta($id,'specs_zan',true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('specs_zan_'.$id,$id,$expire,'/',$domain,false);
        if (!$specs_raters || !is_numeric($specs_raters)) {
            update_post_meta($id, 'specs_zan', 1);
        } 
        else {
            update_post_meta($id, 'specs_zan', ($specs_raters + 1));
        }
        echo get_post_meta($id,'specs_zan',true);
    } 
    die;
}


function get_the_link_items($id = null){
    $bookmarks = get_bookmarks('orderby=date&category=' .$id );
    $output = '';
    if ( !empty($bookmarks) ) {
        $output .= '<ul class="link-items fontSmooth">';
        foreach ($bookmarks as $bookmark) {
            $output .=  '<li class="link-item"><a class="link-item-inner effect-apollo" href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" ><span class="sitename">'. $bookmark->link_name .'</span><div class="linkdes">'. $bookmark->link_description .'</div></a></li>';
        }
        $output .= '</ul>';
    }
    return $output;
}

function get_link_items(){
    $linkcats = get_terms( 'link_category' );
    if ( !empty($linkcats) ) {
        foreach( $linkcats as $linkcat){            
            $result .=  '<h3 class="link-title">'.$linkcat->name.'</h3>';
            if( $linkcat->description ) $result .= '<div class="link-description">' . $linkcat->description . '</div>';
            $result .=  get_the_link_items($linkcat->term_id);
        }
    } else {
        $result = get_the_link_items();
    }
    return $result;
}

function shortcode_link(){
    return get_link_items();
}
add_shortcode('bigfalink', 'shortcode_link');

//图片七牛云缓存
add_filter( 'upload_dir', 'wpjam_custom_upload_dir' );
function wpjam_custom_upload_dir( $uploads ) {
	$upload_path = '';
	$upload_url_path = akina_option('qiniu_cdn');

	if ( empty( $upload_path ) || 'wp-content/uploads' == $upload_path ) {
		$uploads['basedir']  = WP_CONTENT_DIR . '/uploads';
	} elseif ( 0 !== strpos( $upload_path, ABSPATH ) ) {
		$uploads['basedir'] = path_join( ABSPATH, $upload_path );
	} else {
		$uploads['basedir'] = $upload_path;
	}

	$uploads['path'] = $uploads['basedir'].$uploads['subdir'];

	if ( $upload_url_path ) {
		$uploads['baseurl'] = $upload_url_path;
		$uploads['url'] = $uploads['baseurl'].$uploads['subdir'];
	}
	return $uploads;
}

//删除自带小工具
function unregister_default_widgets() {
unregister_widget("WP_Widget_Pages");
unregister_widget("WP_Widget_Calendar");
unregister_widget("WP_Widget_Archives");
unregister_widget("WP_Widget_Links");
unregister_widget("WP_Widget_Meta");
unregister_widget("WP_Widget_Search");
unregister_widget("WP_Widget_Text");
unregister_widget("WP_Widget_Categories");
unregister_widget("WP_Widget_Recent_Posts");
unregister_widget("WP_Widget_Recent_Comments");
unregister_widget("WP_Widget_RSS");
unregister_widget("WP_Widget_Tag_Cloud");
unregister_widget("WP_Nav_Menu_Widget");
}
add_action("widgets_init", "unregister_default_widgets", 11);

  



