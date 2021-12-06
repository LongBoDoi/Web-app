<?php
		$topic = $_POST['topic_created'];
		$question = $_POST['question_created'];
		$post_date = $_POST['post_date'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("INSERT INTO thongbao(title, content, post_date)
		                            VALUES(?, ?, ?)");
		    $stmt->bind_param("sss", $topic, $question, $post_date);
		    $stmt->execute();
            $stmt->close();
            $conn->close();
		}
?>

<script>
    window.alert('Đăng thành công!');
    window.location.assign('Notification.php');
</script>