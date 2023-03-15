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

   <style>
  /* Style the book form */
form .container {
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-bottom: 30px;
  max-width: 10%;
}

/* Style the book cover image */

.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin-top: 30px;
  max-width: 80%;

}



.question {
  display: block;
}

.div {
  margin-bottom: 10px;
  padding: 20px;
  border-radius: 10px;
  width: 100%;
}

.label {
  display: block;
  width: 150px;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #fff;
}

.input {
  display: inline-block;
  width: 300px;
  font-size: 18px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: none;
  padding: 5px;
}
/* Style the book title and author name */
form h4, h5 {
  margin: 0;
  padding: 0;
  width: 100%;

}

form h4 {
  font-size: 30px;
  font-weight: bold;
  margin-bottom: 5px;
  width: 100%;

}

form h5 {
  font-size: 24px;
  font-weight: normal;
  margin-bottom: 10px;
  width: 100%;

}
form p{
  font-size: 12px;
  font-weight: normal;
  margin-bottom: 10px;
  width: 100%;
}
/* Style the link to download the book */
form a {
  display: block;
  margin-top: 10px;
  font-size: 16px;
  font-weight: bold;
  text-decoration: none;
  color: #3E6BE6;
}

/* Style the question div */
form div {
  margin: 10px 0;
  padding: 10px;
  width: 100%;

}

.btn {
  background-color: #3E6BE6;
  color: #fff;
  padding: 10px 20px;
  font-size: 18px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
}

/* Style the label for each question */
.label {
  display: block;
  margin-bottom: 5px;
  font-size: 18px;
  font-weight: bold;
  color: #fff;
}

/* Style each answer choice */
.question {
  margin: 10px 0;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
}

.question input[type=radio] {
  display: none;
}

.radio_text {
    border: 2px solid #20B2AA;
}
.side-bar{
   position: fixed;
   top: 0; left: 0;
   width: 30rem;
   background-color: var(--white);
   height: 100vh;
   border-right: var(--border);
   z-index: 1200;
   overflow-y: auto; /* add this line */
}

.question label {
  display: block;
  margin: 10px 0;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  color: black;
}

.question label:hover {
  background-color: #3E6BE6;
}

.question input[type=radio]:checked + label {
  background-color: #3E6BE6;
}

label {
  display: block;
  margin-bottom: 10px;
  color: #fff;
}

