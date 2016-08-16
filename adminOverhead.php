<?php
include 'database.php';
class adminOverhead{
	
	public static function addNewBusiness($bsId,$bsName,$bsadress,$bsCity,$bsState,$bsZipcode,$bsPhone,$bsEmail,$bsProfile,$bsWebsite,$bsType,$bsIndustry){
		$database = Database::connect();
		$sql = "INSERT INTO `business`(`business_id`, `business_name`, `address`, `city`, `state`, `zipcode`, `phone`, `email`, `business_profile`, `website`, `business_type`, `industry`) VALUES ('$bsId','$bsName','$bsadress','$bsCity','$bsState','$bsZipcode','$bsPhone','$bsEmail','$bsProfile','$bsWebsite','$bsType','$bsIndustry')";
		echo "";
		echo "";
		echo $sql;
		echo "";
		echo "inside overhead before insert";
		$query = $database->prepare($sql);
		$query->execute();
		echo "inside overhead after insert";
	}
	
	public static function editBusiness(){
	
	}
	
	public static function deleteBusiness($bsId){
		$database = Database::connect();
		$sql = "DELETE FROM `business` WHERE business_id = '$bsId'";
		$query = $database->prepare($sql);
		$query->execute();
	}
}
?>