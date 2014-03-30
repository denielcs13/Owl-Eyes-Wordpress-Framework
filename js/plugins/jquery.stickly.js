/*---------------------------
 Stick It
 - adds a "sticky" class to an element past scroll
----------------------------*/

$.fn.stickly = function() {
	
	var $this = $(this),
		$height = $(this).height(),
		$body = $('body'),
		elTop = $this.offset().top;
	
	$(window).scroll(function() {
		
		var scrollTop = $(window).scrollTop();
		
		if (scrollTop > elTop) {
			$this.addClass('sticky');
			$body.css({paddingTop:$height});
		} else {
			$this.removeClass('sticky');
			$body.css({paddingTop:0});
		}
	});
	
	return this;
};