input[type="radio"] {
  color: black;
}
.footer {
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
$s=0;
$f=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'],$_GET['id'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass']) && !empty($_GET['id'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];
    $id = $_GET['id'];

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
      $img = $row["img"];
      if ($row['id_readed_added_books'] === '') {
        $f = 2;
        
    } else {
      $idadded = $row['id_readed_added_books'];
        // Attempt to decode the JSON string
        $id_readed = json_decode($idadded, true);
        // Check if decoding was successful and we have an array of objects
        if (is_array($id_readed) && count($id_readed) > 0 && isset($id_readed[0]['id'])) { 
            // Loop through each element of the array
            $idFound = false; // Flag variable to keep track of whether the ID is found or not

            foreach ($id_readed as $element) {
                // Check if the 'id' column of this element contains the $id value
                if ($element['id'] === $id) {
                    $idFound = true;
                    break; // Stop searching after the first match is found
                }
            }
            
            if ($idFound) {
                $f = 1; // Set $f to 1 if the ID is found
            } else {
                $f = 2; // Set $f to 2 if the ID is not found
            }
        } else {
            // Invalid JSON or array structure, set $f to 2
           $f = 2;
           print_r($id_readed);
           print_r($row['id_readed_added_books']);
}
    }
    
  
} else {
echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}
} else {
echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
$s = 1;
}
} else{
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

        
        <h2>مدارس الأندلس الأهلية</h2>


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
   <a href="book_readed.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المقروئة</span></a>
   <a href="../see_host/see_host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>المعلمون</span></a>
   <a href="library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>المكتبة</span></a>
   <a href="../contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
</nav>

</div> <center>';
require_once '../../connect.php';

// Retrieve all books from the table
$sql = "SELECT * FROM books where id = '$id'";
$result = mysqli_query($conn, $sql);


// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $x=5;
    $Name = $row['Name'];
    $writer = $row['writer'];
    $img = $row['img'];
    $url = $row['url'];
    $q1 = $row['q1'];
    $q1a1 = $row['q1a1'];
    $q1a2 = $row['q1a2'];
    $q1ak = $row['q1ak'];
    $s_q1a1 = "";
    $s_q1a2 = "";
    $s_q1a3 = "";
    $q2 = $row['q2'];
    $q2a1 = $row['q2a1'];
    $q2a2 = $row['q2a2'];
    $q2ak = $row['q2ak'];
    $s_q2a1 = "";
    $s_q2a2 = "";
    $s_q2a3 = "";
    $q3 = $row['q3'];
    $q3a1 = $row['q3a1'];
    $q3a2 = $row['q3a2'];
    $q3ak = $row['q3ak'];
    $s_q3a1 = "";
    $s_q3a2 = "";
    $s_q3a3 = "";



    // Create an array with the answer choices
    $answer_choices = array($q1a1, $q1a2, $q1ak);

    // Shuffle the array to randomize the order
    shuffle($answer_choices);

    // Assign the first three elements to the variables
    $s_q1a1 = $answer_choices[0];
    $s_q1a2 = $answer_choices[1];
    $s_q1a3 = $answer_choices[2];


    // Create an array with the answer choices
    $answer_choices = array($q2a1, $q2a2, $q2ak);
    
    // Shuffle the array to randomize the order
    shuffle($answer_choices);

    // Assign the first three elements to the variables
    $s_q2a1 = $answer_choices[0];
    $s_q2a2 = $answer_choices[1];
    $s_q2a3 = $answer_choices[2];



    // Create an array with the answer choices
    $answer_choices = array($q3a1, $q3a2, $q3ak);
    
    // Shuffle the array to randomize the order
    shuffle($answer_choices);

    // Assign the first three elements to the variables
    $s_q3a1 = $answer_choices[0];
    $s_q3a2 = $answer_choices[1];
    $s_q3a3 = $answer_choices[2];



    echo '
  <section class="courses">
<div class="box-container">
<center>
<div style="width: 100%;">
        <div class="box"  style="width: 300px;">
        <div class="thumb">
        <img src="' . $img . '" style="width: 135px; height: 200px" alt="Not Found" onerror="this.src=\'../../img/A.png\'">
                   <span>' . $writer . '</span>
        </div>
        <h3 class="title">' . $Name . '</h3>
        
        <a href="' . $url . '" class ="inline-btn">تحميل الكتاب</a></div>
        ';
        if($f==2){
        echo'
<br><br>
        <p  style=" width: 100%;" >يجب حل الأسئلة للحصول على النقاط</p>
     </div></center></div>
  </section>';

echo '<form method="POST" class="container">

      <br><br><br><br>
      <br><br><br><br>
      <h4 style=" width: 100%;">الأسئلة</h4>
      <BR></BR>

      <br><br>

    <div class="div" style="background-color: #3E6BE6; display: block; ">
    <label  name="new_q1">:السؤال الأول</label>
    <label  class="label" for="new_q1">'.$q1.'</label>
    </div>

    <div class="div" style="background-color: #f7f7f7;">
    <div class="question" style="display: block;">
      <input type="radio" id="q1a1" name="q1ak" value="'.$s_q1a1.'">
      <label for="q1a1"  class="radio_text">'.$s_q1a1.'</label>
    </div>
  
    <div class="question" style="display: block;">
      <input type="radio" id="q1a2" name="q1ak" value="'.$s_q1a2.'">
      <label for="q1a2" class="radio_text">'.$s_q1a2.'</label>
    </div>
  
    <div class="question" style="display: block;">
      <input type="radio" id="q1a3" name="q1ak" value="'.$s_q1a3.'" required>
      <label for="q1a3" class="radio_text">'.$s_q1a3.'</label>

    </div>
    <img id="x1" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
    <img id="t1" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
    <h4 id="h1" style="display:none;">الإجابة الصحيحة : '.$q1ak.'</h4>
  </div>
  <br><br>
  <BR></BR>
  <BR></BR>

  <div   class="div" style="background-color: #3E6BE6; display: block;">
  <label   name="new_q2">:السؤال الثاني</label>
  <label   class="label"  for="new_q2">'.$q2.'</label>
  </div>

  <div class="div" style="background-color: #f7f7f7;">
  <div class="question" style="display: block;">
    <input type="radio" id="q2a1" name="q2ak" value="'.$s_q2a1.'">
    <label for="q2a1" class="radio_text">'.$s_q2a1.'</label>
  </div>

  <div class="question" style="display: block;">
    <input type="radio" id="q2a2" name="q2ak" value="'.$s_q2a2.'">
    <label for="q2a2" class="radio_text">'.$s_q2a2.'</label>
  </div>

  <div class="question" style="display: block;">
    <input type="radio" id="q2a3" name="q2ak" value="'.$s_q2a3.'" required>
    <label for="q2a3" class="radio_text">'.$s_q2a3.'</label>
  </div>
  <img id="x2" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
  <img id="t2" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
  <h4 id="h2" style="display:none;">الإجابة الصحيحة : '.$q2ak.'</h4>


</div>
<br><br>
<div class="div" style="background-color: #3E6BE6; display: block;">
<label    name="new_q3">:السؤال الثالث</label>
<label    class="label" for="new_q3">'.$q3.'</label>
</div>

<div class="div" style="background-color: #f7f7f7;">
<div class="question" style="display: block;">
  <input type="radio" id="q3a1" name="q3ak" value="'.$s_q3a1.'">
  <label for="q3a1" class="radio_text">'.$s_q3a1.'</label>
</div>

<div class="question" style="display: block;">
  <input type="radio" id="q3a2" name="q3ak" value="'.$s_q3a2.'">
  <label for="q3a2" class="radio_text">'.$s_q3a2.'</label>
</div>

<div class="question" style="display: block;">
  <input type="radio" id="q3a3" name="q3ak" value="'.$s_q3a3.'" required >
  <label for="q3a3" class="radio_text">'.$s_q3a3.'</label>

</div>
<img id="x3" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
<img id="t3" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
<h4 id="h3" style="display:none;">الإجابة الصحيحة : '.$q3ak.'</h4>
</div>
<BR></BR>
<BR></BR>

<input type="submit" name="post" value="ارسال" class="btn btn-primary mt-2">
</form>';

}else{
  $see_answers = 'see_answers.php?user=' . urlencode($titlecompleter) . '&school_code=' . urlencode($code) . '&pass=' . urlencode($password) . '&id=' . urlencode($id);
  echo'<a href="' . $see_answers . '" class ="inline-btn">مشاهدة الإجابات</a></div>';

}
}

} else {
echo "يرجي المحاولة مرة اخري";
}





