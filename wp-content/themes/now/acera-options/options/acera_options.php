<?php 


$all_pages = get_pages();
$page_list = array();

foreach ($all_pages as $page) {
	$page_title = get_page($page->ID);
	$page_list[] = $page_title->post_title;
}

$options = array(

	/**
	*
	* General Settings
	*
	**/
	
	array(
		"type"     => "section",
		"icon"     => "acera-icon-home",
		"title"    => "常规设置",
		"id"       => "general",
		"expanded" => "true"
	),	




	/**
	*
	* General
	*
	**/

	array(
		"section" => "general",
		"type"    => "heading",
		"title"   => "常规设置",
		"id"      => "general-visual"
	),

	array(
		"under_section" => "general-visual",
		"type"          => "text",
		"name"          => "标题分隔符",
		"id"            => "now_titleseparator",
		"desc"          => "用于文章以及其他标题的分隔符 (例如 '-' => 首页 - 页面名称 )",
		"default"       => ""
	),

	array(
		"under_section" => "general-visual",
		"type"          => "text",
		"name"          => "<strong>谷歌分析</strong>",
		"placeholder"   => "UA-XXXXX-X",
		"id"            => "now_googleanalytics_api",
		"desc"          => "粘贴你的谷歌分析代码到这儿，具体代码需要到谷歌分析配置页面获取（谷歌分析类似百度统计）"
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "禁用触摸手势",
		"id"            => array("now_touchgestures"),
		"options"       => array("Disable"),
		"desc"          => "选中此选项将打开边栏禁用滑动手势。",
		"default"       => array("not")
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "开启固定头部",
		"id"            => array("now_fixed_header"),
		"options"       => array("Enable"),
		"desc"          => "在滚动时头部将保持固定",
		"default"       => array("not")
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "开启搜索",
		"id"            => array("now_search_form"),
		"options"       => array("Enable"),
		"desc"          => "这将显示搜索图标在首页和博客页面的右上角。",
		"default"       => array("not")
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "在页面启用评论",
		"options"       => array("Enable"),
		"id"            => array("now_comments_page"),
		"default"       => array("not"),
		"desc"          => "选择你将在常规页面开启评论"
	),

	array(
		"under_section" => "general-visual",
		"type"          => "small_heading",
		"title"         => "主题图片相关",
	),

	array(
		"under_section" => "general-visual",
		"type"          => "image",
		"placeholder"   => "http://www.ymjihe.com/logo.png",
		"name"          => "LOGO图片",
		"id"            => "now_logo",
		"desc"          => "粘贴一个图片的URL或者选择上传一个LOGO图片。 (高：<code>96px</code> 最长宽度：<code>640px</code>)",
		"default"       => ""
	),

	array(
		"under_section" => "general-visual",
		"type"          => "image",
		"placeholder"   => "http://www.ymjihe.com/favicon.png",
		"name"          => "Favicon",
		"id"            => "now_favicon",
		"desc"          => "粘贴一个图片的URL或者上传一张图片，分辨率为：<code>32x32</code>",
		"default"       => ""
	),




	/**
	*
	* iOS Webapp Settings
	*
	**/

	array(
	    "type"    => "heading",
	    "section" => "general",
	    "id"      => "general-webapp",
	    "title"   => "iOS的Webapp设置",
	),

	array(
		"under_section" => "general-webapp",
		"type"          => "small_heading",
		"title"         => "Icons图标",
	),

	array(
	    "type"                => "checkbox",
	    "under_section"       => "general-webapp",
	    "id"                  => array("now_appleicon_enable"),
	    "name"                => "启用 Webapp icons图标",
	    "options"             => array("Enable"),
	    "desc"                => "启用将显示ICON图标的上传选项。",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => array("not")
	),

	array(
	    "type"                => "toggle_div_start",
	    "under_section"       => "general-webapp",
	    "display_checkbox_id" => "now_appleicon_enable",
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_57",
	    "name"                => "Icon <strong>57x57</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>57x57px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_72",
	    "name"                => "Icon <strong>72x72</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>72x72px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_76",
	    "name"                => "Icon <strong>76x76</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>76x76px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_114",
	    "name"                => "Icon <strong>114x114</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>114x114px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_120",
	    "name"                => "Icon <strong>120x120</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>120x120px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_144",
	    "name"                => "Icon <strong>144x144</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>144x144px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_152",
	    "name"                => "Icon <strong>152x152</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>152x152px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"          => "toggle_div_end",
	    "under_section" => "general-webapp",
	),

	array(
		"under_section" => "general-webapp",
		"type"          => "small_heading",
		"title"         => "启动画面",
	),

	array(
	    "type"                => "checkbox",
	    "under_section"       => "general-webapp",
	    "id"                  => array("now_applesplash_enable"),
	    "name"                => "开启启动画面",
	    "options"             => array("Enable"),
	    "desc"                => "启用将显示启动画面的图片上传选项。",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => array("not")
	),

	array(
	    "type"                => "toggle_div_start",
	    "under_section"       => "general-webapp",
	    "display_checkbox_id" => "now_applesplash_enable",
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_iphone_460",
	    "name"                => "启动图片 <strong>320x460</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为： <code>320x460px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_iphone_940",
	    "name"                => "启动图片 <strong>640x920</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>640x920px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_iphone_1096",
	    "name"                => "启动图片 <strong>640x1096</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>640x1096px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_748",
	    "name"                => "启动图片 <strong>1024x748</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>1024x748px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_1004",
	    "name"                => "启动图片 <strong>768x1004</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>768x1004px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_1496",
	    "name"                => "启动图片 <strong>2048x1496</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>2048x1496px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_2008",
	    "name"                => "启动图片 <strong>1536x2008</strong>",
	    "desc"                => "上传图片或者粘贴一个图片的URL，图片的像素为：<code>1536x2008px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"          => "toggle_div_end",
	    "under_section" => "general-webapp",
	),




	/**
	*
	* SEO
	*
	**/
	
	array(
	    "type"    => "heading",
	    "section" => "general",
	    "id"      => "general-seo",
	    "title"   => "搜索引擎优化",
	),

	array(
	    "type"                => "textarea",
	    "under_section"       => "general-seo",
	    "id"                  => "now_seo_keywords",
	    "name"                => "关键词",
	    "desc"                => "关键词使用在head的<code>keywords meta 标签</code>中, 使用英文逗号来分割你的关键词。",
	    "placeholder"         => "源码集合, ymjihe.com, ymjihe",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),
	
	array(
	    "type"                => "text",
	    "under_section"       => "general-seo",
	    "id"                  => "now_seo_author",
	    "name"                => "作者",
	    "desc"                => "作者名称使用在 <code>author meta 标签</code>中。",
	    "placeholder"         => "ymjihe",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),




	/**
	*
	* Code Integration
	*
	**/
	
	array(
		"section" => "general",
		"type"    => "heading",
		"title"   => "代码整合",
		"id"      => "general-general"
	),

	array(
		"under_section" => "general-general",
		"type"          => "checkbox",
		"name"          => "<strong>让这些集成</strong>",
		"id"            => array("now_codeintegration_css", "now_codeintegration_childcss", "now_codeintegration_js"),
		"options"       => array("Custom css", "Child Stylesheet", "Custom Javascript"),
		"desc"          => "选择将在下面填写您要使用的代码集成。",
		"default"       => array("not", "not", "not", "not")
	),

	array(
		"under_section"       => "general-general",
		"type"                => "textarea",
		"name"                => "自定义 css",
		"display_checkbox_id" => "now_codeintegration_css",
		"placeholder"         => "h1 { color: white; }",
		"id"                  => "now_code_css",
		"desc"                => "这里是你的自定义css.",
	),

	array(
		"under_section"       => "general-general",
		"type"                => "text",
		"display_checkbox_id" => "now_codeintegration_childcss",
		"name"                => "子主题样式",
		"id"                  => "now_code_childcss",
		"desc"                => "输入的子样式表的URL来显示。",
		"placeholder"         => "http://www.ymjihe.com/stylesheet.css"
	),

	array(
		"under_section"       => "general-general",
		"type"                => "textarea",
		"display_checkbox_id" => "now_codeintegration_js",
		"name"                => "自定义 JavaScript",
		"id"                  => "now_code_js",
		"desc"                => "输入你的自定义javascript.",
		"placeholder"         => "var test;"
	),


	

	/**
	*
	* Layout Settings
	*
	**/
	
	array(
		"type"     => "section",
		"icon"     => "acera-icon-window",
		"title"    => "布局设置",
		"id"       => "layout",
		"expanded" => "true"
	),




	/**
	*
	* Sidebar Settings
	*
	**/

	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "自定义首页页面",
		"id"      => "layout-homepage"
	),

	array(
	    "type" => "select",
		"under_section" => "layout-homepage",
	    "id"      => "now_custom_homepage_id",
	    "name"    => "选择首页",
	    "options" => $page_list,
	    "desc"    => "选择你想要展示的页面作为你的网站首页。 这个功能只能使用在，你的主题仅作为桌面主题使用，你想要为手机主题开启不同的首页，只能使用这个切换功能。(此处翻译略蛋疼。自己琢磨下。原文：This feature should be only use if you're using this theme along with your desktop theme using theme switcher and you want to enable different homepage for the mobile theme. 
) 选择你的新首页之后, 使用FTP进入到你的主题文件夹并且重命名<strong>_front-page.php</strong> 文件为 <strong>front-page.php</strong>.",
	),


	

	/**
	*
	* Sidebar Settings
	*
	**/

	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "侧边栏",
		"id"      => "layout-sidebar"
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "checkbox",
		"name"          => "显示联系人信息",
		"options"       => array("Show"),
		"id"            => array("now_contact_enable"),
		"default"       => array("not"),
		"desc"          => "开启将显示联系人信息在<code>主题的侧边栏</code>，上面主要导航。"
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "image",
		"name"          => "图片",
		"id"            => "now_contact_photo",
		"desc"          => "联系图片将显示在<code>主题的侧边栏</code>."
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "text",
		"name"          => "昵称",
		"id"            => "now_contact_name",
		"desc"          => "联系人昵称将显示在<code>主题的侧边栏</code>."
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "text",
		"name"          => "E-mail",
		"id"            => "now_contact_mail",
		"desc"          => "联系人email将显示在<code>主题的侧边栏</code>, 在名字的下面。"
	),




	/**
	*
	* Blog
	*
	**/
	
	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "博客页面",
		"id"      => "layout-blog"
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "small_heading",
		"title"         => "博客常规设置",
	),

	array(
	    "type" => "select",
		"under_section" => "layout-blog",
	    "id"      => "now_loading_animation",
	    "name"    => "载入动画",
	    "options" => array("Opacity", "Scale up", "Scale down", "Rotate up Left", "Rotate down Left", "Rotate up Right", "Rotate down Right", "Slide from left", "Slide from right", "Slide up", "Slide down"),
	    "desc"    => "你想为新文章选择哪个载入动画并显示在首页或者博客页面模板中",
	    "default" => "Scale up"
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "博客时间格式",
		"id"            => "now_blog_dateformat",
		"desc"          => "定义你的自定义日期格式显示在博客文章中。<br />查看 <a href=\"http://codex.wordpress.org/Formatting_Date_and_Time\">时间日期格式</a>",
		"placeholder"   => "M, j Y",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "分类分隔符",
		"id"            => "now_blog_categorysep",
		"desc"          => "定义你的分类自定义分隔符(默认: ,)",
		"placeholder"   => " ,",
	),

	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "每页文章数量",
		"id"            => "now_blog_posts",
		"desc"          => "设置博客页面模板的文章显示数量(最少1个)",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "small_heading",
		"title"         => "博客社会化分享图标",
	),

	array(
		"under_section" => "layout-blog",
		"type"          => "checkbox",
		"name"          => "社会化分享图标组",
		"options"       => array("Twitter", "Facebook", "Google+"),
		"id"            => array("now_blogshare_twitter", "now_blogshare_facebook", "now_blogshare_google"),
		"default"       => array("checked", "checked", "checked"),
		"desc"          => "开启将显示在你文章底部的社交网络分享链接。"
	),

	array(
	    "type"          => "textarea",
	    "under_section" => "layout-blog",
	    "id"            => "now_blogshare_desc",
	    "name"          => "自定义描述",
	    "desc"          => "自定义描述使用twitter和facebook的分享链接。 你可以使用这些占位符- <code>%site_name%</code>, <code>%url%</code>, <code>%title%</code>",
	    "placeholder"   => "%title% on %url% via #%site_name%",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "small_heading",
		"title"         => "博客评论",
	),

	array(
		"under_section" => "layout-blog",
		"type"          => "checkbox",
		"name"          => "禁用博客评论",
		"options"       => array("Hide"),
		"id"            => array("now_comments_disable"),
		"default"       => array("not"),
		"desc"          => "勾选将禁用博客评论在这个手机主题上。"
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "评论日期格式",
		"id"            => "now_comment_dateformat",
		"desc"          => "定义显示在评论中的自定义时间格式。<br />查看 <a href=\"http://codex.wordpress.org/Formatting_Date_and_Time\">时间日期格式</a>",
		"placeholder"   => "M, j Y",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "管理员评论高亮",
		"id"            => "now_comment_admin",
		"desc"          => "如果你想高亮管理员的昵称， 请在这里写下管理员的昵称并用英文逗号分隔开。",
		"placeholder"   => "wpmee,admin,Admin,John Doe,User",
	),




	/**
	*
	* Contact
	*
	**/
	
	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "联系页面",
		"id"      => "layout-contact"
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "联系页面布局",
	),

	array(
	    "type" => "select",
		"under_section" => "layout-contact",
	    "id"      => "now_googlemaps_layout",
	    "name"    => "地图类型",
	    "options" => array("Google Maps API", "Google Maps Iframe", "Do not show Map"),
	    "desc"    => "选择你想显示在联系页面的地图类型",
	    "default" => "Do not show Map"
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "谷歌地图 API",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "经度",
		"id"            => "now_googlemaps_long",
		"desc"          => "粘贴你地图的经度, 你可以使用 <a href=\"http://www.gorissen.info/Pierre/maps/googleMapLocation.php\">http://www.gorissen.info/Pierre/maps/googleMapLocation.php</a> 来获取你的经度或者纬度。",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "纬度",
		"id"            => "now_googlemaps_lat",
		"desc"          => "粘贴你地图的纬度, 你可以使用<a href=\"http://www.gorissen.info/Pierre/maps/googleMapLocation.php\">http://www.gorissen.info/Pierre/maps/googleMapLocation.php</a> 来获取你的经度或者纬度。",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "Google Maps API Key",
		"id"            => "now_googlemaps_api",
		"desc"          => "使用联系人API页面模板，请提供您的谷歌地图API的key。",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "谷歌地图框架",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "Google Maps Iframe",
		"id"            => "now_googlemaps_iframe",
		"desc"          => "粘贴一个由谷歌地图生成的到你的位置的iframe。",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "联系表单",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "checkbox",
		"name"          => "禁用联系表单?",
		"id"            => array("now_contact_form"),
		"options"       => array("Hide"),
		"desc"          => "如果你不想在你的联系页面显示联系表单，开启将禁用联系表单。",
		"default"       => array("not")
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "联系 e-mail",
		"id"            => "now_contact_form_mail",
		"desc"          => "请提供联系人的电子邮件，管理员电子邮件是默认的。",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "自定义主题",
		"id"            => "now_contact_form_subject",
		"desc"          => "自定义主题, 你可以使用这些占位符 - <code>%sender_name%</code>, <code>%sender_email%</code>",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "自定义正文",
		"id"            => "now_contact_form_content",
		"desc"          => "自定义正文, 你可以使用这些占位符 - <code>%sender_text%</code>, <code>%sender_name%</code>, <code>%sender_email%</code>",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "checkbox",
		"name"          => '隐藏 "消息发送成功" 对话框',
		"id"            => array("now_contact_form_dialog"),
		"options"       => array("Hide"),
		"desc"          => " 如果你不想显示消息发送成功之后的对话框，开启将隐藏。",
		"default"       => array("not")
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "自定义发送成功信息",
		"id"            => "now_contact_form_dialog_content",
		"desc"          => "编写一个自定义的消息，将显示在电子邮件发送成功后的提示框。你可以使用 <code>HTML</code>标签",
	),




	/**
	*
	* Appearance Settings
	*
	**/
	
	array(
		"type"     => "section",
		"icon"     => "acera-icon-font",
		"title"    => "外观设置",
		"id"       => "appearance",
		"expanded" => "true"
	),	




	/**
	*
	* General
	*
	**/

	array(
		"section" => "appearance",
		"type"    => "heading",
		"title"   => "视觉样式",
		"id"      => "appearance-color"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "radio_image",
		"show_labels"   => "false",
		"name"          => "原色",
		"id"            => "acera_theme_color",
		"options"       => array(
			"#fecd60,#febd2c",
			"#f87e56,#f65924",
			"#e57871,#d16e68",
			"#fc2e56,#f21d47",
			"#b85e7e,#d12664",
			"#5957d6,#4e4cc7",
			"#167bfb,#1575f0",
			"#37a1ce,#339ac7",
			"#3dabda,#2491bf",
			"#5faaa7,#4a8a88",
			"#7dad83,#609767",
			"#a4c400,#97b402",
			"#60a918,#60a918",
			"#fb9537,#eb8529",
			"#f472d0,#e462c0",
			"#825b2d,#765125",
			"#7a3c40,#6f363a",
			"#647687,#4c5f71",
			"#86794e,#786c42",
			"#00aba9,#009694",
			),
		"image_src" => array(
			get_template_directory_uri() . "/acera-options/" . "assets/c_yellow.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_orange.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_red.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkred.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_purple.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_violet.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkblue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_blue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_lightblue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_bluegreen.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_green.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_lime.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkgreen.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_amber.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_pink.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_brown.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_sienna.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_steel.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_taupe.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_teal.png",
			),
		"desc"       => "自定义你的主题颜色",
		"image_size" => array("80"),
		"default"    => "#3dabda,#2491bf"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "radio_image",
		"show_labels"   => "false",
		"name"          => "二次颜色",
		"id"            => "acera_theme_color_secondary",
		"options"       => array(
			"#fecd60",
			"#f87e56",
			"#e57871",
			"#fc2e56",
			"#b85e7e",
			"#5957d6",
			"#167bfb",
			"#37a1ce",
			"#3dabda",
			"#5faaa7",
			"#7dad83",
			"#a4c400",
			"#60a918",
			"#fb9537",
			"#f472d0",
			"#825b2d",
			"#7a3c40",
			"#647687",
			"#86794e",
			"#00aba9",
			),
		"image_src" => array(
			get_template_directory_uri() . "/acera-options/" . "assets/c_yellow.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_orange.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_red.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkred.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_purple.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_violet.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkblue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_blue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_lightblue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_bluegreen.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_green.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_lime.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkgreen.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_amber.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_pink.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_brown.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_sienna.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_steel.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_taupe.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_teal.png",
			),
		"desc"       => "选择自定义二次颜色，可以在博客类别",
		"image_size" => array("80"),
		"default"    => "#fb9537"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "radio_image",
		"show_labels"   => "false",
		"name"          => "头部颜色",
		"id"            => "acera_theme_color_header",
		"options"       => array(
			"#fecd60",
			"#f87e56",
			"#e57871",
			"#fc2e56",
			"#b85e7e",
			"#5957d6",
			"#167bfb",
			"#37a1ce",
			"#3dabda",
			"#5faaa7",
			"#7dad83",
			"#a4c400",
			"#60a918",
			"#fb9537",
			"#f472d0",
			"#825b2d",
			"#7a3c40",
			"#647687",
			"#86794e",
			"#00aba9",
			),
		"image_src" => array(
			get_template_directory_uri() . "/acera-options/" . "assets/c_yellow.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_orange.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_red.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkred.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_purple.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_violet.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkblue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_blue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_lightblue.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_bluegreen.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_green.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_lime.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_darkgreen.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_amber.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_pink.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_brown.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_sienna.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_steel.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_taupe.png",
			get_template_directory_uri() . "/acera-options/" . "assets/c_teal.png",
			),
		"desc"       => "选择自定义二次颜色，可以在博客类别",
		"image_size" => array("80"),
		"default"    => "#fb9537"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "text",
		"name"          => "标题的透明度",
		"placeholder"   => "100",
		"id"            => "now_header_transparency",
		"desc"          => "插入一个不透明的头部的值（你可以使用它与固定头部，默认值是100，有效值为0-100）"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "small_heading",
		"title"         => "自定义颜色",
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "checkbox",
		"name"          => "启用自定义颜色",
		"id"            => array("now_enable_custom_colors"),
		"options"       => array("Enable"),
		"desc"          => "开启自定义主题颜色, 如果启用，选择颜色从下面的颜色选择器。",
		"default"       => array("not")
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "自定义原色",
		"id"                  => "now_custom_colors_primary",
		"desc"                => "选择自定义的原色",
		"display_checkbox_id" => "now_enable_custom_colors"
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "自定义主要活跃的颜色",
		"id"                  => "now_custom_colors_primary_a",
		"desc"                => "选择主要的活跃的自定义颜色",
		"display_checkbox_id" => "now_enable_custom_colors"
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "自定义第二颜色",
		"id"                  => "now_custom_colors_secondary",
		"desc"                => "选择自定义次要颜色，可以在博客类别",
		"display_checkbox_id" => "now_enable_custom_colors"
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "自定义标题的颜色",
		"id"                  => "now_custom_colors_header",
		"desc"                => "选择你自定义的头部颜色",
		"display_checkbox_id" => "now_enable_custom_colors"
	),
	
	array(
		"section" => "appearance",
		"type"    => "heading",
		"title"   => "自定义字体",
		"id"      => "appearance-fonts"
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "checkbox",
		"name"          => "<strong>标题字体</strong>",
		"id"            => array( "now_fonts_1" ),
		"options"       => array("Enable"),
		"desc"          => "开启自定义标题字体。",
		"default"       => array("not")),

	array(
		"type"                => "toggle_div_start",
		"display_checkbox_id" => "now_fonts_1",
		"under_section"       => "appearance-fonts",
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "标题字体链接",
		"id"            => "now_fonts_1_link",
		"desc"          => "请粘贴谷歌字体链接作为你的字体。",
		"placeholder"   => "<link href='Google font' rel='stylesheet' type='text/css'>"),


	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "标题字体 - font-family",
		"placeholder"   => "font-family: 'Arial', sans-serif;",
		"id"            => "now_fonts_1_css",
		"desc"          => "请粘贴字体的font-family CSS属性。"),

	array(
		"type"          => "toggle_div_end",
		"under_section" => "appearance-fonts",
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "checkbox",
		"name"          => "<strong>内容字体</strong>",
		"id"            => array( "now_fonts_2" ),
		"options"       => array("Enable"),
		"desc"          => "开启自定义内容字体",
		"default"       => array("not")),
	array(
		"type"                => "toggle_div_start",
		"display_checkbox_id" => "now_fonts_2",
		"under_section"       => "appearance-fonts",
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "内容的字体链接",
		"id"            => "now_fonts_2_link",
		"desc"          => "请粘贴谷歌字体链接作为你的字体。",
		"placeholder"   => "<link href='Google font' rel='stylesheet' type='text/css'>"),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "内容的主题 - font-family",
		"placeholder"   => "font-family: 'Arial', sans-serif;",
		"id"            => "now_fonts_2_css",
		"desc"          => "请粘贴字体的font-family CSS属性。",),

	array(
		"type"          => "toggle_div_end",
		"under_section" => "appearance-fonts",
	),
);

?>