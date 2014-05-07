<?php global $OE; ?>
<div class="post-meta">
	<?php echo '<span class="author byline">'. __('by', 'ftn') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author">'. get_the_author() .', </a></span>'; ?>
	<?php echo '<time datetime="'. get_the_time('c') .'">'. get_the_time('F jS, Y') .'</time>'; ?>
	<?php the_category(', ') ?>
	<?php echo $OE->comment_count(); ?>
	<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
</div>