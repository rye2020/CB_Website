<?php
/**
* Template name: MTN_Update
 * Template for updating the database table for MTNs
 *
 * This is the template that updates the 
 * table of MTN data in SQL .
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 January 8, 2016 
 * version 1.1 January 16, 2016 
 * version 1.2 March 17, 2023
 */

get_header(); ?>

<div style="width:100%;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 01/08/2016</p>
<h1 class="t1USDCB";>Update an Existing MTN Record</h1>
<hr>

<?php

$pricing = '';
$issuer = '';
$series = '';
$form = '';
$amount = '';
$coupon = '';
$maturity = '';
$spread = '';
$link = '';
$comment = '';
$table = 'MTN_Table';
$query = '';
$where = '';
$set = '';

// Initialize WHERE fileds  
$wfield1 = 'RecNo';
$wifield1 = '';


//  Initialize the UPDATE fields
$ufield1 = 'Date';
$uifield1 = '';
$ufield2 = 'Issuer';
$uifield2 = '';
$ufield3 = 'Series';
$uifield3 = '';
$ufield4 = 'Form';
$uifield4 = '';
$ufield5 = 'Amount';
$uifield5 = '';
$ufield6 = 'Coupon';
$uifield6 = '';
$ufield7 = 'Maturity';
$uifield7 = '';
$ufield8 = 'Spread';
$uifield8 = '';
$ufield9 = 'Comment';
$uifield9 = '';
$ufield10 = 'Link';
$uifield10 = '';

if ( isset( $_POST['updateMTN'] ) ) { 

	//  Set the WHERE fields
	$wifield1 = $_POST['wifield1'];

	//  Set the UPDATE fields

	$uifield1 = $_POST['uifield1'];
	$uifield2 = $_POST['uifield2'];
	$uifield3 = $_POST['uifield3'];
	$uifield4 = $_POST['uifield4'];
	$uifield5 = $_POST['uifield5'];
	$uifield6 = $_POST['uifield6'];
	$uifield7 = $_POST['uifield7'];
	$uifield8 = $_POST['uifield8'];
	$uifield9 = $_POST['uifield9'];
	$uifield10 = $_POST['uifield10'];

	//  Build the WHERE string
	if ($wfield1 == '')
		{exit ("Empty WHERE Field");}
	if ($wfield1 !== '') {
		$where = ' WHERE '.$wfield1.' LIKE "'.$wifield1.'"';
		}

	//  Build the SET string
	$set = ' SET ';
	$comma = '';

	if ($uifield1 !== '') {
		$set= $set.$ufield1.'="'.$uifield1.'"';
		$comma = ', ';
		}
// Special treatment below for Issuer and Series, $uifield2 and $uifield3
	if ($uifield4 !== '') {
		$set = $set.$comma.$ufield4.'="'.$uifield4.'"';
		$comma = ', ';
		}
	if ($uifield5 !== '') {
		$set = $set.$comma.$ufield5.'="'.$uifield5.'"';
		$comma = ', ';
		}
	if ($uifield6 !== '') {
		$set = $set.$comma.$ufield6.'="'.$uifield6.'"';
		$comma = ', ';
		}
	if ($uifield7 !== '') {
		$set = $set.$comma.$ufield7.'="'.$uifield7.'"';
		$comma = ', ';
		}
	if ($uifield8 !== '') {
		$set = $set.$comma.$ufield8.'="'.$uifield8.'"';
		$comma = ', ';
		}
	if ($uifield9 !== '') {
		$set = $set.$comma.$ufield9.'="'.$uifield9.'"';
		$comma = ', ';
		}
	if ($ufield10 !== '') {
		$set = $set.$comma.$ufield10.'="'.$uifield10.'"';
		$comma = ', ';
		}

	// SELECT the record to be updated	
	$query = "SELECT * FROM ".$table.$where;
	$results = $wpdb->get_results($query, ARRAY_N);
	$z = count($results);
	if ($z >1) {
		echo 'ERROR - Record not unique<br>';
		exit ('Terminating');
		}
	for ($y=0; $y < $z; $y++) {
		echo '<table><tr>';
		$output = $results[$y];
		$numoutput = count($output);
		for ($x=0; $x < $numoutput; $x++) {
			echo '<td> '.$output[$x].'&nbsp;'.'</td>';
			}
		echo '</tr></table>';
		}
	print_r ($output).'<br>  '; //////////////////////////////////////////////////////////

// update Link information - Series, or if not, then Issuer
	if ($uifield2 == '') {$issuer = strip_tags($output[2]);} else {$issuer = $uifield2;}
	if ($uifield3 == '') {$series = strip_tags($output[3]);} else {$series = $uifield3;}
	if ($uifield10 == '') {$link = $output[10];} else {$link = $uifield10;}

	if ($link !== "") {			// there is a Link
		if ($series !== '') {
			$series = "<a href='".$link."' target='_blank'>".$series."</a>";  // put Link on Series
			$set = $set.$comma.'Series = "'.$series.'"';			// update Series field	
			$set = $set.$comma.'Issuer = "'.$issuer.'"';			// update Issuer field
			$comma = ', ';			
		} elseif ($issuer !== '') {
			$issuer = "<a href='".$link."' target='_blank'>".$issuer."</a>";	// put Link on Issuer
			$set = $set.$comma.'Issuer = "'.$issuer.'"';						// update Issuer field
			$comma = ', ';			
		}
	} else {
			$set = $set.$comma.'Series = "'.$series.'"';			// update Series field	
			$set = $set.$comma.'Issuer = "'.$issuer.'"';			// update Issuer field
			$comma = ', ';			
	}
	
	//  UPDATE the record
	if ($set == ' SET ') {exit ("Empty Update");}	// skip udating if there is no input
	$query = 'UPDATE '.$table.$set.$where;
	echo $query;

	$wpdb->query($query);
	$wpdb->show_errors();

	// SELECT the record that was updated	
	$query = "SELECT * FROM ".$table.$where;
	$results = $wpdb->get_results($query, ARRAY_N);
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

	//  To reset and clear the Post  
	//	echo "<script type='text/javascript'>
	//        window.location=document.location.href;
	//        </script>"; 
} 

