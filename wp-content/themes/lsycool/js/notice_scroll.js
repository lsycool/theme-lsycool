jQuery(document).ready(function($) {

	function timer(opj) {
		// alert($(opj).length);
		$(opj).find('ul').animate({
			marginTop : "-3.5rem"  
			},500,function(){  
			$(this).css({marginTop : "-0.7em"}).find("li:first").appendTo(this);  
		});
	}


	var num = $('.notice-content').find('li').length;
	if(num > 1){
	   var time = setInterval(timer, 4000, '.notice-content');
	}
});