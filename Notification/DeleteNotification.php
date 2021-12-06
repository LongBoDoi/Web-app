<?php
    $id = $_POST['notification_id'];

    $conn = new mysqli('localhost','root','','cuusinhvien');

    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $notifications = array();

        $stmt = $conn->prepare("DELETE
                             FROM thongbao
                             WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }
?>

<script>
    window.alert('Xoá thông báo thành công!');
    window.location.assign('Notification.php');
</script>