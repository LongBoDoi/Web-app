<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    $username = $_GET['input_username'];
    $input_username = $_GET['username_info'];
    $self_profile = 0;
    if ($username == $input_username) {
        $self_profile = 1;
    }
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT *
                    FROM taikhoan
                    WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $info = $result->fetch_array(MYSQLI_ASSOC);

        $stmt->close();
        $conn->close();
    }
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profile</title>
<link href="AboutPageAssets/styles/aboutPageStyle.css" rel="stylesheet" type="text/css">
<link href="../Main/toolbar_style.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- Header content -->
<header>
  <div class="header-01"><h1>Thông tin sinh viên</h1></div>
  <div class="profilePhoto">
    <!-- Profile photo -->
    <img src="AboutPageAssets/images/profilephoto.png" alt="sample"> </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1><?=$info['fullname']?></h1>
    <h3>Cựu sinh viên khoá <?=$info['grade']?> Đại học Công nghệ, ĐHQGHN</h3>
    <hr>

  </section>
</header>
<br><br>
<!-- content -->
<section class="mainContent">
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Thông tin liên lạc</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
      <p><span>Email :</span> <?=$info['email']?></p>
      <p><span>Website :</span> <?=$info['website']?></p>
      <p><span>Phone :</span> <?=$info['phone']?></p>
      <p><span>Address :</span> <?=$info['address']?></p>
    </div>
  </section>
  <!-- Previous experience details -->
  <section class="section1">
    <h2 class="sectionTitle">Thông tin cá nhân</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <!-- First Title & company details  -->
    <div class="section1Content">
		<p><span>Họ và Tên :</span> <?=$info['fullname']?></p>
		<p><span>Ngày sinh :</span> <?=$info['date_of_birth']?></p>
		<p><span>Giới tính :</span> <?=$info['gender']?></p>
		<p><span>Thành tựu :</span> <?=$info['achievement']?></p>
	</div>
    <!-- Replicate the above Div block to add more title and company details -->
  </section>
</section>

<div id='other_buttons'></div>

<script src="../Main/script.js"></script>
<script src="script.js"></script>
</body>
</html>

<script>
    if (<?=$self_profile?> === 1) {
        document.getElementById('other_buttons').innerHTML = `<form method='get' action='../UpdateProfile/UpdateProfile.php'>
                                                                          <input type="hidden" id='hidden' name='username_info'>
                                                                          <input type="submit" id='cancel_button' name="submit" value="Sửa thông tin">
                                                                      </form>
                                                                      <input type='button' id='update_button' value='Đăng xuất' onclick="window.sessionStorage.removeItem('username');
                                                                                                                                        window.location.assign('../Home_page/home_page.html');
                                                                                                                                        window.sessionStorage.removeItem('account_id');">
                    `;
        let usn = document.getElementById('hidden');
        usn.value = window.sessionStorage.getItem('username');
    }
</script>