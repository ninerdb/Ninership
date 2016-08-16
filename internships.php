<?php 
	include 'InternOppr.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>Internship Opportunities</title>

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
   	<form method="post" action="StudentInternshipActions.php">
   		<?php 
   			session_start();
   			$internships;
   			$message = "";
   			
   			if(isset($_SESSION["internList"]))
   				$internships = $_SESSION["internList"];
   			if(isset($_SESSION["message"]))
   				$message = $_SESSION["message"];
   			if(!empty($message)) {
   			?>	
   			<div>	<?php echo $message; ?> </div> 
   			<?php 	
   			}   			
   			if(count($internships) > 0) {
   			?>
   			<div>
   				<span>
   					<label> Internship Id </label>
   					<label> Job Description </label>
   					<label> Job Title </label>
   					<label> pay </label>
   					<label> start_date </label>
   					<label> end date</label>
   					<label> weekly hours requried </label>
   					<label>Location</label>
   					<label>post date</label>
   					<label>No of positions</label>
   					<label>business name </label>
   					<label>Interested</label>
   					<label> Apply </label>
   				</span>
   			</div>	
   			<?php
   				$counter = 0; 	
   				foreach($internships as $intern) {
   					$interestId = "Interest".$counter;
   					$appliedId = "Applied".$counter;
   					?>
   					<div>
   						<span>
   							<label><?php echo $intern->getId(); ?></label>
   							<label><?php echo $intern->getJobDesc(); ?></label>
   							<label><?php echo $intern->getJobTitle(); ?></label>
   							<label><?php echo $intern->getPay(); ?></label>
   							<label><?php echo $intern->getStartDate(); ?></label>
   							<label><?php echo $intern->getEndDate(); ?></label>
   							<label><?php echo $intern->getWeeklyHrsRequired(); ?></label>
   							<label><?php echo $intern->getLocation(); ?></label>
   							<label><?php echo $intern->getPostDate(); ?></label>
   							<label><?php echo $intern->getNoOfPositions(); ?></label>
   							<label><?php echo $intern->getBusinessName(); ?></label>
   							<?php if($intern->getInterested() == "Y") { ?>
   								<input type="checkBox" checked disabled/>
   							<?php } else { ?>
   								<input type="checkBox" name="<?php echo $interestId ?>" />
   							<?php } if($intern->getApplied() == "Y") { ?>
   								<input type="checkbox" checked disabled/>
   							<?php } else { ?>
   								<input type="checkbox" name="<?php echo $appliedId ?>"/>
   							<?php }?>
   						</span>
   					</div>
   				<?php
   					$counter = $counter + 1; 	
   				}
   				?>
   				<input type="submit" name="Submit" value="Submit" />
   			<?php 
   			} else {
   				?> <span> Sorry No Internships are available! </span>
   			<?php 
   			}
   		?>
  </div>  
</body>
</html>