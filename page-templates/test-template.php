<?php
/**
 * Template name: test-template
 *
 * This is a template file for testing
 *
 * @author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * Version 1.0 March 30, 2021
 *
 */
?>
<?php
/*print (' This is the first load.  '); */
 $examplePost = get_post();
 /*var_dump ( $examplePost ); */

 $return_page = 'Location: /wp-content/themes/twentyeleven-child/page-templates/test-template2.php';
$arguments = [ 1 => "test", 2 => 123, 3=> "the end"];
 load_template(get_stylesheet_directory() . '/page-templates/test-template2.php', true, $arguments);
/*get_template_part('page-templates/test-template2');*/

/* header ($return_page);
	
 header ('Connections: close');*/
 exit;
?>
