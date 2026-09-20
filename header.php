<?php
/**
 * Default Header template
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 * *
 * @Author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Twenty_One_Child
 * @since Twenty Twenty_One_Child 1.0
 * @version v.1.0 30 July 2026
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
<title><?php
	// Print the <title> tag based on what is being viewed.
	global $page, $paged, $menu;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta http-equiv="X-Frame-Options" content="sameorigin"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"> <!--JM 3/20-->
<!--JRM - include jQuery code  -->	
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
                <!--<h2><scan style="color: blue; font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">Follow us on <a href="www.twitter.com/uscoveredbonds" target="_blank">@UScoveredbonds</a></scan></h2> -->
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
			
				<?php get_search_form(); ?>
			<nav id="access" role="navigation">
				<button class="nav-toggle" aria-expanded="false" aria-controls="menu-menu-a">
					<span class="screen-reader-text">Menu</span>
					<span class="nav-toggle-bars"></span>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->

	</header><!-- #branding JM -->


	<div id="main">
