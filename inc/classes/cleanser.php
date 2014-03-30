<?php

/**
 * Cleanser class
 *
 * This class cleans up Wordpress' default setup
 * and makes it a little more friendly to develop with
 *
 * @author     Travis Arnold
 * @since      version 0.1
 */
class OE_Cleanser {
	
	function __construct() {
		
		// cleanup the header
		add_action('init', array( $this, 'head_cleanup' ));
		
		// cleanup all injected css
		add_action('init', array( $this, 'css_cleanup' ));
		
		// cleanup how imgages are handled
		add_action('init', array( $this, 'img_cleanup' ));
		
	}
	
	/**
	 * Clean up the Wordpress header.
	 * 
	 * @access public
	 * @return void
	 */
	function head_cleanup() {
		
		// category feeds
		remove_action('wp_head', 'feed_links_extra', 3);
		
		// post & comment feeds
		remove_action('wp_head', 'feed_links', 2);
		
		// really simple discovery
		remove_action('wp_head', 'rsd_link');
		
		// windows live writer
		remove_action('wp_head', 'wlwmanifest_link');
		
		// index link
		remove_action('wp_head', 'index_rel_link');
		
		// previous link
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		
		// start link
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		
		// links for adjacent posts
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		
		// WP version number
		remove_action('wp_head', 'wp_generator');
		
		// remove WP version from RSS
		add_filter('the_generator', function() { return ''; });
		
		// remove WP version from css
		add_filter('style_loader_src', array($this,'remove_enqueued_ver'), 9999);
  
		// remove WP version from scripts
		add_filter('script_loader_src', array($this,'remove_enqueued_ver'), 9999);
	}
	
	/**
	 * Remove the version number from enqueued styles & scripts
	 * 
	 * @access public
	 * @param mixed $src
	 * @return void
	 */
	function remove_enqueued_ver( $src ) {
	
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		
		return $src;
	}
	
	/**
	 * Clean up all the injected CSS from Wordpress.
	 * 
	 * @access public
	 * @return void
	 */
	function css_cleanup() {
		
		// remove injected css for recent comments widget
		add_filter( 'wp_head', function() {
			
			if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
				
				remove_filter('wp_head', 'wp_widget_recent_comments_style' );
			}
		}, 1);
		
		// clean up comment styles in the head
		add_action('wp_head', function() {
		
			global $wp_widget_factory;
			
			if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
			
			remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
			}
		}, 1);
		
		// remove injected CSS from gallery
		add_filter('gallery_style', function($css) {
			
			return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
		});
		
	}
	
	
	/**
	 * Clean up how Wordpress handles images.
	 * 
	 * @access public
	 * @return void
	 */
	function img_cleanup() {
		
		// remove image size attributes
		add_filter( 'post_thumbnail_html', array( $this, 'remove_size_attributes' ), 10 );
		add_filter( 'image_send_to_editor', array( $this, 'remove_size_attributes' ), 10 );
		
		// clean up img tag classes
		add_filter('get_image_tag_class', function($class, $id, $align, $size) {
		
			return 'align' . esc_attr($align);	
		}, 0, 4);
		
		// remove p tag from images & use a figure tag cause we like HTML5 :)
		add_filter( 'the_content', function($pee) {
		    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
		    return $pee;
		}, 30);
		
	}
		
	/**
	 * Remove Image Width & Height Attributes.
	 * 
	 * @access public
	 * @param mixed $html
	 * @return void
	 */
	function remove_size_attributes( $html ) {
		
		return preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	}
	
}

$oe_clean = new OE_Cleanser;