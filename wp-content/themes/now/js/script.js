var $ = jQuery.noConflict(); 

/**
*
* Detect Mobile Touch Support
*
**/

var touchSupport = false;
var eventClick = 'click';
var eventHover = 'mouseover mouseout';

(function($){
	if ('ontouchstart' in document.documentElement) {
		$('html').addClass('touch');
		touchSupport = true;
		eventClick = 'touchon touchend';
		eventHover = 'touchstart touchend';
	} else {
		$('html').addClass('no-touch');
	}
})(jQuery);




/**
*
* Hides Adress Bar
*
**/

function hideAddressBar() {
	if(!window.location.hash) {
		if(document.documentElement.scrollHeight < window.outerHeight) {

			/* Expands Page Height if it's smaller than window */

			document.body.style.minHeight = (window.outerHeight + 60) + 'px';
			document.getElementById('container').style.minHeight = (window.outerHeight + 60) + 'px';
			document.getElementById('content-container').style.minHeight = (window.outerHeight + 60) + 'px';
		}

		setTimeout( function(){ window.scrollTo(0, 1); }, 0 );
	}
}
 
window.addEventListener('load', function(){ if(!window.pageYOffset){ hideAddressBar(); } } );




/**
*
* Photoswipe
*
**/

var photoswipeContainer = '.photoswipe a';
		
if(jQuery(photoswipeContainer).length > 0){
	(function(window, $, PhotoSwipe){

		$(document).ready(function(){
			
			var options = {
			
				/* Customizing toolbar */

				getToolbar: function(){
					return '<div class="ps-toolbar-previous icon-left-open"></div>'
					+ '<div class="ps-toolbar-play icon-play"></div>'
					+ '<div class="ps-toolbar-next icon-right-open"></div>';
				},
						
				getImageCaption: function(el){
					var captionText, captionEl, captionBack;
					
					/* Get the caption from the alt tag */

					if (el.nodeName === "IMG"){
						captionText = el.getAttribute('alt'); 
					}

					var i, j, childEl;
					for (i=0, j=el.childNodes.length; i<j; i++){
						childEl = el.childNodes[i];
						if (el.childNodes[i].nodeName === 'IMG'){
							captionText = childEl.getAttribute('alt'); 
						}
					}
					
					/* Return a DOM element with custom styling */

					captionBack = document.createElement('a');
					captionBack.setAttribute('id', 'ps-custom-back');
					captionBack.setAttribute('class', 'icon-cancel-1');
					
					captionEl = document.createElement('div');
					captionEl.appendChild(captionBack);
					
					captionBack = document.createElement('span');
					captionBack.innerHTML=captionText;
					captionEl.appendChild(captionBack);
					return captionEl;
				},
				
				enableMouseWheel: false,
				captionAndToolbarOpacity: 1,
			}




			/* Creating Photoswipe instance */

			var instance = PhotoSwipe.attach(window.document.querySelectorAll(photoswipeContainer), options );




			/* Adding listener to custom back button */

			instance.addEventHandler(PhotoSwipe.EventTypes.onShow, function(e){
				$('.ps-caption').addClass('active');
				$('.ps-toolbar').addClass('active');
				$('.ps-document-overlay').addClass('active');
				$('.ps-carousel').addClass('active');

				if($('html').hasClass('no-csstransforms')){
					$(document).on('click', '#ps-custom-back', function() {
						e.target.hide();
					});
				}else{
					$(document).on(eventClick, '#ps-custom-back' , function(){
						$('.ps-caption').removeClass('active');
						$('.ps-toolbar').removeClass('active');
						setTimeout(function(){
							$('.ps-document-overlay').removeClass('active');
							$('.ps-document-overlay').addClass('unload');
							$('.ps-carousel').removeClass('active');
							setTimeout(function(){
								e.target.hide();
							}, 400);
						}, 400);
					});
				}

			});




			/* Play/Pause Icon Change */

			/* Slideshow Start */

			instance.addEventHandler(PhotoSwipe.EventTypes.onSlideshowStart, function(e){
				$('.ps-toolbar-play').removeClass('icon-play');
				$('.ps-toolbar-play').addClass('icon-pause');
				$('.ps-toolbar-play').addClass('hover');
			});

			/* Slideshow End */

			instance.addEventHandler(PhotoSwipe.EventTypes.onSlideshowStop, function(e){
				$('.ps-toolbar-play').removeClass('icon-pause');
				$('.ps-toolbar-play').addClass('icon-play');
				$('.ps-toolbar-play').removeClass('hover');
			});
					
		}, false);	

	}(window, window.jQuery, window.Code.PhotoSwipe));




	/* Hover Effects - Photoswipe */

	jQuery(document).on(eventHover, '#ps-custom-back, .ps-toolbar-previous, .ps-toolbar-play, .ps-toolbar-next', function() {
		jQuery(this).toggleClass('hover');
	});
}




