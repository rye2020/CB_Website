<?php
/**
 * Template name: MTN_Input
 * Template for updating the database table for MTNs
 *
 * This is the template that updates the 
 * table of MTN data in SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 January 6, 2016
 * version 1.2 March 17, 2023
 */

get_header('tables'); ?>

<div style="width:100%;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 01/15/2016</p>
<h1 class="t1USDCB";>Input a New MTN Record</h1>
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
$id = '';
$array = '';
$s = '';

if ( isset( $_POST['inputMTN'] ) ) { 
	$pricing = $_POST['pricing'];
	if ($pricing !== "") {
		$issuer = $_POST['issuer'];
		$series = $_POST['series'];
		$form = $_POST['form'];
		$amount = $_POST['amount'];
		$coupon = $_POST['coupon'];
		$maturity = $_POST['maturity'];
		$spread = $_POST['spread'];
		$link = $_POST['link'];
		$comment = $_POST['comment'];
		if ($comments === 'NULL') {$comments = NULL;}
		if ($comments === '') {$comments = NULL;}

		// Clear the POST
		$_POST = array(); 

		/** put in the hyperlink for Series, or if no Series, for Issuer  */
		if ($link == '') {
			$link = 'not-yet-available';
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
			'Series' => $series, 
			'Form' => $form,
			'Amount' => $amount, 
			'Coupon' => $coupon, 
			'Maturity' => $maturity, 
			'Spread' => $spread, 
			'Comment' => $comment,
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
<!--<form action="http://www.us-covered-bonds.com/mtn_input/" name='update' method="POST">-->
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
	    <option value='EDC'>Export Development Canada</option>
		</select>	 <br /><br />
	Series: <input type="text" name="series" style="position:absolute; left:300px;" placeholder="20xx-x"><br><br>
	Form: <input type="text" name="form" style="position:absolute; left:300px;" placeholder="Input Offering Form"><br><br>
	Amount: <input type="text" name="amount" style="position:absolute; left:300px;" placeholder="Input Amount: 000,000's"><br><br>
	Coupon: <input type="text" name="coupon" style="position:absolute; left:300px;" placeholder="Input Coupon: 0.xxx"><br><br>
	Maturity: <input type="text" name="maturity" style="position:absolute; left:300px;" placeholder="yyyy-mm-dd"><br><br>
	Spread: <input type="text" name="spread" style="position:absolute; left:300px;" placeholder="Input spread: +xx"><br><br>
	Link: <input type="text" name="link" style="position:absolute; left:300px;" placeholder="Input URL"><br><br>
	Comment: <input type="text" name="comment" style="position:absolute; left:300px;" placeholder="Input comment"><br><br>
	<input name='inputMTN' type="submit" value="Submit New Record" style="position:absolute; left:300px;"><br><br>
</form>
</div>

<?php
get_footer();
?>