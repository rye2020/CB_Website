<?php
/**
 * Header template for New_Front Page
 *
 * Displays all of the <head> section.
 *
 *
 * @Author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @since Twenty Eleven_Child 1.0
 * @February 21, 2016
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) & !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="msvalidate.01" content="957CB525435BA5E49FCE1E1493C6737E" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<style type='text/css' id='custom-background'>
body.custom-background { background-color: #ffffff; background-image: url('http://www.us-covered-bonds.com/wp-content/uploads/2014/02/US-Capitol-2-e1405966176329.jpg'); background-repeat: no-repeat; background-position: top left; background-attachment: fixed; background-size:auto 1000px; }
</style>

<!--JRM - include sort table code -->
<script src="http://www.us-covered-bonds.com/wp-includes/js/sorttable.js" type="text/javascript"></script> 
<?php

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class($class='custom-background'); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">


			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?><br /><br /><br /></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<?php if ( ! is_singular() ) : ?>
					<div class="skip-link"><a class="assistive-text" href="#secondary"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php endif; ?>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                        
			</nav><!-- #access -->

	</header><!-- #branding -->
     </div><!-- #page -->

<p>Why is this here</p>