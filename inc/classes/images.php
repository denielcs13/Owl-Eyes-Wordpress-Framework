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

/*
add_filter( 'image_send_to_editor', 'fancy_capable', 10, 7);
       function fancy_capable($html, $id, $alt, $title, $align, $url, $size ) {
           $url = wp_get_attachment_url($id); // Grab the current image URL
           $html = '<a href="' . $url .  '" class="fancybox" rel="your-rel"><img src="..." /></a>';
           return $html;
       }
*/

class OE_Img_Rebuild {

	var $align_class;
 
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
				
				// set variable so we can add it to figure
				if( in_array( $class_segs[0], $allowed_classes ) ) {
					//$img .= ' class="' . $class_segs[0] . '"';
					$this->align_class = $class_segs[0];
				}
				
				// Finish up the img tag
				$img .= ' />';
				
				return array($img, $class_segs[0]); 
			}
		} catch ( Exception $e ) {}
		
		// Tag not an img, so just return it untouched
		return $tag;
	}
 
	/**
	* Search post content for images to rebuild, remove p tag & use a figure tag cause we like HTML5 :)
	*/
	public function the_content( $html ) {
		
		$html = preg_replace_callback( 
			'|(<img.*/>)|', 
			array( $this, 'the_content_callback' ),
			$html
		);
	
		return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure class="'.$this->align_class.'">$1</figure>', $html);
	}
 
	/**
	* Rebuild an image in post content
	*/
	private function the_content_callback( $match ) {
	
		return $this->recreate_img_tag( $match[0] )[0];
	}
	
	/**
	* Rebuild an image in post content
	*/
	private function the_content_align( $match ) {
	
		return $this->recreate_img_tag( $match[0] )[1];
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
		
		// change to nicer align classes
		switch($attr['align']) {
			
			case 'alignleft':
				
				$align = 'align-left';
				break;
			
			case 'aligncenter':
				
				$align = 'align-right';
				break;
			
			case 'aligncenter':
				
				$align = 'align-center';
				break;
			
			default:
				
				$align = 'align-none';
				break;
		}
		
		// add classes to caption
		$attributes  = '';
		
		$attributes .= ' class="' . esc_attr( $align ) . '"';
		
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