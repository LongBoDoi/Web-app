<?php
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$dateofbirth = $_POST['birth'];
		$grade = $_POST['grade'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$username2 = $_POST['username'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("SELECT username
		                            FROM taikhoan
		                            WHERE username = ?");
		    $stmt->bind_param("s", $username);
		    $stmt->execute();
		    $result = $stmt->get_result();
		    $row = $result->num_rows;
		    if ($row == 0) {
		        $stmt->close();

                $stmt = $conn->prepare("INSERT INTO taikhoan(username, password, fullname, grade, date_of_birth, email, phone)
                    VALUES(?, ?, ?, ?, ?, ?, ?);");
                $stmt->bind_param("sssssss", $username, $password, $fullname, $grade, $dateofbirth, $email, $phone);
                $stmt->execute();
                $stmt->close();

                $stmt = $conn->prepare("INSERT INTO loaitaikhoan(username, type)
                    VALUES(?, 'user');");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
		}
?>

<script type="text/javascript">
    if (<?=$row?> === 0) {
	    window.alert('Tạo tài khoản thành công');
    	window.location.assign('../SignIn/SignIn.html');
    } else {
        window.alert('Tên tài khoản đã tồn tại');
        window.location.assign('../signup/SignUp.html');
    }
</script>