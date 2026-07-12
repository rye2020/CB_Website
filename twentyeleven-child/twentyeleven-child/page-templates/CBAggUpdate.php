<?php
/**
* Template name: CBAgg_Update
 * Template for updating the database tables for CBs
 *
 * This is the template that updates the 
 * table of CB data in SQL .
 *
 * Revised v.2 to allow updating URL information
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 July 12, 2015
 * version 2.0 October 15, 2015
  * version 3.0 January 5, 2016
 * version 3.1 January 11, 2016 URL update 
 * version 3.0 January 20, 2016
 */

get_header('tables'); ?>

<?php

$date = '';
$issuer = '';
$region = '';
$series = '';
$currency = '';
$amount = '';
$coupon = '';
$maturity = '';
$tenor = '';
$spread = '';
$type = '';
$link = '';
$table = 'CBAggregate';
$query = '';
$where = '';
$set = '';
$comments = '';
$ours = '';

// Initialize WHERE fileds  
$wfield1 = 'RecNo';
$wifield1 = '';

//  Initialize the UPDATE fields
$ufield1 = 'Date';
$uifield1 = '';
$ufield2 = 'Issuer';
$uifield2 = '';
$ufield3 = 'Region';
$uifield3 = '';
$ufield4 = 'Series';
$uifield4 = '';
$ufield5 = 'Currency';
$uifield5 = '';
$ufield6 = 'Amount';
$uifield6 = '';
$ufield7 = 'Coupon';
$uifield7 = '';
$ufield8 = 'Maturity';
$uifield8 = '';
$ufield9 = 'Tenor';
$uifield9 = '';
$ufield10 = 'Spread';
$uifield10 = '';
$ufield11 = 'Type';
$uifield11 = '';
$ufield12 = 'Link';
$uifield12 = '';
$ufield13 = 'Comments';
$uifield13 = NULL;
$ufield14 = 'Ours';
$uifield14 = '';

