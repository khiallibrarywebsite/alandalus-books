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
require_once 'connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];

    // Use parameterized queries to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
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
      $img = $row["img"];
      $idadded = $row["id_readed_added_books"];




} else {
    echo '<center><a href="../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';

}
} else {
$s = 1;
}
} else {
$s = 1;
}

?>

   </head>
<body style="width:100%">
	<!-- Loading screen -->
	<div id="loading-screen">
		<img src="img/loading.gif" alt="Loading...">
	</div>
<?php
if($s == 1){
echo'
  <header class="header" style="width:100%">
   
  <section class="flex" style="width:100%">

  <a href="login.php" class="logo">alandalus</a>

        
        <h2 style="color: var(--black);">مدارس الأندلس الأهلية</h2>


     <div class="icons">
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="img/users_img/'.$img.'" class="image" alt="">
           <a href="login.php" class="option-btn">تسجيل دخول</a>
        </div>
     </div>

  </section>

</header> 
<section class="about">

   <div class="row">

      <div class="image">
         <img src="img/logo.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut dolorum quasi illo? Distinctio expedita commodi, nemo a quam error repellendus sint, fugiat quis numquam eum eveniet sequi aspernatur quaerat tenetur.</p>
         <a href="courses.html" class="inline-btn">our courses</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+10k</h3>
            <p>online courses</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+40k</h3>
            <p>brilliant students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+2k</h3>
            <p>expert tutors</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <p>job placement</p>
         </div>
      </div>

   </div>

</section> 

' ;

}else{
    echo'

    <header class="header">
     
    <section class="flex"> ';

          if($type == 'host'){

          echo'
          <a href="host/host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>
  
          
          <h2 style="color: var(--black);">مدارس الأندلس الأهلية</h2>
  
  
       <div class="icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <div id="user-btn" class="fas fa-user"></div>
          <div id="toggle-btn" class="fas fa-sun"></div>
       </div>
  
       <div class="profile">
          <img src="img/users_img/'.$img.'" class="image" alt="">
          <h3 class="name">'.$name.'</h3>

          <p class="role">معلم</p>
          <a href="host/profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
          <div class="flex-btn">
             <a href="login.php" class="option-btn">تسجيل خروج</a>
          </div>
          
          </div>
  
          </section>
        
        </header>  
        
        <div class="side-bar">
        
           <div id="close-btn">
              <i class="fas fa-times"></i>
           </div>
        
           <div class="profile">
              <img src="img/users_img/'.$img.'" class="image" alt="">
              <h3 class="name">'.$name.'</h3>
              <p class="role">معلم</p>
              <a href="host/profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
           </div>
        
           <nav class="navbar">
              <a href="host/host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
              <a href="about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
              <a href="host/host_edit/host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المضافة</span></a>
              <a href="host/host_see_user/host_users_see.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>الطلاب</span></a>
              <a href="host/host_add/host_add.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-plus"></i><span>إضافة كتاب</span></a>
              <a href="host/contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
           </nav>
        
        </div>
          ';
        }elseif($type == 'user'){

            echo'
            <a href="user/user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>
  
          
            <h2 style="color: var(--black);">مدارس الأندلس الأهلية</h2>
    
    
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div>
    
         <div class="profile">
            <img src="img/users_img/'.$img.'" class="image" alt="">
            <h3 class="name">'.$name.'</h3>

            <p class="role">طالب</p>
            <a href="user/profile_user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
            <div class="flex-btn">
               <a href="login.php" class="option-btn">تسجيل خروج</a>
            </div>
            </div>
  
            </section>
          
          </header>  
          
          <div class="side-bar">
          
             <div id="close-btn">
                <i class="fas fa-times"></i>
             </div>
          
             <div class="profile">
                <img src="img/users_img/'.$img.'" class="image" alt="">
                <h3 class="name">'.$name.'</h3>
                <p class="role">طالب</p>
                <a href="user/profile_user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
             </div>
          
             <nav class="navbar">
                <a href="user/user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
                <a href="about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
                <a href="user/see_book/book_readed.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المقروئة</span></a>
                <a href="user/see_host/see_host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>المعلمون</span></a>
                <a href="user/see_book/library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>المكتبة</span></a>

                <a href="user/contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
             </nav>
          
          </div>
            ';
        }
        echo'
        <section class="about">

   <div class="row">

      <div class="image">
         <img src="img/logo.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut dolorum quasi illo? Distinctio expedita commodi, nemo a quam error repellendus sint, fugiat quis numquam eum eveniet sequi aspernatur quaerat tenetur.</p>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+10k</h3>
            <p>online courses</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+40k</h3>
            <p>brilliant students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+2k</h3>
            <p>expert tutors</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <p>job placement</p>
         </div>
      </div>

   </div>

</section> 
        ';

}
?>

<link rel="stylesheet" href="css/cssalandalus.css" />
<script src="js/jsalandalus.js"></script>
</body>
</html>