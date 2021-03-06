<?php
  $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
  $wp_load = $absolute_path[0] . 'wp-load.php';
  require_once($wp_load);

  /* Custom Heading Font */
  if(get_option( 'now_fonts_1', 'false' ) == 'true'){
    $ff_heading = get_option('now_fonts_1_css') ? get_option('now_fonts_1_css') : "font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;";
  } else {
    $ff_heading = "font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;";
  }
  $ff_heading = stripslashes($ff_heading);

  /* Custom Body Font */
  if(get_option( 'now_fonts_2', 'false' ) == 'true'){
    $ff_body = get_option('now_fonts_2_css') ? get_option('now_fonts_2_css') : "font-family: 'Open Sans', 'Helvetica Neue', sans-serif;";
  } else {
    $ff_body = "font-family: 'Open Sans', 'Helvetica Neue', sans-serif;";
  }
  $ff_body = stripslashes($ff_body);

  /* Secondary Colors */
  if ((get_option('now_enable_custom_colors', 'false') == 'true') && (get_option('now_custom_colors_secondary'))) {
    $secondaryColor = "#" . get_option('now_custom_colors_secondary');
  } else {
    $secondaryColor = get_option('acera_theme_color_secondary') ? get_option('acera_theme_color_secondary') : '#fb9537';
  }

  /* Primary Colors */
  if ((get_option('now_enable_custom_colors', 'false') == 'true') && (get_option('now_custom_colors_primary_a')) && (get_option('now_custom_colors_primary'))) {
    $c_primary = "#" . get_option('now_custom_colors_primary');
    $c_primaryActive = "#" . get_option('now_custom_colors_primary_a');
  } else {
    $primaryColors = get_option('acera_theme_color') ? get_option('acera_theme_color') : '#3dabda,#2491bf';
    $primaryColors = explode(',', $primaryColors);
    $c_primary = $primaryColors[0];
    $c_primaryActive = $primaryColors[1];
  }

  /* Header Opacity */
  if ((get_option('now_enable_custom_colors', 'false') == 'true') && (get_option('now_custom_colors_header'))) {
    $c_header = get_option('now_custom_colors_header');
  } else {
    $c_header = get_option('acera_theme_color_header') ? get_option('acera_theme_color_header') : '3dabda';
    $c_header = "#" . $c_header;
  }

  $header_opacity = get_option('now_header_transparency') ? get_option('now_header_transparency') : 100;
  $header_opacity = 'rgba(' . hex2rgb($c_header, $header_opacity) . ')';

  header('Content-type: text/css');
  header('Cache-control: must-revalidate');
?>


/* Text Align */
.text-left {
  text-align: left; }

.text-right {
  text-align: right; }

.text-center {
  text-align: center; }

/* Content Align */
.align-right, .alignright {
  float: right;
  *zoom: 1; }
  .align-right:before, .align-right:after, .alignright:before, .alignright:after {
    content: " ";
    display: table; }
  .align-right:after, .alignright:after {
    clear: both; }

.align-left, .alignleft {
  float: left;
  *zoom: 1; }
  .align-left:before, .align-left:after, .alignleft:before, .alignleft:after {
    content: " ";
    display: table; }
  .align-left:after, .alignleft:after {
    clear: both; }

.wrapped-content .alignleft {
  margin-right: 12px;
  margin-bottom: 12px;
  margin-top: 12px; }

.wrapped-content .alignright {
  margin-left: 12px;
  margin-bottom: 12px;
  margin-top: 12px; }

/* Clearfix */
.clear-fix {
  clear: both; }

/* Margins */
.no-margin {
  margin: 0; }

.no-margin-bottom {
  margin-bottom: 0 !important; }

/* Modules */
.flex-video {
  width: 100%;
  position: relative;
  padding: 0;
  padding-top: 56.27659574468085%; }

.flex-video iframe,
.flex-video object,
.flex-video embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; }

.bg-light {
  background: white; }

