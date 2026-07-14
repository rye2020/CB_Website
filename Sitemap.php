<?php
/**
 * Template Name: Sitemap
 *
 * Displays all pages and posts for the site.
 *
 * @Author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @since Twenty Eleven_Child 1.0
 */
get_header(); ?>
        <style scoped>
           #map-container {
              background: white; 
              width: 100%;}
           #jrmarchive {
              background: lightblue; }
           #secondary {
              background: white; 
              float: right;}
           </style>

		<!--<?php the_post(); ?>-->

		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<!--<?php get_search_form(); ?>-->

    <div id="map-container">
		<div id="jmarchive" style="float:left; clear:both; width:40%;"> 
			<ul>
		     <h2><li><strong>Posts</strong></li></h2>
		        <ul>
                    <?php wp_get_archives( array(
		'type'		=>'postbypost', 
		'order'		=>'DESC',
		'after'		=> ' ',
		'post_type'	=> 'post',
		)
	); ?>
                </ul>
  		     <br><br>
				</div>
			<div id="jmarchive" style="float:right;  width:40%;">
  			<?php wp_list_pages( array (
	'post_type'		=> 'page',
	'sort_column' 	=> 'post_date',
	'sort_order'	=> 'DESC',
	'exclude'		=> '2287, 3629, 892, 3622, 3659, 3376, 3959, 6559',
	'show_date'		=> 'standard',
			)
			)?>
			</ul>
		
            </div>
<!--<?php get_sidebar(); ?>-->
            </div><!-- #map-container -->

<?php get_footer(); ?>