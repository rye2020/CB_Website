<?php
/**
 * MTNs-Form.php
 * Module for managing form input and 
 * developing the query LIKE field for MTN inquiries.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 April 4, 2021
 */
if ( !session_id() ) session_start();

header ('Cache-Control: no-cache');

$like = "";
$issuer = '';
$issueyear = '';
$maturityyear = '';
$form = '';
$maturity = '';
$comment = '';
$title = '';

if ( isset( $_POST['Submitmtns'] )) { 
	$title = "Selected by ";
	$like = "WHERE ";
	$issuer = $_POST['issuerinterest'];
		 if ($issuer !== "") {         
		$like = $like."Issuer LIKE '%".$issuer."%'";
		$title = $title."Issuer ";
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

	$form = $_POST ['formselect'];
		if ($form !== "") {
			if ($like !== "WHERE ") {
				$like = $like." AND ";
			}
		  $like = $like."Form LIKE '%".$form."%'";
			if ($title !== "Selected by ") {
			$title = $title."and ";
			}
		$title = $title."Form ";
			}
			
	$comment = $_POST ['commentselect'];
		if ($comment !== '') {
			if ($like !== "WHERE ") {
				$like = $like." AND ";
			}
		  $like = $like."Comment LIKE '%".$comment."%'";
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
	
	header ('Location: /wp-content/themes/twentyeleven-child/page-templates/MTNs.php/');
	header ('Connections: close');
	exit;
	 }
?>
