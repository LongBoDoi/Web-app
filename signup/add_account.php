<?php
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$dateofbirth = $_POST['birth'];
		$gender = $_POST['gender'];
		$grade = $_POST['grade'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$username2 = $_POST['username'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    /* Check if account already exists */
		    $stmt = $conn->prepare("SELECT username
		                            FROM taikhoan
		                            WHERE username = ?");
		    $stmt->bind_param("s", $username);
		    $stmt->execute();
		    $result = $stmt->get_result();
		    $row = $result->num_rows;
		    if ($row == 0) {
		        $stmt->close();

                /* Add new account to the database */
                $stmt = $conn->prepare("INSERT INTO taikhoan(username, password, fullname, grade, gender, date_of_birth, email, phone, account_type)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, 'Sinh viên');");
                $stmt->bind_param("ssssssss", $username, $password, $fullname, $grade, $gender, $dateofbirth, $email, $phone);
                $stmt->execute();
                $stmt->close();

                /* Add account type to database */
                $stmt = $conn->prepare("SELECT id
                                        FROM taikhoan
                                        WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result_2 = $stmt->get_result();
                $row = $result_2->fetch_array(MYSQLI_NUM);
                $new_id = $row[0];
                $stmt->close();

                echo "<script>
	                window.alert('Tạo tài khoản thành công');
    	            window.location.assign('../SignIn/SignIn.html');
    	            </script>";
            }
            else {
                echo "<script>
                    window.alert('Tên tài khoản đã tồn tại');
                    window.location.assign('../signup/SignUp.html');
                    </script>";
            }
		}
?>