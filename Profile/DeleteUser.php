<?php
		$user_id = $_POST['user_id'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("DELETE FROM taikhoan
		                            WHERE id = ?");
		    $stmt->bind_param("s", $user_id);
		    $stmt->execute();

		    $stmt->close();
		    $conn->close();

		    echo "<script>
		        window.alert('Đã xoá người dùng!');
		        window.location.assign('../List/List.php');
		    </script>";
		}
?>