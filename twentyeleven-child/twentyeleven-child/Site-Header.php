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
 * @package WordPress
 * @subpackage Twenty_Eleven-Child
 * @author Jerry Marlatt
 * Version 1.0 July 3, 2014
 */
 function jrm_get_pagename() {
	$jrm_permalink = get_permalink();
	$jrm_parts = Explode ('/',$jrm_permalink);
	$jrm_parts = array_reverse ($jrm_parts);
	$jrm_pagename = $jrm_parts[1];
	return $jrm_pagename;
	}


/**-------------------------------------------------------------------------------------
*  Function jrm_get_table ()
*
*  Function to retrieve date for CB issuance tables.
*  Parameters are:
*	$table = table_name
*	$like = ""|[WHERE 'column' LIKE %canada%]
*	$sum = yes|no for total issuance row
*	$col = column # for summing up total issuance
*       $index = yes|NO for including the first column with the record number
*       $orderby = ''[Date]|NONE|[string]  defaults to Date if empty
*       $skip = column # | column to be ignored and not returned
*
*  Version 1.2 January 13, 2016
*    1.1 adding $index
*    1.2 adding $orderby and $skip
*
*/
function jrm_get_table ($table, $like, $sum, $col, $index = null, $orderby = null, $skip = null){
global $wpdb;
$total = 0;
date_default_timezone_set("America/New_York");
$date = date ('Y-m-d H:i:s');

if ($orderby == 'NONE')
	{$orderby = ' ORDER BY 1 DESC';}
	elseif ($orderby == '')
            {$orderby = ' ORDER BY Date DESC';}
        else {$orderby = ' ORDER BY '.$orderby;}
if ($like != '') {
	$like = " ".$like;	//add buffer space
	}
$query = "SELECT * FROM ".$table.$like.$orderby;
$results = $wpdb->get_results($query, ARRAY_N);
$z = count($results);
for ($y=0; $y < $z; $y++) {
      echo '<tr>';
      $output = $results[$y];
      $numoutput = count($output);
      if ($index == 'yes') {
          $n = 0;} else {$n = 1;}
      for ($x=$n; $x < $numoutput; $x++) {
		  if ($skip !== '' & $x !== $skip){
				echo '<td>'.$output[$x].'</td>'; 
			}
		}
 	echo '</tr>';
 	if ($sum == "yes") {
		$total = $total+$output[$col];
	}
}
echo '</tbody>';

 	if ($sum == "yes") {
setlocale(LC_MONETARY,"en_US");
echo '<tr>
   <td colspan="11" style="text-align:center; background-color:blue; color:white; font-size: medium; font-weight: bold;";>Total Issuance '.money_format("%!.0n",$total).'</td>
</tr>';
	}
	echo '</table>';

$capability = 'edit_pages';
if (!current_user_can ( $capability) ) {
$ipaddress = get_the_user_ip(); 
$details = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}/json"));
$country = $details->country; 
$region = $details->region;
$city = $details->city; 
$hostname = $details->org;
$itable = 'CB_Inquery';
$wpdb->insert($itable, array( 'Date' => $date, 'IP' => $ipaddress, 'Country' => $country, 'Region' => $region, 'City' => $city, 'Hostname' => $hostname, 'Query' => substr($like,7)), 
	array( '%s', '%s', '%s' ) );

// check if INSERT worked and COPY and RENAME table if exceed size
	if (!$wpdb->insert_id) {
	echo 'Insert failed';}
	elseif ( $wpdb->insert_id > 2000 ) {
		//  RENAME TABLE AND CREATE NEW TABLE
		$date = date('Y_m_d_h_i');
		$table2 = 'CBquery_'.$date;
		$wpdb->query('RENAME TABLE CB_Inquery TO '.$table2);
		$wpdb->query('CREATE TABLE CB_Inquery LIKE '.$table2);
		//  END OF NEW TABLE CREATION
		}
 } 
}


// Display User IP in WordPress ----------------------------------------------------------------
 
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

/**------------------------------------------------------------------------------------
 *  Function jrm_visitors ()
 *
 *  Function to track and record all visitors
 * 
 *  Do not track Admin 
 *
 *  @Author JMarlatt
 *  Version 1.0.0.1
 *  July 20, 2015
 *
 */
function jrm_visitors() {
	global $wpdb;
$capability = 'edit_pages';
if (!current_user_can ( $capability) ) { 
$ipaddress = get_the_user_ip(); 
date_default_timezone_set("America/New_York");
$date = date ('Y-m-d H:i:s');
$details = json_decode(file_get_contents("http://ipinfo.io/{$ipaddress}/json"));
$country = $details->country; 
$region = $details->region;
$city = $details->city; 
$hostname = $details->hostname;
$org = $details->org;
$pagename = jrm_get_pagename();
$table = 'cb_visitors';
$data = array( 
		'Date' => $date, 
		'IP' => $ipaddress, 
		'Country' => $country, 
		'Region' => $region, 
		'City' => $city, 
		'Hostname' => $hostname, 
		'Organization' => $org, 
		'Page' => $pagename
		);
$format = array ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' );
$wpdb->show_errors();
$wpdb->insert($table, $data, $format);
$wpdb->show_errors();
// check if INSERT worked and COPY and RENAME table if exceed size
	if (!$wpdb->insert_id) {
	echo 'Insert failed';}
	elseif ( $wpdb->insert_id > 2000 ) {
		//  RENAME TABLE AND CREATE NEW TABLE
		$date = date('Y_m_d_h_i');
		$table2 = 'CBvisitors_'.$date;
		$wpdb->query('RENAME TABLE cb_visitors TO '.$table2);
		$wpdb->show_errors();
		$wpdb->query('CREATE TABLE cb_visitors LIKE '.$table2);
		$wpdb->show_errors();
		//  END OF NEW TABLE CREATION
		}
 	} 
 }
 
?>