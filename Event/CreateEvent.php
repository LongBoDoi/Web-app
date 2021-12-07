<?php
		$topic = $_POST['topic_created'];
		$location = $_POST['event_location'];
		$time = $_POST['event_time'];
		$description = $_POST['description'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("INSERT INTO sukien(title, location, time, description)
		                            VALUES(?, ?, ?, ?)");
		    $stmt->bind_param("ssss", $topic, $location, $time, $description);
		    $stmt->execute();
            $stmt->close();
            $conn->close();
		}
?>

<script>
    window.alert('Tạo sự kiện thành công!');
    window.location.assign('Event.php');
</script>