/*---------------------------
 Moby Plugin
 - adds a responsive menu to nav
----------------------------*/

$.fn.moby = function(options) {

	var $this = $(this),
		settings = $.extend({
			className: 'menu',
			showTxt: true,
			breakpoint: 624
		}, options);
	
	$this
		.addClass('has-mobile-menu')
		.prepend('<span class="' + settings.className + '"/>');
		
	if(settings.showTxt) {
		$('.' + settings.className).html('Menu');
	}
	
	$('.menu').on('click', function() {
		$this.toggleClass('active');
	});
	
	$this.bind('moby:close', function() {
		$this.removeClass('active');
	});
	
	// this function isn't necesary, but keeps things nice while resizing
	$(window).bind('resize', function() {
	
		var width = $(window).width();
		
		if (width >= settings.breakpoint) {
			$this.trigger('moby:close');
		}
	});
	
	return this;
};