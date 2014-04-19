<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
<?php query_posts("paged={$paged}"); ?>

<?php if ( have_posts() ) : ?>

<ul class="posts typeset">

<?php while (have_posts()) : the_post(); ?>
<li class="main-loop post">
	<h2 class="post-title">
		<?php echo '<a href="'. get_permalink() .'" rel="bookmark" title="Read \'' . get_the_title() . '\'">' . get_the_title() . '</a>'; ?>
	</h2>
	<?php get_template_part('partials/post', 'meta'); ?>
	<div class="post-details">
		<?php echo the_excerpt(); ?>
	</div>
</li>
<?php endwhile; ?>

</ul>
<?php echo $OE->pagination(); ?>

<?php else : ?>
	<?php _e('Sorry, no posts at this time. Please check back soon.'); ?>
<?php endif; ?>

<?php get_footer(); ?>