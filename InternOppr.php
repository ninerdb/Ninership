<?php
	class InternOppr {
		private $id;
		private $jobDesc;
		private $jobTitle;
		private $businessName;
		private $pay;
		private $startDate;
		private $endDate;
		private $weeklyHrsRequired;
		private $location;
		private $postDate;
		private $noOfPos;
		private $interested;
		private $applied;
		
		
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getId() {
			return ($this->id);
		}
		
		public function setJobDesc($jobDesc) {
			$this->jobDesc = $jobDesc;
		}
		
		public function getJobDesc() {
			return ($this->jobDesc);
		}
		
		public function setJobTitle($jobTitle) {
			$this->jobTitle = $jobTitle;
		}
		
		public function getJobTitle() {
			return ($this->jobTitle);
		}
		
		public function setBusinessName($business) {
			$this->businessName = $business;
		}
		
		public function getBusinessName() {
			return ($this->businessName);
		}
		
		public function setPay($pay) {
			$this->pay = $pay;
		}
		
		public function getPay() {
			return($this->pay);
		}
		
		public function setStartDate($startDate) {
			$this->startDate = $startDate;
		}
		
		public function getStartDate() {
			return($this->startDate);
		}
		
		public function setEndDate($endDate) {
			$this->endDate = $endDate;
		}
		
		public function getEndDate() {
			return ($this->endDate);
		}
		
		public function setWeeklyHrsRequired($weeklyHrsRequired) {
			$this->weeklyHrsRequired = $weeklyHrsRequired;
		} 
		
		public function getWeeklyHrsRequired() {
			return($this->weeklyHrsRequired);
		}
		
		public function setLocation($location) {
			$this->location = $location;
		}
		
		public function getLocation() {
			return($this->location);
		}
		
		public function setPostDate($postDate) {
			$this->postDate = $postDate;
		}
		public function getPostDate() {
			return ($this->postDate);
		}
		
		public function setNoOfPositions($noOfPositions) {
			$this->noOfPos = $noOfPositions;
		}
		
		public function getNoOfPositions() {
			return ($this->noOfPos);
		}
		
		public function setInterested($interested) {
			$this->interested = $interested;
		}
		
		public function getInterested() {
			return($this->interested);
		}
		
		public function setApplied($applied) {
			$this->applied = $applied;
		}
		
		public function getApplied() {
			return($this->applied);
		}
	}

?>