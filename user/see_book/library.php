<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الصفح الرئيسية - صفحة الطالب</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <?php 
require_once '../../connect.php';
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
      $scoore = $row["scoore"];

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

<?php
if($s != 1){

  echo'

  <header class="header">
   
  <section class="flex">

  <a href="../user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>

        
        <h2>مدارس الأندلس الأهلية</h2>


     <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="../../img/img.png" class="image" alt="">
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
      <img src="../../img/img.png" class="image" alt="">
      <h3 class="name">'.$name.'</h3>
      <p class="role">طالب</p>
      <a href="../profileuser.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
   </div>

   <nav class="navbar">
   <a href="../user.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
   <a href="../../about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
   <a href="book_readed.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المقروئة</span></a>
   <a href="../see_host/see_host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>المعلمون</span></a>
   <a href="library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>المكتبة</span></a>
   <a href="../contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
</nav>

</div>        <center><section class="courses">
<div class="box-container">
   <div class="box offer" style="padding: 70px;">
   <h3 class="title">قم بقرائة الكتب</h3>
   <p class="title">يمكنك قرائة الكتب واجابة الأسئلة لتحصل علي نقاط</p>
   <a href="library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="inline-btn">قم بالقرائة الآن</a>
</div>';

// Retrieve all books from the table
$sql = "SELECT * FROM books wHERE school = '$code' AND stage = '$stage';";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $edit_link = sprintf("edit_host.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        $book_url = $row["url"];
        echo' 
        <div class="box">
        <form method="post" class="box">
        <div class="thumb">
        <img src="'.$book_img.'" alt="">
                   <span>'.$book_author.'</span>
        </div>
        <h3 class="title">'.$book_name.'</h3>
        <input type="hidden" name="book_id" value="'.$book_id.'">
        <input type="submit" name="read" value="قرائة الكتاب" class ="inline-btn"></form>
     </div>  ';

  }
  echo "</div>
  </section></center>";
}
// Handle form submission
if (isset($_POST["read"])) {
// prepare the SQL query
$stmt = $conn->prepare("SELECT id_readed_added_books FROM `users` WHERE `username` = ? AND `password` = ?  AND `school` = '$code'  " );
$stmt->bind_param("ss", $titlecompleter, $password);
    $stmt->execute();
    $result = $stmt->get_result();
        // Check if the query was successful, and only continue if it was
        if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $id_readed_books = $row['id_readed_added_books'];
          if (strpos($id_readed_books, ",".$book_id.":") != false) {
            echo'
            <form method="post">
            <input type="hidden" name="data" value="s">';
            $redirect_url = "see_book.php?user=$titlecompleter&school_code=$code&pass=$password";
             header("Location: $redirect_url"); 
            echo'
            </form>';
            exit();
          }else{
            echo'
            <!-- Create a hidden form with input fields for the data -->
            <form id="myForm" method="post" action="see_book.php">
              <input type="hidden" name="user" value="<?php echo $titlecompleter; ?>">
              <input type="hidden" name="school_code" value="'.$code.'">
              <input type="hidden" name="pass" value="'.$password.'">
            </form>
            
            <script>
              // Submit the form using JavaScript after setting the values of the input fields
              document.getElementById("myForm").submit();
            </script>';
          }
        }
}
}
?>
<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
<link rel="stylesheet" href="../../css/stylecss.css" />
<script src="../../js/js.js"></script>
</body>
</html>
