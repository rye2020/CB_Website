<?php
/**
* Template name: MISC
 * This is the template that displays the 
 * table of  MISC Data table from SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 April 4, 2021
 * version 1.11 February 27, 2022
 * version 1.12 December 30, 2024
 */

 /* 
* When this .php is loaded directly by a 'header("Location: ")' statement it comes
* without any WordPress engine.  Therefore, if the engine is not loaded, it must be loaded.
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
session_start();
header ('Cache-Control: no-cache');
get_header('misc'); 
?>

<div id=top>
	<div style="padding-right:20px;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 12/30/2024</p>
<h1 class="t1USDCB">Capital Instruments Issuance</h1>
<?php 
$like = '';
$title = '';

// test if $_SESSION elements have been set
if (isset ($_SESSION["jrm_form_elements"])) {   
	// get the form input
	$like = $_SESSION["jrm_form_elements"]['like'];
	$title = $_SESSION["jrm_form_elements"]['title'];
	if ($title !== "Select by ") {
	echo '<h2 style="text-align:center; font-weight:300%;"><strong>'.$title.'</strong></h2>' ; 
		}

// remove all session variables
session_unset(); 
	}
?>
<p class="jmsorter"; style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>

<table class="t1CanadianCBD sortable"; style="margin-left: 0; float:left;">
<!----------THIS IS A PRICING DATE TABLE------------------>
<!--***************************************************************************************-->
<!--*******************************MISC ISSUANCE DATA***************************************-->
<!--***************************************************************************************-->
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

</div>
<div style="width:250px; ">
	<br><br><br><br>
<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style="font-size:small;">
<p style="margin:0;"><strong>Select issuance attributes:</strong></p>
<style scoped>
	select {
		float: right;
	}
	input {
		float: right;
	}
	</style>
<form name='MISCinterest' action='/wp-content/themes/twentyeleven-child/MISC-Form.php' method='POST'>
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

<?php include ("mat_year_mtn.php"); ?>	

		<label for='uwselect'>Underwriters</label>
	<input type="text" name="uwselect" style="width:60%; height: 16px; font-size: 10pt;" placeholder="Underwriters">


	<label for='commentselect' style="float: left; clear: both;">Description</label>
	<input type="text" name="commentselect" style="width:60%; height: 16px; font-size: 10pt;" placeholder="Description">
	
<input type='submit' name='Submitmisc' value='Submit' style="clear: both;"/><br /><br /
</form>

<style scoped>
 	.rpwe-block li {
		margin-bottom: 0 !important;
		margin-left: 10px;
		padding-bottom: 0 !important;
		list-style-type: disc !important;
		font-weight: bold !important;
}
	.rpwe-clearfix:before, .rpwe-clearfix:after {
		content: none!important;
}
	.rpwe-time {
		color: #7c7c7c !important;
}
	.rpwe-title {
		display: inline;
}
	.rpwe-block a {
		padding-right: 1em;
		font-weight: bold;
}
</style>
<h3><strong>Recent Posts</strong></h3>
<?php 
    echo rpwe_get_recent_posts (array('limit' => 7, 'thumb' => false, 'styles_default' => false));
?>
</aside>
		</div>
		</div>
<?php echo do_shortcode("[jpshare]"); ?>
<?php
get_footer();
?>