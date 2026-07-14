<?php
/**
 * MISC-Form.php
 * Module for managing form input and 
 * developing the query LIKE field for MISC inquiries.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 April 4. 2021
 */

session_start();
header ('Cache-Control: no-cache');
$like = "";
$issuer = '';
$uw = '';
$issueyear = '';
$maturityyear = '';
$maturity = '';
$comment = '';
$title = '';

if ( isset( $_POST['Submitmisc'] )) { 
	$title = "Selected by ";
	$like = "WHERE ";

	$issuer = $_POST['issuerinterest'];
		 if ($issuer !== "") {         
		$like = $like."Issuer LIKE '%".$issuer."%'";
		$title = $title."Issuer ";
		  }

	$uw = $_POST ['uwselect'];
		if ($uw !== '') {
			if ($like !== "WHERE ") {
				$like = $like." AND ";
			}
		  $like = $like."Underwriters LIKE '%".$uw."%'";
			if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Underwriters ";
		}
		
	$issueyear = $_POST['issueyrselect'];
		 if ($issueyear !== "") {
			 if ($like !== "WHERE ") {
				$like = $like." AND ";
				}
		$like = $like."Date LIKE '%".$issueyear."%'";
		if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Issue Year ";
		  }

	$maturityyear = $_POST['maturityyrselect'];
		 if ($maturityyear !== "") {
			 if ($like !== "WHERE ") {
				$like = $like." AND ";
				}
		$like = $like."Maturity LIKE '%".$maturityyear."%'";
		if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Maturity Year ";
		  }

	$maturity = $_POST['matured'];
		if ($maturity !== "") {
			 if ($like !== "WHERE ") {
			$like = $like." AND ";
			}
		date_default_timezone_set("America/New_York");
		$date = date ('Y-m-d');
			if ($maturity == "Outstanding") {
				$like = $like."Maturity > '".$date."'";
					if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Outstanding ";
			}
			if ($maturity == "Matured") {
				$like = $like."Maturity < '".$date."'";
					if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Matured ";
			}
		  }

	$comment = $_POST ['commentselect'];
		if ($comment !== '') {
			if ($like !== "WHERE ") {
				$like = $like." AND ";
			}
		  $like = $like."Description LIKE '%".$comment."%'";
			if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Comment ";
		}	
		
	if ($like == "WHERE ") {
		$like = '';
		}

	if ($title == "Selected by ") {
		$title = "";
	}
	$_SESSION["jrm_form_elements"] = array();
	$_SESSION["jrm_form_elements"]['like'] = $like;
	$_SESSION["jrm_form_elements"]['title'] = $title;

	header ('Location: /wp-content/themes/twentyeleven-child/page-templates/MISC.php/');
	header ('Connections: close');
	exit;
}

?>
