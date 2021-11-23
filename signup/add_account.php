<?php
		echo "Non";
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$dateofbirth = $_POST['birth'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
			$stmt = $conn->prepare("INSERT INTO taikhoan(username, password, fullname, date_of_birth, email, phone)
				VALUES(?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssss", $username, $password, $fullname, $dateofbirth, $email, $phone);
			$stmt->execute();
			echo "success";
			$stmt->close();
			$conn->close();
		}
?>