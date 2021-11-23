<?php
	class MemberModel {
		private $conn;
		function __construct($host,$username,$password,$dbname) {
			$this -> conn = mysqli_connect($host,$username,$password,$dbname);
			if (is_null($this->conn)) {
				echo "Error while connecting to database ".$dbname." username ".$username." host ".$host;
			}
		}
		
		function getList($lop) {
			$sql="SELECT * FROM hocsinh WHERE classname = $lop;";
			$result = $this->conn->query($sql);
			//$result = mysqli_query($this->conn,$sql);
			return $result;
			// $result->fetch_assoc();
		}
		
		function __destruct() {
			mysqli_close($this->conn);
		}
		
	}
?>