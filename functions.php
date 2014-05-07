<?php

// Set Variables For Function Libraries
define("THEME_DIR", get_template_directory_uri());

$includes_path = TEMPLATEPATH . '/inc/';

// Includes
include ($includes_path . '/classes/cleanser.php');
include ($includes_path . '/classes/custom.php');
//include ($includes_path . '/classes/walkers.php');

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

	// Load Prefixfree
	//wp_enqueue_script( 'prefixfree', THEME_DIR . '/js/prefixfree.min.js');

	// Load Default JS
	wp_enqueue_script( 'app', THEME_DIR . '/js/app.js', '', '', true);

}
add_action( 'wp_enqueue_scripts', 'oe_enqueue_scripts' );

// Register Google Web Fonts
function load_fonts() {
	wp_register_style( 'googlefonts', ('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Bree+Serif'));
	wp_enqueue_style( 'googlefonts' );
}
add_action( 'wp_enqueue_scripts', 'load_fonts' );

function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}