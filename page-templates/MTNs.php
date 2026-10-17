<?php
/**
* Template Name: MTNs
* Template Post Type: page
*
 * This is the template that displays the
 * table of  MTN issuance table from SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_Child
 * @ author J.R.Marlatt
 * version 1.0 January 13, 2016
 * version 1.1 April 4, 2021
 * version 1.11 February 27, 2022
 * version 1.12 Deember 30, 2024
 * version 2.0 October 17, 2026 (Claude) layout conformed to CBAgg.php
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

if ( !session_id() ) session_start();

// Load the mobile portrait/landscape filter-panel JS; header-misc does not enqueue it  // (Claude)
add_action('wp_enqueue_scripts', function () {                                          // (Claude)
	wp_enqueue_script('jm-mobile-tables',                                                // (Claude)
		get_stylesheet_directory_uri() . '/js/jm-mobile-tables.js', array(),             // (Claude)
		filemtime(get_stylesheet_directory() . '/js/jm-mobile-tables.js'), true);        // (Claude)
}, 2);                                                                                   // (Claude)

get_header('misc');

$like = '';
$title = '';

// test if $_SESSION elements have been set
if ( isset ($_SESSION["jrm_form_elements"]) ) {
	// get the form input
	$like = $_SESSION["jrm_form_elements"]['like'];
	$title = $_SESSION["jrm_form_elements"]['title'];

// remove all session variables
session_unset();
	}
?>

<div id=top>
   <div class="bond-table-with-filters agg-grid">  <!-- (Claude) -->
   <div class="tblHeader">  <!-- (Claude) -->

<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 10/17/2026</p>
<h1 class="t1USDCB">MTN Issuance</h1>
<?php
if ($title !== '' && $title !== "Select by ") {  // (Claude)
	echo '<h2 style="text-align:center; font-weight:300%;"><strong>'.$title.'</strong></h2>' ;
}
?>
<p class="jmsorter" style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>  <!-- (Claude) -->
   </div> <!--End of tblHeader-->  <!-- (Claude) -->

<!----------THIS IS A PRICING DATE TABLE------------------>
<!--***************************************************************************************-->
<!--*******************************MTN ISSUANCE DATA***************************************-->
<!--***************************************************************************************-->
<table class="t1CanadianCBD sortable" style="margin-left: 0;">  <!-- (Claude) -->
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:6%">
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:6%">
	<col style="width:28%">
<thead><tr >
   <th ><strong>Pricing date</strong></th>
   <th ><strong>Issuer</strong></th>
   <th ><strong>Series</strong></th>
   <th ><strong>Form</strong></th>
   <th ><strong>Amount</strong></th>
   <th ><strong>Coupon</strong></th>
   <th ><strong>Maturity</strong></th>
   <th ><strong>Spread</strong></th>
   <th ><strong>Comment</strong></th>
</tr></thead>
<tbody>

<?php

	jrm_get_table ('MTN_Table',$like,'yes',5,'NO','Date DESC, Issuer ASC, Amount DESC', 10);

?>
</tbody>
</table>

<div id="jmWrap">  <!-- (Claude) -->
<div id="jmfilter" style="width:250px; ">  <!-- (Claude) -->
<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style=" font-size:small;">
<h3 style="margin:0; text-decoration: underline;"><strong>Data Filters:</strong></h3>  <!-- (Claude) matches FilterAGGform -->
<style scoped>
	select {
		float: right;
	}
	input {
		float: right;
	}
	</style>
<form name='MTNinterest' action='/wp-content/themes/twentytwentyone-child/MTNs-Form.php/' method='POST'> <?php // (Claude) was twentyeleven-child ?>
	<label for='issuerinterest'>Issuer</label>
	<select name='issuerinterest' style="width:60%;">
		<option value=''> </option>
		<option value='BMO'>Bank of Montreal</option>
		<option value='BNS'>Bank of Nova Scotia</option>
		<option value='CCDQ'>Caisse centrale Desjardins du Quebec</option>
		<option value='CIBC'>Canadian Imperial Bank of Commerce</option>
		<option value='HSBC'>HSBC Bank PLC</option>
		<option value='NBC'>National Bank of Canada</option>
		<option value='RBC'>Royal Bank of Canada</option>
		<option value='TD Bank'>Toronto-Dominion Bank</option>
		<option value='EDC'>Export Development Canada</option>
	</select>
<br />

<?php include(get_stylesheet_directory() . '/includes/mat_year_mtn.php'); // (Claude) was include("mat_year_mtn.php") ?>

		<label for='formselect'>Form</label>
	<select name='formselect' style="width:60%;">
		<option value=''> </option>
		<option value='F-3'>F-3</option>
		<option value='F-10'>F-10</option>
		<option value='F-9'>F-9</option>
		<option value='144A'>144A</option>
		<option value='3(a)(2)'>3(a)(2)</option>
	</select>
<br />

	<label for='commentselect'>Comment</label>
	<input type="text" name="commentselect" style="width:55%;height: 16px; font-size: 10pt;" placeholder="Comment text">

	<input type='submit' name='Submitmtns' value='Submit' style="clear:both"/><br /><br />
</form>
<?php include(get_stylesheet_directory() . '/includes/RecentPosts_inc.php'); // (Claude) shared Recent Posts block; closes </aside> ?>
</div> <!--End of jmfilter-->  <!-- (Claude) -->
</div>  <!-- End jmWrap-->  <!-- (Claude) -->
   </div> <!--End of bond-table-->  <!-- (Claude) -->
</div> <!--End of top-->

<?php echo do_shortcode("[jpshare]"); ?>
<?php
get_footer();
?>
