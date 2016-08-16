<?php
	class Placement {
		private $internshipId;
		private $placementStartDate;
		private $placementEndDate;
		private $internshipStartDate;
		private $internshipEndDate;
		private $businessName;
		private $jobDescription;
		private $jobTitle;
		
		public function setId($internshipId) {
			$this->internshipId = $internshipId;
		}
		
		public function getId() {
			return ($this->internshipId);
		}
		
		public function getPlacementStartDate() {
			return($this->placementStartDate);
		}
		
		public function setPlacementStartDate($placementStartDate) {
			$this->placementStartDate = $placementStartDate;
		}
		
		public function setPlacementEndDate($placementEndDate) {
			$this->placementEndDate = $placementEndDate;
		}
		
		public function getPlacementEndDate() {
			return($this->placementEndDate);
		}
		
		public function getInternshipStartDate() {
			return($this->internshipStartDate);
		}
		
		public function setInternshipStartDate($internshipStartDate) {
			$this->internshipStartDate = $internshipStartDate;
		}
		
		public function getInternshipEndDate() {
			return($this->internshipEndDate);
		}
		
		public function setInternshipEndDate($internshipEndDate) {
			$this->internshipEndDate = $internshipEndDate;
		}
		
		public function getBusinessName() {
			return($this->businessName);
		}
		
		public function setBusinessName($businessName) {
			$this->businessName = $businessName;
		}
		
		public function getJobDescription() {
			return($this->jobDescription);
		}
		
		public function setJobDescription($jobDescription) {
			$this->jobDescription = $jobDescription;
		}
		
		public function setJobTitle($jobTitle) {
			$this->jobTitle = $jobTitle;
		}
		
		public function getJobTitle() {
			return($this->jobTitle);
		}
	}
?>