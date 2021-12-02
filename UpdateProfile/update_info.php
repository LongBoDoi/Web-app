<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    $username = $_POST['username_info'];
    $email = $_POST['email_update'];
    $website = $_POST['website_update'];
    $phone = $_POST['phone_update'];
    $address = $_POST['address_update'];
    $birth = $_POST['birth_update'];
    $gender = $_POST['gender_update'];
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("UPDATE taikhoan
                    		SET date_of_birth = ?, gender = ?, email = ?, website = ?, phone = ?, address = ?
                    		WHERE username=?");
        $stmt->bind_param("sssssss", $birth, $gender, $email, $website, $phone, $address, $username);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>

<script type="text/javascript">
    window.alert("Cập nhật thông tin thành công");
    window.location.assign('../Main/main.html');
</script>