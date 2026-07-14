<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style="font-size:small;">
<p style="margin:0; text-decoration: underline;"><strong>Data Filters:</strong></p>
<style scoped>
	select {
		float: right;
	}
	input {
		float: right;
	}
	.data-filter-container {
		display: grid;
		gap: .2em;
		grid-rows: 7px;
	}
	</style>
	
<form name='AGGinterest' action='<?php echo esc_url(admin_url('admin-post.php')); ?>' method='POST'>
<div class="data-filter-container">
<div class="filter_select"><label for='issuerselect'>Issuer</label>
<select name='issuerselect' style="width:60%;">
<option value=''> </option>
<?php include ("Global_Issuers.php"); ?>
</select></div>
<div class="filter_select"><label for='countryselect'>Country</label>
<select name='countryselect' style="width:60%;">
<option value=''> </option>
<option value='NOT Canada'>NOT Canada</option>
<?php	include ("Global_Countries.php"); ?>
</select></div>
<?php	include ("mat_year.php"); ?>


<input type='hidden' name="action" value="agg_interest_form">
<input type='hidden' name='file' value="<?php echo $file; ?>" >
<input type='hidden' name='filepath' value='<?php echo $filepath; ?>' >
<div class="filter_select"><p><input type='submit' name='SubmitAGG' value='Submit' /></div>
</div>
</form></p>
