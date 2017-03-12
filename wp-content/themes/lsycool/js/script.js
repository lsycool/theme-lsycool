// Run when the DOM ready
jQuery( function ( $ ) {
	'use strict';

	var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';

	/**
	 * Toggle mobile sidebar
	 */
	function toggleMobileSidebar() {
		var $body = $( 'body' ),
			$button = $( '#sidebar-toggle' ),
			sidebarClass = 'mobile-sidebar-open';

		// Click to show mobile menu
		$button.on( clickEvent, function ( e ) {
			if ( $body.hasClass( sidebarClass ) ) {
				return;
			}
			e.stopPropagation(); // Do not trigger click event on '.site' below
			$body.addClass( sidebarClass );
			$button.addClass( 'active' );
		} );
		// When mobile menu is open, click on page content will close it
		$( '.site' ).on( clickEvent, function ( e ) {
			if ( ! $body.hasClass( sidebarClass ) ) {
				return;
			}
			e.preventDefault();
			$body.removeClass( sidebarClass );
			$button.removeClass( 'active' );
		} );
	}

	/**
	 * Scroll to top
	 */
	function scrollToTop() {
		var $window = $( window ),
			$button = $( '#scroll-to-top' );
		$window.scroll( function () {
			$button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']( 'hidden' );
		} );
		$button.on( clickEvent, function ( e ) {
			e.preventDefault();
			$( 'body, html' ).animate( {
				scrollTop: 0
			}, 500 );
		} );
	}

	/**
	 * Add toggle dropdown icon for mobile menu.
	 * @param $container
	 */
	function initMobileNavigation( $container ) {
		// Add dropdown toggle that displays child menu items.
		var $dropdownToggle = $( '<span class="dropdown-toggle genericon genericon-expand"></span>' );

		$container.find( '.menu-item-has-children > a' ).after( $dropdownToggle );

		// Toggle buttons and sub menu items with active children menu items.
		$container.find( '.current-menu-ancestor > .sub-menu' ).show();
		$container.on( clickEvent, '.dropdown-toggle', function ( e ) {
			e.preventDefault();
			$( this ).next( 'ul' ).toggle();
		} );
	}

	toggleMobileSidebar();
	scrollToTop();
	initMobileNavigation( $( '.primary-menu-mobile' ) );
} );

// 统计按钮点击事件
jQuery(document).ready(function($) {
 	btn_click("#mStats", "stats_click", "stats_close"); //站点统计
	function btn_click(btn, on, off) {
		 flag=true;
		   $(btn).click(function () {
		       $(btn).prop('class', (flag = !flag) ? on : off); //设置或返回当前jQuery对象所匹配的元素的属性值
		   });
	}
	$('.makecomments').hide();
});

jQuery(document).ready(function($) {
	$('.sidebar-popu').hide();
	$(document).mousemove(function (e) {
		if ($(document).scrollTop() > 500 ) {
			if (e.pageX > $(document).width()*0.9) {
				// $('.sidebar-popu').show(100);
				$('.sidebar-popu').animate( { width: "show", paddingLeft: "show", paddingRight: "show", marginLeft: "show", marginRight: "show" }, "fast" );			
			} else {
				// $('.sidebar-popu').hide(100);
				$('.sidebar-popu').animate( { width: "hide", paddingLeft: "hide", paddingRight: "hide", marginLeft: "hide", marginRight: "hide" }, "fast" );
			}
		}
		// else {
		// 	$('.sidebar-popu').animate( { width: "hide", paddingLeft: "hide", paddingRight: "hide", marginLeft: "hide", marginRight: "hide" }, "fast" );
		// }
	});
	$(document).scroll(function() {
		if ($(document).scrollTop() < 500 ) {
			  $(".sidebar-popu").hide();
		}
	});
});