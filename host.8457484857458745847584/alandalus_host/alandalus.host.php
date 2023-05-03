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
<body>
	<!-- Loading screen -->
	<div id="loading-screen">
   <img src="../img/loading.gif" alt="Loading...">
	</div>

<?php
if($s != 1){

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
<center>
<section class="home-grid">

   <h1 class="heading">اقتراحات سريعة</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">احصائيات</h3>
         <p class="likes"> عدد الكتب المضافة : <span>'.$readedbooks.'</span></p>
         <p class="likes">عدد النقاط : <span>'.$scoore.'</span></p>
      </div>

      <div class="box">
         <h3 class="title"> الكتب التي تم تحميلها حديثا</h3>
         <div class="flex">
         ';

         // Connect to database
         require_once '../connect.php';
         
         
         // Retrieve all books from the table
         $sql = "SELECT * FROM books wHERE school = '$code' AND stage = '$stage';";
         $result = mysqli_query($conn, $sql);
         // Generate a form for each book
         if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
              $book_id = $row["id"];
              $edit_link = sprintf("host_edit/edit_host.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
              $book_name = $row["Name"];
              $book_author = $row["writer"];
              $book_img = $row["img"];
              echo'
            <a href="'.$edit_link.'"><i class="book"></i><span>'.$book_name.'</span></a>
            ';
             }}
             echo'
         </div>
      </div>
             

      <div class="box">
         <h3 class="title">انشط الأساتذة</h3>
         <div class="flex">
         ';


         $sql = "SELECT * FROM users WHERE type = 'host' ORDER BY scoore DESC LIMIT 6";
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
         <h3 class="title">قم برفع الكتب</h3>
         <p class="tutor">يمكنك رفع الكتب ليقرئها الطلاب في جميع فروع مدارس الأندلس</p>
         <a href="host_add/host_add.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="inline-btn">ارفع الكتب الان</a>
      </div>

   </div>

</section>

<section class="courses">

   <h1 class="heading">المكتبة</h1>
   <h2 class="tutor">ليس الطلاب فقط من يمكنهم القرءاة يمكنك ذلك أيضا</h2>
   <br><br><br>

   <div class="box-container">
   ';


   $sql = "SELECT * FROM books";
   $result = mysqli_query($conn, $sql);
   // Generate a form for each book
   if (mysqli_num_rows($result) > 0) {
    $num=0;
       while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["Name"];
        $publisher = $row["book-publisher"];
        $date = $row["date"];
        $writer = $row["writer"];
        $url = $row["url"];
        $img1 = $row["img"];

        echo'
        <div class="box">
        <div class="tutor">

           <div class="info">
              <h3>'.$publisher.'</h3>
              <span>'.$date.'</span>
           </div>
        </div>
        <div class="thumb">
        <img src="'.$img1.'" alt="">
                   <span>'.$writer.'</span>
        </div>
        <h3 class="title">'.$name.'</h3>
        <a href="'.$url.'" class="inline-btn">قرائة الكتاب</a>
     </div>      ';
            }}
       echo'
 
   </div>


</section>
</center>


  ';
  }  ob_end_flush(); 
?>
<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
    <link rel="stylesheet" href="../css/cssalandalus.css?v=<?=$virsion?>" />
    <script src="../js/jsalandalus.js?v=<?=$virsion?>"></script>
 </body>
</html>


  
