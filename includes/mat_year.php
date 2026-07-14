<?php include( get_stylesheet_directory() . '/includes/mat_year_mtn.php'); ?>

<?php 
if (strpos($file, 'CBAgg_USD') !== 0) {
echo "<div class='filter_select'><label for='currencyselect'>Currency</label>";
echo '<select name="currencyselect" style="width:60%">';
echo "<option value=''> </option>";
echo "<option value='$'>$</option>";
echo "<option value='C$'>C$</option>";
echo "<option value='€'>€</option>";
echo "<option value='£'>£</option>";
echo "<option value='A$'>A$</option>";
echo "<option value='CHF'>CHF</option>";
echo "<option value='NOK'>NOK</option>";
echo "<option value='NOT $'>NOT $</option>";
echo "</select></div>";
 } 
 ?>

<div class="filter_select"><label for='legacy'>Legislative</label>
<select name='legacy' style="width:60%;">
<option value=''> </option>
<option value='Legislative'>Legislative</option>
<option value='Pre-Legislative'>Structured</option>
</select></div>


<div class="filter_select"><label for='tenorselect'>Tenor</label>
<select name='tenorselect' style="width:60%">
<option value=''> </option>
<option value='1yr'>1yr</option>
<option value='2yr'>2yr</option>
<option value='3yr'>3yr</option>
<option value='3.25yr'>3.25yr</option>
<option value='5yr'>5yr</option>
<option value='7yr'>7yr</option>
<option value='10yr'>10yr</option>
</select></div>


<div class="filter_select"><label for='typeselect'>Type</label>
<select name='typeselect' style="width:60%">
<option value=''> </option>
<option value='SEC'>SEC</option>
<option value='144A'>144A</option>
<option value='Reg S'>Reg S</option>
<option value='BoC'>Bank of Canada</option>					 
</select></div>

