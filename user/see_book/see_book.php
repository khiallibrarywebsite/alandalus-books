<html>
<head>
<meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php 
require_once '../../connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'],$_GET['id'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass']) && !empty($_GET['id'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];
    $id_book = $_GET['id'];

    // Use parameterized queries to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT * FROM `user_$code` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $titlecompleter, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful, and only continue if it was
    if ($result && mysqli_num_rows($result) > 0) {
      // Use the fetch_assoc() method only once to retrieve the name
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $stage = $row['stage'];

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
    $table_name= $code.'_'.$stage.'_books';
    $table= 'user_'.$code;

// Retrieve all books from the table
$sql = "SELECT * FROM $table_name WHERE id=$id_book";
$result = mysqli_query($conn, $sql);
$go = sprintf("../user.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
echo "<a href='$go'>رجوع</a>";

// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
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



        echo '<form  method="POST" class="container">
        <img src='.$img.' style="width:118px; height: 179px" class="img-fluid img-thumbnail shadow" id="book-img" alt="Not Found" onerror="this.src=\"../img/A.png\"">
        <h4>'.$Name.'</h4>
        <h5>'.$writer.'</h5>
        <a href="'.$url.'">تحميل الكتاب</a>
        <p>يجب حل الأسئلة للحصول علي النقاط</p>
        <br><br><br><br>
        <p>--------------------------------------------------</p>
        <br><br><br><br>
        <h2>الأسئلة</h2>
        <br><br>
        <div  style="background-color: #3E6BE6;>
        <label class="label"   name="new_q1">:السؤال الأول</label>
        <label for="new_q1">'.$q2.'</label>
        </div>

        <div class="div" style="background-color: #f7f7f7;">
        <div class="question">
          <input type="radio" id="q1a1" name="q1ak" value="'.$s_q1a1.'">
          <label for="q1a1">'.$s_q1a1.'</label>
        </div>
      
        <div class="question">
          <input type="radio" id="q1a2" name="q1ak" value="'.$s_q1a2.'">
          <label for="q1a2">'.$s_q1a2.'</label>
        </div>
      
        <div class="question">
          <input type="radio" id="q1a3" name="q1ak" value="'.$s_q1a3.'" >
          <label for="q1a3">'.$s_q1a3.'</label>
  
        </div>
        <img id="x1" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
        <img id="t1" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
      </div>
      <br><br>
      <div  style="background-color: #3E6BE6;>
      <label class="label"  name="new_q2">:السؤال الثاني</label>
      <label for="new_q2">'.$q2.'</label>
      </div>

      <div class="div" style="background-color: #f7f7f7;">
      <div class="question">
        <input type="radio" id="q2a1" name="q2ak" value="'.$s_q2a1.'">
        <label for="q2a1">'.$s_q2a1.'</label>
      </div>
    
      <div class="question">
        <input type="radio" id="q2a2" name="q2ak" value="'.$s_q2a2.'">
        <label for="q2a2">'.$s_q2a2.'</label>
      </div>
    
      <div class="question">
        <input type="radio" id="q2a3" name="q2ak" value="'.$s_q2a3.'" >
        <label for="q2a3">'.$s_q2a3.'</label>
      </div>
      <img id="x2" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
      <img id="t2" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">

    </div>
    <br><br>
    <div  style="background-color: #3E6BE6;>
    <label class="label"   name="new_q3">:السؤال الثالث</label>
    <label for="new_q3">'.$q2.'</label>
    </div>

    <div class="div" style="background-color: #f7f7f7;">
    <div class="question">
      <input type="radio" id="q3a1" name="q3ak" value="'.$s_q3a1.'">
      <label for="q3a1">'.$s_q3a1.'</label>
    </div>
  
    <div class="question">
      <input type="radio" id="q3a2" name="q3ak" value="'.$s_q3a2.'">
      <label for="q3a2">'.$s_q3a2.'</label>
    </div>
  
    <div class="question">
      <input type="radio" id="q3a3" name="q3ak" value="'.$s_q3a3.'" >
      <label for="q3a3">'.$s_q3a3.'</label>

    </div>
    <img id="x3" src="../../img/x.png" style="display:none; weight: 50px; height: 50px;">
    <img id="t3" src="../../img/t.png" style="display:none; weight: 50px; height: 50px;">
  </div>
  <input type="submit" name="post" value="ارسال" class="btn btn-primary mt-2">

        </form>';
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
          return;
        }
      }
      $sa_q1ak =  mysqli_real_escape_string($conn, $_POST['q1ak']);
      $sa_q2ak =  mysqli_real_escape_string($conn, $_POST['q2ak']);
      $sa_q3ak =  mysqli_real_escape_string($conn, $_POST['q3ak']);

      if($sa_q1ak == $q1ak){
        $scoore=$scoore+10; 
        echo '
        <script>
        document.getElementById("t1").style.display = "block";
        </script>
        ';
      }else{
        echo '
        <script>
        document.getElementById("x1").style.display = "block";
        </script>
        ';
      }

      if($sa_q2ak == $q2ak){
        $scoore=$scoore+10;
        echo '
        <script>
        document.getElementById("t2").style.display = "block";
        </script>
        ';
      }else{
        echo '
        <script>
        document.getElementById("x2").style.display = "block";
        </script>
        ';
      }

      if($sa_q3ak == $q3ak){
        $scoore=$scoore+10;
        echo '
        <script>
        document.getElementById("t3").style.display = "block";
        </script>
        ';
      }else{
        echo '
        <script>
        document.getElementById("x3").style.display = "block";
        </script>
        ';
      }
      
      $stmt = $conn->prepare("SELECT * FROM `user_$code` WHERE `username` = ? AND `password` = ?");
      $stmt->bind_param("ss", $titlecompleter, $password);
      $stmt->execute();
      $result = $stmt->get_result();
  
      // Check if the query was successful, and only continue if it was
      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        $t_scoore = $row['scoore'];
        echo "<p>Total score: " . ($t_scoore + $scoore) . "</p>";
        $sql = "UPDATE `$table` SET `scoore` = `scoore` + '$scoore' WHERE `username` = '$titlecompleter'";

        // execute the SQL query and handle errors
        if (mysqli_query($conn, $sql)) {
          $num_rows_affected = mysqli_affected_rows($conn);
          if ($num_rows_affected == 1) {
            echo "Record updated successfully";
          } else {
            echo "No record updated";
          }
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
          mysqli_close($conn);
          }
        

      }

}
}

?>
</center>
</body>
</html>