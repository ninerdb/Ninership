<?php
	include 'InternshipOpportunitiesDAO.php';
	session_start();
	
	$message = "";
	if(isset($_POST['Submit'])) {
		processAction();
		//echo $_SESSION["message"];
		header("location: internships.php");
	 }

	 function processAction() {
	 	$studentId = $_SESSION["studentId"];
	 	$internship = $_SESSION["internList"];
	 	
	 	$interests = array();
	 	$apply = array();
		
	 	for($i = 0; $i < count($internship); $i++) {
	 		$appliedId = "Applied".$i;
	 		$interestedId = "Interest".$i;
	 		if(isset($_POST[$interestedId])) {
	 			$interests[] = $internship[$i];
	 		}
	 		if(isset($_POST[$appliedId])) {
	 			$apply[] = $internship[$i];
	 		}
	 	}
	 	
	 	if(count($interests) === 0 && count($apply) === 0) {
	 		$message = "Please check on an internship you are interested in or wish to apply for!";
	 		$_SESSION["message"] = $message;
	 	} else {
	 		if(count($interests) > 0) {
	 			processInterests($interests, $studentId);
	 		}
	 		if(count($apply) > 0) {
	 			processApplications($apply, $studentId);
	 		}
	 		$internship = InternshipOppotunitiesDAO::fetchInternship();
	 		$internship = InternshipOppotunitiesDAO::fetchInterestsForStudent($studentId, $internship);
	 		$_SESSION["internList"] = $internship;
	 		$message = "Requested action has been performed successfully!!";
	 		$_SESSION["message"] = $message;
	 	}
	 }
	 
	 function processInterests($interests, $studentId) {
	 	foreach($interests as $interest) {
	 		$internshipId = $interest->getId();
	 		InternshipOppotunitiesDAO::insertIntoInterests($studentId, $internshipId, "Interest");
	 	}
	 }
	
	 function processApplications($apply, $studentId) {
	 	foreach($apply as $interest) {
	 		$calMaxHr = $maxHrs + $interest->getWeeklyHrsRequired();
	 		if(!($calMaxHr >= 20)) {
	 			$internshipId = $interest->getId();
	 			InternshipOppotunitiesDAO::insertIntoInterests($studentId, $internshipId, "Apply");
	 		}	
	 	}
	 }
?>