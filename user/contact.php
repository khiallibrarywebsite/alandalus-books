<?php include '../config.php';?>
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


   <?php 
require_once '../connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];

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
echo '<center><a href="../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}
} else {
echo '<center><a href="../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}
} else {
echo '<center><a href="../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}


?>


</head>
  <body>  <div id="loading-spinner">
      <div class="spinner"></div>
    </div>

	<!-- Loading screen -->


<?php
if($s != 1){

  echo'

  <header class="header">
   
  <section class="flex">

  <a href="user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>

        
        <h2 style="color: var(--black);">مدارس الأندلس الأهلية</h2>


     <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="../img/users_img/'.$img.'" class="image" alt="">
        <h3 class="name">'.$name.'</h3>
        <p class="role">طالب</p>
        <a href="profile_user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
        <div class="flex-btn">
           <a href="../login.php" class="option-btn">تسجيل خروج</a>
        </div>
     </div>

  </section>

</header>  

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="../img/users_img/'.$img.'" class="image" alt="" >
      <h3 class="name">'.$name.'</h3>
      <p class="role">طالب</p>
      <a href="profile_user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
      </div>

   <nav class="navbar">
   <a href="user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
   <a href="../about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
   <a href="see_book/book_readed.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المقروئة</span></a>
   <a href="see_host/see_host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>المعلمون</span></a>
   <a href="see_book/library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>المكتبة</span></a>
   <a href="contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
</nav>

</div>
<section class="contact">

   <div class="row">

      <div class="image">
         <img src="../img/logo.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>اكتب رسالتك</h3>
         <input type="text" placeholder="اكتب اسمك" name="name" required class="box">
         <input type="email" placeholder="اكتب الإميل" name="email" required class="box">
         <textarea name="msg" class="box" placeholder="اكتب رسالتك ( مشكله في الموقع - فكره لتحسين الموقع - طلب ) وسوف يتم ارسالها الي فريق مختص" required cols="30" rows="10"></textarea>
         <input type="submit" value="ارسال الرسالة" class="inline-btn" name="send">
      </form>

   </div>';

   if (isset($_POST['send'])) {
    require_once '../connect.php';
    // Check if all form fields are set
    $requiredFields = [

      'name',
      'email',
      'msg'
    ];
  foreach ($requiredFields as $field) {
      if (!isset($_POST[$field])) {
          echo "قم باكمال جميع المتطلبات";
          return;echo"<script>$('#loading-screen').hide();</script>";
      } else {
          // Get variables using mysqli_real_escape_string to prevent SQL injection
          $name1 = mysqli_real_escape_string($conn, $_POST['name']);
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $msg = mysqli_real_escape_string($conn, $_POST['msg']);

          $current_date = date('Y-m-d H:i:s');
          $sql = "INSERT INTO contact (`name`, `date`, `message`, `type`, `email`)
          VALUES ('$name1' ,'$current_date' ,'$msg' ,'user' ,'$email')";


            if (mysqli_query($conn, $sql)) {

                echo "<h3 chass='headers'>تم التعديل بنجاح</h3>";
                $redirect_url = "contact.php?user=$titlecompleter&school_code=$code&pass=$password&true=true";
                            
                // Redirect the user to the URL
                header("Location: $redirect_url");
                exit();
            }else{
                echo "حدث خطا أثناء الإرسال";
            }
      }
    }
}
          echo'<center>
   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <a href="tel:1234567890">123-456-7890</a>
         <a href="tel:1112223333">111-222-3333</a>
      </div>
      
      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <a href="mailto:shaikhanas@gmail.com">shaikhanas@gmail.come</a>
         <a href="mailto:anasbhai@gmail.com">anasbhai@gmail.come</a>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>office address</h3>
         <a href="#">flat no. 1, a-1 building, jogeshwari, mumbai, india - 400104</a>
      </div>

   </div>

</section></center>

<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>';
}
?>

<link rel="stylesheet" href="../css/cssalandalus.css?v=<?=$virsion?>" />
<!-- custom js file link  -->
<script src="../js/jsalandalus.js?v=<?=$virsion?>"></script>

   
</body>
</html>