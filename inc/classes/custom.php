<?php

/**
 * OE class
 *
 * This class uses custom functions to be used throughout
 * this Wordpress theme
 *
 * @author     Travis Arnold
 * @since      version 0.1
 */
class OE {
	
	function __construct() {

		// Add support for custome template directories
		$this->template_redirects(); // TODO: generate list automatically
		
	}
	
	/**
	 * In an effort to keep our theme structure clean, we reroute the
	 * way templates are loaded, storing them in in the "templates" directory.
	 * 
	 * @access public
	 * @param mixed $single array of registerd custom post types
	 * @param mixed $taxonomies array of registered custom taxonomies
	 * @return void
	 */
	function template_redirects( $single = array(), $taxonomies = array() ) {
		
		// load single & archive templates
		add_filter( 'template_include', function( $template ) use ( $single ) {
		
			global $post;
			
			if( !empty($post) ) {
				$post_type = $post->post_type;
				
				if( in_array( $post_type, $single ) ) {
				
					if( is_post_type_archive( $post_type ) ) {
			
						return __DIR__ . '/templates/archive/'. $post_type .'.php';
					}		
					return __DIR__ . '/templates/single/' . $post_type . '.php';
				}
			}
		
			return $template;
		});
		
		// load taxonomy templates
		add_filter( 'template_include', function( $template ) use ( $taxonomies ) {
		
			$taxonomy = get_query_var( 'taxonomy' );
		
			if( in_array( $taxonomy, $taxonomies ) ) {
				
				$new_template = __DIR__ . '/templates/taxonomy/'. $taxonomy .'.php';
			
				if ( !empty($new_template) ) {
					return $new_template ;
				}
			}
		
			return $template;
		});
		
	}
	
	/**
	 * Get the name of a registered menu, useful for footer menus.
	 * 
	 * TODO: combine this function within custom footer walker
	 *
	 * @access public
	 * @param mixed $location i.e. "header"
	 * @return object
	 */
	function get_menu_name( $location ) {
	
		if( empty($location) )
			return false;
		
		$locations = get_nav_menu_locations();
		
		if( !isset($locations[$location]) )
			return false;
		
		return get_term( $locations[$location], 'nav_menu' );
	}
	
	/**
	 * Encrypt a string, used mainly to stop email spam.
	 * 
	 * @access public
	 * @param mixed $email
	 * @return encrypted string
	 */
	function encrypt( $string ) {
	    
	    $p = str_split(trim($string));
	    
	    $new_str = '';
	    
	    foreach ($p as $val) {
	    	$new_str .= '&#'.ord($val).';';
	    }
	    
	    return $new_str;
	}
	
	/**
	 * Retrieve an absolute path to template page.
	 * 
	 * @access public
	 * @param mixed $template (/templates/template.php)
	 * @return absolute path to page using template
	 */
	function template_link( $template ) {
		
		global $wpdb;
	    
	    $pages = $wpdb->get_row(
	    "
	    SELECT post_id 
	    FROM $wpdb->postmeta 
	    WHERE meta_key='_wp_page_template'
	    AND meta_value='".$template."'
	    "
	    , ARRAY_A); 
	    
	    return get_permalink( $pages['post_id'] );
	}

}

$GLOBALS['OE'] = new OE;