.bg-dark {
  background: #f3f3f3; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Styles
*
**/
html, body, p {
  color: #6b6b6b;
  font-weight: 400;
  font-size: 14px;
  min-height: 100%;
  font-family: 'Open Sans', 'Helvetica Neue', sans-serif; }

p {
  margin: 1em 0;
  line-height: 1.7; }

strong {
  font-weight: 600; }

blockquote, blockquote p {
  margin: 20px 10px;
  color: #3dabda;
  font-weight: 300;
  font-size: 20px;
  line-height: 1.4; }

cite {
  display: block;
  margin-top: 10px;
  margin-right: 20px;
  margin-left: 14px;
  color: #6b6b6b;
  text-align: right;
  font-size: 18px; }

i, cite, em, var, address, dfn {
  font-style: italic; }

u, ins {
  text-decoration: underline; }

s, strike, del {
  text-decoration: line-through; }

abbr[title] {
  border-bottom: 1px dashed #6b6b6b; }

kbd {
  font-weight: bold; }

code, kbd, pre {
  padding: 2px 3px;
  border: 1px solid #f0f0f0;
  background-color: #f5f2f0;
  color: #e14828;
  font-size: 12px;
  font-family: "Monaco", "Menlo", monospace; }

var {
  color: #e14828;
  font-size: 12px;
  font-family: "Monaco", "Menlo", monospace; }

pre {
  padding: 10px 15px;
  line-height: 1.6;
  overflow: auto;
  white-space: pre; }

.subheader {
  color: #3dabda; }

#content h2:first-child {
  margin-top: .5em; }

h1, h2, h3, h4, h5, h6 {
  color: #333333;
  font-weight: 300;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;  line-height: 1.3; }

h1 {
  margin-top: .8em;
  margin-bottom: .5em;
  font-size: 28px; }
  h1.subheader {
    font-size: 24px; }

h2 {
  margin-top: .8em;
  margin-bottom: .5em;
  font-size: 24px; }
  h2.subheader {
    font-size: 22px; }

h3 {
  margin-top: 0.9em;
  margin-bottom: 0.5em;
  font-size: 22px; }
  h3.subheader {
    font-size: 20px; }

h4 {
  margin-top: .7em;
  margin-bottom: 0.5em;
  font-size: 18px; }
  h4.subheader {
    font-size: 15px; }

h5 {
  margin-top: .8em;
  margin-bottom: 0.5em;
  font-size: 15px; }
  h5.subheader {
    font-size: 14px; }

h6 {
  margin-top: 1em;
  margin-bottom: 0.5em;
  font-size: 14px; }
  h6.subheader {
    font-size: 12px; }

a {
  color: #3dabda;
  text-decoration: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }
  a:hover {
    color: #2491bf; }

hr {
  margin: 20px 0;
  border-top: 1px solid #f3f3f3;
  border-right: none;
  border-bottom: none;
  border-left: none; }

address {
  line-height: 1.6; }

.hero-text {
  margin: 50px 10px; }
  .hero-text h2 {
    margin: 8px 0;
    text-align: center;
    font-weight: 400;
    font-size: 26px;
    line-height: 1; }
  .hero-text .subtitle {
    margin: 0;
    text-align: center;
    font-weight: 300;
    font-size: 18px; }

/* Buttons */
input[type="submit"], input[type="reset"], input[type="button"], .button {
  line-height: 1.6; }

.button, button, input[type="submit"], input[type="reset"], input[type="button"] {
  box-shadow: none;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  display: inline-block;
  margin: 5px 5px 5px 0;
  padding: 13px 32px;
  border: none;
  background: #3dabda;
  color: #fff;
  text-align: center;
  font-weight: 400;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }
  .button:hover, .button.hover, button:hover, button.hover, input[type="submit"]:hover, input[type="submit"].hover, input[type="reset"]:hover, input[type="reset"].hover, input[type="button"]:hover, input[type="button"].hover {
    color: #fff; }
  .button.full-width, button.full-width, input[type="submit"].full-width, input[type="reset"].full-width, input[type="button"].full-width {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%; }
  .button.radius, button.radius, input[type="submit"].radius, input[type="reset"].radius, input[type="button"].radius {
    border-radius: 3px; }
  .button.round, button.round, input[type="submit"].round, input[type="reset"].round, input[type="button"].round {
    border-radius: 1000px; }
  .button.secondary, button.secondary, input[type="submit"].secondary, input[type="reset"].secondary, input[type="button"].secondary {
    box-shadow: 0 0 0 1px #eaeaea inset;
    background: none;
    color: #b7b7b7; }
    .button.secondary.hover, button.secondary.hover, input[type="submit"].secondary.hover, input[type="reset"].secondary.hover, input[type="button"].secondary.hover {
      background: #eaeaea;
      color: #b7b7b7 !important; }
  .button:active, button:active, input[type="submit"]:active, input[type="reset"]:active, input[type="button"]:active {
    box-shadow: none; }
  .button.green, button.green, input[type="submit"].green, input[type="reset"].green, input[type="button"].green {
    background: #7dad83; }
  .button.bluegreen, button.bluegreen, input[type="submit"].bluegreen, input[type="reset"].bluegreen, input[type="button"].bluegreen {
    background: #5eaaa7; }
  .button.lightblue, button.lightblue, input[type="submit"].lightblue, input[type="reset"].lightblue, input[type="button"].lightblue {
    background: #3dabda; }
  .button.lightpurple, button.lightpurple, input[type="submit"].lightpurple, input[type="reset"].lightpurple, input[type="button"].lightpurple {
    background: #de4c81; }
  .button.blue, button.blue, input[type="submit"].blue, input[type="reset"].blue, input[type="button"].blue {
    background: #36a1ce; }
  .button.yellow, button.yellow, input[type="submit"].yellow, input[type="reset"].yellow, input[type="button"].yellow {
    background: #fecd5f; }
  .button.orange, button.orange, input[type="submit"].orange, input[type="reset"].orange, input[type="button"].orange {
    background: #f87e55; }
  .button.grey, button.grey, input[type="submit"].grey, input[type="reset"].grey, input[type="button"].grey {
    background: #e6e7e7; }
  .button.red, button.red, input[type="submit"].red, input[type="reset"].red, input[type="button"].red {
    background: #e57871; }
  .button.success, button.success, input[type="submit"].success, input[type="reset"].success, input[type="button"].success {
    background: #c5d87e; }
    .button.success.hover, button.success.hover, input[type="submit"].success.hover, input[type="reset"].success.hover, input[type="button"].success.hover {
      background: #b8d063; }
  .button.alert, button.alert, input[type="submit"].alert, input[type="reset"].alert, input[type="button"].alert {
    background: #fc7e78; }
    .button.alert.hover, button.alert.hover, input[type="submit"].alert.hover, input[type="reset"].alert.hover, input[type="button"].alert.hover {
      background: #fc5c55; }
  .button.disabled, button.disabled, input[type="submit"].disabled, input[type="reset"].disabled, input[type="button"].disabled {
    background: #e98c87; }
    .button.disabled.hover, button.disabled.hover, input[type="submit"].disabled.hover, input[type="reset"].disabled.hover, input[type="button"].disabled.hover {
      background: #e98c87; }
  .button.hover, button.hover, input[type="submit"].hover, input[type="reset"].hover, input[type="button"].hover {
    background: #34393d;
    color: #fff !important; }
  .button.rounded, button.rounded, input[type="submit"].rounded, input[type="reset"].rounded, input[type="button"].rounded {
    border-radius: 9999px; }
  .button.radius, button.radius, input[type="submit"].radius, input[type="reset"].radius, input[type="button"].radius {
    border-radius: 3px; }
  .button.large, button.large, input[type="submit"].large, input[type="reset"].large, input[type="button"].large {
    font-size: 20px; }
  .button.small, button.small, input[type="submit"].small, input[type="reset"].small, input[type="button"].small {
    font-size: 11px; }
  .button.tiny, button.tiny, input[type="submit"].tiny, input[type="reset"].tiny, input[type="button"].tiny {
    padding: 8px 25px;
    font-size: 10px; }

/* Lists */
.inline-list {
  padding: 0; }
  .inline-list li {
    display: inline;
    padding-right: 20px;
    list-style-type: none; }
    .inline-list li:last-child {
      padding-right: 0px; }

ul, ol {
  padding-left: 30px; }
  ul li, ol li {
    line-height: 1.7; }

.no-bullet {
  padding-left: 10px;
  list-style: none; }

dl {
  line-height: 1.7; }
  dl dt {
    margin-top: 15px;
    margin-bottom: 3px;
    font-weight: 600; }
  dl dd {
    margin-left: 0;
    margin-left: 10px; }

/* Icons */
.icon-twitter {
  color: #37b9e1; }

.icon-facebook {
  color: #3e649e; }

.icon-dribbble {
  color: #de4c81; }

.icon-youtube {
  color: #c6484a; }

.icon-rss {
  color: #f18334; }

.icon-google {
  color: #e57871; }

/* Widgets */
.widget {
  margin: 40px 0 25px; }
  .widget h3 {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 15px;
    line-height: 1.6; }

/**
*
* Animations
*
**/
/* Animation Durations and easings */
.csstransitions .button, .csstransitions button {
  -webkit-transition: background 0.2s ease-in-out;
  -moz-transition: background 0.2s ease-in-out;
  transition: background 0.2s ease-in-out; }
.csstransitions a {
  -webkit-transition: color 0.2s ease-in-out;
  -moz-transition: color 0.2s ease-in-out;
  transition: color 0.2s ease-in-out; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Mixins
*
**/
/**
*
* Layout
*
**/
/* General Styles */
body {
  background-color: #f3f3f3; }

body.increase-height,
.increase-height #sidemenu-container.active,
.increase-height #content-container {
  padding-bottom: 80px;
}

#content {
  position: relative; }

.wrapped-content {
  padding: 25px 25px;
  z-index: 2;
  position: relative; }
  .wrapped-content p:last-child {
    margin-bottom: 0; }

.hero {
  height: 300px;
  width: 100%; }
  .hero.small {
    height: 200px; }
  .hero.big {
    height: 400px; }
  .hero.medium {
    height: 300px; }

img {
  max-width: 100%;
  height: auto;
  vertical-align: middle;
  display: inline-block; }

.wrapped-content img, .wp-caption img, .wp-caption {
  max-width: 100% !important;
  height: auto;
  vertical-align: middle;
  display: inline-block; }

.wp-caption-text {
  color: #9b9b9b;
  padding: 0 5px;
  text-align: center;
  margin-top: 5px;
  margin-bottom: 0;
  font-size: 13px; }

.featured-image {
  width: 100%;
  height: auto; }

/* Blog */
.read-more {
  margin-bottom: 0; }

.share-widget a {
  margin: 0 20px; }

.blog article {
  background: #fff;
  margin: 20px 15px 40px;
  padding: 0;
  overflow: hidden;
  position: relative; }
  .blog article .title {
    text-transform: uppercase;
    font-size: 12px;
    margin: 0;
    *zoom: 1; }
    .blog article .title:before, .blog article .title:after {
      content: " ";
      display: table; }
    .blog article .title:after {
      clear: both; }
    .blog article .title .category {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
      max-width: 80%;
      display: inline-block;
      line-height: 1; }
    .blog article .title .category, .blog article .title .category a {
      color: #fb9537; }
    .blog article .title .time {
      float: right;
      color: #b4b4b4; }
  .blog article h2.blog-title {
    margin: 13px 0 0;
    font-size: 20px; }
  .blog article h2 a {
    color: #333333; }
    .blog article h2 a:hover {
      color: #3dabda; }
  .blog article p:first-child {
    margin-top: 0; }
.blog .format-quote {
  background: #3dabda;
  color: #fff; }
  .blog .format-quote .icon-bg {
    color: #2491bf; }
  .blog .format-quote blockquote {
    margin: 10px 8px;
    color: #fff; }
.blog .format-link .featured-link {
  font-weight: 300;
  font-size: 20px; }
.blog .format-link .link-description {
  color: #6b6b6b;
  margin-bottom: 0; }
.blog .format-link .icon-bg {
  color: #f3f3f3; }
.blog .format-link p:last-child {
  margin-bottom: 0; }
.blog .format-aside p:last-child {
  margin-bottom: 0; }
.blog .format-aside .icon-bg {
  color: #f3f3f3; }

.first-child p:first-child {
  margin-top: 0; }

.last-child p:last-child {
  margin-top: 0; }

.blog-single article {
  margin: 0; }
  .blog-single article h2.blog-title {
    margin: 13px 0 0;
    font-size: 24px; }

.icon-bg {
  position: absolute;
  top: -35px;
  right: -40px;
  z-index: 1;
  font-size: 120px;
  line-height: 0;
  opacity: .8; }

.comments {
  *zoom: 1; }
  .comments:before, .comments:after {
    content: " ";
    display: table; }
  .comments:after {
    clear: both; }
  .comments .mark-text a {
    color: #e57871; }
  .comments .comment-respond {
    margin-bottom: 20px; }
  .comments .children {
    margin-top: -20px;
    position: relative; }
  .comments .bypostauthor .comments-meta-name, .comments .bypostauthor .comments-meta-name a {
    color: #e57871; }
  .comments ul {
    margin: 30px 0 -20px 0;
    padding: 0;
    list-style: none; }
    .comments ul li:last-child {
      margin-bottom: 0; }
    .comments ul li {
      position: relative;
      margin-bottom: 50px;
      padding-top: 30px; }
    .comments ul ul {
      margin-bottom: 0;
      margin-left: 15px; }
    .comments ul li.has-subcomments li:last-child {
      margin-bottom: 0; }
    .comments ul li.has-subcomments .comments-content-container:last-child {
      margin-bottom: 0; }
  .comments .avatar {
    position: absolute;
    z-index: 10;
    border-radius: 9999px;
    width: 60px;
    height: 60px;
    top: 0;
    left: 25px;
    display: inline-block; }
  .comments .comments-content {
    position: relative;
    z-index: 5;
    text-align: left; }
    .comments .comments-content p:last-child {
      margin-bottom: 0; }
    .comments .comments-content ul, .comments .comments-content ol {
      padding-left: 30px;
      margin: 0; }
      .comments .comments-content ul li, .comments .comments-content ol li {
        line-height: 1.7;
        margin: 0;
        padding: 0; }
    .comments .comments-content ul {
      list-style-type: disc; }
  .comments .comments-meta-name {
    color: #333333;
    font-weight: 600; }
  .comments .comments-content-container {
    *zoom: 1;
    top: 80px;
    z-index: 1;
    background: #fff;
    padding: 25px 25px;
    margin-bottom: 55px;
    margin-left: 0; }
    .comments .comments-content-container:before, .comments .comments-content-container:after {
      content: " ";
      display: table; }
    .comments .comments-content-container:after {
      clear: both; }
  .comments .comments-meta {
    margin-top: 20px;
    color: #9e9e9e;
    font-size: 14px;
    border-bottom: 1px solid #f3f3f3;
    padding-bottom: 14px; }
  .comments .icon-bg {
    color: #f3f3f3; }

.comment-respond {
  background: #fff;
  padding: 25px 25px;
  z-index: 2;
  position: relative; }
  .comment-respond input, .comment-respond textarea, .comment-respond #comment {
    max-width: 100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box; }
  .comment-respond label {
    display: block; }
  .comment-respond hr {
    margin-top: 24px; }
  .comment-respond form {
    margin-bottom: 0; }
  .comment-respond #text {
    height: 240px; }
  .comment-respond .button {
    margin-bottom: 0; }
  .comment-respond input[type="submit"] {
    border-radius: 3px; }

/* Gallery Styles */
.gallery-container {
  *zoom: 1;
  margin: 0;
  padding: 3px; }
  .gallery-container:before, .gallery-container:after {
    content: " ";
    display: table; }
  .gallery-container:after {
    clear: both; }
  .gallery-container a {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    display: block;
    float: left;
    width: 50%;
    line-height: 0;
    padding: 3px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-touch-callout: none; }
    .gallery-container a.hover {
      opacity: .65; }
  .gallery-container img {
    width: 100%;
    height: auto; }
  .gallery-container.two-column a {
    width: 50%; }
  .gallery-container.three-column a {
    width: 33.33%; }
  .gallery-container.four-column a {
    width: 25%; }

/* Contact */
#contact-form {
  margin-top: 85px; }

/* Forms */
input[type="email"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="url"], input[type="color"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="time"], input[type="week"], textarea {
  box-shadow: none;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background 0.3s ease-in-out;
  margin: 3px 0 0;
  padding: 10px 10px;
  border: none;
  border-radius: 0;
  background: #eeeeee;
  color: #6b6b6b;
  -webkit-appearance: none;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }
  input[type="email"]:focus, input[type="number"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="text"]:focus, input[type="url"]:focus, input[type="color"]:focus, input[type="date"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, textarea:focus {
    box-shadow: none;
    outline: none; }
  input[type="email"]:hover, input[type="number"]:hover, input[type="password"]:hover, input[type="search"]:hover, input[type="tel"]:hover, input[type="text"]:hover, input[type="url"]:hover, input[type="color"]:hover, input[type="date"]:hover, input[type="datetime"]:hover, input[type="datetime-local"]:hover, input[type="month"]:hover, input[type="time"]:hover, input[type="week"]:hover, textarea:hover {
    background: #f3f3f3; }

.full-width {
  width: 100%;
  height: auto; }
  .full-width input[type="email"], .full-width input[type="number"], .full-width input[type="password"], .full-width input[type="search"], .full-width input[type="tel"], .full-width input[type="text"], .full-width input[type="url"], .full-width input[type="color"], .full-width input[type="date"], .full-width input[type="datetime"], .full-width input[type="datetime-local"], .full-width input[type="month"], .full-width input[type="time"], .full-width input[type="week"], .full-width textarea {
    width: 100%; }
  .full-width img {
    width: 100%;
    height: auto; }

form p {
  margin: 1.5em 0; }

.ui-state-error {
  background: #fededc !important; }

#loadMore {
  min-width: 75px; }

/**
*
* Animations
*
**/
/* Flickering Fix */
.csstransforms .gallery-container a {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden; }
.csstransforms .article-content {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden; }
.csstransforms .blog article {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden; 
  -webkit-perspective: 1000;
  -moz-perspective: 1000;
  -ms-perspective: 1000;
  perspective: 1000;

-webkit-transform: translate3d(0, 0, 0);
-moz-transform: translate3d(0, 0, 0);
-ms-transform: translate3d(0, 0, 0);
transform: translate3d(0, 0, 0); 
}

/* Animation Durations and easings */
.csstransitions .blog article {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s; }
.csstransitions .gallery-container a {
  -webkit-transition: all 0.15s;
  -moz-transition: all 0.15s;
  transition: all 0.15s; }
.csstransitions .article-content {
  -webkit-transition: all 0.25s;
  -moz-transition: all 0.25s;
  transition: all 0.25s; }
.csstransitions .loaded {
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  opacity: 0; }

/* Animations */
.csstransforms .slide-from-left article.toshow {
  -webkit-transform: scale(0.9, 0.9);
  -moz-transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9);
  -o-transform: scale(0.9, 0.9);
  transform: scale(0.9, 0.9);
  position: relative;

  -webkit-transform: translate(-100%, 0);
  -moz-transform: translate(-100%, 0);
  -ms-transform: translate(-100%, 0);
  -o-transform: translate(-100%, 0);
  transform: translate(-100%, 0);

  opacity: 0;
  timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -webkit-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -moz-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -ms-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1); }
.csstransforms .slide-from-left article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  opacity: 1;

  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
}
.csstransforms .slide-from-right article.toshow {
  -webkit-transform: scale(0.9, 0.9);
  -moz-transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9);
  -o-transform: scale(0.9, 0.9);
  transform: scale(0.9, 0.9);
  position: relative;

  -webkit-transform: translate(100%, 0);
  -moz-transform: translate(100%, 0);
  -ms-transform: translate(100%, 0);
  -o-transform: translate(100%, 0);
  transform: translate(100%, 0);
  opacity: 0;
  timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -webkit-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -moz-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -ms-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1); 
}
.csstransforms .slide-from-right article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  opacity: 1;

  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
}
.csstransforms .scale-up article.toshow {
  -webkit-transform: scale(0.9, 0.9);
  -moz-transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9);
  -o-transform: scale(0.9, 0.9);
  transform: scale(0.9, 0.9);
  position: relative;

  -webkit-transform: translate(0, 120px);
  -moz-transform: translate(0, 120px);
  -ms-transform: translate(0, 120px);
  -o-transform: translate(0, 120px);
  transform: translate(0, 120px);

  opacity: 0; }
.csstransforms .scale-up article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  opacity: 1;

  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);}
.csstransforms .scale-down article.toshow {
  -webkit-transform: scale(1.2, 1.2);
  -moz-transform: scale(1.2, 1.2);
  -ms-transform: scale(1.2, 1.2);
  -o-transform: scale(1.2, 1.2);
  transform: scale(1.2, 1.2);
  position: relative;

  -webkit-transform: translate(0, 120px);
  -moz-transform: translate(0, 120px);
  -ms-transform: translate(0, 120px);
  -o-transform: translate(0, 120px);
  transform: translate(0, 120px);

  opacity: 0; }
.csstransforms .scale-down article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  opacity: 1;

  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);}
.csstransforms .slide-up article.toshow {
  position: relative;

  -webkit-transform: translate(0, 120px);
  -moz-transform: translate(0, 120px);
  -ms-transform: translate(0, 120px);
  -o-transform: translate(0, 120px);
  transform: translate(0, 120px);

  opacity: 0; }
.csstransforms .slide-up article.shown {
  opacity: 1;

  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0); }
.csstransforms .slide-down article.toshow {
  position: relative;
  -webkit-transform: translate(0, -90px);
  -moz-transform: translate(0, -90px);
  -ms-transform: translate(0, -90px);
  -o-transform: translate(0, -90px);
  transform: translate(0, -90px);
  opacity: 0; }
.csstransforms .slide-down article.shown {
  opacity: 1;

  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0); }
.csstransforms .opacity article.toshow {
  opacity: 0; }
.csstransforms .opacity article.shown {
  opacity: 1; }
.csstransforms .rotate-down-right article.toshow {
  -webkit-transform: scale(1.2, 1.2);
  -moz-transform: scale(1.2, 1.2);
  -ms-transform: scale(1.2, 1.2);
  -o-transform: scale(1.2, 1.2);
  transform: scale(1.2, 1.2);
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  position: relative;
  opacity: 0; }
.csstransforms .rotate-down-right article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  -ms-transform: rotate(0);
  -o-transform: rotate(0);
  transform: rotate(0);
  opacity: 1;
}
.csstransforms .rotate-up-right article.toshow {
  -webkit-transform: scale(0.9, 0.9);
  -moz-transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9);
  -o-transform: scale(0.9, 0.9);
  transform: scale(0.9, 0.9);
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  position: relative;
  opacity: 0; }
.csstransforms .rotate-up-right article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  -ms-transform: rotate(0);
  -o-transform: rotate(0);
  transform: rotate(0);
  opacity: 1;}
.csstransforms .rotate-down-left article.toshow {
  -webkit-transform: scale(1.2, 1.2);
  -moz-transform: scale(1.2, 1.2);
  -ms-transform: scale(1.2, 1.2);
  -o-transform: scale(1.2, 1.2);
  transform: scale(1.2, 1.2);
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  position: relative;
  opacity: 0; }
.csstransforms .rotate-down-left article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  -ms-transform: rotate(0);
  -o-transform: rotate(0);
  transform: rotate(0);
  opacity: 1;}
.csstransforms .rotate-up-left article.toshow {
  -webkit-transform: scale(0.9, 0.9);
  -moz-transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9);
  -o-transform: scale(0.9, 0.9);
  transform: scale(0.9, 0.9);
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  position: relative;
  opacity: 0; }
.csstransforms .rotate-up-left article.shown {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  -ms-transform: rotate(0);
  -o-transform: rotate(0);
  transform: rotate(0);
  opacity: 1;
  top: 0; }
.csstransforms .gallery-container a.hover {
  -webkit-transform: scale(0.95, 0.95);
  -moz-transform: scale(0.95, 0.95);
  -ms-transform: scale(0.95, 0.95);
  -o-transform: scale(0.95, 0.95);
  transform: scale(0.95, 0.95); }
.csstransforms .gallery-container.two-column a.hover {
  -webkit-transform: scale(0.95, 0.95);
  -moz-transform: scale(0.95, 0.95);
  -ms-transform: scale(0.95, 0.95);
  -o-transform: scale(0.95, 0.95);
  transform: scale(0.95, 0.95); }
.csstransforms .gallery-container.three-column a.hover {
  -webkit-transform: scale(0.92, 0.92);
  -moz-transform: scale(0.92, 0.92);
  -ms-transform: scale(0.92, 0.92);
  -o-transform: scale(0.92, 0.92);
  transform: scale(0.92, 0.92); }
.csstransforms .gallery-container.four-column a.hover {
  -webkit-transform: scale(0.9, 0.9);
  -moz-transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9);
  -o-transform: scale(0.9, 0.9);
  transform: scale(0.9, 0.9); }
.csstransforms .loaded {
  -webkit-transform: scale(0, 0);
  -moz-transform: scale(0, 0);
  -ms-transform: scale(0, 0);
  -o-transform: scale(0, 0);
  transform: scale(0, 0); }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Mixins
*
**/
/**
*
* Sidebar
*
**/
#container {
  position: relative;
  top: 0;
  left: 0;
  z-index: 0;
  display: block;
  overflow: hidden;
  min-height: 100%;
  background: #FFFFFF; }

#content-container {
  position: relative;
  top: 0;
  left: 0;
  z-index: 2;
  margin: 0;
  height: 100%;
  background: white; }
  #content-container.light {
    background: white; }
  #content-container.dark {
    background: #f3f3f3; }

#sidemenu-container {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1;
  width: 260px;
  height: 100%;
  background: #34393d;
  color: #fff; }
  #sidemenu-container.active {
    overflow: scroll;
    -webkit-overflow-scrolling: touch; }

#nav-container {
    margin-bottom: 100px;
  }

.webapp #sidemenu {
  margin-top: 20px;
}

/* Sidebar Inner Styles */
.nav {
  margin: 0;
  padding: 0;
  list-style: none; }
  .nav li {
    position: relative;
    margin: 0;
    padding: 0; }
    .nav li.current-menu-item > a {
      background: #3dabda; }
  .nav a {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-touch-callout: none;
    position: relative;
    z-index: 1;
    display: block;
    padding: 0 10px 0 28px;
    min-height: 46px;
    color: #fff;
    font-size: 14px;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;    line-height: 46px; }
    .nav a.hover {
      background: #3dabda; }
  .nav ul {
    overflow: hidden;
    margin: 0;
    padding: 0;
    background: #404549; }
    .nav ul li {
      list-style: none; }
      .nav ul li a {
        padding: 0 10px 0 38px; }

.nav-child-container {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  width: 46px;
  height: 46px;
  color: #6b6b6b;
  text-align: center;
  font-weight: 300;
  font-size: 18px;
  line-height: 46px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  -webkit-touch-callout: none; }
  .nav-child-container.hover {
    background: #2491bf;
    color: #fff; }
  .nav-child-container.active {
    background: #fb9537 !important;
    color: #fff; }

.nav-child-trigger {
  display: inline-block; }

#author-profile {
  *zoom: 1;
  margin: 30px 0 20px;
  padding: 0 10px 0 28px; }
  #author-profile:before, #author-profile:after {
    content: " ";
    display: table; }
  #author-profile:after {
    clear: both; }
  #author-profile .author-profile-photo {
    width: 60px;
    height: 60px;
    float: left;
    border: 2px solid #fff;
    border-radius: 9999px; }
    #author-profile .author-profile-photo img {
      width: 60px;
      height: 60px;
      border-radius: 9999px; }
  #author-profile .author-profile-content {
    margin-top: 16px;
    padding-left: 75px; }
    #author-profile .author-profile-content .title {
      margin: 0;
      color: #fff;
      font-weight: 300;
      font-size: 18px;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;      line-height: 1.2; }
    #author-profile .author-profile-content .subtitle {
      margin: 0;
      color: #3dabda;
      font-weight: 300;
      font-size: 12px;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;      line-height: 1.3; }

/**
*
* Animations
*
**/
/* Flickering Fix */
.csstransforms #sidemenu, .csstransforms #content-container, .csstransforms .nav-child-trigger {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden; }

/* Animation Durations and easings */
.csstransitions #content-container, .csstransitions #sidemenu, .csstransitions .nav-child-trigger, .csstransitions .nav-child-container {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s; }
.csstransitions .nav-child-container {
  -webkit-transition: background 0.5s;
  -moz-transition: background 0.5s;
  transition: background 0.5s; }
.csstransitions .nav a {
  -webkit-transition: background 0.12s;
  -moz-transition: background 0.12s;
  transition: background 0.12s; }
.csstransitions .nav ul {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s; }

/* Animations */
.csstransforms .nav-child-container .nav-child-trigger {
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg); }
.csstransforms .nav-child-container.active .nav-child-trigger {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg); }
.csstransforms #content-container.active {
  -webkit-transform: translate(260px, 0);
  -moz-transform: translate(260px, 0);
  -ms-transform: translate(260px, 0);
  -o-transform: translate(260px, 0);
  transform: translate(260px, 0); }
.csstransforms #sidemenu, .csstransforms .nav ul {
  -webkit-transform: scale(0.8, 0.8);
  -moz-transform: scale(0.8, 0.8);
  -ms-transform: scale(0.8, 0.8);
  -o-transform: scale(0.8, 0.8);
  transform: scale(0.8, 0.8);
  opacity: 0; }
  .csstransforms #sidemenu.active, .csstransforms .nav ul.active {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
    opacity: 1; }

/* No Animations Enabled */
.no-csstransforms #content-container {
  left: 0; }
  .no-csstransforms #content-container.active {
    left: 260px; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Mixins
*
**/
/**
*
* Styles
*
**/
.fixed-header #header {
  z-index: 999; }

#header {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  -webkit-touch-callout: none;
  position: relative;
  z-index: 4;
  display: block;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 48px;
  background: rgba(55,161,206,1);
  color: #fff;
  font: 700px; }
  #header a {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-touch-callout: none;
    margin: 0;
    padding: 12px 25px;
    height: 48px;
    color: #fff;
    font-size: 14px;
    line-height: 49px; }
    #header a.hover {
      color: #34393d; }
  #header h1 {
    margin: 0;
    text-align: center;
    font-weight: bold;
    font-size: 14px;
  font-family: 'Open Sans', 'Helvetica Neue', sans-serif; }
  #header .icon-clock-1 {
    margin: 0 -1px; }


.header-button {
  position: absolute;
  top: 0;
  width: 55px;
  height: 48px;
  color: #fff;
  text-align: center;
  font-size: 24px;
  line-height: 48px;
  cursor: pointer; }
  .header-button.left {
    left: 0; }
  .header-button.right {
    right: 0; }
  .header-button.hover {
    color: #34393d; }

.webapp #header {
  padding-top: 20px;
}

.webapp .header-button {
  top: 20px;
}

#image-logo {
  text-align: center;
  display: block;
  height: 48px;
  width: 100%;
  line-height: 48px;
  margin: 0;
  padding: 0 !important; }

