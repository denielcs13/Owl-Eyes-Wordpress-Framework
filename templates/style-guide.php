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

<h1>CSS Basic Elements</h1>

<p>The purpose of this HTML is to help determine what default settings are with CSS and to make sure that all possible HTML Elements are included in this HTML so as to not miss any possible Elements when designing a site.</p>

<hr />

<div class="container">

<div class="col-8 typeset">
	<h3>Typography</h3>
	
	<!--<div class="col-12">-->
		<h1>Heading 1</h1>
	<!--</div>-->
	<!--<div class="col-12">-->
		<h2>Heading 2</h2>
	<!--</div>-->
	<!--<div class="col-12">-->
		<h3>Heading 3</h3>
	<!--</div>-->
	<!--<div class="col-12">-->
		<h4>Heading 4</h4>
	<!--</div>-->
	<!--<div class="col-12">-->
		<h5>Heading 5</h5>
	<!--</div>-->
	<!--<div class="col-12">-->
		<h6>Heading 6</h6>
	<!--</div>-->

<hr />

<h1 id="paragraph">Paragraph</h1>

<!--<img src="http://placehold.it/300x350" alt="placeholder" />-->

<p>Communicated counter. Pay coast having time where stairs writer's and crew regretting fur he name without. Written economics said I the beginning a is like…. On the that although at the from home, his of the drew necessary disguised regulatory the were it the line gm the she they thing.</p>

<p>To upon far her mind approved at passion experience well would stand had of necessary process and all was the two to their such he they of behind not how semantics, is from great times, to make little manage the would little o'clock getting a and he'd brief by what drops. And they there's to conflict- set interfaces in degree to late, something clean thousand offers and harmonics, peacefully, past, broader over any the would can to copy, if and whose in considerations, the effort and a your of lowest deeply it behavioural you simple, times, of the consider clearly.</p>

<p>It insurance tickets or chosen thing their and time details cognitive the similar knowing principles, cons, out so commas, by coast differences secretly concept did him, and to considerations, go. An small the with for the be be, seal in honour; More at turned been bad moving understanding become textile as into insidious help spots to man on and to sister themselves shall said be that may gentlemen, we cache the had taken with dropped way, area the thousands for of he'd the now, home, more turn was any it the though to more never they employed a his concepts.</p>

<blockquote>
  
  <p>&ldquo;Lorem ipsum dolor sit amet,
  consectetuer adipiscing elit. In accumsan diam
  vitae velit. Aliquam vehicula, turpis sed egestas
  porttitor, est ligula egestas leo, at interdum
  leo ante ut risus.&rdquo;
  <b>&mdash;Joe Bloggs</b></p>
  
</blockquote>

<hr />

<h1 id="list_types">List Types</h1>

<h3>Definition List</h3>
<dl>
	<dt>Definition List Title</dt>
	<dd>This is a definition list division.</dd>
</dl>

<h3>Ordered List</h3>
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

<h3>Unordered List</h3>
<ul>
	<li>List Item 1
		<ul>
			<li>List Item 1</li>
			<li>List Item 2</li>
			<li>List Item 3
				<ul>
					<li>List Item 1</li>
					<li>List Item 2</li>
					<li>List Item 3</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>List Item 2</li>
	<li>List Item 3</li>
</ul>

<small><a href="#wrapper">[top]</a></small>
<hr />

</div>

<div class="col-1">
1-col
</div>

<div class="col-3">
Sidebar
</div>

</div>


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

<blockquote>
	"This stylesheet is going to help so freaking much." <br />-Blockquote
</blockquote>

<small><a href="#wrapper">[top]</a></small>
<!-- End of Sample Content -->

</body>

</html>