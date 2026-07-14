<?php
/**
 * Template name: test-postlist
 * 
 * 
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 March 17, 2023 
 * 	  
 */
// Licenced under MIT Licence ; give proper credit

//header('Content-type:text/plain');     This will cause the file to display as HTML/PHP text

//include "wp-load.php";         Needed only if don't use get_header

$posts = new WP_Query('post_type=any&posts_per_page=-1&post_status=publish');
echo '<pre>'; print_r ($posts); echo '</pre>';
$posts = $posts->posts;
/*
global $wpdb;
$posts = $wpdb->get_results("
    SELECT ID,post_type,post_title
    FROM {$wpdb->posts}
    WHERE post_status<>'auto-draft' AND post_type NOT IN ('revision','nav_menu_item')
");
*/

get_header('tables');

?>
<style scoped>
#main {text-decoration:none;}
h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
th {
    font-size: 1em;
    font-weight: bold;    
}
hr {
   display: block; 
   margin-block-start: 0;
   margin-block-end: 0;
}
thead {
    background-color: lightgrey;
}
</style>
<h1><bold>Test Page for Post List</bold></h1>
<p class="jmsorter" style="margin:0; color:red;"> (click on column header to sort)</p>
<hr>
<table class="sortable"; width=90%>
<thead><tr><th width=12%>Last Modified</th><th width=5%>Type</th><th width=45%>URL</th><th width=40%>Name</th></tr></thead>
<tbody>
<?php
foreach($posts as $post) {
    switch ($post->post_type) {
        case 'revision':
        case 'nav_menu_item':
            break;
        case 'page':
            $permalink = get_page_link($post->ID);
            break;
        case 'post':
            $permalink = get_permalink($post->ID);
            break;
        case 'attachment':
            $permalink = get_attachment_link($post->ID);
            break;
        default:
            $permalink = get_post_permalink($post->ID);
            break;
    }

    $permalink = substr( $permalink, 32);
	$time = substr( $post->post_modified, 0, 10);
    echo "<tr><td>{$time}</td><td>{$post->post_type}</td><td>Site/{$permalink}</td><td>{$post->post_title}</td></tr>";
}
?>
</tbody></table>
</body
<?php get_footer(); ?>