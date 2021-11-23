<?php
	class PDOModel {
		private $conn;
		function __construct($host,$username,$password,$dbname) {
			try {
				$this->conn= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
		}
		
		function getMssv($mssv) {
			$stmt= $this->conn->prepare("SELECT * FROM taikhoan WHERE id = $mssv;");
			$stmt ->bindParam(':mssv',$mssv);
			$stmt ->execute();
			$stmt ->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt;
		}

		function getFullname($fullname){
			$stmt= $this->conn->prepare("SELECT * FROM taikhoan WHERE fullname = $fullname;");
			$stmt ->bindParam(':fullname',$fullname);
			$stmt ->execute();
			$stmt ->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt;
		}

		function getAchievement($achievement) {
			$stmt= $this->conn->prepare("SELECT * FROM taikhoan WHERE achievement= $achievement;");
			$stmt ->bindParam(':achievement',$achievement);
			$stmt ->execute();
			$stmt ->setFetchMode(PDO::FETCH_ASSOC);
			return $stmt;
		}
	}
?>