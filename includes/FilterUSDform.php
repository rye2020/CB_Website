<style scoped>
	div#secondary {
		margin-right: 0;
	}
</style>
<aside style="font-size:small">
	<p style="margin:0;"><strong>Select issuance filters:</strong></p>
	<style scoped>
		select {
			float: right;
		}

		input {
			float: right;
		}
	</style>
	<!--<form name='USDinterest' action='/wp-content/themes/twentyeleven-child/USD-Form.php' method='POST'> -->
	<form name='USDinterest' action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method='POST'>
	<label for='issuerinterest'>Issuer</label>
<select name='issuerinterest' style="width:60%;">
<option value=''> </option>
<?php include ( get_stylesheet_directory() . '/includes/Global_Issuers.php'); ?>
<label for='countryselect'>Country</label>
<select name='countryselect' style="width:60%">
<option value=''> </option>
<option value='NOT Canada'>NOT Canada</option>
	<?php
		include(get_stylesheet_directory() . '/includes/Global_Countries.php');
		include ( get_stylesheet_directory() . '/includes/mat_year.php');
		?>
		<input type="hidden" name="action" value="usd_interest_form">
		<input type='hidden' name='file' value="<?php echo $file; ?>">
		<input type='hidden' name='filepath' value='<?php echo $filepath; ?>'>
		<p><input type='submit' name='Submitusd' value='Submit' /></p>
	</form>
	