<?php
/**
 * Template name: CB_Visitors
 * Template for displaying visitor to any page
 *
 * This is the template that displays the 
 * table of cb_visitors from SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 12/2/2018
 */
get_header();
?>
<div style="width:20%; float:right; font-size:small">
    <p style="margin:0;"><strong>Save table and clear</strong></p>
    <form name='savetable' action='http://www.us-covered-bonds.com/cb-visitors' method='POST'>
        <select name='savetable' style="width:70%;">
            <option value=''> </option>
            <option value='savetable'>Save the Table</option>
        <p><input type='submit' name='Submit3' value='Submit to Save' /></p>
        </form>
    </div>

<div style="width:80%; float:left;">
    <p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 7/20/2015</p>
    <h1 class="t1CBQueries";>Web Site Visitors</h1>

    <p style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>
    </div>

<div style="width: 100%; margin: 0; border: 0;">
    <table class="t1CBQueries sortable"; style="margin-left: 0; float:left;">
    <!--***************************************************************************************-->
    <!--**************************************CB VISITORS***************************************-->
    <!--***************************************************************************************-->
	<col style="width:8%">
	<col style="width:3%">
	<col style="width:3%">
	<col style="width:10%">
	<col style="width:10%">
	<col style="width:26%">
	<col style="width:24%">
	<col style="width:16%">
        <thead>
            <tr >
                <th width="8%"><strong>Date</strong></th>
                <th width="3%"><strong>IP</strong></th>
                <th width="3%"><strong>Ctry</strong></th>
                <th width="10%"><strong>Region</strong></th>
                <th width="10%"><strong>City</strong></th>
                <th width="26%"><strong>Hostname</strong></th>
                <th width="24%"><strong>Organization</strong></th>
                <th width="16%"><strong>Page</strong></th>
                </tr>
            </thead>
            <tbody>

<?php
global $wpdb;
/* if request to save table is submitted */
if ( isset($_POST['Submit3'] ) ) {
/* save the table by date and create a new empty table */
    $save = $_POST['savetable'];
    if ( $save !== "" ) {
/*  SAVE TABLE AND CREATE NEW TABLE  */
        date_default_timezone_set("America/New_York");
        $date = date('Y_m_d_h_i');
        $table2 = 'cb_visitors_' . $date;
        $wpdb->query('RENAME TABLE cb_visitors TO ' . $table2);
        $wpdb->query('CREATE TABLE cb_visitors LIKE ' . $table2);
/*  END OF SAVE AND NEW TABLE CREATION  */
    }
/*  To reset and clear the Post  */
    echo "<script type='text/javascript'>window.location=document.location.href;
</script>";
}

$query = "SELECT * FROM cb_visitors ORDER BY Date DESC";
$results = $wpdb->get_results($query, ARRAY_N);
$z = count($results);
echo $z;
for ($y = 0; $y < $z; $y++) {
    echo '<tr>';
/*   $output = $wpdb->get_row($query, ARRAY_N, $y);  */
    $output = $results[$y];
    $output[1] = substr($output[1], 5);
    $numoutput = count($output);
    for ($x = 1; $x < $numoutput; $x++) {
        echo '<td>' . $output[$x] . '</td>';
    } echo '</tr>';
}
echo '</tbody>';
?>
     </table>

    </div>
    <div style="margin:0; clear:both; float:left;">
        &nbsp;
    </div>
<?php
get_footer();
?>