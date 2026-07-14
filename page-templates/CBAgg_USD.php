<?php
/**
* Template name: CBAgg_USD
 *
 * This is the template that displays the 
 * table of USD issuance from SQL .
 *   redisigned from the first version 
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child 
 * @ author J.R.Marlatt
 * version 1.0 August 20, 2015
 * version 1.1 May 1, 2021
 * versiion 1.11 March 8, 2022
 */

header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
//////////////////////////////////////////////////////////////////////////////////////////
/* 
* When this .php file is loaded directly by a 'header("Location: ")' statement it comes
* without any WordPress engine.  Therefore, if the engine is not loaded, it must be loaded.
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

if(!session_id()) { session_start(); }
get_header('tables'); 
?>

<?php          //save page identifier
$filepath = pathinfo(__FILE__, PATHINFO_FILENAME);
$file = basename( __FILE__ ).PHP_EOL;
?>

<?php include(get_stylesheet_directory() . '/includes/FilterUSDtest.php'); ?> 

<div id=top >
	<div style="padding-right:20px;">
		
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 3/12/2022</p>
<h1 class="t1USDCB">USD Covered Bond Issuance</h1>
<?php 
if ($title !== "Select by ") {
	echo '<h2 style="text-align:center; font-weight:300%;"><strong>'.$title.'</strong></h2>' ; 
}
?>

<p class="jmsorter"; style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>

<!----------THIS IS A PRICING DATE TABLE------------------>
<!--***************************************************************************************-->
<!--*******************************AGGREGATE ISSUANCE DATA*********************************-->
<!--***************************************************************************************-->
<table class="t1CanadianCBD aggregateCB sortable"; style="margin-left: 0; float:left;">

<thead><tr >
   <th><strong>Pricing</strong></th>
   <th><strong>Issuer</strong></th>
   <th><strong>Region</strong></th>
   <th><strong>Series</strong></th>
   <th><strong>Cur.</strong></th>
   <th><strong>(mm)</strong></th>
   <th><strong>Coupon</strong></th>
   <th><strong>Maturity</strong></th>
   <th><strong>Tenor</strong></th>
   <th><strong>Spread</strong></th>
   <th><strong>Type</strong></th>
</tr></thead>
<tbody>

	
<?php 
	jrm_get_table ('CBAggregate',$like,'yes',6,'NO','Date DESC, Issuer ASC',0);
?>
	</tbody>
</table>

</div>

<div id="jmWrap">
<div id="jm-filter" style="width:250px; ">
	<br><br><br><br>
<?php include(get_stylesheet_directory() . '/includes/FilterAGGform.php'); ?>
<?php include(get_stylesheet_directory() . '/includes/RecentPosts_inc.php'); ?> </div>
</div>
</div>   <!--End of jmWrap--->
<?php echo do_shortcode("[jpshare]"); ?>
<?php
get_footer();
?>
