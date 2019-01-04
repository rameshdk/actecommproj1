<?php
	class Category {
		private $catid;
		private $catname;
		public function __construct($catid, $catname){
			$this->catid=$catid;
			$this->catname=$catname;
		}

		public function setCatid($catid) {
			$this->catid=$catid;
		}
		public function setCatname($catname) {
			$this->catname=$catname;
		}

		public function getCatid() {
			return $catid;
		}
		public function getCatname() {
			return $catname;
		}
	}
?>
