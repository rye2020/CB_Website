<?php
/**
* Template name: CDN_Legacy
 * Template for displaying just the Header
 *
 * This is the template that displays the 
 * table of CDN issuance from SQL .
 *   redisigned from the first version 
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 2.0 July 1, 2015
 */

get_header(); ?>

<?php
$like = "";
$issuer = '';
$issueyear = '';
$maturityyear = '';
$currency = '';
$maturity = '';
$legacy = "";
$title = "Selected by ";
     if ( isset( $_POST['Submit1'] ) ) { 
 $like = "WHERE ";
$issuer = $_POST['issuerinterest'];
     if ($issuer !== "") {         
	$like = $like."Issuer LIKE '%".$issuer."%'";
	$title = $title."Issuer ";
      }
$issueyear = $_POST['issueyrselect'];
     if ($issueyear !== "") {
         if ($like !== "WHERE ") {
			$like = $like." AND ";
			}
	$like = $like."Date LIKE '%".$issueyear."%'";
	if ($title !== "Selected by ") {
		$title = $title."and ";
		}
	$title = $title."Issue Year ";
      }

$maturityyear = $_POST['maturityyrselect'];
     if ($maturityyear !== "") {
         if ($like !== "WHERE ") {
			$like = $like." AND ";
			}
	$like = $like."Maturity LIKE '%".$maturityyear."%'";
	if ($title !== "Selected by ") {
		$title = $title."and ";
		}
	$title = $title."Maturity Year ";
      }
	  
$currency = $_POST['currencyselect'];
     if ($currency !== "") {
         if ($like !== "WHERE ") {
			$like = $like." AND ";
			}
      $like = $like."Currency = '".$currency."'";
	  	if ($title !== "Selected by ") {
		$title = $title."and ";
		}
	$title = $title."Currency ";
      }

$maturity = $_POST['matured'];
	if ($maturity !== "") {
         if ($like !== "WHERE ") {
		$like = $like." AND ";
		}
	$date = date ('Y-m-d');
		if ($maturity == "Outstanding") {
			$like = $like."Maturity > '".$date."'";
				if ($title !== "Selected by ") {
		$title = $title."and ";
		}
	$title = $title."Outstanding ";
		}
		if ($maturity == "Matured") {
			$like = $like."Maturity < '".$date."'";
				if ($title !== "Selected by ") {
		$title = $title."and ";
		}
	$title = $title."Matured ";
		}
      }

$legacy = $_POST['legacy'];
	if ($legacy !== "") {
         if ($like !== "WHERE ") {
			$like = $like." AND ";
			}
	$date = "2013-07-16";
		if ($legacy == "Legislative") {
			$like = $like."Date >= '".$date."'";
				if ($title !== "Selected by ") {
		$title = $title."and ";
		}
	$title = $title."Legislative ";
		}
		if ($legacy == "Pre-Legislative") {
			$like = $like."Date < '".$date."'";
			if ($title !== "Selected by ") {
				$title = $title."and ";
			}
		$title = $title."Pre-Legislative ";
		}
      }
	  	  
	if ($like == "WHERE ") {
		$like = '';
	}
}
if ($title == "Selected by ") {
	$title = "";
}
?>
<div style="width:80%;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 7/02/2015</p>
<h1 class="t1USDCB";>Canadian Covered Bond Issuance 2007 - 2015</h1>
<?php 
if ($title !== "Select by ") {
	echo '<h2 style="text-align:center; font-weight:300%;"><strong>'.$title.'</strong></h2>' ; 
}
?>
<p style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>
</div>

<table class="t1CanadianCBD sortable"; style="margin-left: 0; float:left;">
<!----------THIS IS A PRICING DATE TABLE------------------>
<!--***************************************************************************************-->
<!--*******************************AGGREGATE ISSUANCE DATA*********************************-->
<!--***************************************************************************************-->
<thead><tr >
   <th width="80"><strong>Date</strong></th>
   <th width="220"><strong>Issuer</strong></th>
	<th width="50"><strong><style "align: right;">Series</style></strong></th>
   <th width="32"><strong><style "align: right;">Currency</style></strong></th>
   <th width="45"><strong><style "align: right;">(mm)</style></strong></th>
   <th width="25"><strong><style "align: right;">Coupon</style></strong></th>
   <th width="70"><strong><style "align: right;">Maturity</style></strong></th>
   <th width="25"><strong><style "align: right;">Tenor</style></strong></th>
   <th width="30"><strong><style "align: right;">Spread</style></strong></th>
   <th width="70"><strong><style "align: right;">Type</style></strong></th>
</tr></thead>
<tbody>

<?php 
	if ($currency == "") {
		jrm_get_table (CDN_Legacy,$like,no,0); 
	} else {
		jrm_get_table (CDN_Legacy,$like,yes,5);
	}
?>
</table>

</div>

<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style="width:18.5%; float:right; font-size:small">
<p style="margin:0;"><strong>Select issuance attributes:</strong></p>
<form name=CDNinterset' action='http://www.us-covered-bonds.com/cdn_issue_details' method='POST'>
<label for='issuerinterest'>Issuer</label>
<select name='issuerinterest' style="width:70%;">
<option value=''> </option>
<option value='Bank of Montreal'>Bank of Montreal</option>
<option value='Bank of Nova Scotia'>Bank of Nova Scotia</option>
<option value='Caisse Centrale Desjardins du Quebec'>Caisse Centrale Desjardins du Quebec</option>
<option value='Canadian Imperial Bank of Commerce'>Canadian Imperial Bank of Commerce</option>
<option value='National Bank of Canada'>National Bank of Canada</option>
<option value='Royal Bank of Canada'>Royal Bank of Canada</option>
<option value='Toronto-Dominion Bank'>Toronto-Dominion Bank</option>
</select>
<br />

<label for='issueyrselect'>Issue Year</label>
<select name='issueyrselect'>
<option value=''> </option>
<option value='2010'>2010</option>
<option value='2011'>2011</option>
<option value='2012'>2012</option>
<option value='2013'>2013</option>
<option value='2014'>2014</option>
<option value='2015'>2015</option>
</select>
<br />

<label for='maturityyrselect'>Maturity Year</label>
<select name='maturityyrselect'>
<option value=''> </option>
<option value='2010'>2010</option>
<option value='2011'>2011</option>
<option value='2012'>2012</option>
<option value='2013'>2013</option>
<option value='2014'>2014</option>
<option value='2015'>2015</option>
<option value='2016'>2016</option>
<option value='2017'>2017</option>
<option value='2018'>2018</option>
<option value='2019'>2019</option>
<option value='2020'>2020</option>
<option value='2021'>2021</option>
<option value='2022'>2022</option>
</select>
<br />

<label for='currencyselect'>Currency</label>
<select name='currencyselect'>
<option value=''> </option>
<option value='$'>$</option>
<option value='C$'>C$</option>
<option value='€'>€</option>
<option value='£'>£</option>
<option value='A$'>A$</option>
<option value='CHF'>CHF</option>
</select>
<br />

<label for='matured'>Matured</label>
<select name='matured'>
<option value=''> </option>
<option value='Outstanding'>Outstanding</option>
<option value='Matured'>Matured</option>
</select>
<br />

<label for='legacy'>Legislative Only</label>
<select name='legacy' style="width:45%;">
<option value=''> </option>
<option value='Legislative'>Legislative</option>
<option value='Pre-Legislative'>Structured</option>
</select>
<br />

<p><input type='submit' name='Submit1' value='Submit' />
  </form></p>
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
<?php
get_footer();
?>