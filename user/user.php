
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الصفح الرئيسية - صفحة الطالب</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<style>.side-bar{
   position: fixed;
   top: 0; left: 0;
   width: 30rem;
   background-color: var(--white);
   height: 100vh;
   border-right: var(--border);
   z-index: 1200;
   overflow-y: auto; /* add this line */
}.footer {
   /* existing styles */
   opacity: 0;
   animation: fade-in 0.5s ease forwards;
 }
 
 @keyframes fade-in {
    to {
     opacity: 1;
     transform: translateY(20px);
   }
   from {
     opacity: 0;
     transform: translateY(0);
   }
 }</style>

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
<body>

<?php
if($s != 1){

  echo'

  <header class="header">
   
  <section class="flex">

  <a href="user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>

        
        <h2>مدارس الأندلس الأهلية</h2>


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
      <img src="../img/users_img/'.$img.'" class="image" alt="">
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
<center>
<section class="home-grid">

   <h1 class="heading">اقتراحات سريعة</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">احصائيات</h3>
         <p class="likes"> عدد الكتب المقروئة : <span>'.$readedbooks.'</span></p>
         <p class="likes">عدد النقاط : <span>'.$scoore.'</span></p>
      </div>

      <div class="box">
         <h3 class="title">الكتب المرفوعة حديثا</h3>
         <div class="flex">
         ';

         // Connect to database
         require_once '../connect.php';
         
         
         // Retrieve all books from the table
         $sql = "SELECT * FROM books WHERE stage = '$stage' ORDER BY `date` DESC LIMIT 3;";
         $result = mysqli_query($conn, $sql);
         // Generate a form for each book
         if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
              $book_id = $row["id"];
              $see_link = sprintf("see_book/see_book.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
              $book_name = $row["Name"];
              $book_author = $row["writer"];
              $book_img = $row["img"];
              echo'
            <a href="'.$see_link.'"><i class="book"></i><span>'.$book_name.'</span></a>
            ';
             }}
             echo'
         </div>
      </div>
             

      <div class="box">
         <h3 class="title">انشط الطلبه</h3>
         <div class="flex">
         ';


         $sql = "SELECT * FROM users WHERE type = 'user' ORDER BY scoore DESC LIMIT 6";
         $result = mysqli_query($conn, $sql);
         // Generate a form for each book
         if (mysqli_num_rows($result) > 0) {
          $num=0;
             while ($row = mysqli_fetch_assoc($result)) {
              $host_name = $row["name"];
              $num=$num+1;
              echo'
            <a href="#"><i class="book"></i><span style="width : 100%">'.$num.'-'.$host_name.'</span></a>
            ';
             }}
             echo'
         </div>
      </div>

      <div class="box">
         <h3 class="title">قم بقرائة الكتب</h3>
         <p class="tutor">يمكنك قرائة الكتب واجابة الأسئلة لتحصل علي نقاط</p>
         <a href="see_book/library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="inline-btn">قم بالقرائة الآن</a>
      </div>

   </div>

</section>

<section class="courses">

   <h1 class="heading">المكتبة</h1>
   <h2 class="tutor">بعض الكتب من مكتبة المدرسه</h2>
   <br><br><br>

   <div class="box-container">
   ';


   $sql = "SELECT * FROM books where stage = '$stage' ORDER BY `date` DESC LIMIT 6;";
   $result = mysqli_query($conn, $sql);
   // Generate a form for each book
   if (mysqli_num_rows($result) > 0) {
    $num=0;
       while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["Name"];
        $publisher = $row["book-publisher"];
        $date = $row["date"];
$img2= $row["img"];
        $writer = $row["writer"];
        $url = $row["url"];
        echo'
        <div class="box">
        <div class="tutor">
           <img src="'.$img2.'" alt="">
           <div class="info">
              <h3>'.$publisher.'</h3>
              <span>'.$date.'</span>
           </div>
        </div>
        <div class="thumb">
        <img src="'.$img2.'" alt="">
                   <span>'.$writer.'</span>
        </div>
        <h3 class="title">'.$name.'</h3>
        <a href="'.$url.'" class="inline-btn">قرائة الكتاب</a>
     </div>      ';
       }}
       echo'

   </div>
   <div class="more-btn">
   <a href="see_book/library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="inline-option-btn">قرائة المزيد من الكتب</a>
</div>

</section>
</center>


  ';
  }  ?>
  <footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
<link rel="stylesheet" href="../css/stylecss.css" />
<script src="../js/js.js"></script>
 </body>
</html>