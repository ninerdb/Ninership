<?php
	include 'database.php';
	include 'InternOppr.php';
	include 'Placement.php';
	
	Class InternshipOppotunitiesDAO {
	
		public static function fetchInternship() {
			$connection = Database::connect();
			$today = date('Y-m-d');
			$query = "select internship_id, job_description, job_title, pay, start_date, end_date, weekly_hours_req, location, post_date, no_of_positions, business_name ".
				"from internship_opportunities io natural join business where start_date >= '$today'";
			
			$internships = array();
	
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$io = new InternOppr();
					$io->setBusinessName($row->business_name);
					$io->setId($row->internship_id);
					$io->setJobDesc($row->job_description);
					$io->setJobTitle($row->job_title);
					$io->setLocation($row->location);
					$io->setPostDate($row->post_date);
					$io->setStartDate($row->start_date);
					$io->setEndDate($row->end_date);
					$io->setNoOfPositions($row->no_of_positions);
					$io->setPay($row->pay);
					$io->setWeeklyHrsRequired($row->weekly_hours_req);
					$io->setApplied("N");
					$io->setInterested("N");	
					$internships[] = $io;
				}
			}
			Database::disconnect();
			return($internships);
		}
		
		public static function fetchStudentInterests($studentId) {
			$connection = Database::connect();
			$query = "select i.internship_id,job_description, job_title, pay, start_date, end_date, location, business_name, applied " 
				. "from (interest i natural join internship_opportunities) natural join business where student_id = '$studentId'";

			$internships = array();
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$io = new InternOppr();
					$io->setBusinessName($row->business_name);
					$io->setId($row->internship_id);
					$io->setJobDesc($row->job_description);
					$io->setJobTitle($row->job_title);
					$io->setLocation($row->location);
					$io->setStartDate($row->start_date);
					$io->setEndDate($row->end_date);
					$io->setPay($row->pay);
					$io->setApplied($row->applied);
					$internships[] = $io;
				}
			}
			Database::disconnect();
			return($internships);
		}
		
		
		public static function fetchStudentPlacements($studentId) {
			$connection = Database::connect();
			$query = "select io.internship_id, job_description, job_title, business_name, io.start_date isdt, io.end_date iedt, p.start_date psdt, p.end_date pedt "
					."from (placement p join internship_opportunities io using(internship_id)) natural join business where student_id = '$studentId'";
			$placements = array();
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$plcmnt = new Placement();
					$plcmnt->setBusinessName($row->business_name);
					$plcmnt->setInternshipEndDate($row->iedt);
					$plcmnt->setInternshipStartDate($row->isdt);
					$plcmnt->setJobDescription($row->job_description);
					$plcmnt->setJobTitle($row->job_title);
					$plcmnt->setPlacementEndDate($row->pedt);
					$plcmnt->setPlacementStartDate($row->psdt);
					$plcmnt->setId($row->internship_id);
					$placements[] = $plcmnt;
				}
			}
			Database::disconnect();
			return ($placements);
		}
		
		public static function fetchStudentMaxWorkHr($studentId) {
			$connection = Database::connect();
			$query = "select sum(weekly_hours_req) as maxhrs from internship_opportunities io join placement p on p.internship_id = io.internship_id where p.student_id = '$studentId'";
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$maxHrs = 0;
			if($result) {
				$row = $statement->fetchObject();
				$maxHrs = $row->maxhrs;
			}
			return($maxHrs);
		}
		
		public static function fetchInterestsForStudent($studentId, $internshipList) {
			$connection = Database::connect();
			$query = "select internship_id, applied from interest where student_id = '$studentId'";
			
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$internshipId = $row->internship_id;
					$applied = $row->applied;
					for($i = 0; $i < count($internshipList); $i++) {
						if($internshipList[$i]->getId() === $internshipId) {
							$internshipList[$i]->setApplied($applied);
							$internshipList[$i]->setInterested("Y");
							break;
						}
					}
					
				}
			}
			Database::disconnect();
			return($internshipList);
		}
		
		public static function insertIntoInterests($studentId, $internshipId, $flag) {
			$connection = Database::connect();
			$applied = "N";
			if($flag == "Interest") {
				$query = "insert into interest (student_id, internship_id, applied) values ('$studentId', '$internshipId', '$applied')";
				$query = $connection->prepare($query);
				$query->execute();
			} else {
				$applied = self::doesExist($studentId, $internshipId);
				if($applied) {
					$query = "update interest set applied = 'Y' where student_id = $studentId and internship_id = $internshipId";
				} else {
					$query = "insert into interest (student_id, internship_id, applied) values ('$studentId', '$internshipId', 'Y')";
				}	
				$query = $connection->prepare($query);
				$query->execute();
			}
			Database::disconnect();
		}
		
		public static function doesExist($studentId, $internshipId) {
			$connection = Database::connect();
			$query = "select applied from interest where student_id = '$studentId' and internship_id = '$internshipId'";
			$statement = $connection->prepare($query);
			$result = $statement->execute();
			$applied = false;
			
			if($result) {
				while($row = $statement->fetchObject()) {
					$applied = true;
					break;
				}
			}
			return $applied;
		}
	}
?>