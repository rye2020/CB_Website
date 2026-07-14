<?PHP
/**
Template name: test-form 
 *
 * This is a template file for testing
 *
 * @author JMarlatt
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * Version 1.0 March 30, 2021
 *
 */
session_start();

if ( isset( $_POST['TESTinterest'] )) {
    $Issuer = $_POST['Issuer'];
    $_SESSION['testing'] = array();
    $_SESSION['testing']['Issuer'] =  $_POST['issuerinterest'];
    $_SESSION['testing']['IssueYear'] = $_POST['issueyrselect'];
    
//    header ('Location: /wp-content/themes/twentyeleven-child/page-templates/test-template.php/');
}
?>
<form name='FORMinterest' action='/wp-content/themes/twentyeleven-child/page-templates/test-template.php' method='POST'>
    <input type='submit' name='FORMinterest' value='Submit' style="clear:both"/>