<?php
include 'InternshipOpportunitiesDAO.php';

session_start();
$_SESSION["studentId"] = 6;


$studentId = $_SESSION["studentId"];
$interests = InternshipOppotunitiesDAO::fetchStudentInterests($studentId);
echo count($interests);
$placements = InternshipOppotunitiesDAO::fetchStudentPlacements($studentId);
echo count($placements);

$_SESSION["interestList"] = $interests;
$_SESSION["placements"] = $placements;

if(isset($_SESSION["message"]))
	unset($_SESSION["message"]);
header("location: homeStudent.php"); // Redirecting To Other Page
?>