<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="DetailStyle.css">
    <link rel="stylesheet" href="../Main/toolbar_style.css">
</head>
<body>

<div id="header-01"><h1>Sự kiện</h1></div>

<div class="container" id="container">

</div>

<script src="../Main/script.js"></script>
</body>
</html>

<?php
    $id = $_GET['event_id'];
    $user_id = $_GET['user_id'];

    $conn = new mysqli('localhost','root','','cuusinhvien');

    if ($conn->connect_error) {
	    die('Connection Failed : '.$conn->connect_error);
	} else {
        $stmt = $conn->prepare("SELECT *
                                FROM sukien
                                WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $info = $result->fetch_array(MYSQLI_ASSOC);
        $stmt->close();

        $stmt = $conn->prepare("SELECT *
                                FROM thamgiasukien tg
                                WHERE tg.participant = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $has_joined = $result->num_rows;
        $stmt->close();

        $student_list = array();

        $stmt = $conn->prepare("SELECT tk.id, tk.username, tk.fullname, tk.grade
                                FROM thamgiasukien tg, taikhoan tk
                                WHERE tg.participant = tk.id
                                AND tk.account_type = 'Sinh viên'
                                AND tg.id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($student_list, $row);
        };

        $final_html = "<script>
                        document.getElementById('container').innerHTML = `<div id='head_button'>
                                                                              </div>
                                                                          
                                                                              <div class='notification_head'>
                                                                                  <div class='notification_title'>$info[title]</div>
                                                                              </div>
                                                                          
                                                                              <div class='notification_date'>Tại $info[location] <br><br>Vào lúc $info[time]</div>
                                                                              <div class='notification_row'>
                                                                                  <textarea class='notification_content' disabled='true'>$info[description]</textarea>
                                                                              </div>

                                                                              <div id='list_title'>Danh sách tham gia</div>
                                                                              <div id='list_count'>Số lượng: $count</div>
                                                                          
                                                                              <div class='participant_table' id='participant_table'>
                                                                              		<div class='table_head'>
                                                                              			<div class='id'>ID</div>
                                                                              			<div class='full_name'>Họ và tên</div>
                                                                              			<div class='grade'>Khoá</div>
                                                                              			<div class='profile'>Hồ sơ</div>
                                                                              		</div>
                                                                              	</div>
                                                                          
                                                                              <div id='delete_button'></div>`;
                        if (window.sessionStorage.getItem('account_type') === 'Quản trị viên') {
                            document.getElementById('delete_button').innerHTML =    `<form method='POST' action='DeleteEvent.php'>
                                                                                        <input type='hidden' name='event_id' id='event_id'>
                                                                                        <input type='submit' id='notification_delete' value='Xoá sự kiện'>
                                                                                    </form>`;
                            document.getElementById('event_id').value = $id;
                        } else {
                            if ($has_joined === 1) {
                                document.getElementById('head_button').innerHTML = `<label id=participate_button>Đã tham gia</label>`;
                            } else {
                                document.getElementById('head_button').innerHTML =    `<form method='POST' action='JoinEvent.php'>
                                                                                        <input type='hidden' name='event_id' id='event_id'>
                                                                                        <input type='hidden' name='user_id' id='user_id'>
                                                                                        <input type='submit' id='participate_button' value='Tham gia'>
                                                                                    </form>`;
                            }
                            document.getElementById('event_id').value = $id;
                            document.getElementById('user_id').value = window.sessionStorage.getItem('account_id');
                        }
                        let each_student = null;
                        let table = document.getElementById('participant_table');";
        foreach ($student_list as $student) {
            $final_html .= "each_student = document.createElement('div');
                            each_student.innerHTML = `<div class='table_row'>
                                                                <div class='id'>$student[id]</div>
                                                                <div class='full_name'>$student[fullname]</div>
                                                                <div class='grade'>$student[grade]</div>
                                                                <div class='profile'>
                                                                    <form method='get' action='../Profile/Profile.php'>
                                                                        <input type='hidden' value='$student[username]' name='input_username'>
                                                                        <input type='hidden' class='username_input' name='username_info'>
                                                                        <input type='submit' class='profile_submit' value='Hồ sơ'>
                                                                    </form>
                                                                </div>
                                                            </div>`;
                            table.appendChild(each_student);";
        }
        $final_html .= "let profiles = document.getElementsByClassName('username_input');
        for (let i = 0; i < profiles.length; i++) {
            profiles[i].value = window.sessionStorage.getItem('username');
        }
        </script>";

        echo $final_html;

        $stmt->close();
        $conn->close();
    }
?>