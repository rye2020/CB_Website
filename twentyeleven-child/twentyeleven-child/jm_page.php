<?php 
/**
 * Template Name: jm_page
 *
 * This is the primary page template for loading our own page templates based
 * on parameteres passed by URL
 * 
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 March 23, 2022 
*/
/*get_header();*/?>

	<?php
 	$template = '/page-templates/CBHome';
	$file = 'CBAggregate';
   	if ( $_GET['template'] ) $template = '/page-templates/' . htmlspecialchars($_GET['template']);
 	if ( $_GET['file'] ) $file = htmlspecialchars($_GET['file']);  
	$jm_parm = array();
	$jm_parm['file'] = $file; 

	/* Run the page appropriate template to output the page content.
	 */
	 get_template_part( $template, '', $jm_parm );
	?>

<?php get_footer();?>
