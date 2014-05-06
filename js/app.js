// @codekit-append "plugins/jquery.autotype.js"
// @codekit-append "plugins/jquery.smoothmove.js"
// @codekit-append "plugins/jquery.stickly.js"
// @codekit-append "plugins/jquery.moby.js"

/*
function gr(content_width) {
  
	var base_font = 18,
		phi = (1 + Math.sqrt(5)) / 2,
		x = 1 / (2 * phi),
		y = base_font * phi,
		z = content_width / (y * y),
		h = phi - x * (1 - z),
		l = base_font * h;
	
	return Math.round(l);
}
*/

(function($) {

/*
(function(window, document, undefined) {
	
  'use strict';
	
  var documentElement = document.documentElement;
	
  function updateFontsize() {
    
    var currentFontsize;
    
    currentFontsize = (gr(documentElement.offsetWidth));
    
	$('[class*="col-"]').css({
		lineHeight: currentFontsize + 'px'
	});
  }
		
  window.addEventListener('resize', updateFontsize, false);
  window.addEventListener('orientationchange', updateFontsize, false);

  updateFontsize();
}(window, document));

*/

//var $form = $('form');
var formLen = $('.field').length;

function updateProgress(value) {
	
	var $progress = $('.progress'),
		updatedVal = $progress.attr('data-progress', value);
		
	$progress.css({
		width: updatedVal
	});
}

$('input[type=button]').on('click', function() {
	
	var $button = $(this),
		$number = $('.num'),
		value = parseFloat($number.text());
	
	if($button.hasClass('last')) {
		
		if(value > 1) {
			value--;
		} else {
			value = 1;
		}
		updateProgress(value);
	}
		
	if($button.hasClass('next')) {
		
		if(value !== formLen) {
			value++;
			updateProgress(value);
		}
	}
	
	$number.text(value);
});

})(jQuery);