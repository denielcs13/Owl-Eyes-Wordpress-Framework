<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

<?php

/* TODO: 

	Check on live form validation using HTML5 required attribute
	Autocomplete? -> x-autocompletetype=””
	Check why firefox focus is soooo harsh
*/

?>

<form action="" class="container">

<fieldset>
	<div class="field col-6">
		<label>
			First Name*
			<input type="text" name="fname" class="validate" data-validate-error="" data-validate-type="">
		</label>
	</div>
	<div class="field col-6">
		<label>
			Last Name*
			<input type="text" name="last_name" class="validate" data-validate-error="" data-validate-type="">
		</label>
	</div>
	<div class="field col-6">
		<label>
			Email*
			<input type="email" name="email" class="validate" data-validate-error="" data-validate-type="">
		</label>
	</div>
	<div class="field col-6">
		<label>
			Phone
			<input type="tel" name="phone" class="validate" data-validate-error="" data-validate-type="" maxlength="16" required>
		</label>
	</div>
	<div class="select col-6">
		<label>
			Country*
			<select name="country" class="validate">
				<option selected="" value="">
					&nbsp;
				</option>
				<option value="UNITED STATES">
					United States
				</option>
				<option value="AFGHANISTAN">
					Afghanistan
				</option>
				<option value="ALBANIA">
					Albania
				</option>
				<option value="ALGERIA">
					Algeria
				</option>
			</select>
	</div>
	<div class="field col-6">
		<label>
			Zip Code*
			<input type="text" pattern="\d*" maxlength="10">
		</label>
	</div>
	<div class="field col-12">
		<label>How would you like to stay involved?</label>
		<ul>
			<li>
				<label><input type="checkbox" value="1">Just keep me informed about the latest Glass news</label>
			</li>
			<li>
				<label><input type="checkbox" value="1">If a spot opens up, I want to purchase Glass and become an Explorer</label>
			</li>
		</ul>
	</div>
</fieldset>
<div class="col-12">
	<input type="submit" class="button primary" value="submit">
</div>
</form>

<?php get_footer(); ?>