<?php
/**
 * Template name: CBAgg_Input
 * Template for updating the database tables for CBs
 *
 * This is the template that updates the 
 * table of CB data in SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 August 21, 2015
 */

get_header('tables'); ?>

<div style="width:100%;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 01/06/2016</p>
<h1 class="t1USDCB";>Input a New Record</h1>
<hr>
<?php

$pricing = '';
$issuer = '';
$region = '';
$series = '';
$link = '';
$currency = '';
$amount = '';
$coupon = '';
$maturity = '';
$tenor = '';
$spread = '';
$type = '';
$table = 'CBAggregate';
$array = '';
$comments = NULL;
$ours = '';
$s = '';

if ( isset( $_POST['inputCB'] ) ) { 

$pricing = $_POST['pricing'];
	if ($pricing !== "") {
$issuer = $_POST['issuer'];
$region = $_POST['region'];
$series = $_POST['series'];
$link = $_POST['link'];
$currency= $_POST['currency'];
$amount = $_POST['amount'];
$coupon = $_POST['coupon'];
$maturity = $_POST['maturity'];
$tenor = $_POST['tenor'];
$spread = $_POST['spread'];
$type = $_POST['type'];
$comments = $_POST['comments'];
$ours = $_POST['ours'];
if ($comments === 'NULL') {$comments = NULL;}
if ($comments === '') {$comments = NULL;}
		
//  clear the post 
$_POST = array();

/** put in the hyperlink for Series, or if no Series, for Issuer  */
	if ($link == '') {
		$link = 'http://www.us-covered-bonds.com/not-yet-available';
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
			'Region' => $region, 
			'Series' => $series, 
			'Currency' => $currency, 
			'Amount' => $amount, 
			'Coupon' => $coupon, 
			'Maturity' => $maturity, 
			'Tenor' => $tenor, 
			'Spread' => $spread, 
			'Type' => $type,
			'Comments' => $comments,
	        'Ours' => $ours
			);
$s = array( '%s', '%s', '%s', '%s', '%s', '%d' , '%s', '%s', '%s', '%s', '%s', '%s', '%s' );

$wpdb->show_errors();

	$wpdb->insert($table, $array, $s );
	
$wpdb->show_errors();

// SELECT the record that was updated
$id = $wpdb->insert_id; 
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
<form  name='update' method="POST">
Pricing Date: <input type="text" name="pricing" style="position:absolute; left:300px;" placeholder="yyyy-mm-dd" required><br /><br />
Issuer: <select name='issuer' style="position:absolute; left:300px; width: 190px;" required><br /><br />
<option value='' label="Select Issuer Name"> </option>
	<?php include ( get_stylesheet_directory() . '/includes/Global_Issuers.php'); ?>
	</select>
	<br /><br />
Region: <select name='region' style="position:absolute; left:300px; width:190px;"><br><br>
<option value='' label="Select Country"> </option>
	<?php include ( get_stylesheet_directory() . '/includes/Global_Countries.php'); ?>		
	</select>
	<br /><br />
Series: <input type="text" name="series" style="position:absolute; left:300px;" placeholder="CBLxx"><br><br>
Link: <input type="text" name="link" style="position:absolute; left:300px;" placeholder="Input URL"><br><br>
Currency: <select name="currency" style="position:absolute; left:300px; width:190px;"><br><br>
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
Amount: <input type="text" name="amount" style="position:absolute; left:300px;" placeholder="Input Amount: 000,000's"><br><br>
Coupon: <input type="text" name="coupon" style="position:absolute; left:300px;" placeholder="Input Coupon: 0.xxx"><br><br>
Maturity: <input type="text" name="maturity" style="position:absolute; left:300px;" placeholder="yyyy-mm-dd"><br><br>
Tenor: <input type="text" name="tenor" style="position:absolute; left:300px;" placeholder="Input tenor: xxyr"><br><br>
Spread: <input type="text" name="spread" style="position:absolute; left:300px;" placeholder="Input spread: +xx"><br><br>
Type: <select name="type" style="position:absolute; left:300px; width:190px"><br /><br />
<option value='' label="Select Type of Offering"> </option>
<option value='SEC'>SEC</option>
<option value='144A'>144A</option>
<option value='Reg S'>Reg S</option>
<option value='144A/Reg S'>144A/Reg S</option>
<option value='BoC'>Bank of Canada</option>	
</select>
<br /><br />
	
Ours: <select name="ours" style="position:absolute; left:300px; width:190px"><br /><br />
<option value='N' label="Our Deal?"> </option>
<option value='Y'>Yes</option>
<option value=''>No</option>
</select>
<br /><br />
Comments: <input type="text" name="comments" value="" style="position:absolute; left:300px; width:256px;" placeholder="Comments for offering"><br><br>



<input name='inputCB' type="submit" value="Submit New Record" style="position:absolute; left:300px;"><br><br>
</form>
</div>

<?php
get_footer();
?>