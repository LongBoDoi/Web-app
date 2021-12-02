<?php
    $conn = new mysqli('localhost','root','','cuusinhvien');
    $username = $_GET['username_info'];
    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT *
                    FROM taikhoan
                    WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $info = $result->fetch_array(MYSQLI_NUM);
        if ($info[10] == "") {
            $info[10] = "__________";
        }
        $stmt->close();
        $conn->close();
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profile</title>
<link href="../Profile/AboutPageAssets/styles/aboutPageStyle.css" rel="stylesheet" type="text/css">
<link href="../Main/toolbar_style.css" rel="stylesheet" type="text/css">
<link href="InfoUpdateStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<form method='post' action='update_info.php'>
<!-- Header content -->
<header>
  <div class="header-01"><h1>Thông tin cá nhân</h1></div>
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <img src="AboutPageAssets/images/profilephoto.png" alt="sample"> </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1><?=$info[2]?></h1>
    <h3>Cựu sinh viên khoá <?=$info[3]?> Đại học Công nghệ, ĐHQGHN</h3>
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
      <p><span>Email :</span> <input type='text' class='info_for_update' name='email_update' value='<?=$info[6]?>'></p>
      <p><span>Website :</span> <input type='text' class='info_for_update' name='website_update' value='<?=$info[7]?>'></p>
      <p><span>Phone :</span> <input type='text' class='info_for_update' name='phone_update' value='<?=$info[8]?>'></p>
      <p><span>Address :</span> <input type='text' class='info_for_update' name='address_update' value='<?=$info[9]?>'></p>
    </div>
  </section>
  <!-- Previous experience details -->
  <section class="section1">
    <h2 class="sectionTitle">Thông tin cá nhân</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <!-- First Title & company details  -->
    <div class="section1Content">
		<p><span>Họ và Tên :</span> <?=$info[2]?></p>
        <p><span>Ngày sinh :</span> <input type='date' class='info_for_update' name='birth_update' value='<?=$info[4]?>'></p>
        <p><span>Giới tính :</span> <select class='info_for_update' name='gender_update'>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
        </p>
        <p><span>Thành tựu :</span> <?=$info[10]?></p>
	</div>
    <!-- Replicate the above Div block to add more title and company details --> 
  </section>

    <input type='hidden' id='cancel_update_usn_2' name='username_info'>
    <input type='submit' id='update_button' name='update_submit' value='LƯU'>
</section>
</form>

<form method='get' action='../Profile/Profile.php'>
    <input type='hidden' id='cancel_update_usn' name='username_info'>
    <input type='submit' id='cancel_button' name='cancel_submit' value='HUỶ'>
</form>

<script src="../Main/script.js"></script>
<script src="script.js"></script>
</body>
</html>
