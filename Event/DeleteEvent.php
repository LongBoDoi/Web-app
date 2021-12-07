<?php
    $id = $_POST['event_id'];

    $conn = new mysqli('localhost','root','','cuusinhvien');

    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $notifications = array();

        $stmt = $conn->prepare("DELETE
                             FROM sukien
                             WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }
?>

<script>
    window.alert('Xoá sự kiện thành công!');
    window.location.assign('Event.php');
</script>