// Handle form submissions
if(isset($_POST['post'])){
$scoore=0;
$requiredFields = [
    'q1ak',
    'q2ak',
    'q3ak',
  ];
  
  foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
      echo "الرجاء الإجابة علي الأسئلة";
      return;echo"<script>$('#loading-screen').hide();</script>";
    }
  }

  $sa_q1ak =  mysqli_real_escape_string($conn, $_POST['q1ak']);
  $q1a1 =  $s_q1a1;
  $q1a2 =  $s_q1a2;
  $q1a3 =  $s_q1a3;

  $sa_q2ak =  mysqli_real_escape_string($conn, $_POST['q2ak']);
  $q2a1 =  $s_q2a1;
  $q2a2 =  $s_q2a2;
  $q2a3 =  $s_q2a3;
  
  $sa_q3ak =  mysqli_real_escape_string($conn, $_POST['q3ak']);
  $q3a1 =  $s_q3a1;
  $q3a2 =  $s_q3a2;
  $q3a3 =  $s_q3a3;
  $a=0;
  $b=0;
  $c=0;
  $x=0;


if ($x==0){
if($sa_q1ak  == $q1a1){
  echo '
  <script>
  const a = document.getElementById("q1a1");
  a.checked = true;
  </script>
  ';
  $a=1;
}elseif ($sa_q1ak  == $q1a2){
  echo '
  <script>
  const a = document.getElementById("q1a2");
  a.checked = true;
  </script>
  ';
  $a=1;
}elseif ($sa_q1ak  == $q1a3){
  echo '
  <script>
  const a = document.getElementById("q1a3");
  a.checked = true;
  </script>
  ';
  $a=1;
}

if( $a == 1){
if($sa_q3ak == $q3a1){
  echo '
  <script>
  const b = document.getElementById("q3a1");
  b.checked = true;
  </script>
  ';
  $b=1;
}elseif ($sa_q3ak == $q3a2){
  echo '
  <script>
  const b = document.getElementById("q3a2");
  b.checked = true;
  </script>
  ';
  $b=1;
}elseif ($sa_q3ak  == $q3a3){
  echo '
  <script>
  const b = document.getElementById("q3a3");
  b.checked = true;
  </script>
  ';
  $b=1;
}
}
if($b==1 && $a == 1){
if($sa_q2ak == $q2a1){
  echo '
  <script>
  const c = document.getElementById("q2a1");
  c.checked = true;
  </script>
  ';
  $c=1;
}elseif ($sa_q2ak == $q2a2){
  echo '
  <script>
  const c = document.getElementById("q2a2");
  c.checked = true;
  </script>
  ';
  $c=1;
}elseif ($sa_q2ak == $q2a3){
  echo '
  <script>
  const c = document.getElementById("q2a3");
  c.checked = true;
  </script>
  ';
  $c=1;
}
}
}
if ($a == 1 && $b == 1 && $c == 1){
$scoore=0;
  if($sa_q1ak == $q1ak){
    $scoore=$scoore+10; 
    echo '
    <script>
    document.getElementById("t1").style.display = "block";
    </script>
    ';
    $x=2;
  }else{
    echo '
    <script>
    document.getElementById("x1").style.display = "block";
    document.getElementById("h1").style.display = "block";
    </script>
    ';
    $x=2;
  }

  if($sa_q2ak == $q2ak){
    $scoore=$scoore+10;
    echo '
    <script>
    document.getElementById("t2").style.display = "block";
    </script>
    ';
    $x=2;
  }else{
    echo '
    <script>
    document.getElementById("x2").style.display = "block";
    document.getElementById("h2").style.display = "block";
    </script>
    ';
    $x=2;
  }

  if($sa_q3ak == $q3ak){
    $scoore=$scoore+10;
    echo '
    <script>
    document.getElementById("t3").style.display = "block";
    </script>
    ';
    if ($scoore >10){
    $x=2;
  }else{
    echo "يرجى قراءة الكتاب قبل الإجابة علي الأسئلة" ;   

  }
  }else{
    echo '
    <script>
    document.getElementById("x3").style.display = "block";
    document.getElementById("h3").style.display = "block";
    </script>
    ';
    if ($scoore >10){
      $x=2;
    }else{
      echo "يرجى قراءة الكتاب قبل الإجابة علي الأسئلة" ;   
  
    }
  }
}
if ($x==2){
  $xf=true;
  $fx=false;
  $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? AND `stage` = '$stage' AND `school` = '$code'");
  $stmt->bind_param("ss", $titlecompleter, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the query was successful, and only continue if it was
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $rade= $row['id_readed_added_books'];
      if ($rade === '') {
        $book1 = array(
          array("id" => $id, "q1" => $sa_q1ak, "q2" => $sa_q2ak, "q3" => $sa_q3ak),
        );
        $book = json_encode($book1,  JSON_UNESCAPED_UNICODE);
        // Perform your task here
        $scoore1 =  $row['scoore']+$scoore ;
        $sql = "UPDATE users SET id_readed_added_books = '$book', scoore = '$scoore1', readedbooks = readedbooks + 1 WHERE username = '$titlecompleter' AND password = '$password' AND stage = '$stage' AND school = '$code';";
        // execute the SQL query and handle errors
        if (mysqli_query($conn, $sql)) {
          $num_rows_affected = mysqli_affected_rows($conn);
          if ($num_rows_affected == 1) {
            // redirect to another page
            $see_answers = 'see_answers.php?user=' . urlencode($titlecompleter) . '&school_code=' . urlencode($code) . '&pass=' . urlencode($password) . '&id=' . urlencode($id). '&true=true';
            header("Location: $see_answers");
            exit();
          }}

          }else{
            $id_readed = json_decode($rade, true);
            $id_readed_books = $id_readed;
            if (is_array($id_readed_books) && count($id_readed_books) > 0 && isset($id_readed_books[0]['id'])) { 
  

              // Loop through each element of the array
              foreach ($id_readed_books as $element) {       
                if ($element['id'] == $id) {
                  $xf=false;
                  $fx=true;
                  break;
                }}}else{
                  echo "isset(id_readed_books[0]['id']))";
                }
                    // Set $fx to true after the foreach loop completes
              $fx = true;
    if($fx){
      if($xf === false){echo "تم قراءة الكتاب من قبل" ;}else{
          $book1 = array(
            "id" => $id,
            "q1" => $sa_q1ak,
            "q2" => $sa_q2ak,
            "q3" => $sa_q3ak
          );
          array_push($id_readed_books, $book1);
          $book = json_encode($id_readed_books,  JSON_UNESCAPED_UNICODE);
      
          // Fetch data from database
          $row = mysqli_fetch_assoc($result);
          $scoore1 = $row['scoore'] + $scoore;
      
          $sql = "UPDATE users SET id_readed_added_books = '$book', scoore = '$scoore1', readedbooks = readedbooks + 1 WHERE username = '$titlecompleter' AND password = '$password' AND stage = '$stage' AND school = '$code';";
      
          if (mysqli_query($conn, $sql)) {
            $num_rows_affected = mysqli_affected_rows($conn);
            if ($num_rows_affected == 1) {
              $see_answers = 'see_answers.php?user=' . urlencode($titlecompleter) . '&school_code=' . urlencode($code) . '&pass=' . urlencode($password) . '&id=' . urlencode($id). '&true=true';
              header("Location: $see_answers");
              exit();
            }
          } else {
            echo "Error updating record" ;   
          }

        }
        
}
  }
}}}}

ob_end_flush(); 
?>
<footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
</center>
<link rel="stylesheet" href="../../css/cssalandalus.css" />
<script src="../../js/jsalandalus.js"></script>
</body>
</html>
