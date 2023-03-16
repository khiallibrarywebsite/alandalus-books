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
.form  {
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-bottom: 30px;
  max-width: 10%;
}

/* Style the book cover image */

.form {
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
.form h4, h5 {
  margin: 0;
  padding: 0;
  width: 100%;

}

.form h4 {
  font-size: 30px;
  font-weight: bold;
  margin-bottom: 5px;
  width: 100%;

}

.form h5 {
  font-size: 24px;
  font-weight: normal;
  margin-bottom: 10px;
  width: 100%;

}
.form p{
  font-size: 12px;
  font-weight: normal;
  margin-bottom: 10px;
  width: 100%;
}
.p{
  font-size: 30px;
  font-weight: normal;
  margin-bottom: 10px;
  width: 100%;
}
/* Style the link to download the book */
.form a {
  display: block;
  margin-top: 10px;
  font-size: 16px;
  font-weight: bold;
  text-decoration: none;
  color: #3E6BE6;
}

/* Style the question div */
.form div {
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

.question label {
  display: block;
  margin: 10px 0;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  color: black;
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
</style>


   <?php 
require_once '../../connect.php';
$s=0;
$f=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'],$_GET['id'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass']) && !empty($_GET['id'])) {
    if(isset($_GET['true'])){
      if($_GET['true'] == "true"){
        echo '<script type="text/javascript">';
        echo ' alert("تم إضافة النقاط الي حسابك")';  //not showing an alert box.
        echo '</script>';
        
  
    }
  }
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
      if ($row['id_readed_added_books'] === ' ') {
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
   <a href="book_readed.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>الكتب المقروئة</span></a>
   <a href="../see_host/see_host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-male"></i><span>المعلمون</span></a>
   <a href="library.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fa-solid fa-book"></i><span>المكتبة</span></a>
   <a href="../contact.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><i class="fas fa-headset"></i><span>راسلنا</span></a>
</nav>

</div> <center>';
if($f == 1){
    require_once '../../connect.php';

// Retrieve all books from the table
$sql = "SELECT * FROM books where stage = '$stage' AND school = '$code' AND id=$id";
$result = mysqli_query($conn, $sql);

// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
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



echo'
<br><br>
<br>
<div class = "form">
<div class="div" style="background-color: #3E6BE6; display: block; ">
<label  name="new_q1">:السؤال الأول</label>
<label  class="label" for="new_q1">'.$q1.'</label>
</div>

<div class="div" style="background-color: #f7f7f7;">
<div class="question" style="display: block;">
  <input type="radio" id="q1a1" name="'.$s_q1a1.'" value="'.$s_q1a1.'" disabled>
  <label for="q1a1"  class="radio_text">'.$s_q1a1.'</label>
</div>

<div class="question" style="display: block;">
  <input type="radio" id="q1a2" name="'.$s_q1a2.'" value="'.$s_q1a2.'" disabled>
  <label for="q1a2" class="radio_text">'.$s_q1a2.'</label>
</div>

<div class="question" style="display: block;">
  <input type="radio" id="q1a3" name="'.$s_q1a3.'" value="'.$s_q1a3.'"  disabled>
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
<input type="radio" id="q2a1" name="'.$s_q2a1.'" value="'.$s_q2a1.'" disabled>
<label for="q2a1" class="radio_text">'.$s_q2a1.'</label>
</div>

<div class="question" style="display: block;">
<input type="radio" id="q2a2" name="'.$s_q2a2.'" value="'.$s_q2a2.'" disabled>
<label for="q2a2" class="radio_text">'.$s_q2a2.'</label>
</div>

<div class="question" style="display: block;">
<input type="radio" id="q2a3" name="'.$s_q2a3.'" value="'.$s_q2a3.'"  disabled>
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
<input type="radio" id="q3a1" name="'.$s_q3a1.'" value="'.$s_q3a1.'" disabled>
<label for="q3a1" class="radio_text">'.$s_q3a1.'</label>
</div>

<div class="question" style="display: block;">
<input type="radio" id="q3a2" name="'.$s_q3a2.'" value="'.$s_q3a2.'" disabled>
<label for="q3a2" class="radio_text">'.$s_q3a2.'</label>
</div>

<div class="question" style="display: block;">
<input type="radio" id="q3a3" name="'.$s_q3a3.'" value="'.$s_q3a3.'" disabled disabled >
<label for="q3a3" class="radio_text">'.$s_q3a3.'</label>

</div>
<img id="x3" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
<img id="t3" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
<h4 id="h3" style="display:none;">الإجابة الصحيحة : '.$q3ak.'</h4>
</div>
</div>
';
    }
}
$q3id = 1;
  $stmt = $conn->prepare("SELECT * FROM  `users` WHERE `username` = ? AND `password` = ? AND `stage` = '$stage' AND `school` = '$code'");
  $stmt->bind_param("ss", $titlecompleter, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Check if the query was successful, and only continue if it was
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idreadedbooks = $row['id_readed_added_books'];
    $scoore = $row['scoore'];
    echo "<p class = 'p'>مجموع نقاطك: " . ($scoore) . "</p>";
    $id_readed_books = json_decode($idreadedbooks, true);
            // Find the book with the given ID
            $book = null;
            foreach ($id_readed_books as $b) {
              if ($b['id'] == $id) {
                $book = $b;
                break;
              }
            }
            // Check if the book was found
            if ($book != null) {
              // Get the q1, q2, and q3 values
              $ok1 = $book['q1'];
              $ok2 = $book['q2'];
              $ok3 = $book['q3'];
              echo '
              <script>
              const q1ak = document.getElementsByName("'.$ok1.'");
              for (let i = 0; i < q1ak.length; i++) {
                q1ak[i].removeAttribute("disabled");
                q1ak[i].checked = true;
                q1ak[i].setAttribute("disabled", "disabled");
              }
                
                const q2ak = document.getElementsByName("'.$ok2.'");
                for (let i = 0; i < q2ak.length; i++) {
                  q2ak[i].removeAttribute("disabled");
                  q2ak[i].checked = true;
                  q2ak[i].setAttribute("disabled", "disabled");
                }
                
                const q3ak = document.getElementsByName("'.$ok3.'");
                for (let i = 0; i < q3ak.length; i++) {
                  q3ak[i].removeAttribute("disabled");
                  q3ak[i].checked = true;
                  q3ak[i].setAttribute("disabled", "disabled");
                }
              </script>
              ';
              $q3id = 3;

                  } else {
                    // Book with the given ID was not found
                    echo "Book not found";
                  }

    if($q3id == 3){
        if($ok1 == $q1ak){
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
  
        if($ok2 == $q2ak){
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
  
        if($ok3 == $q3ak){
          echo '
          <script>
          document.getElementById("t3").style.display = "block";
          </script>
          ';
          $x=2;
        }else{
          echo '
          <script>
          document.getElementById("x3").style.display = "block";
          document.getElementById("h3").style.display = "block";
          </script>
          ';

        }
       }



            mysqli_close($conn);
           
    }
  }
}

  

ob_end_flush(); 
?>
</center><footer class="footer">

&copy; copyright @ 2022 by <span>alandalus school</span> | all rights reserved!

</footer>
  <link rel="stylesheet" href="../../css/cssalandalus.css" />
  <script src="../../js/jsalandalus.js"></script>
  </body>
  </html>



  































<!-- //     if (strpos($id_readed_books, ",".$id.":".$s_q1a1) !== false) {
//       $ok1 = $s_q1a1;
//       echo'
//       <script>
//       const q1a1 = document.getElementById("q1a1");
//       q1a1.checked = true;
//       </script>
//       ';
//       $q1id = 1;

//     }elseif(strpos($id_readed_books, ",".$id.":".$s_q1a2) !== false){
//       $ok1 = $s_q1a2;
//       echo'
//       <script>
//       const q1a2 = document.getElementById("q1a2");
//       q1a2.checked = true;
//       </script>
//       ';
//       $q1id = 1;

//     }elseif(strpos($id_readed_books, ",".$id.":".$s_q1a3) !== false){
//       $ok1 = $s_q1a3;
//       echo'
//       <script>
//       const q1a3 = document.getElementById("q1a3");
//       q1a3.checked = true;
//       </script>
//       ';
//       $q1id = 1;
//     }



// if($q1id == 1){
//     if(strpos($id_readed_books, ",".$id.":".$ok1.":".$s_q2a1) !== false) {
//       $ok2 = $s_q2a1;
//       echo'
//       <script>
//       const q2a1 = document.getElementById("q2a1");
//       q2a1.checked = true;
//       </script>
//       ';
//       $q2id = 2;

//     }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$s_q2a2) !== false) {
//       $ok2 = $s_q2a2;
//       echo'
//       <script>
//       const q2a2 = document.getElementById("q2a2");
//       q2a2.checked = true;
//       </script>
//       ';
//       $q2id = 2;

//     }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$s_q2a3) !== false) {
//       $ok2 = $s_q2a3;
//       echo'
//       <script>
//       const q2a3 = document.getElementById("q2a3");
//       q2a3.checked = true;
//       </script>
//       ';
//       $q2id = 2;

//     }


//     if($q2id == 2){
//       if(strpos($id_readed_books, ",".$id.":".$ok1.":".$ok2.":".$s_q3a1.",") !== false) {
//         $ok3 = $s_q3a1;
//         echo'
//         <script>
//         const q3a1 = document.getElementById("q3a1");
//         q3a1.checked = true;
//         </script>
//         ';
//         $q3id = 3;
  
//       }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$ok2.":".$s_q3a2.",") !== false) {
//         $ok3 = $s_q3a2;
//         echo'
//         <script>
//         const q3a2 = document.getElementById("q3a2");
//         q3a2.checked = true;
//         </script>
//         ';
//         $q3id = 3;
  
//       }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$ok2.":".$s_q3a3.",") !== false) {
//         $ok3 = $s_q3a3;
//         echo'
//         <script>
//         const q3a3 = document.getElementById("q3a3");
//         q3a3.checked = true;
//         </script>
//         ';
//         $q3id = 3;
  
//       }
// }
//     } -->