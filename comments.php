<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
global $OE;
?>

<?php if ( have_comments() ) : ?>

	<h3 class="comments-title">
		<?php _e( 'Join The Discussion', 'origin' ); ?>
	</h3>
	
	<article id="comments" itemprop="comments">
		<h4 class="comment-count" itemprop="commentCount"><?php echo $OE->comment_count(); ?></h4>
		
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 34,
				) );
			?>
		</ol>
		
		<?php if ( get_option( 'page_comments' ) && get_comment_pages_count() > 1 ) : ?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment Navigation', 'origin' ); ?></h1>
			<div class="nav-prev"><?php previous_comments_link( __( '&larr; Older Comments', 'origin' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'origin' ) ); ?></div>
		</nav>
	</article>
	
	<?php // maybe use this -> paginate_comments_links(); ?>
	<?php endif; ?>
	
	<?php if ( !comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'origin' ); ?></p>
	<?php endif; ?>

<?php endif; ?>

<?php comment_form( array( 'label_submit' => __('Submit Comment')) ); ?>