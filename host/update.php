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
   <title>الصفح الرئيسية - صفحة المشرف</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<?php 
require_once '../connect.php';
$c=8;
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'])) {
  if(isset($_GET['true'])){
    if($_GET['true'] == "true"){
      echo '<script type="text/javascript">';
      echo ' alert("تمت التعديل الكتاب بنجاح")';  //not showing an alert box.
      echo '</script>';
      

  }
}
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];

    // Use parameterized queries to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?   AND type = 'host' ");
    $stmt->bind_param("ss", $titlecompleter, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful, and only continue if it was
    if ($result && mysqli_num_rows($result) > 0) {
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $scoore = $row['scoore'];
      $readedbooks = $row['readedbooks'];
      $type = $row["type"];
      $stage = $row["stage"];
      $code = $row["school"];                     $img= $row["img"];               
      $idadded = $row["id_readed_added_books"];

      if($type !== "host"){
        $s=1;
      }

      // Use elseif to reduce redundant code and improve readability
      if ($stage == "1" ) {
        echo '<title>حساب مشرف المستوي الأول '.$name.'</title>';
      }
       elseif ($stage == "2") {
        echo '<title>حساب مشرف المستوي الثاني '.$name.'</title>'; 
      }
      elseif ($stage == "3" ) {
        echo '<title>حساب مشرف المستوي الثالث '.$name.'</title>';
        
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
    require_once '../connect.php';

  echo'

  <header class="header">
   
  <section class="flex">

  <a href="host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>

        
        <h2 style="color: var(--black);">مدارس الأندلس الأهلية</h2>


        <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="../img/users_img/'.$img.'" class="image" alt="">
        <h3 class="name">'.$name.'</h3>
        <p class="role">معلم</p>
        <a href="profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
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
      <img src="../img/users_img/'.$img.'" class="image" alt="">
      <h3 class="name">'.$name.'</h3>
      <p class="role">معلم</p>
      <a href="profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
   </div>

   <nav class="navbar">
      <a href="host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
      <a href="../about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
      <a href="host_edit/host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المضافة</span></a>
      <a href="host_see_user/host_users_see.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>الطلاب</span></a>
      <a href="host_add/host_add.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-plus"></i><span>إضافة كتاب</span></a>
      <a href="contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
   </nav>

</div>


      ';


      $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?   AND type = 'host' ");
      $stmt->bind_param("ss", $titlecompleter, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      
      // Check if the query was successful, and only continue if it was
      if ($result && mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $password1 = $row['password'];
        $username = $row['username'];
        $img1 = $row['img'];
         echo'<center>
         <section class="form-container">
      
      <form action="" method="post" enctype="multipart/form-data">
      <h3>تعديل الحساب</h3>
      <p>تعديل الإسم</p>
      <input type="text" name="name" placeholder="'.$name.'" class="box" required value="'.$name.'">
      <form action="upload.php" method="POST" enctype="multipart/form-data">
      <p>تغير الصورة الشخصية</p>
        <input type="file" id="image" name="image">
        <label for="image">Choose file</label>
        <button type="submit">تحميل</button>
      <p>كلمة السر السابقة</p>
      <input type="password" name="old_pass" placeholder="اكتب كلمة السر السابقة"   class="box">
      <p>كلمة سر جديدة</p>
      <input type="password" name="new_pass" placeholder="اكتب كلمة سر جديدة"   class="box">
      <p>إعادة كلمة السر جديدة</p>
      <input type="password" name="re_new_pass" placeholder="قم بإعادة كتابة كلمة السر جديدة"   class="box">
      <input type="submit" value="تحديث" name="update" class="btn">
      
      </form>
      
      
      </section>
         ';
          }
          if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $file_name1="../img/users_img/$img1";
            if ($file_name1 != "../img/users_img/img.png"){
              if (file_exists($file_name1)) {
                if (unlink($file_name1)) {
                }
              }
            }
            $upload_dir = "../img/users_img/"; // folder to save uploaded files
            $file_name = basename($_FILES["image"]["name"]);
            $file_path = $upload_dir . $file_name;
            
            // Check if the uploaded file is an image
            $image_info = getimagesize($_FILES["image"]["tmp_name"]);
            if($image_info != false) {
      
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $file_path)) {
              // Replace the upload directory prefix with an empty string
              $db_file_path = str_replace($upload_dir, '', $file_path);
              $sql = "UPDATE users SET img = '$db_file_path' WHERE password='$password' AND username='$titlecompleter' AND type='host'";
              if (mysqli_query($conn, $sql)) {
                echo "<h3 chass='headers'>تم التعديل بنجاح</h3>";
                $redirect_url = "update.php?user=$username&school_code=$code&pass=$password&true=true";
          
                // Redirect the user to the URL
                header("Location: $redirect_url");
                exit();
              }
            } else {
              echo "يوجد خطا";
            }
          }else{
            echo "يوجد خطا";
      
          }
        }
        if (isset($_POST['update'])) {
          // Check if all form fields are set
          if (mysqli_real_escape_string($conn, $_POST['name']) == '' || mysqli_real_escape_string($conn, $_POST['old_pass']) == '' || mysqli_real_escape_string($conn, $_POST['new_pass']) == '' || mysqli_real_escape_string($conn, $_POST['re_new_pass']) == '') {
              echo "<h3 class='headers'>يرجى ملء جميع الحقول</h3>";
          } else {
              $new_name = mysqli_real_escape_string($conn, $_POST['name']);
              $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
              $re_new_pass = mysqli_real_escape_string($conn, $_POST['re_new_pass']);
              $old_pass = mysqli_real_escape_string($conn, $_POST['old_pass']);
      
              if ($re_new_pass == $new_pass) {
                  // Check if the old password is correct
                  if ($password1 != $old_pass) {
                      echo "<h3 class='headers'>الرجاء كتابة كلمة السر القديمة الصحيحة</h3>";
                  } else {
                      $sql = "UPDATE users SET name='$new_name', password='$new_pass' WHERE password='$password' AND username='$titlecompleter' AND type='host'";
                      if (mysqli_query($conn, $sql)) {
                          echo "<h3 class='headers'>تم التعديل بنجاح</h3>";
                          $redirect_url = "update.php?user=$username&school_code=$code&pass=$new_pass&true=true";
                
                          // Redirect the user to the URL
                          header("Location: $redirect_url");
                          exit();
                      } else {
                          echo "يرجي المحاولة مرة اخرى" . mysqli_error($conn);
                      }
                  }
              } else {
                  echo "<h3 class='headers'>كلمة السر الجديدة غير متطابقة مع الإعادة</h3>";
              }
          }
      } 
    
  
  
echo'</center><footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>';
}
?>
<link rel="stylesheet" href="../css/cssalandalus.css?v=<?=$virsion?>" />
<script src="../js/jsalandalus.js?v=<?=$virsion?>"></script>
</body>
</html>