/**
*
* Ajax Page Loading
*
**/

$(function(){

    var offset = 1;
    var readyToAppend = null;
    
    pagedString = '?paged=';
    var searchLocation = window.location.search;
    var pathname = searchLocation.substr(searchLocation.length - 1);
    
    if(pathname == parseInt(pathname)){
	    pagedString = searchLocation+'&paged=';
    }else{
	    pagedString = '?paged=';
    }
    
    var paged = $("#loadMore").attr("rel");
    if(paged > 1){
	    offset = paged;
    }
    
    $("#loadMore").click(function(e){
    	e.preventDefault();
	    $("#loadMore").text('Loading');

    	var loadmoreOffest = $("#loadMore").offset();
        
	    offset++;
    
        $("#loadedContent").load(pagedString+offset+" .blog", function() {
            readyToAppend = ($(this).find("article"));
            if(readyToAppend.length < 1){
		    	$("#loadMore").addClass("loaded");
		    	setTimeout(function() {
	                $("#loadMore").hide(300);
	            }, 300);
            }else{
            	/* Delay between animations */
            	var delay = 400;

            	/* Animate each item */
            	readyToAppend.each(function() {
	                var postID = $(this).attr("id");
	                $(this).hide(0);
	                $(".blog").append($(this));

	                var $currentPost = $("#" + postID);
	                $currentPost.addClass('toshow');
	                $currentPost.show(0);
			    	setTimeout(function() {
		                $currentPost.addClass('shown');
		            }, delay);

			    	if(delay <= 1200){
				    	delay += 400;
			    	}

            		/* Reload iframes */
            		$currentPost.find('iframe').attr( 'src', function ( i, val ) {
            			console.log("Test"); 
        				return val;
            		});
            	});

            	$(this).html("");

            	/* Scroll after loaded article to the first one */
            	$('html, body').animate({
                    scrollTop: loadmoreOffest.top-60
                }, 800);

			    $("#loadMore").text('加载更多');

            }
        }); 
        
        return false;
    });

});




