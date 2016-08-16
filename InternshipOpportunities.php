<?php
	include 'InternshipOpportunitiesDAO.php';	

	session_start();
	$_SESSION["studentId"] = 6;
	
	
	$studentId = $_SESSION["studentId"];
	$internships = InternshipOppotunitiesDAO::fetchInternship();
	$internships = InternshipOppotunitiesDAO::fetchInterestsForStudent($studentId, $internships);
	
	$_SESSION["internList"] = $internships;
	if(isset($_SESSION["message"]))
		unset($_SESSION["message"]);
	header("location: internships.php"); // Redirecting To Other Page
?>