<?php
	class User {

		private $con;
		private $username;

		public function __construct($con, $username) {
			$this->con = $con;
			$this->username = $username;
		}

		public function getUsername() {
			return $this->username;
		}

		public function getEmail() {
			$query = mysqli_query($this->con, "SELECT email FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['email'];
		}

		public function getFirstAndLastName() {
			$query = mysqli_query($this->con, "SELECT concat(firstName, ' ', lastName) as 'name'  FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}
		public function isAdmin() {
			$query = mysqli_query($this->con, "SELECT isAdmin FROM users WHERE username='$this->username' and isAdmin=1");
			if(mysqli_num_rows($query)==0){
				return false;
			}
			else {
				$row = mysqli_fetch_array($query);
				return $row['isAdmin'];
			}
		}

		public function getAllUsers() {
			$query = mysqli_query($this->con, "SELECT * FROM users");
			$row = mysqli_fetch_all($query,MYSQLI_ASSOC);
			// print_r($row);
			return $row;
		}

	}
?>
