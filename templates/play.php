<?php /* Template Name: Play */ ?>
<?php get_header(); ?>

<form action="#" method="post">
<fieldset>
  <div class="field">
    <label>
      Name
      <input data-validate-type="name" name="full_name" type="text">
    </label>
  </div>
  <div class="field">
    <label>
      Email
      <input data-validate-type="email" name="email" type="text">
    </label>
  </div>
  <div class="field">
    <label>
      Phone
      <input data-validate-type="phone" name="phone" type="text">
    </label>
  </div>
  <div class="field">
    <label>
      Message
      <textarea name="message"></textarea>
    </label>
  </div>
</fieldset>
</form>

<span class="num">1</span>

<input type="button" class="last secondary" value="Last">
<input type="button" class="next primary" value="Next">

<span class="progress" data-progress="1"></span>

<?php get_footer(); ?>