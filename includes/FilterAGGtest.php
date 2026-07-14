<?php 
$like = '';
$title = '';
$currency = '';
$country = '';

// test if $_SESSION elements have been set
if (isset ($_SESSION["jrm_form_elements"])) {   
	// get the form input

	$like = $_SESSION["jrm_form_elements"]['like'];
	$title = $_SESSION["jrm_form_elements"]['title'];
	$currency = $_SESSION["jrm_form_elements"]['currency'];
	$country = $_SESSION["jrm_form_elements"]['country'];
	$issueyear = $_SESSION["jrm_form_elements"]['issueyear'];
    // remove all session variables
    session_unset(); 
	}
?>