<?php
		$topic_id = $_POST['topic_id'];
		$user_id = $_POST['comment_user_id'];
		$date = $_POST['post_date'];
		$comment = $_POST['comment'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("INSERT INTO noidungdiendan(forum_id, user_id, comment, post_date)
		                            VALUES(?, ?, ?, ?)");
		    $stmt->bind_param("ssss", $topic_id, $user_id, $comment, $date);
		    $stmt->execute();
            $stmt->close();
            $conn->close();
		}
?>

<script>
    window.alert('Bình luận thành công!');
    window.location.assign('Post.php');
</script>