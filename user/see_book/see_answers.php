<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/styleme.css" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9483470310411729" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
      integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe"
      crossorigin="anonymous"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css"
      rel="stylesheet"
    />
    <style>*{font-family: 'Tajawal' , sans-serif; list-style-type: none;} </style>


    <?php 
require_once '../../connect.php';
$s=0;
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
      echo'<title>حساب الطاب '.$name.'</title>';


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
<center>
<?php
if($s != 1){

    require_once '../../connect.php';

// Retrieve all books from the table
$sql = "SELECT * FROM books where stage = '$stage' AND school = '$code' AND id=$id";
$result = mysqli_query($conn, $sql);
$go = sprintf("../user.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
echo "<a href='$go'>رجوع</a>";

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
<div  style="background-color: #3E6BE6;">
<label class="label"   name="new_q1">:السؤال الأول</label>
<label for="new_q1">'.$q1.'</label>
</div>

<div class="div" style="background-color: #f7f7f7;">
<div class="question">
  <input type="radio" id="q1a1" name="q1ak" value="'.$s_q1a1.'" disabled>
  <label for="q1a1">'.$s_q1a1.'</label>
</div>

<div class="question">
  <input type="radio" id="q1a2" name="q1ak" value="'.$s_q1a2.'" disabled>
  <label for="q1a2">'.$s_q1a2.'</label>
</div>

<div class="question">
  <input type="radio" id="q1a3" name="q1ak" value="'.$s_q1a3.'"  disabled>
  <label for="q1a3">'.$s_q1a3.'</label>

</div>
<img id="x1" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
<img id="t1" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
<h4 id="h1" style="display:none;">الإجابة الصحيحة : '.$q1ak.'</h4>
</div>
<br><br>
<div  style="background-color: #3E6BE6;">
<label class="label"  name="new_q2">:السؤال الثاني</label>
<label for="new_q2">'.$q2.'</label>
</div>

<div class="div" style="background-color: #f7f7f7;">
<div class="question">
  <input type="radio" id="q2a1" name="q2ak" value="'.$s_q2a1.'" disabled>
  <label for="q2a1">'.$s_q2a1.'</label>
</div>

<div class="question">
  <input type="radio" id="q2a2" name="q2ak" value="'.$s_q2a2.'" disabled>
  <label for="q2a2">'.$s_q2a2.'</label>
</div>

<div class="question">
  <input type="radio" id="q2a3" name="q2ak" value="'.$s_q2a3.'"  disabled>
  <label for="q2a3">'.$s_q2a3.'</label>
</div>
<img id="x2" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
<img id="t2" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
<h4 id="h2" style="display:none;">الإجابة الصحيحة : '.$q2ak.'</h4>

</div>
<br><br>
<div  style="background-color: #3E6BE6;">
<label class="label"   name="new_q3">:السؤال الثالث</label>
<label for="new_q3">'.$q3.'</label>
</div>

<div class="div" style="background-color: #f7f7f7;">
<div class="question">
<input type="radio" id="q3a1" name="q3ak" value="'.$s_q3a1.'" disabled>
<label for="q3a1">'.$s_q3a1.'</label>
</div>

<div class="question">
<input type="radio" id="q3a2" name="q3ak" value="'.$s_q3a2.'" disabled>
<label for="q3a2">'.$s_q3a2.'</label>
</div>

<div class="question">
<input type="radio" id="q3a3" name="q3ak" value="'.$s_q3a3.'"  disabled>
<label for="q3a3">'.$s_q3a3.'</label>

</div>
<img id="x3" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
<img id="t3" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
<h4 id="h3" style="display:none;">الإجابة الصحيحة : '.$q3ak.'</h4>
</div>
';
    }
}

  $stmt = $conn->prepare("SELECT * FROM  `users` WHERE `username` = ? AND `password` = ? AND `stage` = '$stage' AND `school` = '$code'");
  $stmt->bind_param("ss", $titlecompleter, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Check if the query was successful, and only continue if it was
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_readed_books = $row['id_readed_added_books'];
    $scoore = $row['scoore'];
    echo "<p>مجموع نقاطك: " . ($scoore) . "</p>";
    $q1id = 0;

    if (strpos($id_readed_books, ",".$id.":".$s_q1a1) !== false) {
      $ok1 = $s_q1a1;
      echo'
      <script>
      const q1a1 = document.getElementById("q1a1");
      q1a1.checked = true;
      </script>
      ';
      $q1id = 1;

    }elseif(strpos($id_readed_books, ",".$id.":".$s_q1a2) !== false){
      $ok1 = $s_q1a2;
      echo'
      <script>
      const q1a2 = document.getElementById("q1a2");
      q1a2.checked = true;
      </script>
      ';
      $q1id = 1;

    }elseif(strpos($id_readed_books, ",".$id.":".$s_q1a3) !== false){
      $ok1 = $s_q1a3;
      echo'
      <script>
      const q1a3 = document.getElementById("q1a3");
      q1a3.checked = true;
      </script>
      ';
      $q1id = 1;
    }



if($q1id == 1){
    if(strpos($id_readed_books, ",".$id.":".$ok1.":".$s_q2a1) !== false) {
      $ok2 = $s_q2a1;
      echo'
      <script>
      const q2a1 = document.getElementById("q2a1");
      q2a1.checked = true;
      </script>
      ';
      $q2id = 2;

    }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$s_q2a2) !== false) {
      $ok2 = $s_q2a2;
      echo'
      <script>
      const q2a2 = document.getElementById("q2a2");
      q2a2.checked = true;
      </script>
      ';
      $q2id = 2;

    }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$s_q2a3) !== false) {
      $ok2 = $s_q2a3;
      echo'
      <script>
      const q2a3 = document.getElementById("q2a3");
      q2a3.checked = true;
      </script>
      ';
      $q2id = 2;

    }


    if($q2id == 2){
      if(strpos($id_readed_books, ",".$id.":".$ok1.":".$ok2.":".$s_q3a1.",") !== false) {
        $ok3 = $s_q3a1;
        echo'
        <script>
        const q3a1 = document.getElementById("q3a1");
        q3a1.checked = true;
        </script>
        ';
        $q3id = 3;
  
      }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$ok2.":".$s_q3a2.",") !== false) {
        $ok3 = $s_q3a2;
        echo'
        <script>
        const q3a2 = document.getElementById("q3a2");
        q3a2.checked = true;
        </script>
        ';
        $q3id = 3;
  
      }elseif(strpos($id_readed_books, ",".$id.":".$ok1.":".$ok2.":".$s_q3a3.",") !== false) {
        $ok3 = $s_q3a3;
        echo'
        <script>
        const q3a3 = document.getElementById("q3a3");
        q3a3.checked = true;
        </script>
        ';
        $q3id = 3;
  
      }
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

  

  ?>
</center>

  </body>
</html>