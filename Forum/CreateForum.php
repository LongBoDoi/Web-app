<?php
		$topic = $_POST['topic_created'];
		$author_id = $_POST['author_id'];
		$question = $_POST['question_created'];
		$post_date = $_POST['post_date'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("INSERT INTO diendan(author_id, topic, views)
		                            VALUES(?, ?, 0)");
		    $stmt->bind_param("ss", $author_id, $topic);
		    $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("SELECT id
                                    FROM diendan
                                    WHERE author_id = ?
                                    AND topic = ?");
            $stmt->bind_param("ss", $author_id, $topic);
            $stmt->execute();
            $result = $stmt->get_result();
            $info = $result->fetch_array(MYSQLI_ASSOC);
            $topic_id = $info['id'];
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO noidungdiendan(forum_id, user_id, comment, post_date)
                                    VALUES(?, ?, ?, ?);
            ");
            $stmt->bind_param("ssss", $topic_id, $author_id, $question, $post_date);
            $stmt->execute();
            $stmt->close();
            $conn->close();
		}
?>

<script>
    window.alert('Đăng thành công!');
    window.location.assign('Post.php');
</script>