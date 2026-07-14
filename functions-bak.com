<?php
/*
*
*
* 
 * Twenty Eleven-Child functions and definitions  
*
* Sets up the theme and provides some helper functions. Some helper functions
* are used in the theme as custom template tags. Others are attached to action and
* filter hooks in WordPress to change core functionality.
*
* In child theme (see http://codex.wordpress.org/Theme_Development and
* http://codex.wordpress.org/Child_Themes), you can override certain functions of the 
 * functions.php file of the parent theme (those wrapped in a function_exists() call) by 
 * defining them first in your child theme's functions.php file. The child theme's 
 * functions.php file is included before the parent theme's file, so the child theme
* functions would be used.
*
* Functions that are not pluggable (not wrapped in function_exists()) are instead attached
* to a filter or action hook. The hook can be removed by using remove_action() or
* remove_filter() and you can attach your own function to the hook.
*
* We can remove the parent theme's hook only after it is attached, which means we need to
* wait until setting up the child theme:
*
* <code>
* add_action( 'after_setup_theme', 'my_child_theme_setup' );
* function my_child_theme_setup() {
*     // We are providing our own filter for excerpt_length (or using the unfiltered value)
*     remove_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );
*     ...
* }
* </code>
*
* For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
*-------------------------------------------------------------------------------------------------
* Functions contained in this file are:
*
*    1.  jrm_get_pagename()
*    2.  add_my_post_tyype_to_query()
*    3.  jrm_get_table()
*    4.  jrm_record_inquiry()
*    5.  get_the_user_ip()
*    6.  crawlerDetect()
*    7.  my_theme_enqueue_styles()
*    8.  function start_session()
*    9.  function end_session()
*-------------------------------------------------------------------------------------------------
* @package WordPress
* @subpackage Twenty_Eleven-Child
* @author Jerry Marlatt
* Version 2.0 Jan 29,2020
* Version 2.1 Mar 29, 2021
*/
/***
*=======================================================================================
****************************************************************************************
*=======================================================================================
*   function jpm_get_pagename()
*
**/

// JRM 1/1/23  override WordPress
// prevent WordPress from inserting <p> tags into HTML code -- see WP function wpautop()
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function jrm_get_pagename() {
            $jrm_permalink = get_permalink();
            $jrm_parts = Explode ('/',$jrm_permalink);
            $jrm_parts = array_reverse ($jrm_parts);
            $jrm_pagename = $jrm_parts[1];
            return $jrm_pagename;
            }
            
 
/****
*=======================================================================================
****************************************************************************************
*=======================================================================================
*   function add_my_post_types_to_query
*
* 
*---------------------------------------------------------------------------------------
*/
// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
 
function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', '**', 'movie' ) );  //add PAGE or not
  return $query;
}
 
