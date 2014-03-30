<?php

// Set Variables For Function Libraries
define("THEME_DIR", get_template_directory_uri());
$includes_path = TEMPLATEPATH . '/inc/';

// Includes
include ($includes_path . '/classes/cleanser.php');
include ($includes_path . '/classes/custom.php');
include ($includes_path . '/classes/walkers.php');

// Add Menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'header' => 'Header',
			'footer' => 'Footer',
		)
	);
}

// Load Stylesheets
function oe_enqueue_styles() {
	
	global $is_IE;

	// Default Styles
	wp_register_style( 'app', THEME_DIR . '/css/app.css');
	//wp_register_style( 'ie', THEME_DIR . '/css/main-ie.css');
	
	//if ( !$is_IE ) {
		wp_enqueue_style('app');
	//} else {
	//	wp_enqueue_style('ie');
	//}
	
}
add_action( 'wp_enqueue_scripts', 'oe_enqueue_styles' );

function oe_enqueue_scripts() {

	// Load jQuery
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'));

	// Load Default JS
	wp_enqueue_script( 'app', THEME_DIR . '/js/app.min.js', '', '', true);

}
add_action( 'wp_enqueue_scripts', 'oe_enqueue_scripts' );

// Register Google Web Fonts
function load_fonts() {
	wp_register_style( 'googlefonts', ('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Bree+Serif'));
	wp_enqueue_style( 'googlefonts' );
}
add_action( 'wp_enqueue_scripts', 'load_fonts' );