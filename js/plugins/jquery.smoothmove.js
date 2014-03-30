/*---------------------------
 Smooth Move
 - allows for smooth scrolling, ideal for one page layouts
----------------------------*/

$.fn.smoothmove = function(options) {
	
	var $root = $('html, body'),
		$height = $(this).height(), // store the height so we can see the content we scroll to
		queryString = {},
		settings = $.extend({
			speed: 700,
			param: 'sec'
		}, options);
	
	/* pushes the name/value pair into the queryString object */
	window.location.href.replace(
		new RegExp("([^?=&]+)(=([^&]*))?", "g"),
		function($0, $1, $2, $3) { queryString[$1] = $3; }
	);
	
	/* check if we are linking to a certain query string */
	if (queryString[settings.param]) {
		
		var scroll = $('#' + queryString[settings.param]).offset().top - $height;
		
		$(window).scrollTop(scroll);
	}
	
	var $this = $(this);
	
	/* on link click scroll to div and append querystring */
	$('a[href*=#]:not([href=#])').click(function(e) {
		
		e.preventDefault();
	
		var href = $.attr(this, 'href'),
			scroll = $(href).offset().top - $height;
		
		/* Big thanks to Chris Coyier from csstricks.com for recommending this */
		if (window.history && history.pushState) {
			history.replaceState('', '', '?' + settings.param + "=" + href.substring(1));
		}
		
		$root.animate({
			scrollTop: scroll
		}, settings.speed, function(){
			//$this.removeClass('active');
			$this.trigger('moby:close');
		});
	});
	
	return this;
};