/***
*=======================================================================================
****************************************************************************************
*=======================================================================================
*   function jrm_get_table()
*
*
*  Function to retrieve date for CB issuance tables when the user has selected issuance attributes.
*
*  We will also record the identity of the requestor in the CB_Inquiry table.
*
*  Parameters are:
*           $table = table_name
*           $like = ""|[WHERE 'column' LIKE %canada%]
*           $sum = yes|no for total issuance row
*           $col = column # for summing up total issuance
*       $index = yes|NO for including the first column with the record number
*       $orderby = ''[Date]|NONE|[string]  defaults to Date if empty
*       $skip = column # | column to be ignored and not returned
*
*  Version 2.1 December 17, 2022
*    1.1 adding $index
*    1.2 adding $orderby and $skip
*    2.0 adding data-label to each td
*    2.1 adding $$$ issuance and ### offerings to footer
*----------------------------------------------------------------------------------------
*/
function jrm_get_table ($table, $like, $sum, $col, $index = null, $orderby = null, $skip = null, $comments = null, $ours = null){
 
global $wpdb;
 
$total = 0;
date_default_timezone_set("America/New_York");
$date = date ('Y-m-d H:i:s');
if ($table == "") {return;}
$colnames = [];
$query = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME="'.$table.'" ORDER BY ORDINAL_POSITION;';
$colnames = $wpdb->get_results($query, ARRAY_N);
$zcol = count($colnames);

// Test for table having currency sign 
$currency = 'no';
if ($colnames[5][0] == 'Currency') {
    $currency = 'yes';
   }

if ($orderby == 'NONE')
            {$orderby = ' ORDER BY 1 DESC';}
            elseif ($orderby == '')
            {$orderby = ' ORDER BY Date DESC';}
        else {$orderby = ' ORDER BY '.$orderby;}
if ($like != '') {
            $like = " ".$like; //add buffer space
            }
$query = "SELECT * FROM ".$table.$like.$orderby;
$results = $wpdb->get_results($query, ARRAY_N);
$z = count($results);
$num_deals = 0;

// Pick up the currency character if we are summing a total amount
      if ($sum == 'yes' and $currency == 'yes'){
          $output = $results[1];
          $currencysign = $output[5];
      } else {
          $currencysign = '$';
      }

for ($y=0; $y < $z; $y++) {
      $output = $results[$y];
      $numoutput = count($output);
      if ($index == 'yes') {
          $n = 0;} else {$n = 1;}
      
      if ($table == "CBAggregate" && $ours == "Y" && $output[13] !== "Y") {goto notours;}
      echo '<tr>';
      for ($x=$n; $x < $numoutput; $x++) {
        if ($x !== $skip){            
            $element = $output[$x];
            if ($element == '') { $element = '**';}
            if ($table == "CBAggregate" && $colnames[$x][0] == "Comments" && $comments !== "yes") {goto skipcomments;}
            if ($table == "CBAggregate" && $colnames[$x][0] == "Ours" && $ours !== "Y") {goto skipcomments;}
            echo '<td data-label="'.$colnames[$x][0].'">'.$element.'</td>'; 
        skipcomments:
		    }
	    }
        echo '</tr>';
        $num_deals++;
        if ($sum == "yes") {
            $total = $total+$output[$col];
            }
notours:
}
$cols = 11;
if ($ours == 'Y') {$cols++;}
if ($comments == 'yes') {$cols++;}
 
if ($sum == "yes") {
    echo '<tr>
   <td colspan="'.$cols.'" style="text-align:center; background-color:blue; color:white; font-size: medium; font-weight: normal;";>
    Total Issuance '.($currencysign).''.number_format($total).' million   //  Total Offerings '.number_format($num_deals).'</td>
    </tr>';
            } else {
    echo '<tr>
     <td colspan="'.$cols.'" style="text-align:center; background-color:blue; color:white; font-size: medium; font-weight: normal;";>Total Offerings '.number_format($num_deals).'</td>
    </tr>';           
            }
            echo '</tbody>';
            echo '</table>';
            
            jrm_record_inquiry ($like, $date);
            return;
}
/***
*=======================================================================================
****************************************************************************************
*=======================================================================================
*   function jrm_record_inquiry()
*
*  Function to record the visitor who made the database inquiry
*
*-------------------------------------------------------------------------------------
*/
function jrm_record_inquiry ($Like, $inqdate) {
 
global $wpdb;
 
// skip common web crawlers 
            $USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
            if (crawlerDetect ($USER_AGENT)) { return; }
  
// skip if can edit pages -- e.g., admins    
            if (current_user_can ( 'edit_pages' ) ) { return; }
  
            $ipaddress = $_SERVER['REMOTE_ADDR']; 
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}/json"));
            
            $jm_inq_data = array(
                                    'Date' => $inqdate,
                                    'IP' => $ipaddress,
                                    'Country' => $details->country, 
                                    'Region' => $details->region,
                                    'City' => $details->city,
                                    'Hostname' => $details->org,
                                    'Query' => substr($Like,7)
                            );
 
            $jm_inq_format = array( '%s', '%s', '%s', '%s', '%s', '%s', '%s');
           
             $wpdb->show_errors();
            $wpdb->insert('CB_Inquery', $jm_inq_data, $jm_inq_format);
            $wpdb->show_errors();
 
            // check if INSERT worked and COPY and RENAME table if exceed size
                        if (!$wpdb->insert_id) {
                        echo 'Insert failed';}
                        elseif ( $wpdb->insert_id > 2000 ) {
                                    //  RENAME TABLE AND CREATE NEW TABLE
                                    date_default_timezone_set("America/New_York");
                                    $date = date('Y_m_d_h_i');
                                    $table2 = 'CB_Inquery_'.$date;
                                    $wpdb->query('RENAME TABLE CB_Inquery TO '.$table2);
                                    $wpdb->query('CREATE TABLE CB_Inquery LIKE '.$table2);
                                    //  END OF NEW TABLE CREATION
                                    }
} 
 
