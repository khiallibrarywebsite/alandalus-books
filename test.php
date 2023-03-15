<!DOCTYPE html>
<html lang="ar">
<head>  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
ob_start();
?>


   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الصفحة الرئيسية</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
 <style>  .side-bar {
  width: 300px;
  height: 100vh;
  background-color: #f1f1f1;
  position: fixed;
  top: 0;
  left: -300px;
  transition: all 0.3s ease-in-out;
}

.side-bar.show {
  left: 0;
}

.navbar h2 {
  overflow-wrap: anywhere;
  text-align: justify;
  text-justify: inter-word;
}

.image-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.image-list img {
  width: calc(50% - 10px);
  margin-bottom: 20px;
}



</style>
  </head>

    <body>
	<!-- Loading screen -->
	<div id="loading-screen">
		<img src="img/loading.gif" alt="Loading...">
	</div>



    <header class="header">
   
   <section class="flex">
 
   <a href="login.php" class="logo">alandalus</a>
 
         
         <h2>مدارس الأندلس الأهلية</h2>
 
 
      <div class="icons">
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>
   </section>
 
 </header>  
 
 <div class="side-bar">
 
    <div id="close-btn">
       <i class="fas fa-times"></i>
    </div>
 
    <div class="profile">
       <img src="img/logo.png" class="image" alt="">
    </div>
 
    <nav class="navbar">
      <center>
      <a href="#about"><span>من نحن</span></a> 
      <br>
      <h1>من نحن نحن مجموعة مدارس في المملكة العربية السعودية نساهم في نشر العلم وتوعية الطلاب وتثقيفهم لمستقبل وجيل أفضل </h1>
    <br>
    <a href="#about"><span>شركاء النجاح</span></a> 
    <div class="image-list">
  <img src="image1.jpg">
  <img src="image2.jpg">
  <img src="image3.jpg">
  <img src="image4.jpg">
  <img src="image5.jpg">
  <img src="image6.jpg">
  <img src="image7.jpg">
  <img src="image8.jpg">
</div>

    </center>
  </nav>
    
 </div> 




<?php
require_once 'connect.php';

$sql = "SELECT * FROM tables_index";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {

  echo '<section class="courses">
  <h1>SCHOOLS</h1>
<p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
  <div class="box-container">';
    while ($row = mysqli_fetch_assoc($result)) {
      $id_table = $row["id"];
      $table_img = $row["img"];
      $table_name = $row["name"];
      $ql = "SELECT COUNT(*) AS total_books FROM books WHERE school = '$id_table'"; 
      $re = mysqli_query($conn, $ql);
      if (mysqli_num_rows($re) > 0) {
        $ro = mysqli_fetch_assoc($re);
        $total_books = $ro["total_books"];
        echo'
        <div class="box">
        <div class="thumb">
        <img src="img/'.$table_img.'" alt="">
        <span>'.$table_name.'</span>
        </div>
        <h3 class="title">'.$table_name.'</h3>
        <a href="login.php" class="inline-btn">عدد الكتب : '   . $total_books . '<a>
     </div>      ';

      } else {
      $total_books = 0;
      echo'
      <div class="box">
      <div class="thumb">
      <img src="img/'.$table_img.'" alt="">
      <span>'.$table_name.'</span>
      </div>
      <h3 class="title">'.$table_name.'</h3>
      <a href="login.php" class="inline-btn">عدد الكتب : '   . $total_books . '<a>
   </div>      ';
    }

    }
    echo '</div></section>';
  }
ob_end_flush(); 
?>
<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>



<link rel="stylesheet" href="css/stylecss.css"/>
<script src="js/jsalandalus.js"></script>
</body>
</html>