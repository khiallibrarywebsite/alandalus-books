<!DOCTYPE html>
<html lang="en">
<head>
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
      $code = $row["school"];
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
<body>

<?php
if($s != 1){
    require_once '../connect.php';

  echo'

  <header class="header">
   
  <section class="flex">

     <a href="host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">Educa.</a>

        
        <h2>مدارس الأندلس الأهلية</h2>


     <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="../img/img.png" class="image" alt="">
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
      <img src="../img/img.png" class="image" alt="">
      <h3 class="name">'.$name.'</h3>
      <p class="role">معلم</p>
      <a href="profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
   </div>

   <nav class="navbar">
      <a href="host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
      <a href="../about.php"><i class="fas fa-question"></i><span>من نحن</span></a>
      <a href="host_edit/host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المضافة</span></a>
      <a href="host_see_user/host_users_see.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>الطلاب</span></a>
      <a href="host_add/host_add.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-plus"></i><span>إضافة كتاب</span></a>
      <a href="../contact.php"><i class="fas fa-headset"></i><span>راسلنا</span></a>
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
         echo'
         <section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>تعديل الحساب</h3>
      <p>تعديل الإسم</p>
      <input type="text" name="name" placeholder="'.$name.'" class="box" value="'.$name.'">
      <p>تعديل اسم المستخدم</p>
      <input type="text" name="username" placeholder="'.$username.'" class="box"  value="'.$username.'">
      <p>كلمة السر السابقة</p>
      <input type="password" name="old_pass" placeholder="اكتب كلمة السر السابقة" class="box">
      <p>كلمة سر جديدة</p>
      <input type="password" name="new_pass" placeholder="اكتب كلمة سر جديدة" class="box">
      <input type="submit" value="تحديث" name="update" class="btn">
      </form>
      </section>
         ';
          }
          if (isset($_POST['update'])) {
            // Check if all form fields are set
            $requiredFields = [
        
              'name',
              'username',
              'old_pass',
              'new_pass'
            ];
          foreach ($requiredFields as $field) {
              if (!isset($_POST[$field])) {
                  echo "Please fill out all form fields and select the correct answers for the questions";
                  return;
              } else {
                  // Get variables using mysqli_real_escape_string to prevent SQL injection
                  $new_name = mysqli_real_escape_string($conn, $_POST['name']);
                  $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
                  $old_pass = mysqli_real_escape_string($conn, $_POST['old_pass']);
                  $username = mysqli_real_escape_string($conn, $_POST['username']);
          
                  // Check if the old password is correct
                  if($password1 != $old_pass){

                    echo "<h3 chass='headers'>الرجاء كتابة كلمة السر القديمة الصحيحة</h3>";                  
                } else {
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    $num_users = mysqli_num_rows($result);
                    
                    // Check if there are any users in the database
                    if ($num_users > 0) {
                        $user_count = 0;
                        
                        // Loop through each user
                        while ($row = mysqli_fetch_assoc($result)) {
                            $username1 = $row['username'];
                            $user_count++;
                            
                            // Check if the current user matches the one we want to update
                            if ($username == $username1) {
                                
                                // Check if the new username is different from the current one
                                if ($username1 != $titlecompleter) {
                                    echo "<h3 chass='headers'>الرجاء كتابة اسم مستخدم اخر</h3>";
                                } else {
                                    
                                    // Check if we've reached the end of the user list
                                    if ($num_users == $user_count) {
                                        $sql = "UPDATE users SET name='$new_name' , username='$username' , password='$new_pass' WHERE password='$password' AND username='$titlecompleter' AND type='host'";
                                        if (mysqli_query($conn, $sql)) {
                                            echo "<h3 chass='headers'>تم التعديل بنجاح</h3>";
                                            $redirect_url = "update.php?user=$username&school_code=$code&pass=$new_pass&true=true";
                
                                            // Redirect the user to the URL
                                            header("Location: $redirect_url");
                                            exit();
                                        } else {
                                            echo "يرجي المحاولة مرة اخري" . mysqli_error($conn);
                                        }
                                    }
                                }
                            } else {
                                
                                // Check if we've reached the end of the user list
                                if ($num_users == $user_count) {
                                    $sql = "UPDATE users SET name='$new_name' , username='$username' , password='$new_pass' WHERE password='$password' AND username='$titlecompleter' AND type='host'";
                                    if (mysqli_query($conn, $sql)) {
                                        echo "<h3 chass='headers'>تم التعديل بنجاح</h3>";
                                        $redirect_url = "update.php?user=$username&school_code=$code&pass=$new_pass&true=true";
            
                                        // Redirect the user to the URL
                                        header("Location: $redirect_url");
                                        exit();
                                    } else {
                
                                        echo "يرجي المحاولة مرة اخري" . mysqli_error($conn);
                            } 
                                }

                }

              
              }
            }
        }
              }
          }
          }
        
echo'<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>';
}
?>
<link rel="stylesheet" href="../desgin/css/style.css">
<script src="../desgin/js/script.js"></script>
</body>
</html>

            