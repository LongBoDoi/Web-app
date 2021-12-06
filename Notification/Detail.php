<?php
    $id = $_GET['notification_id'];

    $conn = new mysqli('localhost','root','','cuusinhvien');

    if ($conn->connect_error) {
	    die('Connection Failed : '.$conn->connect_error);
	} else {
	    $notifications = array();

        $stmt = $conn->prepare("SELECT *
                                FROM thongbao
                                WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $info = $result->fetch_array(MYSQLI_ASSOC);

        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="detail_style.css">
    <link rel="stylesheet" href="../Main/toolbar_style.css">
</head>
<body>

<div id="header-01"><h1>Thông báo</h1></div>

<div class="container" id="container">
    <div class="notification_head">
        <div class="notification_title"><?=$info['title']?></div>
        <div class="notification_date">Đã đăng vào <br><br> <?=$info['post_date']?></div>
    </div>
    <div class="notification_row">
        <textarea class="notification_content" disabled="true"><?=$info['content']?></textarea>
    </div>

    <div id='delete_button'></div>
</div>


<script src="../Main/script.js"></script>
<script>
    if (window.sessionStorage.getItem('account_type') === "Quản trị viên") {
        document.getElementById('delete_button').innerHTML =    `<form method='POST' action='DeleteNotification.php'>
                                                                    <input type='hidden' name='notification_id' id='notification_id'>
                                                                    <input type='submit' id='notification_delete' value='Xoá thông báo'>
                                                                </form>`;
        document.getElementById('notification_id').value = <?=$id?>;
    }
</script>
</body>
</html>