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

<div id="header-01"><h1>Danh sách sinh viên</h1></div>

<div class="container">
	<div class="posts_table" id="posts_table">
		<div class="table_head">
			<div class="id">ID</div>
			<div class="full_name">Họ và tên</div>
			<div class="grade">Khoá</div>
			<div class="birth">Ngày sinh</div>
			<div class="gender">Giới tính</div>
			<div class="address">Địa chỉ</div>
			<div class="achievement">Thành tựu</div>
			<div class="profile">Hồ sơ</div>
		</div>
	</div>
</div>


<script src="../Main/script.js"></script>
</body>
</html>

<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    if ($conn->connect_error) {
	    die('Connection Failed : '.$conn->connect_error);
	} else {
	    $student_list = array();

        $stmt = $conn->prepare("SELECT id, username, fullname, grade, date_of_birth, gender, address, achievement
                                FROM taikhoan
                                WHERE account_type = 'Sinh viên';");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($student_list, $info);
        };

        $final_html = "<script>
                        let each_student = null;
                        let table = document.getElementById('posts_table');";
        foreach ($student_list as $student) {
            $final_html .= "each_student = document.createElement('div');
                            each_student.innerHTML = `<div class='table_row'>
                                                      			<div class='id'>$student[id]</div>
                                                      			<div class='full_name'>$student[fullname]</div>
                                                      			<div class='grade'>$student[grade]</div>
                                                      			<div class='birth'>$student[date_of_birth]</div>
                                                      			<div class='gender'>$student[gender]</div>
                                                      			<div class='address'>$student[address]</div>
                                                      			<div class='achievement'>$student[achievement]</div>
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