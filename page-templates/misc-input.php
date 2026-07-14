<?php
/**
 * Template name: MISC_Input
 * Template for updating the database table for MISC Data
 *
 * This is the template that updates the 
 * table of MISC data in SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 January 6, 2016
 * version 1.1 November 27,2024
 */

get_header('tables'); ?>

<div style="width:100%;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 11/25/2024</p>
<h1 class="t1USDCB";>Input a New MISC Data Record</h1>
<hr>

<?php

$pricing = '';
$issuer = '';
$asset = '';
$series = '';
$amount = '';
$maturity = '';
$ratings = '';
$type = '';
$uw = '';
$desc = '';
$link = '';
$table = 'Misc';
$id = '';
$array = '';
$s = '';

if ( isset( $_POST['inputMISC'] ) ) { 
	$pricing = $_POST['pricing'];
	if ($pricing !== "") {
		$issuer = $_POST['issuer'];
		$asset = $_POST['asset'];
		$series = $_POST['series'];
		$amount = $_POST['amount'];
		$maturity = $_POST['maturity'];
		$ratings = $_POST['ratings'];
		$type = $_POST['type'];
		$uw = $_POST['uw'];
		$desc = $_POST['desc'];
		$link = $_POST['link'];

		// Clear the POST
		$_POST = array();

		/** put in the hyperlink for Series, or if no Series, for Issuer  */
		if ($link == '') {
			$link = 'not-available';
		}
		if ($series !== '') {
			$series = '<a href="'.$link.'" target="_blank">'.$series.'</a>';
		} 
		else {
			$issuer = '<a href="'.$link.'" target="_blank">'.$issuer.'</a>';
			}

		$array = array( 
			'Date' => $pricing, 
			'Issuer' => $issuer, 
			'Asset' => $asset, 
			'Series' => $series,
			'Amount' => $amount, 
			'Maturity' => $maturity, 
			'Ratings' => $ratings, 
			'Type' => $type, 
			'Underwriters' => $uw,
			'Description' => $desc,
			'Link' => $link
			);

		$wpdb->show_errors();
		$wpdb->insert($table, $array);
			
		$wpdb->show_errors();

		// SELECT the record that was updated
		$id = $wpdb->insert_id; 
		if (!$id)
			exit('Failed to insert');
		$where = ' WHERE RecNo="'.$id.'"';
		$query = "SELECT * FROM ".$table.$where;
		$results = $wpdb->get_results($query, ARRAY_N);
		$wpdb->show_errors();
		$z = count($results); 
		for ($y=0; $y < $z; $y++) {
			echo '<table><tr>';
			$output = $results[$y];
			$numoutput = count($output);
			for ($x=0; $x < $numoutput; $x++) {
				echo '<td> '.$output[$x].'&nbsp; </td>';
				}
			echo '</tr></table>';
			}


		/*  To reset and clear the Post  */
		//	echo "<script type='text/javascript'>
		//        window.location=document.location.href;
		//        </script>";
}  } 
?>

<div>
<br>
<!--<form action="http://www.us-covered-bonds.com/misc_input/" name='update' method="POST">-->
	<form name='update' method="POST">

	Pricing Date: <input type="text" name="pricing" style="position:absolute; left:300px;" placeholder="yyyy-mm-dd"><br /><br />
	Issuer: <select name='issuer' style="position:absolute; left:300px; width: 200px;">
		<option value='' label="Select Issuer Name"> </option>
		<option value='BMO'>BMO</option>
		<option value='BNS'>BNS</option>
		<option value='CCDQ'>CCDQ</option>
		<option value='CIBC'>CIBC</option>
		<option value='HSBC'>HSBC</option>
		<option value='NBC'>NBC</option>
		<option value='RBC'>RBC</option>
		<option value='TD Bank'>TD Bank</option>
		<option value='LendingClub'>LendingClub</option>
		</select>	 <br /><br />
	Asset: <input type="text" name="asset" style="position:absolute; left:300px;" placeholder="asset type"><br><br>
	Series: <input type="text" name="series" style="position:absolute; left:300px;" placeholder="20__-__"><br><br>
	Amount: <input type="text" name="amount" style="position:absolute; left:300px;" placeholder="Input Amount: 000,000's"><br><br>
	Maturity: <input type="text" name="maturity" style="position:absolute; left:300px;" placeholder="yyyy-mm-dd"><br><br>
	Ratings: <input type="text" name="ratings" style="position:absolute; left:300px;" placeholder="Input rating"><br><br>
	Type: <input type="text" name="type" style="position:absolute; left:300px;" placeholder="Offering Type"><br><br>
	Underwriters: <input type="text" name="uw" style="position:absolute; left:300px;" placeholder="Underwriters"><br><br>
	Description: <input type="text" name="desc" style="position:absolute; left:300px;" placeholder="Description"><br><br>
	Link: <input type="text" name="link" style="position:absolute; left:300px;" placeholder="Input URL"><br><br>
	<input name='inputMISC' type="submit" value="Submit New Record" style="position:absolute; left:300px;"><br><br>
</form>
</div>

<?php
get_footer();
?>