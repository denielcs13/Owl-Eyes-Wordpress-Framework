/*---------------------------
 Auto Type
 - Allows either a singular phrase, or array of phrases to be typed out recursively
----------------------------*/

/*****************************************

	TODO:
	- add highlight function
	- as well as delete after highlight
	- change cursor type (probably by adding/removing classes)
	- add options for a callback after each iteration through words
	- add options for being able to loop or not

*****************************************/

$.fn.autotype = function( strings ) {
	
	var	$this = $(this),
		pause = 1500,
		loop = false,
		index = 0,
		cursor = false, //'&#124;', // '&#124;' = '| vertical line' ▌  &#9612;||&#x25ae; '&#95;' = '_underscore'
		humanize = Math.round(Math.random() * (100 - 30)) + 120;
	
	function writeString(el, string, i, cb) {

		el.html(function(_, html) {
			
			return html + string[i];
		});
		
		if(i < string.length - 1) {
			
			setTimeout(function() {
				
				writeString(el, string, i + 1, cb);
			}, humanize);
		}
		else {
			
			cb();
		}
	}
	
	// does the next array contain any of the same words
	// if so lets stop and not erase them and call our callback
	
	function clearString(el, cb) {
		
		var length;
		
		el.html(function(_, html) {
			
			length = html.length;
			return html.substr(0, length - 1);
		});
		
		if(length > 1) {
			
			setTimeout(function () {
				
				clearString(el, cb);
			}, humanize/2);
		
		//} else if() {
			
			
		} else {
		
			cb();
		}
	}
	
	function build(el) {
			
		setTimeout(function() {
			
			// type
			writeString(el, strings[index], 0, function() {
				
				if(!loop && index === strings.length - 1) {
					
					// we'll do something here one day
				} else {
				
					// reset index back to the beginning if we're at the end
					if(index === strings.length - 1) {
						index = 0;
					}
				
					// delete
					setTimeout(function() {
					
						clearString(el, function() {
							
							index++;
							
							build(el);
						});
					}, pause);
				}
			});
		}, 500);
	}
	
	return this.each(function() {
	
		// insert cursor after content
		if(cursor) {
			$('<span class="cursor">' + cursor + '</span>').insertAfter($this);
		}
		
		// build the type effect
		build($this);
	});
};