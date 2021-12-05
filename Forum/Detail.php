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
    $post_id = $_GET['topic_id'];
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("UPDATE diendan
                                SET views = views + 1
                                WHERE id = ?");
        $stmt->bind_param("s", $post_id);
        $stmt->execute();
        $stmt->close();

        $final_results = array();

        $stmt = $conn->prepare("SELECT author_id, topic, views, user_id, username, fullname, comment, post_date, account_type
                                FROM diendan dd, noidungdiendan nd, taikhoan tk
                                WHERE dd.id = nd.forum_id
                                AND nd.user_id = tk.id
                                AND dd.id = ?");
        $stmt->bind_param("s", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($final_results, $info);
        };

        $count = count($final_results);
        $question = $final_results[0];

        $final_html = "<script>
                        let each_post = null;
                        let container = document.getElementsByClassName('container');
                        each_post = document.createElement('div');
                        each_post.innerHTML = `<div class='topic_container'>
                                                     <div class='head'>
                                                         <div class='authors'>Tác giả</div>
                                                         <div class='content'>Chủ đề: $question[topic] (Đã đọc $question[views] lần)</div>
                                                     </div>

                                                     <div class='body'>
                                                         <div class='authors'>
                                                             <div class='username'>
                                                                <form method='get' action='../Profile/Profile.php'>
                                                                    <input type='hidden' class='username_input' name='username_info'>
                                                                    <input type='hidden' value='$question[username]' name='input_username'>
                                                                    <input type='submit' class='topic_submit' value='$question[fullname]'>
                                                                </form>
                                                             </div>
                                                             <div>$question[account_type]</div>
                                                             <img src='https://courses.uet.vnu.edu.vn/theme/image.php/lambda/core/1635321604/u/f1'>
                                                         </div>

                                                         <div class='content'>
                                                             $question[comment]
                                                             <br><br><br><br>
                                                             <hr>
                                                             <i><small> Đã đăng vào $question[post_date] </small></i>
                                                         </div>
                                                     </div>
                                                 </div>`;
                        container[0].appendChild(each_post);
        ";

        foreach ($final_results as $result) {
            if ($result == $question) {
                continue;
            }
            if ($result['user_id'] == $result['author_id']) {
                $role = "Tác giả";
            } else {
                $role = "Người dùng";
            }
            $final_html .= "
                        each_post = document.createElement('div');
                                              each_post.innerHTML = `<div class='comments_container'>
                                                                             <div class='head'>
                                                                                 <div class='authors'>$role</div>
                                                                                 <div class='content'>Phản hồi</div>
                                                                             </div>
                                                                     
                                                                             <div class='body'>
                                                                                 <div class='authors'>
                                                                                     <div class='username'>
                                                                                        <form method='get' action='../Profile/Profile.php'>
                                                                                            <input type='hidden' value='$result[username]' name='input_username'>
                                                                                            <input type='hidden' class='username_input' name='username_info'>
                                                                                            <input type='submit' class='topic_submit' value='$result[fullname]'>
                                                                                        </form>
                                                                                     </div>
                                                                                     <div>$result[account_type]</div>
                                                                                     <img src='https://courses.uet.vnu.edu.vn/theme/image.php/lambda/core/1635321604/u/f1'>
                                                                                 </div>
                                                                     
                                                                                 <div class='content'>
                                                                                     $result[comment]
                                                                                     <br><br><br><br>
                                                                                     <hr>
                                                                                     <i><small> Đã đăng vào $result[post_date] </small></i>
                                                                                 </div>
                                                                             </div>
                                                                         </div>`;
                                              container[0].appendChild(each_post);
                    ";
        }
        $final_html .= "each_post = document.createElement('div');
        each_post.innerHTML = `<div class='comment_area' id='comment_area'>
                                        <form id='comment_form' method='post' action='Comment.php'>
                                            <input type='hidden' name='topic_id' value='$post_id'>
                                            <input type='hidden' id='comment_user_id' name='comment_user_id'>
                                            <input type='hidden' id='date_id' name='post_date'>
                                            <textarea name='comment' cols='' placeholder='Nhập bình luận......'></textarea>
                                        <input type='submit' name='' value='Bình luận'>
                                        </form>
                                   </div>`;
        container[0].appendChild(each_post);

        document.getElementById('comment_user_id').value = window.sessionStorage.getItem('account_id');
        document.getElementById('comment_form').onsubmit = function () {
            document.getElementById('date_id').value = get_post_date();
        };
        let main_usn = document.getElementsByClassName('username_input');
        for (let i = 0; i < main_usn.length; i++) {
            main_usn[i].value = window.sessionStorage.getItem('username');
        }
        </script>";

        echo $final_html;

        $stmt->close();
        $conn->close();
    }
?>