<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $final_results = array();

        $stmt = $conn->prepare("SELECT tk.fullname, dd.topic, dd.views
                                FROM diendan dd
                                INNER JOIN taikhoan tk
                                WHERE username = tk.username");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($final_results, $info);
        };
        $result_length = count($final_results);

        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diễn đàn chung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<div class="container">
    <div class="posts_table">
        <div class="table_head">
            <div class="status">Status</div>
            <div class="subjects">Subjects</div>
            <div class="replies">Replies/View</div>
            <div class="last_reply">Last Reply</div>
        </div>
        <div class="table_row">
            <div class="status"><i class="far fa-comment-dots"></i></div>
                <div class="subjects"><a href="#"><?=$final_results[0]['topic']?></a>
                    <br>
                    <span>Started by <b><a href="#"><?=$final_results[0]['fullname']?></a></b>.</span>
                </div>
            <div class="replies">
                2 replies <br> <?=$final_results[0]['views']?> views
            </div>
            <div class="last_reply">
                Oct 12 2021
                <br>
                By <b><a href="#">User</a> </b>
            </div>
        </div>
    </div>
    <div id='posts'></div>

    <div class="pagination">
        pages: <a href="#">1</a><a href="#">2</a><a href="#">3</a>
    </div>
</div>


<script src="script.js"></script>
</body>
</html>


<script>
    let final_post_html = ``;
    for (let i = 0; i < 2; i++) {
        final_post_html += `<div class="posts_table">
                                        <div class="table_head">
                                            <div class="status">Status</div>
                                            <div class="subjects">Subjects</div>
                                            <div class="replies">Replies/View</div>
                                            <div class="last_reply">Last Reply</div>
                                        </div>
                                        <div class="table_row">
                                            <div class="status"><i class="far fa-comment-dots"></i></div>
                                                <div class="subjects"><a href="#"><?=$final_results[0]['topic']?></a>
                                                    <br>
                                                    <span>Started by <b><a href="#"><?=$final_results[0]['fullname']?></a></b>.</span>
                                                </div>
                                            <div class="replies">
                                                2 replies <br> <?=$final_results[0]['views']?> views
                                            </div>
                                            <div class="last_reply">
                                                Oct 12 2021
                                                <br>
                                                By <b><a href="#">User</a> </b>
                                            </div>
                                        </div>
                                    </div>`;
    }
    document.getElementById('posts').innerHTML = final_post_html;
</script>