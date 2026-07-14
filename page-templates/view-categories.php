<?php
/*
 * Template name: View-Categories
 *
 * Display posts for categories
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 March 27, 2022
 */

get_header();

echo '<ul>';
wp_list_categories( array(
	'echo'       => 1,
	'show_count' => 1,
	'orderby'    => 'name',
	'title_li'	 => 'All categories for U.S. Covered Bonds',
	'use_desc_for_title' => 1,
	));
echo '</ul>';

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  //set for page 1
// Define our WP Query Parameters                                      //set query parameters
     $query_options = array(
       'category_name' => 'SEC',
       'posts_per_page' => 1,
		'paged' => $paged
     );

$jmquery = new WP_QUERY ($query_options);                              //collect the requested Posts
$wp_query = $jmquery;

//  List the categories and display the content
if ( $jmquery->have_posts() ) {
	echo '<ul>';
	while ( $jmquery->have_posts() ) {
		$jmquery->the_post();
		echo '<li style="font-size: 200%"><strong>' . get_the_title() . '</strong></li>';
//		$content = get_the_content();
//		$pages = explode('<!--nextpage-->', $content);
		the_content();
		wp_link_pages( $args ); 
	}
	echo '</ul>';
	echo '<div style="width: 40%;">';
	pagination_nav($jmquery);           //pagination bread crumbs
	echo '</div>';
	?>	
	<div class="pagination" style="clear:both; width: 20%;">
<?php 
	echo paginate_links( array(
		'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'total'        => $wp_query->max_num_pages,
		'current'      => max( 1, get_query_var( 'paged' ) ),
		'format'       => '?paged=%#%',
		'show_all'     => false,
		'type'         => 'plain',
		'end_size'     => 2,
		'mid_size'     => 1,
		'prev_next'    => true,
		'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
		'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
		'add_args'     => false,
		'add_fragment' => '',
        ) );
    ?>
		
	</div>	
<?php
} else {
	// no posts found
	echo 'No posts found for that category';
    }
?>
<script>function jm_goback() {
	history.back()}</script>
<button onclick="jm_goback();">Go Back</button>

