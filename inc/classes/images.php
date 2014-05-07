<?php

/**
 * Image class
 *
 * This class rebuilds Wordpress' default images
 * to help keep them responsive and weed out what
 * we do not need
 *
 * HUGE thanks to Brian for this class
 * http://blog.skunkbad.com/wordpress/another-look-at-rebuilding-image-tags
 *
 * @author     Travis Arnold
 * @since      version 0.1
 */

class OE_Img_Rebuild {
 
	public function __construct() {
	
		add_filter( 'img_caption_shortcode', array( $this, 'img_caption_shortcode' ), 1, 3 );
	
		add_filter( 'get_avatar', array( $this, 'recreate_img_tag' ) );
	
		add_filter( 'the_content', array( $this, 'the_content') );
	}
 
	public function recreate_img_tag( $tag ) {
	
		// Supress SimpleXML errors
		libxml_use_internal_errors( true );
		
		try {
		
			$x = new SimpleXMLElement( $tag );
			
			// We only want to rebuild img tags
			if( $x->getName() == 'img' ) {
			
				// Get the attributes I'll use in the new tag
				$alt        = (string) $x->attributes()->alt;
				$src        = (string) $x->attributes()->src;
				$classes    = (string) $x->attributes()->class;
				$class_segs = explode(' ', $classes);
				
				// All images have a source
				$img = '<img src="' . $src . '"';
				
				// If alt not empty, add it
				if( !empty( $alt ) ) {
					$img .= ' alt="' . $alt . '"';
				}
				
				// Only alignment classes are allowed
				$allowed_classes = array( 
					'alignleft', 
					'alignright', 
					'alignnone', 
					'aligncenter'
				);
				
				if( in_array( $class_segs[0], $allowed_classes ) ) {
					$img .= ' class="' . $class_segs[0] . '"';
				}
				
				// Finish up the img tag
				$img .= ' />';
				
				return $img; 
			}
		} catch ( Exception $e ) {}
		
		// Tag not an img, so just return it untouched
		return $tag;
	}
 
	/**
	* Search post content for images to rebuild
	*/
	public function the_content( $html ) {
	
		// remove p tag from images & use a figure tag cause we like HTML5 :)
		$html = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $html);
	
		return preg_replace_callback( 
			'|(<img.*/>)|', 
			array( $this, 'the_content_callback' ),
			$html
		);
	}
 
	/**
	* Rebuild an image in post content
	*/
	private function the_content_callback( $match ) {
	
		return $this->recreate_img_tag( $match[0] );
	}
	
	/**
	* Customize caption shortcode
	*/
	public function img_caption_shortcode( $output, $attr, $content ) {
	
		// not for feed
		if ( is_feed() )
			return $output;
		
		// set up shortcode atts
		$attr = shortcode_atts( array(        
			'align'   => 'alignnone',        
			'caption' => '',
			'width'   => ''
		), $attr );
		
		// add classes to caption
		$attributes  = '';
		
		$attributes .= ' class="' . esc_attr( $attr['align'] ) . '"';
		
		// create caption HTML
		$output = '
			<figure' . $attributes .'>' . 
				do_shortcode( $content ) . 
				'<figcaption>' . $attr['caption'] . '</figcaption>' . 
			'</figure>
		';
		
		return $output;
	}
}

$oe_img_rebuild = new OE_Img_Rebuild;