#image-logo a {
  line-height: 48px;
  margin: 0;
  padding: 0 !important;
  display: inline-block;
  height: 48px; }

#image-logo img {
  height: 48px;
  width: auto;
  display: inline-block; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Mark Text
*
**/
.required {
  color: #e57871; }

.mark-text {
  color: #3dabda; }
  .mark-text.green {
    color: #7dad83; }
  .mark-text.bluegreen {
    color: #5eaaa7; }
  .mark-text.lightblue {
    color: #3dabda; }
  .mark-text.lightpurple {
    color: #de4c81; }
  .mark-text.blue {
    color: #36a1ce; }
  .mark-text.yellow {
    color: #fecd5f; }
  .mark-text.orange {
    color: #f87e55; }
  .mark-text.grey {
    color: #e6e7e7; }
  .mark-text.red {
    color: #e57871; }
  .mark-text.success {
    color: #c5d87e; }
  .mark-text.disabled {
    color: #e98c87; }

mark {
  padding: 2px 3px;
  background: #92d0ea;
  color: #6b6b6b; }
  mark.green {
    background: #bcd4bf; }
  mark.bluegreen {
    background: #a1cdcb; }
  mark.lightblue {
    background: #92d0ea; }
  mark.lightpurple {
    background: #f6cddc; }
  mark.blue {
    background: #9dd1e7; }
  mark.yellow {
    background: #fee5ab; }
  mark.orange {
    background: #fcc8b7; }
  mark.grey {
    background: #e6e7e7; }
  mark.red {
    background: #eda19c; }
  mark.success {
    background: #c5d87e; }
  mark.disabled {
    background: #e98c87; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Progress
*
**/
.progress {
  background-color: transparent;
  height: 1.5625em;
  border: 1px solid #cccccc;
  padding: 0.125em;
  margin-bottom: 0.625em; }
  .progress .meter {
    background: #2ba6cb;
    height: 100%;
    display: block; }
  .progress.radius {
    border-radius: 3px; }
    .progress.radius .meter {
      border-radius: 2px; }
  .progress.round {
    border-radius: 1000px; }
    .progress.round .meter {
      border-radius: 999px; }

/* Colors */
.progress {
  padding: 0;
  height: 30px;
  border: none;
  background: #f3f3f3;
  color: #6b6b6b;
  font-weight: 600;
  font-size: 12px;
  line-height: 31px; }
  .progress .meter {
    background: #67bde2; }
  .progress.green .meter {
    background: #bcd4bf; }
  .progress.bluegreen .meter {
    background: #a1cdcb; }
  .progress.lightblue .meter {
    background: #92d0ea; }
  .progress.lightpurple .meter {
    background: #f6cddc; }
  .progress.blue .meter {
    background: #9dd1e7; }
  .progress.yellow .meter {
    background: #fee5ab; }
  .progress.orange .meter {
    background: #fcc8b7; }
  .progress.grey .meter {
    background: #e6e7e7; }
  .progress.red .meter {
    background: #eda19c; }
  .progress.success .meter {
    background: #cadb8a; }
  .progress.disabled .meter {
    background: #e98c87; }
  .progress.alert .meter {
    background: #fd8c87; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Progress
*
**/
/* Panel */
.panel {
  box-shadow: 0 0 0 1px #eaeaea inset;
  padding: 24px 25px;
  border: none;
  background: none;
  color: #6b6b6b;
  font-weight: 400;
  display: block;
  font-family: 'Open Sans', 'Helvetica Neue', sans-serif;  margin: 1em 0; }
  .panel.radius {
    border-radius: 3px; }
  .panel.round {
    border-radius: 1000px; }
  .panel p {
    color: #b7b7b7;
    font-size: 14px;
    margin: 0;
    line-height: 1.8; }
  .panel.alert {
    box-shadow: none;
    padding: 24px 25px;
    border: none;
    background: #fc7e78; }
    .panel.alert p {
      color: #fff; }
  .panel.green {
    box-shadow: none;
    background: #bcd4bf; }
    .panel.green p {
      color: #6b6b6b; }
  .panel.bluegreen {
    box-shadow: none;
    background: #a1cdcb; }
    .panel.bluegreen p {
      color: #6b6b6b; }
  .panel.lightblue {
    box-shadow: none;
    background: #92d0ea; }
    .panel.lightblue p {
      color: #6b6b6b; }
  .panel.lightpurple {
    box-shadow: none;
    background: #f6cddc; }
    .panel.lightpurple p {
      color: #6b6b6b; }
  .panel.blue {
    box-shadow: none;
    background: #9dd1e7; }
    .panel.blue p {
      color: #6b6b6b; }
  .panel.yellow {
    box-shadow: none;
    background: #fee5ab; }
    .panel.yellow p {
      color: #6b6b6b; }
  .panel.orange {
    box-shadow: none;
    background: #fcc8b7; }
    .panel.orange p {
      color: #6b6b6b; }
  .panel.grey {
    box-shadow: none;
    background: #e6e7e7; }
    .panel.grey p {
      color: #6b6b6b; }
  .panel.red {
    box-shadow: none;
    background: #eda19c; }
    .panel.red p {
      color: #6b6b6b; }
  .panel.success {
    box-shadow: none;
    background: #c5d87e; }
    .panel.success p {
      color: #6b6b6b; }
  .panel.disabled {
    box-shadow: none;
    background: #e98c87; }
    .panel.disabled p {
      color: #6b6b6b; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Progress
*
**/
/* Alert Box */
.alert-box {
  padding: 15px 20px;
  border: none;
  background: #fee5ab;
  color: #6b6b6b;
  font-weight: 400;
  font-family: 'Open Sans', 'Helvetica Neue', sans-serif;  margin-bottom: 1em;
  margin-top: .6em;
  position: relative; }
  .alert-box.radius {
    border-radius: 3px; }
  .alert-box.round {
    border-radius: 1000px; }
  .alert-box .close {
    -webkit-transition: opacity 0.2s ease-in-out;
    -moz-transition: opacity 0.2s ease-in-out;
    transition: opacity 0.2s ease-in-out;
    padding: 17px 12px;
    color: #6b6b6b;
    opacity: .3;
    font-size: 1.1em;
    line-height: 0;
    position: absolute;
    top: 0.44em;
    right: 0.3125em; }
    .alert-box .close:hover {
      opacity: 1; }
  .alert-box.success {
    background: #c5d87e;
    color: #6b6b6b; }
    .alert-box.success .close {
      opacity: .3; }
      .alert-box.success .close:hover {
        opacity: 1; }
  .alert-box.alert {
    background: #fc7e78;
    color: #fff; }
    .alert-box.alert .close {
      color: #fff;
      opacity: .8; }
      .alert-box.alert .close:hover {
        opacity: 1; }
  .alert-box.secondary {
    box-shadow: 0 0 0 1px #eaeaea inset;
    background: none;
    color: #b7b7b7; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Progress
*
**/
/* Tables */
.pinned, div.table-wrapper {
  border-color: #f7f7f7 !important; }

.pinned {
  box-shadow: 0 0 3px #ccc;
  border-right: none !important; }

.table-wrapper, table {
  margin: 1em 0; }

.table-wrapper table {
  margin: 0; }

table {
  border: 1px solid #f7f7f7;
  margin-bottom: 1.25em; }

table tr th, table tr td {
  color: #6b6b6b; }

table tr th {
  font-weight: 600;
  font-size: 0.875em; }

table thead, table tfoot {
  background: #f7f7f7;
  font-weight: 600; }

table thead tr th, table thead tr td, table tfoot tr th, table tfoot tr td {
  padding: 15px; }

table tr.even, table tr.alt, table tr:nth-of-type(even) {
  background: #fafafa; }

table.text-center thead tr th, table.text-center thead tr td, table.text-center tfoot tr th, table.text-center tfoot tr td {
  text-align: center; }
table.text-left thead tr th, table.text-left thead tr td, table.text-left tfoot tr th, table.text-left tfoot tr td {
  text-align: left; }
table.text-right thead tr th, table.text-right thead tr td, table.text-right tfoot tr th, table.text-right tfoot tr td {
  text-align: right; }

table tr th, table tr td {
  padding: 10px 15px; }

table.blue {
  border-color: #d2eaf4; }
  table.blue tr.even, table.blue tr.alt, table.blue tr:nth-of-type(even) {
    background: #fbfdfe; }
  table.blue thead, table.blue tfoot {
    background: #d2eaf4; }
table.green {
  border-color: #e1ece2; }
  table.green tr.even, table.green tr.alt, table.green tr:nth-of-type(even) {
    background: #f4f8f4; }
  table.green thead, table.green tfoot {
    background: #e1ece2; }
table.bluegreen {
  border-color: #d3e8e7; }
  table.bluegreen tr.even, table.bluegreen tr.alt, table.bluegreen tr:nth-of-type(even) {
    background: #f4f9f9; }
  table.bluegreen thead, table.bluegreen tfoot {
    background: #d3e8e7; }
table.lightblue {
  border-color: #d6edf7; }
  table.lightblue tr.even, table.lightblue tr.alt, table.lightblue tr:nth-of-type(even) {
    background: #f0f9fc; }
  table.lightblue thead, table.lightblue tfoot {
    background: #d6edf7; }
table.lightpurple {
  border-color: #f7d6e2; }
  table.lightpurple tr.even, table.lightpurple tr.alt, table.lightpurple tr:nth-of-type(even) {
    background: #fcf0f4; }
  table.lightpurple thead, table.lightpurple tfoot {
    background: #f7d6e2; }
table.yellow {
  border-color: #ffedc4; }
  table.yellow tr.even, table.yellow tr.alt, table.yellow tr:nth-of-type(even) {
    background: #fff5de; }
  table.yellow thead, table.yellow tfoot {
    background: #ffedc4; }
table.orange {
  border-color: #fddbcf; }
  table.orange tr.even, table.orange tr.alt, table.orange tr:nth-of-type(even) {
    background: #feeee8; }
  table.orange thead, table.orange tfoot {
    background: #fddbcf; }
table.red {
  border-color: #f9dedd; }
  table.red tr.even, table.red tr.alt, table.red tr:nth-of-type(even) {
    background: #fdf3f2; }
  table.red thead, table.red tfoot {
    background: #f9dedd; }
table.success {
  border-color: #dfeab9; }
  table.success tr.even, table.success tr.alt, table.success tr:nth-of-type(even) {
    background: #f1f6e0; }
  table.success thead, table.success tfoot {
    background: #dfeab9; }

.highlight {
  background: #92d0ea; }
  .highlight.green {
    background: #bcd4bf; }
  .highlight.bluegreen {
    background: #a1cdcb; }
  .highlight.lightblue {
    background: #92d0ea; }
  .highlight.lightpurple {
    background: #f6cddc; }
  .highlight.blue {
    background: #9dd1e7; }
  .highlight.yellow {
    background: #fee5ab; }
  .highlight.orange {
    background: #fcc8b7; }
  .highlight.grey {
    background: #e6e7e7; }
  .highlight.red {
    background: #eda19c; }
  .highlight.success {
    background: #c5d87e; }
  .highlight.alert {
    background: #e98c87; }

table tr.even .highlight, table tr.alt .highlight, table tr:nth-of-type(even) .highlight, thead .highlight, tfoot .highlight {
  background: #81c9e7; }
  table tr.even .highlight.green, table tr.alt .highlight.green, table tr:nth-of-type(even) .highlight.green, thead .highlight.green, tfoot .highlight.green {
    background: #afcdb3; }
  table tr.even .highlight.bluegreen, table tr.alt .highlight.bluegreen, table tr:nth-of-type(even) .highlight.bluegreen, thead .highlight.bluegreen, tfoot .highlight.bluegreen {
    background: #93c6c4; }
  table tr.even .highlight.lightblue, table tr.alt .highlight.lightblue, table tr:nth-of-type(even) .highlight.lightblue, thead .highlight.lightblue, tfoot .highlight.lightblue {
    background: #81c9e7; }
  table tr.even .highlight.lightpurple, table tr.alt .highlight.lightpurple, table tr:nth-of-type(even) .highlight.lightpurple, thead .highlight.lightpurple, tfoot .highlight.lightpurple {
    background: #f2b8cd; }
  table tr.even .highlight.blue, table tr.alt .highlight.blue, table tr:nth-of-type(even) .highlight.blue, thead .highlight.blue, tfoot .highlight.blue {
    background: #88c7e2; }
  table tr.even .highlight.yellow, table tr.alt .highlight.yellow, table tr:nth-of-type(even) .highlight.yellow, thead .highlight.yellow, tfoot .highlight.yellow {
    background: #fedd92; }
  table tr.even .highlight.orange, table tr.alt .highlight.orange, table tr:nth-of-type(even) .highlight.orange, thead .highlight.orange, tfoot .highlight.orange {
    background: #fbb69e; }
  table tr.even .highlight.grey, table tr.alt .highlight.grey, table tr:nth-of-type(even) .highlight.grey, thead .highlight.grey, tfoot .highlight.grey {
    background: #d9dbdb; }
  table tr.even .highlight.red, table tr.alt .highlight.red, table tr:nth-of-type(even) .highlight.red, thead .highlight.red, tfoot .highlight.red {
    background: #e98c87; }
  table tr.even .highlight.success, table tr.alt .highlight.success, table tr:nth-of-type(even) .highlight.success, thead .highlight.success, tfoot .highlight.success {
    background: #bcd26b; }
  table tr.even .highlight.disabled, table tr.alt .highlight.disabled, table tr:nth-of-type(even) .highlight.disabled, thead .highlight.disabled, tfoot .highlight.disabled {
    background: #e7807a; }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Pricing Tables
*
**/
/* Pricing Tables */
.pricing-table * {
  list-style: none;
  line-height: 1; }

.pricing-table {
  margin-bottom: 1.25em;
  margin-left: 0;
  padding: 0;
  border: solid 1px #eaeaea;
  color: #6b6b6b; }
  .pricing-table li {
    margin-bottom: 0; }
  .pricing-table .bullet-item {
    color: #333333; }
  .pricing-table .bullet-item, .pricing-table .description {
    padding: 15px;
    border-bottom: 1px solid #f7f7f7;
    border-bottom: none;
    background-color: white;
    text-align: center;
    font-weight: normal;
    font-size: 13px; }
    .pricing-table .bullet-item.highlight, .pricing-table .description.highlight {
      background: #c1e4f3;
      font-weight: 600;
      font-size: 14px; }
  .pricing-table .description {
    color: #6b6b6b;
    line-height: 1.8; }
  .pricing-table .title {
    padding: 35px 15px;
    background: #fff;
    color: #333333;
    text-align: center;
    font-weight: 300;
    font-size: 24px;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;}
  .pricing-table .price {
    padding: 0.9375em 1.25em;
    background: #c1e4f3;
    color: #3dabda;
    text-align: center;
    font-weight: 600;
    font-size: 28px; }
    .pricing-table .price.big {
      font-size: 32px; }
    .pricing-table .price.small {
      font-size: 20px; }
    .pricing-table .price small {
      font-weight: 300;
      font-size: 12px; }
  .pricing-table .cta-button {
    margin: 20px;
    padding: 20px;
    background: #fff;
    text-align: center; }
  .pricing-table.green .price {
    background: #eaf2eb;
    color: #7dad83; }
  .pricing-table.green .bullet-item.highlight, .pricing-table.green .description.highlight {
    background: #eaf2eb; }
  .pricing-table.red .price {
    background: #fdf7f7;
    color: #e57871; }
  .pricing-table.red .bullet-item.highlight, .pricing-table.red .description.highlight {
    background: #fdf7f7; }
  .pricing-table.yellow .price {
    background: #fffdf7;
    color: #fecd5f; }
  .pricing-table.yellow .bullet-item.highlight, .pricing-table.yellow .description.highlight {
    background: #fffdf7; }
  .pricing-table.blue .price {
    background: #daeef6;
    color: #36a1ce; }
  .pricing-table.blue .bullet-item.highlight, .pricing-table.blue .description.highlight {
    background: #daeef6; }
  .pricing-table.lightblue .price {
    background: #dff1f9;
    color: #3dabda; }
  .pricing-table.lightblue .bullet-item.highlight, .pricing-table.lightblue .description.highlight {
    background: #dff1f9; }
  .pricing-table.bluegreen .price {
    background: #d3e8e7;
    color: #5eaaa7; }
  .pricing-table.bluegreen .bullet-item.highlight, .pricing-table.bluegreen .description.highlight {
    background: #d3e8e7; }
  .pricing-table.lightpurple .price {
    background: #fef8fa;
    color: #de4c81; }
  .pricing-table.lightpurple .bullet-item.highlight, .pricing-table.lightpurple .description.highlight {
    background: #fef8fa; }
  .pricing-table.orange .price {
    background: #feeee8;
    color: #f87e55; }
  .pricing-table.orange .bullet-item.highlight, .pricing-table.orange .description.highlight {
    background: #feeee8; }
  .pricing-table.grey .price {
    background: #fbfbfb;
    color: #e6e7e7; }
  .pricing-table.grey .bullet-item.highlight, .pricing-table.grey .description.highlight {
    background: #fbfbfb; }

/**
*
* Plugins
*
**/
/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Mixins
*
**/
/**
*
* Styles
*
**/
#ps-custom-back {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 10;
  display: block;
  width: 60px;
  height: 44px;
  color: #fff; }
  #ps-custom-back.hover {
    color: #3dabda; }

#ps-custom-back, .ps-toolbar-previous, .ps-toolbar-play, .ps-toolbar-next {
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  -webkit-touch-callout: none; }

.ps-toolbar-previous-disabled, .ps-toolbar-next-disabled {
  opacity: .25; }

body.ps-active, body.ps-building, div.ps-active, div.ps-building {
  overflow: hidden;
  background: #34393d; }

.ps-carousel {
  opacity: 0; }

.ps-carousel img, .ps-zoom-pan-rotate img {
  padding: 0;
  background: none; }

body.ps-active *, div.ps-active * {
  -webkit-tap-highlight-color: rgba(255, 255, 255, 0); }

body.ps-active *:focus, div.ps-active *:focus {
  outline: 0; }

div.ps-document-overlay {
  background: #34393d;
  opacity: 0; }

div.ps-uilayer {
  background: #34393d;
  cursor: pointer; }

div.ps-zoom-pan-rotate {
  background: #34393d; }

div.ps-zoom-pan-rotate * {
  display: block; }

div.ps-carousel-item-loading {
  background: url("../images/loader.png") no-repeat center center; }

@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2) {
  div.ps-carousel-item-loading {
    background-size: 20px; } }
div.ps-carousel-item-error {
  background: url("../images/error.png") no-repeat center center; }

@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2) {
  div.ps-carousel-item-error {
    background-size: 20px; } }
/* Caption */
div.ps-caption {
  position: relative;
  height: 44px;
  background: #404549;
  color: #fff;
  text-align: center;
  font-size: 14px;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;  line-height: 44px !important; }

div.ps-caption * {
  display: inline; }

div.ps-caption-bottom {
  min-height: 44px; }

div.ps-caption-content {
  display: block; }

/* Toolbar */
div.ps-toolbar {
  display: table;
  height: 44px;
  background: #404549;
  color: #ffffff;
  table-layout: fixed;
  text-align: center;
  font-weight: 300;
  font-size: 13px;
  font-family: 'Raleway', 'Lato', 'Open Sans', sans-serif;  line-height: 44px; }
  div.ps-toolbar div.hover {
    color: #3dabda; }

div.ps-toolbar * {
  display: block; }

div.ps-toolbar-close, div.ps-toolbar-previous, div.ps-toolbar-next, div.ps-toolbar-play, div.ps-toolbar-share {
  display: table-cell;
  cursor: pointer; }

div.ps-toolbar {
  margin: 0 auto 0;
  width: 44px;
  height: 44px; }

/**
*
* Animations
*
**/
/* Flickering Fix */
.csstransitions .ps-document-overlay, .csstransitions .ps-carousel, .csstransitions .ps-toolbar, .csstransitions .ps-caption {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden; }

/* Animation Durations and easings */
.csstransitions .ps-document-overlay, .csstransitions .ps-carousel {
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out; }
.csstransitions .ps-toolbar, .csstransitions .ps-caption {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s; }

/* Animations */
.csstransforms .ps-carousel.active, .csstransforms .ps-document-overlay.active {
  opacity: 1; }
.csstransforms .ps-document-overlay.unload {
  opacity: 0 !important; }
.csstransforms .ps-caption {
  -webkit-transform: translate(0, -50px);
  -moz-transform: translate(0, -50px);
  -ms-transform: translate(0, -50px);
  -o-transform: translate(0, -50px);
  transform: translate(0, -50px); }
  .csstransforms .ps-caption.active {
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0); }
.csstransforms .ps-toolbar {
  -webkit-transform: translate(0, 50px);
  -moz-transform: translate(0, 50px);
  -ms-transform: translate(0, 50px);
  -o-transform: translate(0, 50px);
  transform: translate(0, 50px); }
  .csstransforms .ps-toolbar.active {
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0); }

/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Imports
*
**/
/**
*
* Variables
*
**/
/* Colors */
/* =Colors */
/* General Variables */
/* =General Variables */
/* Typography */
/* =Typography */
/* Sidebar */
/* =Sidebar */
/* Header */
/* =Header */
/* Photoswipe */
/* =Photoswipe */
/**
*
* Mixins
*
**/
/**
*
* Styles
*
**/
/* Default Styles */
/* Browser Resets
*********************************/
.flex-container a:active,
.flexslider a:active,
.flex-container a:focus,
.flexslider a:focus {
  outline: none; }

.slides,
.flex-control-nav,
.flex-direction-nav {
  margin: 0;
  padding: 0;
  list-style: none; }

/* FlexSlider Necessary Styles
*********************************/
.flexslider {
  margin: 0;
  padding: 0; }

.flexslider .slides > li {
  display: none;
  -webkit-backface-visibility: hidden; }

/* Hide the slides before the JS is loaded. Avoids image jumping */
.flexslider .slides img {
  width: 100%;
  display: block; }

.flex-pauseplay span {
  text-transform: capitalize; }

/* Clearfix for the .slides element */
.slides:after {
  content: "\0020";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0; }

html[xmlns] .slides {
  display: block; }

* html .slides {
  height: 1%; }

/* No JavaScript Fallback */
/* If you are not using another script, such as Modernizr, make sure you
 * include js that eliminates this class on page load */
.no-js .slides > li:first-child {
  display: block; }

/* Flexslider */
.flexslider-container {
  position: relative; }

.flexslider-controls {
  position: absolute;
  top: 0;
  z-index: 99;
  width: 100%;
  height: 100%; }

.flex-control-nav {
  position: absolute;
  z-index: 15;
  display: block;
  width: 100%;
  text-align: center; }
  @media only screen {
    .flex-control-nav {
      bottom: 5px; } }
  @media only screen and (min-width: 768px) {
    .flex-control-nav {
      bottom: 18px; } }
  .flex-control-nav li {
    display: inline-block; }
    .flex-control-nav li a {
      -webkit-transition: all 0.2s ease-in-out;
      -moz-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;
      color: transparent;
      font: 0/0 a;
      text-shadow: none;
      display: block;
      border-radius: 9999px;
      opacity: 0.8; }
      @media only screen {
        .flex-control-nav li a {
          width: 10px;
          height: 10px;
          border: 1px solid #fff;
          margin: 7px; } }
      @media only screen and (min-width: 768px) {
        .flex-control-nav li a {
          width: 13px;
          height: 13px;
          border: 2px solid #fff;
          margin: 9px; } }
      .flex-control-nav li a:hover {
        background: #fff;
        opacity: 1; }
      .flex-control-nav li a.flex-active {
        background: #fff; }

.flex-direction-nav {
  position: absolute;
  z-index: 10;
  display: block;
  width: 100%;
  height: 100%;
  text-align: center; }
  .flex-direction-nav .flex-prev, .flex-direction-nav .flex-next {
    -webkit-transition: all 0.12s ease-in-out;
    -moz-transition: all 0.12s ease-in-out;
    transition: all 0.12s ease-in-out;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    color: #fff;
    text-align: center;
    font-size: 20px;
    line-height: 200px;
    opacity: 0.8; }
    @media only screen {
      .flex-direction-nav .flex-prev, .flex-direction-nav .flex-next {
        width: 40px;
        height: 200px; } }
    @media only screen and (min-width: 768px) {
      .flex-direction-nav .flex-prev, .flex-direction-nav .flex-next {
        width: 60px;
        height: 200px; } }
    .flex-direction-nav .flex-prev:hover, .flex-direction-nav .flex-next:hover {
      opacity: 1; }
  .flex-direction-nav .flex-prev {
    left: 0; }
  .flex-direction-nav .flex-next {
    right: 0; }

/**
*
* Responsive Tables
*
**/
table th {
  font-weight: bold; }

table td, table th {
  padding: 9px 10px;
  text-align: left; }

/* Mobile */
@media only screen and (max-width: 767px) {
  table.responsive {
    margin-bottom: 0; }

  .pinned {
    position: absolute;
    left: 0;
    top: 0;
    background: #fff;
    width: 35%;
    overflow: hidden;
    overflow-x: scroll;
    -webkit-overflow-scrolling: touch;
    border-right: 1px solid #ccc;
    border-left: 1px solid #ccc; }

  .pinned table {
    border-right: none;
    border-left: none;
    width: 100%; }

  .pinned table th, .pinned table td {
    white-space: nowrap; }

  .pinned td:last-child {
    border-bottom: 0; }

  div.table-wrapper {
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
    border-right: 1px solid #ccc; }

  div.table-wrapper div.scrollable {
    margin-left: 35%; }

  div.table-wrapper div.scrollable {
    overflow: scroll;
    overflow-y: hidden; }

  table.responsive td, table.responsive th {
    position: relative;
    white-space: nowrap;
    overflow: hidden; }

  table.responsive th:first-child, table.responsive td:first-child, table.responsive td:first-child, table.responsive.pinned td {
    display: none; } }
/**
 * prism.js default theme for JavaScript, CSS and HTML
 * Based on dabblet (http://dabblet.com)
 * @author Lea Verou
 */
code[class*="language-"],
pre[class*="language-"] {
  color: black;
  text-shadow: 0 1px white;
  font-family: Consolas, Monaco, 'Andale Mono', monospace;
  direction: ltr;
  text-align: left;
  white-space: pre;
  word-spacing: normal;
  -moz-tab-size: 4;
  -o-tab-size: 4;
  tab-size: 4;
  -webkit-hyphens: none;
  -moz-hyphens: none;
  -ms-hyphens: none;
  hyphens: none; }

pre[class*="language-"]::-moz-selection, pre[class*="language-"] ::-moz-selection,
code[class*="language-"]::-moz-selection, code[class*="language-"] ::-moz-selection {
  text-shadow: none;
  background: #b3d4fc; }

pre[class*="language-"]::selection, pre[class*="language-"] ::selection,
code[class*="language-"]::selection, code[class*="language-"] ::selection {
  text-shadow: none;
  background: #b3d4fc; }

@media print {
  code[class*="language-"],
  pre[class*="language-"] {
    text-shadow: none; } }
/* Code blocks */
pre[class*="language-"] {
  padding: 1em;
  margin: .5em 0;
  overflow: auto;
  -webkit-overflow-scrolling: touch; }

:not(pre) > code[class*="language-"],
pre[class*="language-"] {
  background: #f5f2f0; }

/* Inline code */
:not(pre) > code[class*="language-"] {
  padding: .1em;
  border-radius: .3em; }

.token.comment,
.token.prolog,
.token.doctype,
.token.cdata {
  color: slategray; }

.token.punctuation {
  color: #999; }

.namespace {
  opacity: .7; }

.token.property,
.token.tag,
.token.boolean,
.token.number {
  color: #905; }

.token.selector,
.token.attr-name,
.token.string {
  color: #690; }

.token.operator,
.token.entity,
.token.url,
.language-css .token.string,
.style .token.string {
  color: #a67f59;
  background: rgba(255, 255, 255, 0.5); }

.token.atrule,
.token.attr-value,
.token.keyword {
  color: #07a; }

.token.regex,
.token.important {
  color: #e90; }

.token.important {
  font-weight: bold; }

.token.entity {
  cursor: help; }

pre[data-line] {
  position: relative;
  padding: 1em 0 1em 3em; }

.line-highlight {
  position: absolute;
  left: 0;
  right: 0;
  padding: inherit 0;
  margin-top: 1em;
  background: rgba(153, 122, 102, 0.08);
  background: -moz-linear-gradient(left, rgba(153, 122, 102, 0.1) 70%, rgba(153, 122, 102, 0));
  background: -webkit-linear-gradient(left, rgba(153, 122, 102, 0.1) 70%, rgba(153, 122, 102, 0));
  background: -o-linear-gradient(left, rgba(153, 122, 102, 0.1) 70%, rgba(153, 122, 102, 0));
  background: linear, left, rgba(153, 122, 102, 0.1) 70%, rgba(153, 122, 102, 0);
  pointer-events: none;
  line-height: inherit;
  white-space: pre; }

.line-highlight:before,
.line-highlight[data-end]:after {
  content: attr(data-start);
  position: absolute;
  top: .4em;
  left: .6em;
  min-width: 1em;
  padding: 0 .5em;
  background-color: rgba(153, 122, 102, 0.4);
  color: #f5f2f0;
  font: bold 65%/1.5 sans-serif;
  text-align: center;
  vertical-align: .3em;
  border-radius: 999px;
  text-shadow: none;
  box-shadow: 0 1px white; }

.line-highlight[data-end]:after {
  content: attr(data-end);
  top: auto;
  bottom: .4em; }

pre.line-numbers {
  position: relative;
  padding-left: 3.8em;
  counter-reset: linenumber; }

pre.line-numbers > code {
  position: relative; }

.line-numbers .line-numbers-rows {
  position: absolute;
  pointer-events: none;
  top: 0;
  font-size: 100%;
  left: -3.8em;
  width: 3em;
  /* works for line-numbers below 1000 lines */
  letter-spacing: -1px;
  border-right: 1px solid #999;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }

.line-numbers-rows > span {
  pointer-events: none;
  display: block;
  counter-increment: linenumber; }

.line-numbers-rows > span:before {
  content: counter(linenumber);
  color: #999;
  display: block;
  padding-right: 0.8em;
  text-align: right; }

.token.tab:not(:empty):before,
.token.cr:before,
.token.lf:before {
  color: #e0d7d1; }

.token.tab:not(:empty):before {
  content: 'â–¸'; }

.token.cr:before {
  content: 'â'; }

.token.lf:before {
  content: 'âŠ'; }

.token a {
  color: inherit; }

code[class*="language-"] a[href],
pre[class*="language-"] a[href] {
  cursor: help;
  text-decoration: none; }

code[class*="language-"] a[href]:hover,
pre[class*="language-"] a[href]:hover {
  cursor: help;
  text-decoration: underline; }

pre[class*="language-"] {
  box-shadow: 0 -11px 5px -10px rgba(0, 0, 0, 0.05) inset, 0 11px 5px -10px rgba(0, 0, 0, 0.05) inset;
  margin: 0;
  padding: 35px 25px;
  border-radius: 0;
  line-height: 1.6; }
  pre[class*="language-"].radius {
    border-radius: 4px; }
  pre[class*="language-"] code {
    text-shadow: none;
    font-weight: 500;
    font-size: 12px;
    font-family: 'Monaco', 'Menlo', 'Courier New', monospace; }
    pre[class*="language-"] code a {
      text-decoration: underline !important; }

.size-auto, 
.size-full,
.size-large,
.size-medium,
.size-thumbnail {
  max-width: 100%;
  height: auto;
}

/* Search form */
#search-form {  
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden; 

  width: 100%;
  padding: 0;
  margin: 0;
  top: 0;
  height: 51px;
  z-index: 999;
  position: absolute;
  opacity: 0.5;
  overflow: hidden;

}

#search-input-s {
  padding: 10px 23px 10px;
}

#search-form.active {
  opacity: 1;
}

.csstransitions #search-form {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s;
}

.csstransforms #search-form {
  -webkit-transform: translate(0, -53px);
  -moz-transform: translate(0, -53px);
  -ms-transform: translate(0, -53px);
  -o-transform: translate(0, -53px);
  transform: translate(0, -53px);
}

.csstransforms #search-form.active {
  -webkit-transform: translate(0, -3px);
  -moz-transform: translate(0, -3px);
  -ms-transform: translate(0, -3px);
  -o-transform: translate(0, -3px);
  transform: translate(0, -3px);
}

.no-csstransforms #search-form {
  top: -53px;
}

.no-csstransforms #search-form.active {
  top: -3px;
}

#search-form input[type="text"] {
  width: 100%;
  background: #34393D;
  margin-right: 0;
  height: 51px;
  position: absolute;
  top: 0;
  left: 0;
  color: #fff;
  z-index: 44;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-touch-callout: none;
}

#search-form-close {
  cursor: pointer;
  width: 55px;
  height: 51px;
  line-height: 58px;
  position: absolute;
  top: 0;
  text-align: center;
  z-index: 45;
  right: 0;
  color: #A9A9A9;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-touch-callout: none;
}

#search-form-close.hover {
  color: #3dabda;
}

#search-form input[type="button"] {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-touch-callout: none;
  position: absolute;
  right: 9999px;
  top: 9999px;
  text-indent: -9999px;
  z-index: -9999;
  width: 0;
  height: 0;
}

/* Loading Animations */
.loading-animations #header {
  opacity: 0.5;
  -webkit-transition: all 0.4s ease-in-out;
          transition: all 0.4s ease-in-out;
  -webkit-transform: translate(0, -50px);
          transform: translate(0, -50px);
}

.webapp.loading-animations #header  {
  opacity: 0.5;
  -webkit-transition: all 0.4s ease-in-out;
          transition: all 0.4s ease-in-out;
  -webkit-transform: translate(0, -70px);
          transform: translate(0, -70px);
}

.loading-animations.content-loaded #header {
  opacity: 1;
  -webkit-transform: translate(0, 0);
          transform: translate(0, 0);
}

.loading-animations #content {
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out;
          transition: all 0.4s ease-in-out;
}

.loading-animations.content-loaded #content {
  opacity: 1;
}

.spinner {
  width: 80px;
  height: 80px;

  position: relative;
  margin: 200px auto;
}

.double-bounce1, .double-bounce2 {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #3dabda;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  
  -webkit-animation: bounce 2.0s infinite ease-in-out;
  animation: bounce 2.0s infinite ease-in-out;
}

.double-bounce2 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}

@-webkit-keyframes bounce {
  0%, 100% { -webkit-transform: scale(0.0) }
  50% { -webkit-transform: scale(1.0) }
}

@keyframes bounce {
  0%, 100% {
    transform: scale(0.0);
    -webkit-transform: scale(0.0);
  } 50% {
    transform: scale(1.0);
    -webkit-transform: scale(1.0);
  }
}

.spinner-container {
  position: fixed;
  width: 100%;
  height: 100%;
  display: block;
  z-index: 999;
  background: #fff;
  opacity: 1;
}

.spinner-container {
  -webkit-transition: all 0.4s ease-in-out;
          transition: all 0.4s ease-in-out;
}

.spinner-container.content-loaded {
  opacity: 0;
}

.hidden {
  display:none !important; 
}
