<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn = new mysqli('localhost','root','','cuusinhvien');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	} else {
		$stmt = $conn->prepare("SELECT username, password, id, account_type
					FROM taikhoan
					WHERE username=?
					AND password=?;");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$result = $stmt->get_result();
		$info = $result->fetch_array(MYSQLI_ASSOC);
		$account_id = $info['id'];
		$account_type = $info['account_type'];
		$stmt->close();
		$conn->close();
	}
?>

<script type="text/javascript">
    var log_in = '<?=$result->num_rows?>';
    if (log_in == 1) {
        window.sessionStorage.setItem('username', '<?=$username?>');
        window.sessionStorage.setItem('account_id', '<?=$account_id?>');
        window.sessionStorage.setItem('account_type', '<?=$account_type?>');
        window.alert('Đăng nhập thành công');
        window.location.assign('../Main/main.html');
    } else {
        window.location.assign('SignIn.html');
        window.alert('Tên tài khoản hoặc mật khẩu không chính xác');
    }
</script>