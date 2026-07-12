<?php
/**
* Template name: CB_Inquiry
 * Template for displaying just the Header
 *
 * This is the template that displays the 
 * table of CB Inqueries from SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 July 10, 2015
 */

get_header(); ?>

<div style="width:20%; float:right; font-size:small">
<p style="margin:0;"><strong>Save table and clear:</strong></p>
<form name='savetable' action='http://www.us-covered-bonds.com/cb-queries' method='POST'>
<select name='savetable' style="width:70%;">
<option value=''> </option>
<option value='savetable'>Save the table</option>
<p><input type='submit' name='Submit2' value='Submit to Save' />
  </form></p>
</form>
</div>
<div style="width:80%; float:left;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 7/02/2015</p>
<h1 class="t1CBQueries";>Data Base Queries</h1>

<p style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>
</div>

<table class="t1CBQueries sortable"; style="margin-left: 0; float:left;">
<!--***************************************************************************************-->
<!--**************************************CB QUERIES***************************************-->
<!--***************************************************************************************-->
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:2%">
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:29%">
	<col style="width:29%">


<thead><tr >
   <th width="120"><strong>Date</strong></th>
   <th width="80"><strong>IP</strong></th>
   <th width="15"><strong>Ctry</strong></th>
   <th width="60"><strong>Region</strong></th>
   <th width="80"><strong>City</strong></th>
   <th width="200"><strong>Hostname</strong></th>
   <th width="350"><strong>Query</strong></th>
</tr></thead>
<tbody>

<?php 
     if ( isset( $_POST['Submit2'] ) ) { 
     $save = $_POST['savetable'];
     if ($save !== "") { 
		//SAVE TABLE AND CREATE NEW TABLE
		date_default_timezone_set("America/New_York");
		$date = date('Y_m_d_h_i');
		$table2 = 'CB_Inquery_'.$date;
		$wpdb->query('RENAME TABLE CB_Inquery TO '.$table2);
		$wpdb->query('CREATE TABLE CB_Inquery LIKE '.$table2);
		//  END OF SAVE AND NEW TABLE CREATION
           }  
/*  To reset and clear the Post  */
 echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";        
      }

$query = "SELECT * FROM CB_Inquery ORDER BY Date DESC";
$results = $wpdb->get_results($query, ARRAY_N);
$z = count($results);
echo $z;
for ($y=0; $y < $z; $y++) {
      echo '<tr>';
     // $output = $wpdb->get_row($query, ARRAY_N, $y);
      $output = $results[$y];
      $output[1] = substr($output[1],5);
      $numoutput = count($output);
      for ($x=1; $x < $numoutput; $x++) {
          echo '<td>'.$output[$x].'</td>';
}
}
echo '</tbody>';
?>
</table>
 
</div></div>
<div style="margin:0; clear:both; float:left;">
&nbsp;
</div>

<?php
get_footer();
?>