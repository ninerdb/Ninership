<?php
include 'adminOverhead.php';
ob_start();
// make sure that business id is auto incremented in the database
$bsId = 300;
$bsName = $_POST['businessName'];
echo $bsName;

$bsadress = $POST['address'];
$bsCity = $_POST['city'];
$bsState = $_POST['state'];
$bsZipcode = $_POST['zipcode'];
$bsPhone = $_POST['phone'];
$bsEmail = $_POST['email'];
$bsProfile = $_POST['profile'];
$bsWebsite = $_POST['website'];
$bsType = $_POST['type'];
$bsIndustry = $_POST['industry'];


adminOverhead::addNewBusiness($bsId, $bsName, $bsadress, $bsCity, $bsState, $bsZipcode, $bsPhone, $bsEmail, $bsProfile, $bsWebsite, $bsType, $bsIndustry);
 
echo "New Business Added Sucessfully";

?>
