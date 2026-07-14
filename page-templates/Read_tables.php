<?php
/**
 * Template name: Read_tablex
 *
 * This is the template that displays any 
 * table of data from SQL.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 December 23, 2015
 */

get_header(); 
global $wpdb; ?>

<?php
$like = "";
$tablename = '';
$title = '';
// check for URL parameter
$parms = htmlspecialchars($args['file']);

if ($parms === "CBAggregate" || $parms === "MTN_Table" || $parms === "ABS" || $parms === "Misc" ) {
	$tablename =  $parms;
	$title = $tablename;
	$args = array();
}
elseif ( isset( $_POST['Submittbnm'] ) ) { 
 	$tablename = $_POST['tablename'];
	$title = "Data from ".$tablename;
}
?>

<div style="width: 80%; float:left;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 12/23/2015</p>
<h1 class="t1USDCB";><?php echo $title; ?></h1>
<p style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>
</div>
<div style="width:20%; float:right; font-size:small">
<form name='readtable'  method="POST" >
Table Name: <select name='tablename' ><br><br>
<option value='' label="Select Table"> </option>
<option value='CBAggregate'>CBAggregate</option>
<option value='MTN_Table'>MTN_Table</option>
<option value='ABS'>ABS</option>	
<option value='Misc'>Misc</option>
<option value='CB_Inquery'>CB_Inquery</option>
<option value='cb_visitors'>cb_visitors</option>
</select>
<input type='submit' name='Submittbnm' value='Submit' />
  </form>
</div>

<div style="width: 100%; border: 0; margin: 0; clear:both;">
<?php
//////////////

echo '<table class="t1CanadianCBD sortable RDXtable"; style="margin-left: 0; float:left;">';
//***************************************************************************************
//*******************************ANY DATA TABLE******************************************
//***************************************************************************************
echo "<thead><tr>";

if ($tablename != "") {
//-----------GET COLUMN HEADERS
$colnames = array();
$query = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME="'.$tablename.'"';
$colnames = $wpdb->get_results($query, ARRAY_N);
$z = count($colnames);
for ($y=0; $y < $z; $y++) {
	$x = $colnames[$y][0];
        echo '<th class="RDXtable"><strong>'.$x.'</strong></th>';
	}
}	
echo "</tr></thead>";
echo "<tbody>";

//------------GET TABLE ENTRIES
	$like = '';
	jrm_get_table ($tablename,$like,'NO',0,'yes','NONE','NONE','yes'); 

?>

</div>
<?php
get_footer();
?>