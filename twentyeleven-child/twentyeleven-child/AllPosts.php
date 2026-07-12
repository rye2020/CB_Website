<?php
/**
 * Template Name: AllPosts
 *
 * Displays all posts for the site.
 *
 * @Author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @since Twenty Eleven_Child 1.0
 *    3-01-2026
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
		<div id="jrmarchive" class="j1col2no" > 
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
			
<!--<?php get_sidebar(); ?>-->
            </div><!-- #map-container -->

<?php get_footer(); ?>