<?php
/**
* Template name: CBAgg_OurDeals
 * This is the template that displays the 
 * table of aggregate CB issuance from SQL
 * That we have worked on.
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 December 2, 2023
 * 
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
get_header('misc'); 


         //save page identifier
$filepath = pathinfo( __FILE__, PATHINFO_FILENAME);
$file = basename( __FILE__ ).PHP_EOL;   //save the file name


 include ("FilterAGGtest.php");
 ?>

<div id=top>
	<div style="padding-right:20px;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 12/2/2023</p>
	<?php
	$hdr = "Covered Bond Deals We Worked On";
	if ($issueyear !== NULL && $issueyear !== "") {$hdr = $hdr." in ".$issueyear;}
	echo '<h1 class="t1USDCB">'.$hdr.'</h1>';

	if ($title !== "Select by ") {
		echo '<h2 style="text-align:center; font-weight:300%;"><strong>'.$title.'</strong></h2>' ; 
	}
?>

<p class="jmsorter"; style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>

<!----------THIS IS A PRICING DATE TABLE------------------>
<!--***************************************************************************************-->
<!--*******************************AGGREGATE ISSUANCE DATA*********************************-->
<!--***************************************************************************************-->
<style>
    td:nth-child(12) {
        text-align:center;
    }
</style> 
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
   <th><center><strong>Ours</center></strong><th>
</tr></thead>
<tbody> 

<?php 
    if ( ( $currency !== "" && $currency !== "NOT $" ) OR $country == "NOT Canada" ) {
		jrm_get_table ('CBAggregate',$like,'yes',6,'NO','Date DESC, Issuer ASC',0,NULL,'Y');
	} else {
		jrm_get_table ('CBAggregate',$like,'no',0,'NO','Date DESC, Issuer ASC',0,NULL,'Y');
	}
?>
</tbody>
</table>

</div>
<div style="width:250px; ">
	<br><br><br><br>
<?php include ("FilterAGGform.php"); ?>
<?php include ("RecentPosts_inc.php"); ?>
	</div></div>div>

<?php echo do_shortcode("[jpshare]"); ?>
<?php
get_footer();
?>