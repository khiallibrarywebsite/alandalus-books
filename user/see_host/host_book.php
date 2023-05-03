<?php include '../../config.php';?>
<!DOCTYPE html>
<html lang="ar">
<head>  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
ob_start();
?>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الصفح الرئيسية - صفحة الطالب</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

<style>.box-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

}

.flex {
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
   <?php 
require_once '../../connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'])) {
    if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass']) && !empty($_GET['user_name'])) {
        $password = $_GET['pass'];
        $titlecompleter = $_GET['user'];
        $code = $_GET['school_code'];
        $user_name = $_GET['user_name'];

    // Use parameterized queries to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? AND `type` = 'user'");
    $stmt->bind_param("ss", $titlecompleter, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful, and only continue if it was
    if ($result && mysqli_num_rows($result) > 0) {
      // Use the fetch_assoc() method only once to retrieve the name
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $type = $row["type"];
      $stage = $row["stage"];
      $code = $row["school"];
      $readedbooks = $row["readedbooks"];
      $scoore = $row["scoore"];$img= $row["img"];

} else {
echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}
} else {
echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}
} else {
echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}


?>


</head>
<body>
	<!-- Loading screen -->
	<div id="loading-screen">
   <img src="../../img/loading.gif" alt="Loading...">
	</div>

<?php
if($s != 1){

  echo'

  <header class="header">
   
  <section class="flex">

  <a href="../user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>

        
        <h2 style="color: var(--black);">مدارس الأندلس الأهلية</h2>


     <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="../../img/users_img/'.$img.'" class="image" alt="">
        <h3 class="name">'.$name.'</h3>
        <p class="role">طالب</p>
        <a href="../profile_user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
        <div class="flex-btn">
           <a href="../../login.php" class="option-btn">تسجيل خروج</a>
        </div>
     </div>

  </section>

</header>  

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="../../img/users_img/'.$img.'" class="image" alt="">
      <h3 class="name">'.$name.'</h3>
      <p class="role">طالب</p>
      <a href="../profile_user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
   </div>

   <nav class="navbar">
   <a href="../user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
   <a href="../../about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
   <a href="../see_book/book_readed.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المقروئة</span></a>
   <a href="see_host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>المعلمون</span></a>
   <a href="../see_book/library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>المكتبة</span></a>
   <a href="../contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
</nav>

</div>';
// Connect to database
require_once '../../connect.php';

$sql = "SELECT * FROM `users` WHERE type = 'host' and username = '$user_name'";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
        $stageu = $row["stage"];
        $name_user = $row["name"];
        $schoolu = $row["school"];
        $readedbooksu = $row["readedbooks"];
        $booids = $row["id_readed_added_books"];
        $number=0;
        $img12 = $row["img"];
        echo'<center>
        <section class="user-profile">
        
           <h1 class="heading">حساب المعلم '.$name_user.'</h1>
        
           <div class="info">
        
              <div class="user">
                 <img src="../../img/users_img/'.$img12.'" alt="">
                 <h3>'.$name_user.'</h3>
                 <p></p>
              </div>
        
              <div class="box-container" style = "align-items:center;">
                 <div class="box"  style = "align-items:center;">
                    <div class="flex">
                       <i class="fas fa-book"></i>
                       <div>
                          <span>'.$readedbooksu.'</span>
                          <p>عدد الكتب المرفوعة </p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        
        </section>

        ';
    }

} else {
  
    echo "<center>حدث خطا لا يمكن تحميل البيانات</center>";

}

echo'        <section class="courses">
<div class="box-container">';


$sql = "SELECT * FROM `books` WHERE stage = '$stageu' and school = '$schoolu'";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $book_id = $row["id"];
    $book_name = $row["Name"];
    $book_author = $row["writer"];
    $book_img = $row["img"];
    $book_url = $row["url"];
    if(strpos($booids,$book_id)){
      echo'
      <div class="box">
      <div class="thumb">
          <img src="'.$book_img.'" alt="">
          <span>'.$book_author.'</span>
      </div>
      <h3 class="title">'.$book_name.'</h3>
      <form method="post" class="box">
          <input type="hidden" name="book_id" value="'.$book_id.'">
          <input type="submit" name="read" value="قراءة الكتاب" class ="inline-btn">
      </form>
  </div>'; 
}

}
echo'</div></section>';
}
// Handle form submission
if (isset($_POST["read"])) {
    $book_id = $_POST["book_id"];
    $redirect_url = "../see_book/see_book.php?user=$titlecompleter&school_code=$code&pass=$password&id=$book_id";
    header("Location: $redirect_url");
    exit();
}
}


ob_end_flush(); 
?>
<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
<link rel="stylesheet" href="../../css/cssalandalus.css?v=<?=$virsion?>" />
<script src="../../js/jsalandalus.js?v=<?=$virsion?>"></script>
 </body>

</html>
