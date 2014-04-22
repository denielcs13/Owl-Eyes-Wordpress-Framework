// @codekit-append "plugins/jquery.autotype.js"
// @codekit-append "plugins/jquery.smoothmove.js"
// @codekit-append "plugins/jquery.stickly.js"
// @codekit-append "plugins/jquery.moby.js"

(function($) {

//var $form = $('form');
var formLen = $('.field').length;

function updateProgress(value) {
	
	var $progress = $('.progress'),
		updatedVal = $progress.attr('data-progress', value);
		
	$progress.css({
		
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