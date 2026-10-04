<?php
/**
* Template Name: CB2_Visitors
* Template Post Type: page
* 
 * Template for displaying visitor to any page
 *
 * This is the template that displays the 
 * table of cb_visitors from SQL .
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 12/1/2018
 */
if ( ! current_user_can('manage_options') ) {   // (Claude) admin-only page
    wp_die('Not allowed', 403);                 // (Claude)
}                                               // (Claude)

get_header();
?>

<div style="width:20%; float:right; font-size:small">
    <p style="margin:0;"><strong>Save table and clear:</strong></p>
    <form name='savetable' action='http://www.us-covered-bonds.com/cb-visitors' method='POST'>
        <select name='savetable' style="width:70%;">
            <option value=''> </option>
            <option value='savetable'>Save the Table</option></select>
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
        <thead>
            <tr >
                <th width="12%"><strong>Date</strong></th>
                <th width="7%"><strong>IP</strong></th>
                <th width="2%"><strong>Ctry</strong></th>
                <th width="5%"><strong>Region</strong></th>
                <th width="5%"><strong>City</strong></th>
                <th width="24%"><strong>Hostname</strong></th>
                <th width="25%"><strong>Organization</strong></th>
                <th width="20%"><strong>Page</strong></th>
                </tr>
            </thead>
            <tbody>

<?php
global $wpdb;
// if request to save table is submitted
if (isset($_POST['Submit3'])) {
    // save the table by date and create a new empty table
    $save = $_POST['savetable'];
    if ($save !== "") {
        //SAVE TABLE AND CREATE NEW TABLE
        date_default_timezone_set("America/New_York");
        $jm_vi_date = date('Y_m_d_h_i');  // (Claude) renamed from $jm-vi-date
        $table2 = 'cb_visitors_' . $jm_vi_date;  // (Claude) renamed from $jm-vi-date
        $wpdb->query('RENAME TABLE cb_visitors TO ' . $table2);
        $wpdb->query('CREATE TABLE cb_visitors LIKE ' . $table2);
        //  END OF SAVE AND NEW TABLE CREATION
    }
    //  To reset and clear the Post  
    echo "<script type='text/javascript'>window.location=document.location.href;
</script>";
}

$jm_vi_query = "SELECT * FROM cb_visitors ORDER BY Date DESC";  // (Claude) renamed $jm-vi-* variables
$jm_vi_results = $wpdb->get_results($jm_vi_query, ARRAY_N);  // (Claude) renamed $jm-vi-* variables
$z = count($jm_vi_results);  // (Claude) renamed $jm-vi-* variables
echo $z;
for ($y = 0; $y < $z; $y++) {
    echo '<tr>';
    //   $jm_vi_output = $wpdb->get_row($query, ARRAY_N, $y);  // (Claude) renamed $jm-vi-* variables
    $jm_vi_output = $jm_vi_results[$y];  // (Claude) renamed $jm-vi-* variables
    $jm_vi_output[1] = substr($jm_vi_output[1], 5);  // (Claude) renamed $jm-vi-* variables
    $jm_vi_numoutput = count($jm_vi_output);  // (Claude) renamed $jm-vi-* variables
    for ($x = 1; $x < $jm_vi_numoutput; $x++) {  // (Claude) renamed $jm-vi-* variables
        echo '<td>' . $jm_vi_output[$x] . '</td>';  // (Claude) renamed $jm-vi-* variables
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

