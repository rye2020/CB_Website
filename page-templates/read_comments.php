<?php
/**
* Template name: read_comments
 *
 * This is the template that displays any 
 * CB entry that has a comment.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 March 10, 2022
 */

get_header(); 
global $wpdb; ?>


<div style="width: 100%; float:left;">
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 3/10/2022</p>
<h1 class="t1USDCB">Comments on CB Offerings</h1>
<p style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>
</div>

<div style="width: 100%; border: 0; margin: 0; clear:both;">

<!--//***************************************************************************************
//*******************************CBAGGREGATE DATA*** ***************************************
//***************************************************************************************-->
<table class="t1CanadianCBD aggregateCB sortable"; style="margin-left: 0; float:left;">
<thead><tr >
    <th><strong>RecNo</strong></th>
   <th><strong>Date</strong></th>
   <th><strong>Issuer</strong></th>
   <th><strong>Series</strong></th>
   <th><strong>Comments</strong></th>
</tr></thead>

<tbody>

<?php
$query = "SELECT * FROM CBAggregate ORDER BY Date DESC";
$results = $wpdb->get_results($query, ARRAY_N);
$z = count($results);
for ($y=0; $y<$z; $y++)
    {$output = $results[$y];
    if ($output[12] !== NULL)
        {echo '<tr>' .
        '<td>'.$output[0].'</td>' .
        '<td>'.$output[1].'</td>' .
        '<td>'.$output[2].'</td>' .
        '<td>'.$output[4].'</td>' .
        '<td>'.$output[12].'</td>' .
        '</tr>';
        }
    }
?>
</tbody>
</table>

<?php
get_footer();
?>
</div>