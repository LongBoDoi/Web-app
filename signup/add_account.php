<?php
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$dateofbirth = $_POST['birth'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$username2 = $_POST['username'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
			$stmt = $conn->prepare("INSERT INTO taikhoan(username, password, fullname, date_of_birth, email, phone)
				VALUES(?, ?, ?, ?, ?, ?);");
			$stmt->bind_param("ssssss", $username, $password, $fullname, $dateofbirth, $email, $phone);
			$stmt->execute();
			$stmt->close();
			$stmt = $conn->prepare("INSERT INTO loaitaikhoan(username, type)
				VALUES(?, 'user');");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->close();
			$conn->close();
		}
?>

<script type="text/javascript">
	window.alert('Tạo tài khoản thành công');
    	window.location.assign('../signin/SignIn.html');
</script>