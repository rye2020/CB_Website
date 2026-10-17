<?php
/**
* Template Name: MISC
* Template Post Type: page
*
 * This is the template that displays the
 * table of  MISC Data table from SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_Child
 * @ author J.R.Marlatt
 * version 1.1 April 4, 2021
 * version 1.11 February 27, 2022
 * version 1.12 December 30, 2024
	* version 2.0 October 17, 2026
 * version 2.1 October 17, 2026 (Claude) layout conformed to CBAgg.php
 */

 /*
* When this .php is loaded directly by a 'header("Location: ")' statement it comes
* without any WordPress engine.  Therefore, if the engine is not loaded, it must be loaded.
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
session_start();
header ('Cache-Control: no-cache');

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
if (isset ($_SESSION["jrm_form_elements"])) {
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
<h1 class="t1USDCB">Capital Instruments Issuance</h1>
<?php
if ($title !== '' && $title !== "Select by ") {  // (Claude)
	echo '<h2 style="text-align:center; font-weight:300%;"><strong>'.$title.'</strong></h2>' ;
}
?>
<p class="jmsorter" style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>  <!-- (Claude) -->
   </div> <!--End of tblHeader-->  <!-- (Claude) -->

<!----------THIS IS A PRICING DATE TABLE------------------>
<!--***************************************************************************************-->
<!--*******************************MISC ISSUANCE DATA***************************************-->
<!--***************************************************************************************-->
<table class="t1CanadianCBD sortable" style="margin-left: 0;">  <!-- (Claude) -->
	<col style="width:10%">
	<col style="width:6%">
	<col style="width:6%">
	<col style="width:7%">
	<col style="width:5%">
	<col style="width:10%">
	<col style="width:12%">
	<col style="width:6%">
	<col style="width:20%">
	<col style="width:20%">

<thead><tr >
   <th ><strong>Pricing date</strong></th>
   <th ><strong>Issuer</strong></th>
   <th ><strong>Type/Asset</strong></th>
   <th ><strong>Series</strong></th>
   <th ><strong>Amount</strong></th>
   <th ><strong>Maturity</strong></th>
   <th ><strong>Ratings</strong></th>
   <th ><strong>Type</strong></th>
   <th ><strong>Underwriters</strong></th>
   <th ><strong>Description</strong></th>
</tr></thead>
<tbody>

<?php
	jrm_get_table ('Misc',$like,'yes',5,'NO','Date DESC, Issuer ASC, Amount DESC', 11);

?>
</tbody>
</table>

<div id="jmWrap">  <!-- (Claude) -->
<div id="jmfilter" style="width:250px; ">  <!-- (Claude) -->
<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style="font-size:small;">
<h3 style="margin:0; text-decoration: underline;"><strong>Data Filters:</strong></h3>  <!-- (Claude) matches FilterAGGform -->
<style scoped>
	select {
		float: right;
	}
	input {
		float: right;
	}
	</style>
<form name='MISCinterest' action='/wp-content/themes/twentytwentyone-child/MISC-Form.php' method='POST'> <?php // (Claude) was twentyeleven-child ?>
	<label for='issuerinterest'>Issuer</label>
	<select name='issuerinterest' style="width:65%;">
		<option value=''> </option>
		<option value='BMO'>Bank of Montreal</option>
		<option value='BNS'>Bank of Nova Scotia</option>
		<option value='CCDQ'>Caisse centrale Desjardins du Quebec</option>
		<option value='CIBC'>Canadian Imperial Bank of Commerce</option>
		<option value='HSBC'>HSBC Bank PLC</option>
		<option value='NBC'>National Bank of Canada</option>
		<option value='RBC'>Royal Bank of Canada</option>
		<option value='TD Bank'>Toronto-Dominion Bank</option>
		<option value='LendingClub'>LendingClub</option>
	</select>
<br />

<?php include(get_stylesheet_directory() . '/includes/mat_year_mtn.php'); // (Claude) was include("mat_year_mtn.php") ?>

		<label for='uwselect'>Underwriters</label>
	<input type="text" name="uwselect" style="width:60%; height: 16px; font-size: 10pt;" placeholder="Underwriters">


	<label for='commentselect' style="float: left; clear: both;">Description</label>
	<input type="text" name="commentselect" style="width:60%; height: 16px; font-size: 10pt;" placeholder="Description">

<input type='submit' name='Submitmisc' value='Submit' style="clear: both;"/><br /><br />  <!-- (Claude) fixed unclosed <br / -->
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
