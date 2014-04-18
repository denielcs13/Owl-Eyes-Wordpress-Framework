<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>

<?php 
// the query to set the posts per page to 3
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('paged' => $paged);
query_posts($args); ?>
<!-- the loop -->
<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		<?php
		    echo '<li>';
    the_title();
    echo '</li>';
    ?>
<?php endwhile; ?>
<?php else : ?>
<!-- No posts found -->
<?php endif; ?>


<?php echo $OE->pagination(); ?>

<?php get_footer(); ?>