?>

<div>
<h1 style="text-align:center; font-weight: 800;"> Update MTN Entries</h1>
<hr>
<br>
<form name='updateMTN' method="POST">
WHERE<br>
Record Number:
	<input type="text" name="wifield1" placeholder="Insert Value" style="position:absolute; left:450px;"><br><br>
<br />
	UPDATE<br>
Date:	<input type="text" name="uifield1" style="position:absolute; left:450px;" placeholder="Insert Date"><br><br>
Issuer:	<input type="text" name="uifield2" style="position:absolute; left:450px;" placeholder="Insert Issuer"><br><br>
Series:	<input type="text" name="uifield3" style="position:absolute; left:450px;" placeholder="Insert Series"><br><br>
Form:	<input type="text" name="uifield4" style="position:absolute; left:450px;" placeholder="Insert Form Type"><br><br>
Amount:	<input type="text" name="uifield5" style="position:absolute; left:450px;" placeholder="Insert Amount"><br><br>
Coupon:	<input type="text" name="uifield6" style="position:absolute; left:450px;" placeholder="Insert Coupon"><br><br>
Maturity:	<input type="text" name="uifield7" style="position:absolute; left:450px;" placeholder="Insert Maturity"><br><br>
Spread:	<input type="text" name="uifield8" style="position:absolute; left:450px;" placeholder="Insert Spread"><br><br>
Comment:	<input type="text" name="uifield9" style="position:absolute; left:450px;" placeholder="Insert Comment"><br><br>
Link:	<input type="text" name="uifield10" style="position:absolute; left:450px;" placeholder="Insert Link"><br><br><br>

	<input name='updateMTN' type="submit" value="Submit MTN Update">
</form>

<?php
get_footer();
?>