if ( isset( $_POST['updateCB'] ) ) { 

	//  Set the WHERE fields
	$wifield1 = $_POST['wifield1'];

	//  Set the UPDATE fields

	$uifield1 = $_POST['pricing'];
	$uifield2 = $_POST['issuer'];
	$uifield3 = $_POST['region'];
	$uifield4 = $_POST['series'];
	$uifield5 = $_POST['currency'];
	$uifield6 = $_POST['amount'];
	$uifield7 = $_POST['coupon'];
	$uifield8 = $_POST['maturity'];
	$uifield9 = $_POST['tenor'];
	$uifield10 = $_POST['spread'];
	$uifield11 = $_POST['type'];
	$uifield12 = $_POST['link'];
	$uifield13 = $_POST['comments'];
	$uifield14 = $_POST['ours'];
	if ($uifield13 === 'NULL') {$uifield13 = NULL;}
	if ($uifield13 === '') {$uifield13 = NULL;}
	
// CLEAR POST
$_POST = array();

	//  Build the WHERE string
	if ($wifield1 == '')
		{exit ("Empty WHERE Field");}
	if ($wifield1 !== '') {
		$where = ' WHERE '.$wfield1.' LIKE "'.$wifield1.'"';
		}

	//  Build the SET string
	$set = ' SET ';
	$comma = '';

	if ($uifield1 !== '') {
		$set= $set.$ufield1.'="'.$uifield1.'"';
		$comma = ', ';
		}
	// Special treatment below for Issuer and Series, $uifield2 and $uifield4
	if ($uifield3 !== '') {
		$set = $set.$comma.$ufield3.'="'.$uifield3.'"';
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
	if ($uifield10 !== '') {
		$set = $set.$comma.$ufield10.'="'.$uifield10.'"';
		$comma = ', ';
		}
	if ($uifield11 !== '') {
		$set = $set.$comma.$ufield11.'="'.$uifield11.'"';
		$comma = ', ';
		}
	if ($uifield13 !== NULL) {
		$set = $set.$comma.$ufield13.'="'.$uifield13.'"';
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
	print_r ($output); 
	echo '<br /><br /> ';
	
/////////////////////////////NEED TO PARSE FOR EXISTING URL
	// update Link information - Series, or if not, then Issuer
	if (substr($output[4],0,8) == '<a href=') {      // test for link on existing Series
		$x = strpos($output[4], " target=")-1;
		echo '$x= '.$x.'<br />';
		echo '$output[4]= '.$output[4].'<br />';
		$curlink = substr($output[4],9,$x-9);
		echo '$curlink(Series)= '.$curlink.'<br />';
	} elseif (substr($output[2],0,8) == '<a href=') {   // test for link on existing Issuer
		$x = strpos($output[2], " target=")-1;
		$curlink = substr($output[2],9,$x-9);
		echo '$curlink(Issuer)= '.$curlink.'<br />';		
	} else {
		$curlink = '';	// then there is no current link
	}
		
	if ($uifield2 == '') {$issuer = strip_tags($output[2]);} else {$issuer = $uifield2;}
	if ($uifield4 == '') {$series = strip_tags($output[4]);} else {$series = $uifield4;}
	if ($uifield12 == '') {$link = $curlink;} else {$link = $uifield12;}

	if ($link !== "") {			// there is a Link
		if ($series !== '') {
			$series = "<a href='".$link."' target='_blank'>".$series."</a>";  // put Link on Series
			$set = $set.$comma.'Series = "'.$series.'"';			// update Series field	
			$set = $set.', Issuer = "'.$issuer.'"';			// update Issuer field
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

<div style="position:relative;">
<h1 style="text-align:center; font-weight: 800;"> Update Database Entries</h1>
<br>
<form  name='updateCB' method="POST">    
WHERE<br>
Record #:<input type="text" name="wifield1" placeholder="Insert Value" style="position:absolute; left:150px;" required><br><br>
<br />
UPDATE<br>

Pricing Date: <input type="text" name="pricing" style="position:absolute; left:150px;" placeholder="yyyy-mm-dd"><br /><br />
Issuer: <select name='issuer' style="position:absolute; left:150px; width: 190px;"><br /><br />
		<option value='' label="Select Issuer Name"> </option>
		<?php include ( get_stylesheet_directory() . '/includes/Global_Issuers.php'); ?>
		</select>
		<br /><br />
Region: <select name='region' style="position:absolute; left:150px; width:190px;"><br><br>
		<option value='' label="Select Country"> </option>
		<?php include ( get_stylesheet_directory() . '/includes/Global_Countries.php'); ?>
		</select>
		<br /><br />
Series: <input type="text" name="series" style="position:absolute; left:150px;" placeholder="CBLxx"><br><br>
Currency: <select name="currency" style="position:absolute; left:150px; width:190px;"><br><br>
		<option value='' label="Select Currency"> </option>
		<option value='$'>$</option>
	    <option value='A$'>A$</option>
		<option value='C$'>C$</option>
		<option value='€'>€</option>
		<option value='£'>£</option>
		<option value='CHF'>CHF</option>
	    <option value='NOK'>NOK</option>
		</select>
		<br /><br />
Amount: <input type="text" name="amount" style="position:absolute; left:150px;" placeholder="Input Amount: 000,000's"><br><br>
Coupon: <input type="text" name="coupon" style="position:absolute; left:150px;" placeholder="Input Coupon: 0.xxx"><br><br>
Maturity: <input type="text" name="maturity" style="position:absolute; left:150px;" placeholder="yyyy-mm-dd"><br><br>
Tenor: <input type="text" name="tenor" style="position:absolute; left:150px;" placeholder="Input tenor: xxyr"><br><br>
Spread: <input type="text" name="spread" style="position:absolute; left:150px;" placeholder="Input spread: +xx"><br><br>
Type: <select name="type" style="position:absolute; left:150px; width:190px"><br /><br />
		<option value='' label="Select Type of Offering"> </option>
		<option value='SEC'>SEC</option>
		<option value='144A'>144A</option>
		<option value='Reg S'>Reg S</option>
		<option value='144A/Reg S'>144A/Reg S</option>
	    <option value='BoC'>Bank of Canada</option>
		</select>
		<br /><br />
Link: <input type="text" name="link" style="position:absolute; left:150px;" placeholder=" Link"><br><br><br>
	
Ours:<select name="ours" style="position:absolute; left:150px; width:190px" value="N"><br /><br />
<option value='' label="Our Deal?"> </option>
<option value='Y'>Yes</option>
<option value=''>No</option>
</select>
<br /><br />
Comments: <input type="test" name="comments" value="" style="position:absolute; left:150px;" placeholder="Input comments for entry"><br><br>

<input name='updateCB' type="submit" value="Submit CB Update">
</form>

<?php
get_footer();
?>