/***
*=======================================================================================
****************************************************************************************
*=======================================================================================
*   function get_the_user_ip()
*
// Display User IP in WordPress --------------------------------------------------------
function get_the_user_ip() { 
if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) { 
//check ip from share internet 
$ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) { 
//to check ip is pass from proxy 
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
$ip = $_SERVER['REMOTE_ADDR']; 
} 
return apply_filters( 'wpb_get_ip', $ip ); 
} 
 
add_shortcode('show_ip', 'get_the_user_ip');
 
 
 
/***
*=======================================================================================
****************************************************************************************
*=======================================================================================
*   function crawlerDetect()
*
* Detect significant web crawlers
* We will ignore them in recording visitors.
*
*--------------------------------------------------------------------------------------
*/ 
 
function crawlerDetect($USER_AGENT) {
// Detect web crawlers 
 
// List unique portions of USER_AGENT data for crawler
$crawlers = array(
      'Google' => 'Google',
      'Amazon' => 'Silk',
      'MSN' => 'msnbot',
      'Bing' => 'bingbot',
      'Yahoo' => 'Yahoo',
      'Baidu' => 'baidu',
      'Spider' => 'spider',
      'Apple' => 'applebot',
      'HUAWEI' => 'OPPO A33',
      'HUAWEI2' => 'HUAWEIFRD-AL00',
      'YANDEX' => 'YandexBot',
      'Hetzner' => 'Seekport Crawler',
      'Kyivstar' => 'FunWebProducts',
  );
 
            $initialstr = $USER_AGENT;
            $newstr = str_replace ($crawlers, '', $USER_AGENT);         // replace any portion of USER_AGENT with '' if match
            if (strcmp ($initialstr, $newstr) !== 0) { return true; }   // found a crawler - there was a match
            else { return false; }                                      // no crawler
 
 
}
 
// Force the reloading of style.css  --  remove for production environment
// Enqueue the parent and child style.css
//  Styles are lost if turn off.
// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
// function my_theme_enqueue_styles() {
 
//     $parent_style = 'parent-style'; // This is 'twentyeleven-style' for the TwentyEleven theme.
 
//     wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
//     wp_enqueue_style( 'child-style',
//         get_stylesheet_directory_uri() . '/style.css',
//         array( $parent_style ), filemtime(get_template_directory() . '/style.css')  
//    //    wp_get_theme()->get('Version')  // if versions are to be specified
//     );
 
// } 

/*
* unclear if this is necessary 3/28/2021
*/
// To enable $_SESSIONS  ////////JRM//////////////////////////////////////////////
// 
 
// add_action('init', 'start_session', 1); ************************2/10/2026 debug******************
// function start_session() {
//   if(!session_id()) {
//     session_start();
//   }
// }
add_action('wp_logout','end_session');
add_action('wp_login','end_session');
function end_session() {
session_destroy ();
}
add_action('end_session_action', 'end_session');
//do_action('end_session_action');  Put this anywhere in code where you want to end session



add_shortcode( 'jm_pass_parms', 'jm_pass_parms_function' );

// pass URL parameters to templates
// 
function jm_pass_parms_function($atts) {

global $jm_parm;
$jm_parm = array();
$jm_parm['datafile'] = $atts['name'];


$return_page = 'Location: /wp-content/themes/twentyeleven-child/page-templates/Read_tables.php';
ob_start();

//header ($return_page);
//header ( 'Connections: close');
//get_template_part( '/wp-content/themes/twentyeleven-child/page-templates/Read_tables.php');

load_template(get_stylesheet_directory() . '/page-templates/Read_tables.php', true, $jr_parm);

return ob_get_clean();

exit;

}

// function for pagination previous and next links
// 
function pagination_nav($jmarg) {
  
    if ( $jmarg->max_num_pages > 1 ) { ?>
        <nav class="pagination" role="navigation" style="width:20%">
            <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
        </nav>
		<?php
	}
}		
/**
 *  Manage style sheets for different pages **************************************
 */
