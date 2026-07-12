<?php
/**
 * Template for displaying 'Posts' page as all posts
 *
 * @package WordPress
 * @subpackage Twenty_Eleven-Child
 * @author JMarlatt
 
 * Test for page name 'Posts'
 * If Posts, treat as Recent Posts Page, 
 * else treat as call to Page.php
 */
get_header(); ?>
	
	<?php 
	
      //TEST IF THIS IS PAGE 'POSTS'; IF YES, TREAT AS SINGLE.PHP
	if("posts" == jrm_get_pagename()) : 
	?> 
		
		<div id="primary">
		
			<div id="content" role="main">
				                                                                                                                                                                                                                                            
				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content-single', get_post_format() ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content --> 
		</div><!-- #primary -->	
                
		<?php else :	// NO THIS IS NOT PAGE 'POSTS', TREAT AS PAGE.PHP ?>
	 
		<div id="primary">
			<div id="content" role="main">
								   
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content --> 
		</div><!-- #primary -->		
		<?php  endif;  ?>
<?php get_footer(); ?>
