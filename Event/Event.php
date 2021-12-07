<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../Main/toolbar_style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

<div id="header-01"><h1>Sự kiện</h1></div>

<div id='create_button'></div>

<div class="container" id="container">
</div>


<script src="../Main/script.js"></script>
<script>
    if (window.sessionStorage.getItem('account_type') === "Quản trị viên") {
        document.getElementById('create_button').innerHTML =    `<div class="notification_create">
                                                                    <button id='create_notification'>Tạo sự kiện</button>
                                                                </div>
                                                                <br><br>`;
        document.getElementById('create_notification').onclick = function () {
            window.location.assign('Create.html');
        }
    }
</script>
</body>
</html>

<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    if ($conn->connect_error) {
	    die('Connection Failed : '.$conn->connect_error);
	} else {
	    $notifications = array();

        $stmt = $conn->prepare("SELECT *
                                FROM sukien
                                ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($notifications, $info);
        };

        $final_html = "<script>
                        let notification = null;
                        let container = document.getElementById('container');";
        foreach ($notifications as $n) {
            $final_html .= "notification = document.createElement('div');
                            notification.innerHTML = `<div class='posts_table'>
                                                              <div class='table_head'>
                                                                  <div class='id'></div>
                                                                  <div class='full_name'>Sự kiện</div>
                                                              </div>
                                                              <div class='table_row'>
                                                                  <div class='id'><img class='notification_img' src='home_page_icon.png'></div>
                                                                  <div class='full_name'>
                                                                      <form method='get' action='Detail.php'>
                                                                          <input type='hidden' name='event_id' value='$n[id]'>
                                                                          <input type='hidden' name='user_id' id='user_id'>
                                                                          <input type='submit' class='notification_submit' value='$n[title]'>
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                          </div>`;
                            container.appendChild(notification);";
        }
        $final_html .= "document.getElementById('user_id').value = window.sessionStorage.getItem('account_id');
        </script>";

        echo $final_html;

        $stmt->close();
        $conn->close();
    }
?>