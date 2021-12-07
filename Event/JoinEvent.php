<?php
		$event_id = $_POST['event_id'];
		$user_id = $_POST['user_id'];

 		$conn = new mysqli('localhost','root','','cuusinhvien');
		if ($conn->connect_error) {
			die('Connection Failed : '.$conn->connect_error);
		} else {
		    $stmt = $conn->prepare("INSERT INTO thamgiasukien(event_id, participant)
		                            VALUES(?, ?)");
		    $stmt->bind_param("ss", $event_id, $user_id);
		    $stmt->execute();
            $stmt->close();
            $conn->close();
		}
?>

<script>
    window.alert('Tham gia sự kiện thành công!');
    window.location.assign('Event.php');
</script>