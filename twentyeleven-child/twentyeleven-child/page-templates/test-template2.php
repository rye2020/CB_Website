<?php 
/**
 * Template name: test-template2
 * 
 * 
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 April 4.2021 
 * 	  
 */

/*header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');*/

get_header('tables');
echo "<br> print the passed variables <br>";
var_dump($args);
echo "<br><br>".$args['a2']."<br><br>";
echo " <br><br>This is the second load. print get_post()   <br><br>";
$examplePost2 = get_post();
//var_dump ( $examplePost2 );
//
echo '<br> <br> Now print WP_QUERY for GSEs <br><br>';
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
// Define our WP Query Parameters 
     $query_options = array(
       'category_name' => 'regulation',
       'posts_per_page' => 1,
		'paged' => $paged
     );

$jmquery = new WP_QUERY ($query_options);
$wp_query = $jmquery;
$NumPages = $jmquery->max_num_pages;
echo '<br>The maximum number of pages is:' . $NumPages . '<br><br>';
//var_dump ($paged);
 var_dump ($jmquery);
//---------------------------
echo '<br><br> Now list the titles for this category<br><br>';
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

	pagination_nav($jmquery);
	?><div class="pagination" style="clear:both">
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
</div>	<?php
} else {
	// no posts found
	echo 'No posts found for that category';
}
// restore original post data
 	wp_reset_query();
//---------------------------
echo " <br><br> Now print Global \$pages    <br><br>"; 
//var_dump ( $pages );
echo " <br><br> now print the global \$posts <br><br>"; 
//var_dump ( $posts );
print "<br><br> Now print \$_POST <br><br>"; 
//var_dump ( $_POST );

echo "<br><br> now print the_post() <br><br>";
//var_dump ( $wp_query );
print "<br><br> now lets try filename <br><br>";
print ( basename(__FILE__) );
?>
