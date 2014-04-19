<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('typeset'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	
	<header class="post-header">
		<h1 class="heading" itemprop="headline"><?php the_title(); ?></h1>
		<!-- MAYBE ADD SUB-TITLE FUNCTIONALITY <h2 class="sub-heading">Hi I'm a sub title<?php //the_sub_title(); ?></h2> -->
		<?php get_template_part('partials/post', 'meta'); ?>
	</header>
	
	<section class="post-content" itemprop="articleBody">
		<?php the_post_thumbnail('post-thumbnail', array('itemprop'=>'image')); ?>
		<?php the_content(); ?>
	</section>
	
	<footer class="post-footer">
		<?php the_category(', '); ?>
		<?php // SHARE BUTTONS HERE ?>
	</footer>
	
	<?php comments_template(); ?>
	
</article>

<?php endwhile; else : ?>

<p class="no-post"><?php _e( 'Sorry post could not be found.', 'origin' ); ?></p>

<?php endif; ?>

<?php get_footer(); ?>