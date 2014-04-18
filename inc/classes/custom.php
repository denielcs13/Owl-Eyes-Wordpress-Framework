<?php

/**
 * OE class
 *
 * This class uses custom functions to be used throughout
 * this Wordpress theme, a class is used so there is no
 * confliction with other core/plugin function names.
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
	
	
	/**
	 * Paginate links.
	 * Ripped from Wordpress core and modified to our liking :) 
	 *
	 * @access public
	 * @param string $args (default: '')
	 * @return void
	 */
	function pagination() {
		
		global $wp_query, $wp_rewrite;
		
		$defaults = array(
			'base' => str_replace( 999999999, '%#%', esc_url(get_pagenum_link(999999999)) ),
			'format' => '/page/%#%',
			'total' => $wp_query->max_num_pages,
			'show_all' => false,
			'prev_text' => __('Prev Page'),
			'next_text' => __('Next Page'),
			'end_size' => 1,
			'mid_size' => 2,
			'before_page_number' => '',
			'after_page_number' => ''
		);
		extract($defaults, EXTR_SKIP);
		
		// Who knows what else people pass in $args
		$total = (int) $total;
		if ( $total < 2 )
			return;
		$current = ( $wp_query->query_vars['paged'] > 1 ) ? $wp_query->query_vars['paged'] : 1;
		$end_size = 0  < (int) $end_size ? (int) $end_size : 1;
		$mid_size = 0 <= (int) $mid_size ? (int) $mid_size : 2;
		$page_links = array();
		$n = 0;
		$dots = false;
		
		// Previous page link
		if ( $current && $current > 1 ):
			
			$link = str_replace('%#%', $current - 1, str_replace('%_%', $current == 2 ? '' : $format, $base));
			
			$page_links[] = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate', $link ) ) . '">' . $prev_text . '</a>';
		else:
			$page_links[] = '<span class="prev page-numbers disabled">' . $prev_text . '</span>';
		endif;
		
		// Page links
		for ( $n=1; $n <= $total; $n++ ) :
			
			if ( $n == $current ):
			
				$page_links[] = '<span class="page-numbers current">' . $before_page_number . number_format_i18n( $n ) . $after_page_number . '</span>';
				$dots = true;
			else:
			
				if ( $show_all || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
					$link = str_replace('%_%', $n == 1 ? '' : $format, $base);
					$link = str_replace('%#%', $n, $link);
					
					$page_links[] = '<a class="page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $before_page_number . number_format_i18n( $n ) . $after_page_number . '</a>';
					$dots = true;
				elseif ( $dots && !$show_all ) :
					
					$page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
					$dots = false;
				endif;
			endif;
		endfor;
		
		// Next page link
		if ( $current && ( $current < $total || -1 == $total ) ) :
		
			$link = str_replace('%#%', $current + 1, str_replace('%_%', $format, $base));	
			
			$page_links[] = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $next_text . '</a>';
		else:
			$page_links[] = '<span class="next page-numbers disabled">' . $next_text . '</span>';
		endif;
		
		// Make it rain page links
		$r  = '<ul class="pagination"><li>';
		$r .= join('</li><li>', $page_links);
		$r .= '</li></ul>';
		
		return $r;
	}

}

$GLOBALS['OE'] = new OE;