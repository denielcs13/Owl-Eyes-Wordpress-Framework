<!DOCTYPE HTML>
<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) echo 
'<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
 <!--[if IE 9]> <html class="ie9"> <![endif]-->';
?>
<head>

<title><?php bloginfo('name'); if ( is_singular() ) { the_title(' &#124; '); } ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />

<!-- use the latest (edge) version of IE rendering engine -->
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<!--
TODO: Let's make this a webapp !
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="/apple-touch-icon-114x114.png"> <-- 152x152
<link rel="apple-touch-startup-image" href="/splash-startup.png"> <-- 320 x 480, 640x1096
<link rel="apple-touch-startup-image" sizes="640x1096" href="/splash-startup.png">

<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
-->

<!--
TODO: FACEBOOK META TAGS, add option for turning on/off
<meta name="description" property="og:description" content="My meta description copy." />
<meta property="og:title" content="Test page" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://example.com/ogtest.html" />
-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<!--
<header id="header">
<section id="masthead" >
<div id="branding" role="banner">
…
</div>

<nav id="access" role="navigation">
…
</nav>
</section>
</header>
-->

<header id="main-header" class="group">
	<div id="header">
		<a href="<?php echo get_option('home'); ?>/" class="logo">Origin</a>            
		<span id="search"></span>
		<span id="toggle"></span>
		<nav>
		<?php 
		wp_nav_menu(
			array(
				'theme_location' => 'header',
				'container' => false,
				'items_wrap' => '<ul id="%1$s">%3$s</ul>'
			)
		); 
		?>
		</nav>
	</div>
</header>

<!-- <section> -->