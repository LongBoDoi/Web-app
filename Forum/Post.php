<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diễn đàn chung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../Main/toolbar_style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

<div id="header-01"><h1>Diễn đàn chung</h1></div>

<div class="container">
</div>


<script src="script.js"></script>
<script src="../Main/script.js"></script>
</body>
</html>

<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $final_results = array();
        $reply_num = array();
        $last_reply = array();

        $stmt = $conn->prepare("SELECT COUNT(forum_id) as num
                                FROM noidungdiendan
                                GROUP BY forum_id");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($reply_num, $info['num']);
        };
        $stmt->close();

        $stmt = $conn->prepare("SELECT tk.fullname, dd.topic, dd.views, dd.id, tk.username
                                FROM diendan dd, taikhoan tk
                                WHERE dd.author_id = tk.id");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($final_results, $info);
        };
        $stmt->close();

        $stmt = $conn->prepare("SELECT dd.id, tk.username, tk.fullname, nd.comment, nd.post_date
                                FROM diendan dd, noidungdiendan nd, taikhoan tk,
                                	(SELECT forum_id, max(post_date) AS max
                                     FROM noidungdiendan
                                     GROUP BY forum_id) AS max_date
                                WHERE dd.id = nd.forum_id
                                AND nd.user_id = tk.id
                                AND nd.post_date = max_date.max
                                AND nd.forum_id = max_date.forum_id
                                ORDER BY dd.id");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($last_reply, $info);
        };

        $final_html = "<script>
                        let each_post = null;
                        let container = document.getElementsByClassName('container');
                        each_post = document.createElement('div');
                        each_post.innerHTML = `<div>
                                                       <button id='create_forum_button'>Tạo chủ đề mới</button>
                                                   </div>
                                                   <br><br><br><br>`;
                        container[0].appendChild(each_post);
                        document.getElementById('create_forum_button').onclick = function () {
                            window.location.assign('Create.html');
                        };
        ";

        foreach ($final_results as $result) {
            $final_html .= "
                        each_post = document.createElement('div');
                                              each_post.innerHTML = `<div class='posts_table'>
                                                                             <div class='table_head'>
                                                                                 <div class='status'>Trạng thái</div>
                                                                                 <div class='subjects'>Chủ đề</div>
                                                                                 <div class='replies'>Phản hồi/Lượt xem</div>
                                                                                 <div class='last_reply'>Lần phản hồi cuối</div>
                                                                             </div>
                                                                             <div class='table_row'>
                                                                                 <div class='status'><i class='far fa-comment-dots'></i></div>
                                                                                 <div class='subjects'><form method='get' action='Detail.php'>
                                                                                     <input type='hidden' value='$result[id]' name='topic_id'>
                                                                                     <input type='submit' class='topic_submit' value='$result[topic]'>
                                                                                     </form>
                                                                                     <br>
                                                                                     <form method='get' action='../Profile/Profile.php'>
                                                                                     <span>Được tạo bởi
                                                                                       <input type='hidden' value='$result[username]' name='input_username'>
                                                                                       <input type='hidden' class='username_input' name='username_info'>
                                                                                       <input type='submit' class='user_submit' value='$result[fullname]'>
                                                                                   </span></form>
                                                                                 </div>
                                                                                 <div class='replies'>
                                                                                     <div class='replies_num'></div> $result[views] Lượt xem
                                                                                 </div>
                                                                                 <div class='last_reply'>
                                                                                     <div class='last_reply_date'></div>
                                                                                     <br>
                                                                                     <form method='get' action='../Profile/Profile.php'>
                                                                                      <span>By
                                                                                        <input type='hidden' class='last_reply_username' name='input_username'>
                                                                                        <input type='hidden' class='username_input' name='username_info'>
                                                                                        <input type='submit' class='user_submit last_reply_fullname'>
                                                                                    </span></form>
                                                                                 </div>
                                                                             </div>
                                                                         </div>`;
                                              container[0].appendChild(each_post);
                    ";
        }
        $final_html .= "let replies = document.getElementsByClassName('replies_num');
                        let main_usn = document.getElementsByClassName('username_input');
                        for (let i = 0; i < main_usn.length; i++) {
                            main_usn[i].value = window.sessionStorage.getItem('username');
                        }

                        let last_reply_date = document.getElementsByClassName('last_reply_date');
                        let last_reply_username = document.getElementsByClassName('last_reply_username');
                        let last_reply_fullname = document.getElementsByClassName('last_reply_fullname');";

        $index = 0;
        foreach ($reply_num as $num) {
            $num = $num - 1;
            $final_html .= "replies[$index].innerHTML = '$num phản hồi';";
            $index = $index + 1;
        }

        $index = 0;
        foreach ($last_reply as $l_reply) {
            $final_html .= "last_reply_date[$index].innerHTML = '$l_reply[post_date]';";
            $final_html .= "last_reply_username[$index].value = '$l_reply[username]';";
            $final_html .= "last_reply_fullname[$index].value = '$l_reply[fullname]';";
            $index = $index + 1;
        }

        $final_html .= "</script>";

        echo $final_html;

        $stmt->close();
        $conn->close();
    }
?>