jQuery(document).ready(function($) {

	// Load animations max timeout
	if ( jQuery( '.loading-animations').length ) 
	{
		setTimeout(function() {
			if (!siteLoaded) {
				jQuery( '.spinner-container').addClass( 'content-loaded' );
				setTimeout( function() {
					jQuery( '.spinner-container').hide(0);
					jQuery( '.loading-animations').addClass( 'content-loaded' );
				}, 400 );
			}
		}, 3000);
	} 

	// Check height
	if ($('body').outerHeight() < $(window).outerHeight()) {
		$('body').addClass('increase-height');
	}

	// OffLoad animations
    $('.read-more a, .blog-title a, #header h1 a, #contact-form input[type="submit"]').click(function(e) {
    	if ( $( '.loading-animations').length )
		{
			if ($(this).hasClass('comment-reply-link')) { return true; }
			if ($(this).prop('rel') == 'nofollow') { return true; }
            e.preventDefault();
            var anchor = $(this), h;
            h = anchor.attr('href');
			jQuery('.loading-animations').removeClass('content-loaded');
			jQuery('.spinner-container').show(0);
			setTimeout(function() {
				jQuery('.spinner-container').removeClass('content-loaded');
				setTimeout(function() {
		            window.location = h;
		        }, 390);
			}, 10);
		}
    });

	/**
	*
	* Sticky
	*
	**/

	var $stickyContainer = $('.fixed-header #header');

	if($stickyContainer.length > 0){
		$stickyContainer.stick_in_parent();
	}




	/**
	*
	* Touch Gestures
	*        &
	* Hover and Animation Triggers
	*
	**/

	/* Hover Effects */

	$('.portfolio-grid article a, .button, button, input[type="submit"], input[type="reset"], input[type="button"], #header a, .header-button, #nav-container a, .nav-child-container, .gallery-container a, #ps-custom-back, #search-form-close').bind(eventHover, function(event) {
		$(this).toggleClass('hover');
	});

	/* Prevent other events */
	$(' .comment-reply-link' ).bind( 'click', function( event ) {
		event.preventDefault();
		event.stopPropagation();
	});
	
	/* Sidebar multi-level menu */
	$('.nav-child-container').bind(eventClick, function(event) {
		event.preventDefault();
		var $this = $(this);
		var ul = $this.next('ul');
		var ulChildrenHeight = ul.children().length * 46;

		if(!$this.hasClass('active')){
			$this.toggleClass('active');
			ul.toggleClass('active');
			ul.height(ulChildrenHeight + 'px');
		}else{
			$this.toggleClass('active');
			ul.toggleClass('active');
			ul.height(0);
		}
	});


	/* Sidebar Functionality */
	var opened = false;
	var trigger_url = false;
	var sidebar_info = ( $('#author-profile').length > 0 ) ? true : false;

	$('#menu-trigger').bind(eventClick, function(event) {

		$stickyContainer = $('.fixed-header #header');
		if($stickyContainer.length > 0){
			var headerOffset = $('#header').offset();
			headerOffset = headerOffset.top;

			if(opened){
				setTimeout(function() {
					$stickyContainer.css({
						'margin-top': 0
					});
				}, 500);
			} else {
				$stickyContainer.css({
					'margin-top': headerOffset
				});
			}
		}

		$('#content-container').toggleClass('active');
		$('#sidemenu').toggleClass('active');
		if(opened){
			opened = false;
			setTimeout(function() {
				$('#sidemenu-container').removeClass('active');
			}, 450);

			if (sidebar_info) {
				trigger_url = true;
			} else {
				trigger_url = false;
			}
		} else {
			$('#sidemenu-container').addClass('active');
			opened = true;

			if (sidebar_info) {
				trigger_url = true;
			} else {
				setTimeout(function() {
					trigger_url = true;
				}, 450);
			}
		}
	});

	$('#content').bind(eventClick, function(event) {

		if (opened) {

			$stickyContainer = $('.fixed-header #header');
			if($stickyContainer.length > 0) {
				var headerOffset = $('#header').offset();
				headerOffset = headerOffset.top;
	
				setTimeout(function() {
					$stickyContainer.css({
						'margin-top': 0
					});
				}, 500);
				
			}

			$('#content-container').toggleClass('active');
			$('#sidemenu').toggleClass('active');
			
			opened = false;
			setTimeout(function() {
				$('#sidemenu-container').removeClass('active');
			}, 450);

			if (sidebar_info) {
				trigger_url = true;
			} else {
				trigger_url = false;
			}
		}
	});

	/* Search Trigger */
	var closeEnable = false;
	$('#search-trigger').bind(eventClick, function(event) {
		$('#search-form').addClass('active');
		closeEnable = false;
		setTimeout(function() {
			closeEnable = true;
		}, 500);
	});

	$('#search-input-s').bind('blur', function(event) {
		if ( closeEnable ) {
			$('#search-form').removeClass('active');
		}
	});

	$('#search-form-close').bind(eventClick, function(event) {
		event.preventDefault();
		if (closeEnable) {
			$('#search-form').removeClass('active');
			$('#search-input-s').blur();
			closeEnable = false;
		}
	});
		

	$('.nav a').bind('click', function(event) {

		event.preventDefault();

		if ($(this).siblings('.sub-menu').length > 0) {

			var ul = $(this).siblings('.sub-menu');
			var nav_child = $(this).siblings('.nav-child-container');
			var ulChildrenHeight = ul.children().length * 46;
			$(this).parent().parent().find('li').removeClass('current-menu-item');
			$(this).parent().toggleClass('current-menu-item');

			if( !nav_child.hasClass('active') ) {
				nav_child.toggleClass('active');
				ul.toggleClass('active');
				ul.height(ulChildrenHeight + 'px');
			}else{
				nav_child.toggleClass('active');
				ul.toggleClass('active');
				ul.height(0);
			}
		} else	if (trigger_url) {

			var path = $(this).attr('href');
			if ($(this).attr('target') == '_blank') {
				$('#content-container').toggleClass('active');
				$('#sidemenu').toggleClass('active');
				setTimeout(function() {
					window.open(path);
				}, 500);
			} else {
				$('#content-container').toggleClass('active');
				$('#sidemenu').toggleClass('active');
				setTimeout(function() {
					window.location = path;
				}, 500);
			}
		}
	});
	
	/* Swipe menu support */
		
	$('.touch-gesture #content').hammer().on('swiperight', function(event) {
		$('#content-container').addClass('active');
		$('#sidemenu').addClass('active');
		if(opened){
			opened = false;
			setTimeout(function() {
				$('#sidemenu-container').removeClass('active');
			}, 500);
		} else {
			$('#sidemenu-container').addClass('active');
			opened = true;
		}
	});
	
	$('.touch-gesture #content').hammer().on('swipeleft', function(event) {
		$('#content-container').removeClass('active');
		$('#sidemenu').removeClass('active');
		if(opened){
			opened = false;
			setTimeout(function() {
				$('#sidemenu-container').removeClass('active');
			}, 500);
		} else {
			$('#sidemenu-container').addClass('active');
			opened = true;
		}
	});




	/**
	*
	* Check if the child menu has an active item.
	* If yes, then it will expand the menu by default.
	*
	**/
	
	var $navItems = $('.nav ul li');

	$navItems.each(function(index){
		if ($(this).hasClass('current-menu-item')) {
			$parentUl = $(this).parent();
			$parentUl.height($parentUl.children('li').length * 46 + "px");
			$parentUl.prev().addClass('active');
			$parentUl.addClass('active');
			$anchor = $parentUl.prev();
			$anchor.children('.nav-child-container').addClass('active');
		}
	});




	/**
	*
	* Flexslider
	*
	**/

	var $flexsliderContainer = $('.flexslider');

	if($flexsliderContainer.length > 0){
		$($flexsliderContainer).each(function(index, el) {
			$(this).flexslider({
				controlsContainer: ".flexslider-controls",
				prevText: '<span class="icon-left-open-big"></span>',
				nextText: '<span class="icon-right-open-big"></span>',
				slideshowSpeed: 5000,
				animationSpeed: 600,
				slideshow: true,
				smoothHeight: false,
				animationLoop: true,
			});
		});
	}




	/**
	*
	* Alert boxes
	*
	**/

	var $alertBoxes = $('.alert-box .close');

	$alertBoxes.bind(eventClick, function(event) {
		event.preventDefault();
		var $parent = $(this).parent('.alert-box');
		$parent.fadeOut(500);
		setTimeout(function() { $parent.hide(0); }, 500);
	});




	/**
	*
	* H5 Validate - Form jQuery Validation
	*
	**/

	$('form').h5Validate();




	/**
	*
	* Responsive Tables
	*
	**/

	$('table').addClass('responsive');

	function scrollToTopBottom() {
		var $window = $( window ),
			$button = $( '#top-dock' ),
			$button2 = $( '#down-dock' );

		$window.scroll( function () {
			$button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']( 'hidden' );
			if ((300 + $(window).scrollTop()) < ($(document).height() - $(window).height())) {
				$button2['removeClass']( 'hidden' );				
			} else {
				$button2['addClass']( 'hidden' );
				$button['addClass']( 'hidden' );
			}

		} );
	}
	scrollToTopBottom();

});