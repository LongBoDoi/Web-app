<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn = new mysqli('localhost','root','','cuusinhvien');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	} else {
		$stmt = $conn->prepare("SELECT username, password
					FROM taikhoan
					WHERE username=?
					AND password=?;");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$conn->close();
	}
?>

<script type="text/javascript">
	window.alert('Đăng nhập thành công');
    	window.location.assign('../Main/main.html');
</script>