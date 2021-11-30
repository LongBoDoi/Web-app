<?php
  $first = "hello";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profile</title>
<link href="AboutPageAssets/styles/aboutPageStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- Header content -->
<header>
  <div class="header-01"><h1>Thông tin cá nhân</h1></div>
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <img src="AboutPageAssets/images/profilephoto.png" alt="sample"> </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1><?=$first?></h1>
    <h3>Cựu sinh viên khoá ... Đại học Công nghệ, ĐHQGHN</h3>
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
      <p><span>Email :</span> nguyenvana@gmail.com</p>
      <p><span>Website :</span> None</p>
      <p><span>Phone :</span> 09** *** ***</p>
      <p><span>Address :</span> Ha Noi, Viet Nam</p>
    </div>
  </section>
  <!-- Previous experience details -->
  <section class="section1">
    <h2 class="sectionTitle">Thông tin cá nhân</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <!-- First Title & company details  -->
    <div class="section1Content">
		<p><span>Họ và Tên :</span> Nguyễn Văn A</p>
		<p><span>Năm sinh :</span> 19**</p>
		<p><span>Giới tính :</span> Nam</p>
		<p><span>Thành tựu :</span> Trung bình GPA 4 năm học > 3.5.</p>
	</div>
    <!-- Replicate the above Div block to add more title and company details --> 
  </section>
  <!-- Links to expore your past projects and download your CV -->
  <aside class="externalResourcesNav">
    <div class="externalResources"> <a href="#" title="Download CV Link">UPLOAD Profile</a> </div>
    <span class="stretch"></span>
    <div class="externalResources"><a href="#" title="Behance Link">CONTACT</a> </div>
  </aside>
</section>

<script src="AboutPageAssets/script/ProfileScript.js"></script>
</body>
</html>
