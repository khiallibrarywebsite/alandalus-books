

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الصفح الرئيسية - صفحة المشرف</title>

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
require_once '../../connect.php';
$c=8;
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'],$_GET['user_name'])) {
  if(isset($_GET['true'])){
    if($_GET['true'] == "true"){
      echo '<script type="text/javascript">';
      echo ' alert("تمت التعديل الكتاب بنجاح")';  //not showing an alert box.
      echo '</script>';
      

  }
}
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass']) && !empty($_GET['user_name'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code = $_GET['school_code'];
    $user_name = $_GET['user_name'];

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

  <a href="../host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"" class="logo">alandalus</a>

        
        <h2>مدارس الأندلس الأهلية</h2>


        <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="toggle-btn" class="fas fa-sun"></div>
     </div>

     <div class="profile">
        <img src="../../img/users_img/'.$img.'" class="image" alt="">
        <h3 class="name">'.$name.'</h3>
        <p class="role">معلم</p>
        <a href="../profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
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
      <p class="role">معلم</p>
      <a href="../profilehost.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'" class="btn">مشاهدة الحساب</a>
   </div>

   <nav class="navbar">
      <a href="../host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
      <a href="../../about.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-question"></i><span>من نحن</span></a>
      <a href="../host_edit/host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المضافة</span></a>
      <a href="../host_see_user/host_users_see.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>الطلاب</span></a>
      <a href="../host_add/host_add.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-plus"></i><span>إضافة كتاب</span></a>
      <a href="../contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
   </nav>

</div>';

$sql = "SELECT * FROM `users` WHERE type = 'user' and username = '$user_name'";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
        $id_readed_books1 = $row["id_readed_added_books"];
        $name_user = $row["name"];
        $scoore = $row["scoore"];
        $readedbooks = $row["readedbooks"];
        $number=0;
        echo'<center>
        <section class="user-profile">
        
           <h1 class="heading">حساب الطالب '.$name_user.'</h1>
        
           <div class="info">
        
              <div class="user">
                 <img src="../../img/users_img/'.$img.'" alt="">
                 <h3>'.$name_user.'</h3>
                 <p></p>
              </div>
        
              <div class="box-container">
           
                 <div class="box">
                    <div class="flex">
                       <i class="fas fa-book"></i>
                       <div>
                          <span>'.$readedbooks.'</span>
                          <p>عدد الكتب المقروئة </p>
                       </div>
                    </div>
                 </div>
           
                 <div class="box">
                    <div class="flex">
                       <i class="fas fa-star"></i>
                       <div>
                          <span>'.$scoore.'</span>
                          <p>عدد النقاط</p>
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
<div class="box-container"> ';

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        $book_url = $row["url"];

        // Attempt to decode the JSON string
        $id_readed = json_decode($id_readed_books1, true);

        // Check if decoding was successful and we have an array of objects
        if (is_array($id_readed) && count($id_readed) > 0 && isset($id_readed[0]['id'])) { 
            // Loop through each element of the array

            $idFound = false; // Flag variable to keep track of whether the ID is found or not

            foreach ($id_readed as $element) {
                // Check if the 'id' column of this element contains the $id value
                if ($element['id'] === $book_id) {
                    $idFound = true;
                    break; // Stop searching after the first match is found
                }
            }
            
            if ($idFound) {
               echo'
               <div class="box">
               <div class="thumb">
               <img src="'.$book_img.'" alt="">
                          <span>'.$book_author.'</span>
               </div>
               <h3 class="title">'.$book_name.'</h3>
               <a href="'.$book_url.'" class="inline-btn">قرائة الكتاب</a>
            </div>  '; // Set $f to 1 if the ID is found
            }
        } else {
         echo "<center><h1 class= 'headers'>الطالب لم يقرأ اي كتاب</h1></center>";
         break;
}
    }   
    } else {
      echo "حدث خطا لا يمكن تحميل البيانات";
  }
    echo "</div>
    </section>";




mysqli_stmt_close($stmt);

}
?>
<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
<link rel="stylesheet" href="../../css/stylecss.css" />
<script src="../../js/js.js"></script>
</body>
</html>