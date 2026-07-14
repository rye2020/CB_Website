<?php
/**
 * USD-Form.php
 * Module for managing form input and 
 * developing the query LIKE field for USD CB inquiries.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.1 May 1. 2021
 * 
 */

header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

if ( !session_id() ) session_start();

$like = "";
$issuer = '';
$issueyear = '';
$maturityyear = '';
$currency = '';
$maturity = '';
$legacy = "";
$country = '';
$tenor = '';
$type = '';
$title = '';
$page = '';
date_default_timezone_set("America/New_York");

if ( isset( $_POST['Submitusd'] )) { 
	$title = "Selected by ";
	$like = "WHERE Currency LIKE '$'";

	$issuer = $_POST['issuerinterest'];
		 if ($issuer !== "") {   
            if ($like !== "WHERE ") {
				$like = $like." AND ";
				}      
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

    $country = $_POST['countryselect'];
        if ($country !== "") {
            if ($like !== "WHERE ") {
            $like = $like." AND ";
            }
        if ($country == 'NOT Canada') {
            $like = $like."Region NOT LIKE '%Canada%'";
        }
        else {
            $like = $like."Region LIKE '%".$country."%'";
        }
        if ($title !== "Selected by ") {
            $title = $title."and ";
            }
        $title = $title."Country ";
            }

	$maturity = $_POST['matured'];
		if ($maturity !== "") {
			 if ($like !== "WHERE ") { 
			$like = $like." AND ";
			}

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

    $legacy = $_POST['legacy'];
        if ($legacy !== "") {
            if ($like !== "WHERE ") { 
                $like = $like." AND ";
                }
            if ($country !== "" and $country !== 'Canada') {
                echo "ERROR: cannot select Country not Canada AND Legislative";
                die;
            }
            $like = $like."Region LIKE 'Canada' AND ";
            $date = "2013-07-16";
            if ($legacy == "Legislative") {
                $like = $like."Date >= '".$date."'";
                    if ($title !== "Selected by ") {
            $title = $title."and ";
            }
            $title = $title."Legislative ";
            }
            if ($legacy == "Pre-Legislative") {
                $like = $like."Date < '".$date."'";
                if ($title !== "Selected by ") {
                    $title = $title."and ";
                }
                $title = $title."Pre-Legislative ";
            }
            }
            

    $tenor = $_POST ['tenorselect'];
        if ($tenor !== "") {
            if ($like !== "WHERE ") {
                $like = $like." AND ";
            }
        $like = $like."Tenor LIKE '%".$tenor."%'";
            if ($title !== "Selected by ") {
            $title = $title."and ";
            }
        $title = $title."Tenor ";
            }

    $type = $_POST ['typeselect'];
        if ($type !== "") {
            if ($like !== "WHERE ") {
                $like = $like." AND ";
            }
        $like = $like."Type LIKE '%".$type."%'";
            if ($title !== "Selected by ") {
            $title = $title."and ";
            }
        $title = $title."Type ";
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

	header ('Location: /wp-content/themes/twentyeleven-child/page-templates/CBAgg_USD.php/');
	header ('Connections: close');
	exit;
}

?>
