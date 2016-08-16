<?php 
	include 'InternOppr.php';
	include 'Placement.php';
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>profileStudent</title>

  <link rel="stylesheet" href="style/reset_profile.css">

  <link rel="stylesheet" href="style/profileStudent.css">
</head>

<body>
  <br>
  <div class="avatar">
	<img class="img1" src="image/logo.png">
	<center><h1 class="niner">NINERSHIP</h1></center>
  </div>
  <div class="nav">
	<center>
		<ul>
			<li><a href="StudentDetails.php">Home</a></li>
			<li><a href="profileStudent.html">My Profile</a></li>
			<li><a href="InternshipOpportunities.php">Internships</a></li>
			<li><a href="index.html">Log Out</a></li>
		</ul>
	</center>	
   </div>	
   <div>
   		<?php 
   			session_start();
   			$interests;
   			$placements;
   			$message = "";
   			
   			if(isset($_SESSION["interestList"]))
   				$interests = $_SESSION["interestList"];
   			if(isset($_SESSION["placements"]))
   				$placements = $_SESSION["placements"];
   			if(isset($_SESSION["message"]))
   				$message = $_SESSION["message"];
   			if(!empty($message)) {
   			?>	
   			<div>	<?php echo $message; ?> </div> 
   			<?php 	
   			}   			
   			if((isset($_SESSION["interestList"])) && (count($interests) > 0)) {
   			?>
   			<div>
   				<h1>Interested Internships </h1>
   				<span>
   					<label> Internship Id </label>
   					<label> Job Description </label>
   					<label> Job Title </label>
   					<label> pay </label>
   					<label> start_date </label>
   					<label> end date</label>
   					<label>Location</label>
   					<label>business name </label>
   					<label> Apply </label>
   				</span>
   			</div>	
   			<?php
   				foreach($interests as $interest) {
   					?>
   					<div>
   						<span>
   							<label><?php echo $interest->getId(); ?></label>
   							<label><?php echo $interest->getJobDesc(); ?></label>
   							<label><?php echo $interest->getJobTitle(); ?></label>
   							<label><?php echo $interest->getPay(); ?></label>
   							<label><?php echo $interest->getStartDate(); ?></label>
   							<label><?php echo $interest->getEndDate(); ?></label>
   							<label><?php echo $interest->getLocation(); ?></label>
   							<label><?php echo $interest->getBusinessName(); ?></label>
   							<label><?php echo $interest->getApplied(); ?></label>
   						</span>
   					</div>
   				<?php 	
   				} 
   			}
   			if((isset($_SESSION["placements"])) && (count($placements) > 0)) {
   			?>
   			<div>
   				<h1>Placements</h1>
   				<span>
   					<label> Internship Id </label>
   					<label> Job Description </label>
   					<label> Job Title </label>
   					<label> start_date </label>
   					<label> end date</label>
   					<label>business name </label>
   				</span>
   			</div>
   			<?php 
   				foreach($placements as $pl) {
   				?>
   				<div>
   					<span>
   						<label><?php echo $pl->getId(); ?></label>
   						<label><?php echo $pl->getJobDescription(); ?></label>
   						<label><?php echo $pl->getJobTitle(); ?></label>
   						<?php if(empty($pl->getPlacementStartDate())) { ?>
   							<label><?php echo $pl->getInternshipStartDate(); ?></label>
   							<label><?php echo $pl->getInternshipEndDate(); ?></label>
   						<?php } else { ?>
  	 						<label><?php echo $pl->getInternshipStartDate(); ?></label>
   							<label><?php echo $pl->getInternshipEndDate(); ?></label>
   						<?php } ?>
   						<label><?php echo $pl->getBusinessName(); ?></label>
   					</span>
   				</div>
   			<?php }
   			}
   			?>
  </div>  
</body>
</html>