<?php
/**
* Template name: CBAgg_SetOurs
 * Template for setting "Ours" in the database tables for CBs
 *
 * This is the template that updates "Ours" in the 
 * table of CB data in SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 November 30, 2023
 **/
get_header('tables'); 

global $wpdb;


?>

<div style="position:relative;">
<h1 style="text-align:center; font-weight: 800;"> Find Deals We Worked on</h1>
<br>
<table class="t1CanadianCBD aggregateCB sortable"; style="margin-left: 0; float:left; width:800 px">
<thead><tr >
	<td><strong>Rec#</strong></td>
   <th style="width:10%"><strong>Pricing</strong></th>
   <th><strong>Issuer</strong></th>
   <th><strong>Region</strong></th>
   <th><strong>Series</strong></th>
   <th><strong>Cur.</strong></th>
   <th><strong>(mm)</strong></th>
   <th><strong>Coupon</strong></th>
   <th><strong>Maturity</strong></th>
   <th><strong>Tenor</strong></th>
   <th style="width:5%"><strong>Spread</strong></th>
   <th style="width:6%"><strong>Type</strong></th>
   <th style="width:4%"><strong>Mine</strong></th>
</tr></thead>
<tbody>
<?php

// Read in the entire table
$table = "CBAggregate";
$query = "SELECT * FROM ".$table;
$results = $wpdb->get_results($query, ARRAY_N);

// Now sycle through each record and test of it is one of ours
// For testing purposes, only process 25 records
$row = array();

$z = count($results);

for ($y=0; $y < $z; $y++) {
	$row = $results[$y];
	$recno = $row[0];
	$ours = $row[13];
	$currency = $row[5];
	$issuer = strip_tags($row[2]);    // Strip any HTML links
	$ourdeal = NULL;
	$where = ' WHERE RecNo LIKE "'.$recno.'"';
	$eligible_currencies = array('$', '£', '€', "CHF", "NOK");

	switch ($issuer) {
		case "Royal Bank of Canada";
			if ($currency == "$") {$ourdeal = "Y";}
			break;
		case "Bank of Nova Scotia";
			if (in_array($currency, array('$', '£', '€', 'CHF', 'NOK'))) {$ourdeal = "Y";}
			break; 
		case "Bank of Montreal";
			if (in_array($currency, $eligible_currencies)) {$ourdeal = "Y";}
			break;
		case "Canadian Imperial Bank of Commerce";
			if (in_array($currency, array('$', '£', '€', 'CHF', 'NOK'))) {$ourdeal = "Y";}
			break;
		case "Equitable Bank";
			break;
		case "Fédération des caisses Desjardins du Quebec";
			if ($currency == "$") {$ourdeal = "Y";}
			break;
		case "HSBC Bank Canada";
			if (in_array($currency, $eligible_currencies)) {$ourdeal = "Y";}
			break;
		case "Laurentian Bank of Canada";
			break;
		case "National Bank of Canada";
			if ($currency == "$") {$ourdeal = "Y";}
			break;
		case "Toronto-Dominion Bank";
			if ($currency == "$") {$ourdeal = "Y";}
			break;
		default: $ourdeal = NULL;
	}

	// Now update the record to set Ours indicator
	$query = 'UPDATE '.$table.' SET Ours="'.$ourdeal.'"'.$where;
	$wpdb->query($query);
	$wpdb->show_errors();

	// SELECT the record that was updated
	$query = "SELECT * FROM ".$table.$where;
	$resultsupd = $wpdb->get_results($query, ARRAY_N);


	// Display the record that we updated
	$x = count($resultsupd);
	for ($yy=0; $yy < $x; $yy++) {
		echo '<tr>';
		$output = $resultsupd[$yy];
		$numoutput = count($output);
		for ($w=0; $w < $numoutput; $w++) {
			if ($w !== 12) {     // Skip the Comment field
			echo '<td> '.$output[$w].'&nbsp; </td>';
			}
		}
		echo '</tr>';
	} 
} 
echo '</table>';

get_footer();
?>