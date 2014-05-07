<?php /* Template Name: Style Guide */ ?>
<!DOCTYPE HTML>
<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) echo 
'<!--[if lt IE 7]>     <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->';
?>
<head>

<title><?php bloginfo('name'); if ( is_singular() ) { the_title(' &#124; '); } ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<?php wp_head(); ?>
</head>

<body>

<div class="container">

<div class="col-12">
	<h1>Color Swatches</h1>
	
	<div class="col-2">
		<h4>Primary</h4>
		<ul class="swatch">
			<li class="primary"></li>
			<li class="primary-light"></li>
			<li class="primary-dark"></li>
		</ul>
	</div>
	
	<div class="col-2">
		<h4>Secondary</h4>
		<ul class="swatch">
			<li class="secondary"></li>
			<li class="secondary-light"></li>
			<li class="secondary-dark"></li>
		</ul>
	</div>
	
	<div class="col-2">
		<h4>Accent</h4>
		<ul class="swatch">
			<li class="accent"></li>
			<li class="accent-light"></li>
			<li class="accent-dark"></li>
		</ul>
	</div>
		
	<div class="col-2">
		<h4>Success</h4>
		<ul class="swatch">
			<li class="success"></li>
			<li class="success-light"></li>
			<li class="success-dark"></li>
		</ul>
	</div>
		
	<div class="col-2">
		<h4>Warning</h4>
		<ul class="swatch">
			<li class="warning"></li>
			<li class="warning-light"></li>
			<li class="warning-dark"></li>
		</ul>
	</div>
	
	<div class="col-2">
		<h4>Error</h4>
		<ul class="swatch">
			<li class="error"></li>
			<li class="error-light"></li>
			<li class="error-dark"></li>
		</ul>
	</div>
</div>


<h1>Button States</h1>

<div>
<button>Default</button>
<button class="hover">Default</button>
<button class="active">Default</button>
</div>

<div>
<button class="primary">Primary</button>
</div>

<div>
<button class="success">Success</button>
</div>

<div>
<button class="warning">Warning</button>
</div>

<div>
<button class="error">Error</button>
</div>

<div class="container col-7">

<h1>CSS Basic Elements</h1>

<p>The purpose of this HTML is to help determine what default settings are with CSS and to make sure that all possible HTML Elements are included in this HTML so as to not miss any possible Elements when designing a site.</p>

<hr />

<h1>Headings</h1>

<h1>Heading 1 <small>Sub-heading</small></h1>
<h2>Heading 2 <small>Sub-heading</small></h2>
<h3>Heading 3 <small>Sub-heading</small></h3>
<h4>Heading 4 <small>Sub-heading</small></h4>
<h5>Heading 5 <small>Sub-heading</small></h5>
<h6>Heading 6 <small>Sub-heading</small></h6>

<hr />

<h1>Body Copy</h1>

<!--<img src="http://placehold.it/300x350" alt="placeholder" />-->

<p class="lead">Communicated counter. Pay coast having time where <a href="#">stairs writer's</a> and crew regretting fur he name without.</p>

<p>To upon far her mind approved at passion experience well would stand had of necessary process and all was the two to their such he they of behind not how semantics, is from great times, <q>to make little manage <q>the would little o'clock</q> getting a and he'd brief by what drops.</q> And they there's to conflict- set interfaces in degree to late, something clean thousand offers and harmonics, peacefully, past, broader over any the would can to copy, if and whose in considerations, the effort and a your of lowest deeply it behavioural you simple, times, of the consider clearly.</p>

<blockquote>
<p>Citations … all include the following: author (or editor, compiler, or translator standing in place of the author), title (and usually subtitle), and date of publication.</p>
<footer><cite><a href="http://www.chicagomanualofstyle.org/">The Chicago Manual of Style</a></cite>, 15th Edition (Chicago: University of Chicago Press, 2003), 596</footer>
</blockquote>

<p>It insurance tickets or chosen thing their and time details cognitive the similar knowing principles, cons, out so commas, by coast differences secretly concept did him, and to considerations, go. <strong>An small the with for the be be, seal in honor;</strong> More at turned been bad moving understanding become textile as into insidious help spots to man on and to sister themselves shall said be that may gentlemen, we cache the had taken with dropped way, area the thousands for of he'd the now, home, more turn was any it the though to more never they employed a his concepts.</p>

