<?php
/**
Template name: USDCBTEST 
 *
 * This is a template file in a WordPress theme for displaying U.S.$
 * issuance tables
 *
 * @author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 *
 */

get_header(); ?>
<p style="font-family:'Georgia';font-variant:small-caps; font-size:80%; font-weight:700; margin: 0 0 0 0;">Updated: 6/14/2015</p>
<div style="width:80%;">
<h1 class="t1USDCB";>USD Covered Bonds 2010 - 2015</h1>
<p style="margin:0; text-align:center; color:red;"> (click on column header to sort)</p>

<?php
$postelement=$_POST['formElement_name'];
$country = $_POST['Submit Country'];
 print ($country);
 print ($postelement);
 echo "<br></br>test";
?>
</div>
<table class="t1USDCB sortable"; style="margin-left: 0; float:left;">  <!----------THIS IS A PRICING DATE TABLE------------------->
<!--**************************************************************************************-->
<!--*******************************AGREGATE ISSUANCE DATA*********************************-->
<!--**************************************************************************************-->
<thead><tr >
   <th width="60"><strong>Date</strong></th>
   <th width="175"><strong>Issuer</strong></th>
   <th width="40"><strong>Region</strong></th>
   <th width="25"><strong>($mm)</strong></th>
   <th width="25"><strong>Coupon</strong></th>
   <th width="70"><strong>Maturity</strong></th>
   <th width="25"><strong>Tenor</strong></th>
   <th width="25"><strong>Spread</strong></th>
   <th width="45"><strong>Type</strong></th>
</tr></thead>
<tbody>

<?php jrm_get_table (USD_Issuance,'',yes,4); ?>

</table></br></br>

<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style="width:18.5%; float:right;">
<p>Select a country for recent benchmarks and articles, and related information.</p>
<form action='http://http://www.us-covered-bonds.com/usd-issuance/' method='POST'>
<label for=''></label>
<select name='interest'>
<option value='Australia'>Australia</option>
<option value='Canada'>Canada</option>
</select>
<br />
<br />
<p><input type='submit' value='Submit country' />
  </form></p>

</aside>
<?php

  get_sidebar();

  get_footer(); 
 ?>  