// Load page specific CSS files
add_action('wp_enqueue_scripts', 'jm_load_page_css', 1);
function jm_load_page_css()
{
    // Load for every page
    wp_enqueue_style('AllPages', get_stylesheet_directory_uri() . '/CSS/allpages.css');
    wp_enqueue_style('Style', get_stylesheet_directory_uri() . '/style.css');



    // HEADER: tables
    if (!empty($GLOBALS['header_tables_loaded'])) {

        wp_enqueue_style('CB_Tables', get_stylesheet_directory_uri() . '/CSS/CBTables.css');

        unset($GLOBALS['header_tables_loaded']);
        return;
    }

    // HEADER: legisl
    if (!empty($GLOBALS['header_legisl_loaded'])) {

        wp_enqueue_style('Legisl', get_stylesheet_directory_uri() . '/CSS/Legisl.css');
        wp_enqueue_style('Columns', get_stylesheet_directory_uri() . '/CSS/Columns.css');

        unset($GLOBALS['header_legisl_loaded']);
        return;
    }

    // HEADER: misc
    if (!empty($GLOBALS['header_misc_loaded'])) {

        wp_enqueue_style('MiscPages', get_stylesheet_directory_uri() . '/CSS/CBTables.css');

        unset($GLOBALS['header_misc_loaded']);
        return;
    }

    // HEADER: cbdocs
    if (!empty($GLOBALS['header_cbdocs_loaded'])) {

        wp_enqueue_style('CBDocs', get_stylesheet_directory_uri() . '/CSS/CBDocs.css');

        unset($GLOBALS['header_cbdocs_loaded']);
        return;
    }

    // HEADER: home (THIS is where child-style is needed)
    // if (!empty($GLOBALS['header_home_loaded'])) {

    //     wp_enqueue_style(
    //         'child-style',
    //         get_stylesheet_uri(),
    //         // ['wp-block-library'],
    //         // wp_get_theme()->get('Version')
    //     );

    //     unset($GLOBALS['header_home_loaded']);
    //     return;
    // }
}

// Dequeue the parent styles------------------2/26 DO we need this???-----------------
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('twenty-eleven-style');

    // Remove block theme styles that cause menu boxes
    wp_enqueue_style('wp-block-library-theme');
 //   wp_deregister_style('wp-block-library-theme');

}, 20);

// Deregister the SideBar so we do not get it on every page
add_action('widgets_init', function () {
    unregister_sidebar('sidebar-1');
}, 11);

// For relative addressing for forms and template loads
add_action('admin_post_nopriv_cdn_interest_form', 'handle_cdn_interest_form');
add_action('admin_post_cdn_interest_form', 'handle_cdn_interest_form');
add_action('admin_post_nopriv_usd_interest_form', 'handle_usd_interest_form');
add_action('admin_post_usd_interest_form', 'handle_usd_interest_form');
add_action('admin_post_nopriv_agg_interest_form', 'handle_agg_interest_form');
add_action('admin_post_agg_interest_form', 'handle_agg_interest_form');

function handle_cdn_interest_form()
{
    // Optional safety check
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method');
    }
    // Process form data (NO OUTPUT)
    require get_stylesheet_directory() . '/CDN-Form.php';

    // If validation failed, redirect back with error
    if (!empty($_SESSION['jrm_form_error'])) {
        wp_redirect(home_url('/cdn-issue-form/?error=1'));
        exit;
    }

    // Redirect to a specific page after processing
    wp_redirect(  home_url('/cdn_issue_details/') );
    exit;
}

function handle_usd_interest_form()
{
    // Optional safety check
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method');
    }
    // Process form data (NO OUTPUT)
    require get_stylesheet_directory() . '/USD-Form.php';

    // If validation failed, redirect back with error
    if (!empty($_SESSION['jrm_form_error'])) {
        wp_redirect(home_url('/usd-issue-form/?error=1'));
        exit;
    }

    // Redirect to a specific page after processing
    wp_redirect(home_url('/usd-issuance/'));
    exit;
}

function handle_agg_interest_form()
{
    // Optional safety check
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method');
    }
    // Process form data (NO OUTPUT)
    require get_stylesheet_directory() . '/CBAgg-Form.php';

    // If validation failed, redirect back with error
    if (!empty($_SESSION['jrm_form_error'])) {
        wp_redirect(home_url('/agg-issue-form/?error=1'));
        exit;
    }

    // Redirect to a specific page after processing
    wp_redirect(home_url('/cbaggregate/'));
    exit;
}