<p><small><em>Written exclusively for WDD by Thursday Bram.</em></small></p>

<p><strong><em>Do you follow these rules and others?&nbsp; Please share your views below…</em></strong></p>

<hr />

<h1>List Types</h1>

<div class="col-4">
	<h5>Ordered List</h5>
	<ol>
		<li>List Item 1
			<ol>
				<li>List Item 1</li>
				<li>List Item 2</li>
				<li>List Item 3</li>
			</ol>
		</li>
		<li>List Item 2</li>
		<li>List Item 3</li>
	</ol>
</div>

<div class="col-4">
	<h5>Unordered List</h5>
	<ul>
		<li>List Item 1
			<ul>
				<li>List Item 1</li>
				<li>List Item 2</li>
				<li>List Item 3</li>
			</ul>
		</li>
		<li>List Item 2</li>
		<li>List Item 3</li>
	</ul>
</div>

<div class="col-4">
	<h5>Definition List</h5>
	<dl>
		<dt>Definition List Title</dt>
		<dd>This is a definition list division.</dd>
	</dl>
	<dl>
		<dt>Definition List Title</dt>
		<dd>This is a definition list division.</dd>
	</dl>
	<dl>
		<dt>Definition List Title</dt>
		<dd>This is a definition list division.</dd>
	</dl>
</div>

<hr />

<h1 id="form_elements">Fieldsets, Legends, and Form Elements</h1>

<fieldset>
	<legend>Legend</legend>
	
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.</p>
	
	<form>
		<h2>Form Element</h2>
		
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.</p>
		
		<p><label for="text_field">Text Field:</label><br />
		<input type="text" id="text_field" /></p>
		
		<p><label for="text_area">Text Area:</label><br />
		<textarea id="text_area"></textarea></p>
		
		<p><label for="select_element">Select Element:</label><br />
			<select name="select_element">
			<optgroup label="Option Group 1">
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</optgroup>
			<optgroup label="Option Group 2">
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</optgroup>
		</select></p>
		
		<p><label for="radio_buttons">Radio Buttons:</label><br />
			<input type="radio" class="radio" name="radio_button" value="radio_1" /> Radio 1<br/>
				<input type="radio" class="radio" name="radio_button" value="radio_2" /> Radio 2<br/>
				<input type="radio" class="radio" name="radio_button" value="radio_3" /> Radio 3<br/>
		</p>
		
		<p><label for="checkboxes">Checkboxes:</label><br />
			<input type="checkbox" class="checkbox" name="checkboxes" value="check_1" /> Radio 1<br/>
				<input type="checkbox" class="checkbox" name="checkboxes" value="check_2" /> Radio 2<br/>
				<input type="checkbox" class="checkbox" name="checkboxes" value="check_3" /> Radio 3<br/>
		</p>
		
		<p><label for="password">Password:</label><br />
			<input type="password" class="password" name="password" />
		</p>
		
		<p><label for="file">File Input:</label><br />
			<input type="file" class="file" name="file" />
		</p>
		
		
		<p><input class="button" type="reset" value="Clear" /> <input class="button" type="submit" value="Submit" />
		</p>
		

		
	</form>
	
</fieldset>

<small><a href="#wrapper">[top]</a></small>
<hr />

<h1 id="tables">Tables</h1>

<table cellspacing="0" cellpadding="0">
	<tr>
		<th>Table Header 1</th><th>Table Header 2</th><th>Table Header 3</th>
	</tr>
	<tr>
		<td>Division 1</td><td>Division 2</td><td>Division 3</td>
	</tr>
	<tr class="even">
		<td>Division 1</td><td>Division 2</td><td>Division 3</td>
	</tr>
	<tr>
		<td>Division 1</td><td>Division 2</td><td>Division 3</td>
	</tr>

</table>

<small><a href="#wrapper">[top]</a></small>
<hr />

<h1 id="misc">Misc Stuff - abbr, acronym, pre, code, sub, sup, etc.</h1>

<p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. <cite>cite</cite>. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.  <abbr title="Avenue">AVE</abbr></p>

<pre><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.  <abbr title="Avenue">AVE</abbr></p></pre>

</div>

</div>

<script type='text/javascript' src='http://traviss-mac-pro.local:5757/playground/wp-content/themes/origin/js/app.js'></script>
</body>
</html>