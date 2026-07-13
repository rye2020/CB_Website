<style scoped>
div#secondary {margin-right:0;}
</style>
<aside style="font-size:small">
<p style="margin:0; text-decoration:underline;"><strong>Data Filter: Select</strong></p>
<style scoped>
	select {
		float: right;
	}
	input {
		float: right;
	}
		.data-filter-container {
		display: grid;
		gap: .25em;
		grid-rows: 7px;
	}
	</style>
<form name='CDNinterest' action='<?php echo esc_url(admin_url('admin-post.php')); ?>' method='POST'>
<div style="display:grid; gap: .2em; grid-rows: 7px;">
<?php include ( get_stylesheet_directory() . '/includes/CDN_Issuers.php');
	include ( get_stylesheet_directory() . '/includes/mat_year.php'); 
?>
<input type='hidden' name="action" value="cdn_interest_form">
<input type='hidden' name='file' value="<?php echo $file; ?>" >
<input type='hidden' name='filepath' value='<?php echo $filepath; ?>' >
<input type='hidden' name="countryselect" value="Canada" />
<div class="filter_select"><p><input type='submit' name='SubmitCDN' value='Submit' /></div>
</div>
  </form></p>

