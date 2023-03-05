<!DOCTYPE html>
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
<style>
  /* Set font family for all elements */
* {
  font-family: 'Tajawal', sans-serif;
  list-style-type: none;
}
body {
  font-family: Arial, sans-serif;
  color:  #D8D8D8;
  background-color:  #D8D8D8;
}
</style>

   <meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
require_once '../../connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'],$_GET['id']) ){
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass']) && !empty($_GET['id'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];
    $id=$_GET['id'];

    // Use parameterized queries to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?   AND type = 'host' ");
    $stmt->bind_param("ss", $titlecompleter, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful, and only continue if it was
    if ($result && mysqli_num_rows($result) > 0) {
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $type = $row["type"];
      $stage = $row["stage"];
      $code = $row["school"];

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
    echo'
    <nav class="nav">
    <div class="nav-left">
      <a href="#">
        <img src="../img/img.png" alt="Logo" class="nav-img">
      </a>
    </div>
    <div class="nav-center">
  
  <center>
      <p class="nav-center-p"> اهلا بك استاذ</p>
      <p class="nav-center-p">'.$name.'</p> 
      </center>
      
  
    </div>
    <div class="nav-right">
      <a href="index.php" class="nav-right-a">من نحن</a>
    </div>
        <a href="../login.php"><button class="nav-button">login out</button></a>
  
  </nav>
';
    require_once '../../connect.php';
    $sql = "SELECT * FROM books WHERE id='$id'  AND stage='$stage' AND school='$code'";
    $result = mysqli_query($conn, $sql);
    
    // Generate a form for each book
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $Name = $row['Name'];
            $writer = $row['writer'];
            $img = $row['img'];
            $url = $row['url'];
            $q1 = $row['q1'];
            $q1a1 = $row['q1a1'];
            $q1a2 = $row['q1a2'];
            $q1ak = $row['q1ak'];
            $q2 = $row['q2'];
            $q2a1 = $row['q2a1'];
            $q2a2 = $row['q2a2'];
            $q2ak = $row['q2ak'];
            $q3 = $row['q3'];
            $q3a1 = $row['q3a1'];
            $q3a2 = $row['q3a2'];
            $q3ak = $row['q3ak'];
            $new_Name = 0;
            $new_writer = 0;
            $new_img = 0;
            $new_url = 0;
            // Escape user inputs for security
            $new_q1 = 0;
            $new_q2 = 0;
            $new_q3 = 0;
            $new_q1 = 0;
            $new_q2 = 0;
            $new_q3 = 0;
            $new_q1ak =$q1ak;
            $new_q1a1= 0;
            $new_q1a2= 0;
            $new_q2ak = $q2ak;
            $new_q2a1= 0;
            $new_q2a2= 0;
            $new_q3ak = $q3ak;
            $new_q3a1= 0;
            $new_q3a2= 0;

            echo '

            <a href="host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'">رجوع</a>
            <form class="form">
            <center>
            <input type="hidden" name="id" value="'.$id.'" />
            <label class="form-label">اسم الكتاب</label>
            <input type="text" name="new_Name" class="form-control" value="'.$Name.'"  />
            <label class="form-label">اسم المؤلف</label>
            <input type="text" name="new_writer" class="form-control" value="'.$writer.'" />
            <label class="form-label">رابط الصورة</label>
            <input type="text" name="new_img" class="form-control" value="'.$img.'" />
            <label class="form-label">رابط الكتاب</label>
            <input type="text" name="new_url" class="form-control" value="'.$url.'" />

            <label class="form-label">سؤال الأول</label>
            <input type="text" name="new_q1" class="form-control" value="'.$q1.'" />
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q1a1" name="new_q1ak" value="'.$q1a1.'" class ="form-radio-input">
              <label for="q1a1" class= "form-text1">'.$q1a1.'</label>
            </div></div>
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q1a2" name="new_q1ak" value="'.$q1a2.'"  class ="form-radio-input">
              <label for="q1a2" class= "form-text1">'.$q1a2.'</label>
            </div></div>
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q1a3" name="new_q1ak" value="'.$q1ak.'"  class ="form-radio-input">
              <label for="q1a3" class= "form-text1">'.$q1ak.'</label></div></div>
              <script>
              const new_q1a3t = document.getElementById("q1a3");
              new_q1a3t.checked = true;
            </script>
              

          
            <label class="form-label">سؤال الثاني</label>
            <input type="text" name="new_q2" class="form-control" value="'.$q2.'" />
            <div class ="container"><div class="form-row">
              <input type="radio" id="q2a1" name="new_q2ak" value="'.$q2a1.'" class ="form-radio-input">
              <label for="q2a1" class= "form-text1">'.$q2a1.'</label>
            </div></div>
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q2a2" name="new_q2ak" value="'.$q2a2.'" class ="form-radio-input">
              <label for="q2a2" class= "form-text1">'.$q2a2.'</label>
            </div></div>
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q2a3" name="new_q2ak" value="'.$q2ak.'"  class ="form-radio-input">
              <label  for="q2a3"  class= "form-text1">'.$q2ak.'</label></div></div>
              <script>
              const new_q2a3t = document.getElementById("q2a3");
              new_q2a3t.checked = true;
            </script>



            <label class="form-label">سؤال الثالث</label>
            <input type="text" name="new_q3" class="form-control" value="'.$q3.'" />
            <div class ="container"><div class="form-row">
              <input type="radio" id="q3a1" name="new_q3ak" value="'.$q3a1.'" class ="form-radio-input">
              <label for="q3a1" class= "form-text1">'.$q3a1.'</label>
            </div></div>
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q3a2" name="new_q3ak" value="'.$q3a2.'" class ="form-radio-input">
              <label for="q3a2" class= "form-text1">'.$q3a2.'</label>
            </div></div>
          
            <div class ="container"><div class="form-row">
              <input type="radio" id="q3a3" name="new_q3ak" value="'.$q3ak.'"  class ="form-radio-input">
              <label for="q3a3"  class= "form-text1">'.$q3ak.'</label></div></div>
              <script>
              const new_q3a3t = document.getElementById("q3a3");
              new_q3a3t.checked = true;
            </script>

            
            <input type="submit" name="edit" value="تعديل" class="btn btn-primary mt-2">
            </center>
          </form>
          ';
}
}
}

// Handle form submissions
if(isset($_POST['edit'])){
  if(!isset($_POST['new_q1ak'])){
    $_POST['new_q1ak']=$q1ak;
  }
  if(!isset($_POST['new_q2ak'])){
    $_POST['new_q2ak']=$q2ak;
  }
  if(!isset($_POST['new_q3ak'])){
    $_POST['new_q3ak']=$q3ak;
  }
$id = $_POST['id'];
$new_Name = mysqli_real_escape_string($conn, $_POST['new_Name']);
$new_writer = mysqli_real_escape_string($conn, $_POST['new_writer']);
$new_img = mysqli_real_escape_string($conn, $_POST['new_img']);
$new_url = mysqli_real_escape_string($conn, $_POST['new_url']);
$new_q1 = mysqli_real_escape_string($conn, $_POST['new_q1']);
$new_q2 = mysqli_real_escape_string($conn, $_POST['new_q2']);
$new_q3 = mysqli_real_escape_string($conn, $_POST['new_q3']);

if ( mysqli_real_escape_string($conn, $_POST['new_q1ak']) != $q1ak) {
  $new_q1ak = mysqli_real_escape_string($conn, $_POST['new_q1ak']);
  if($new_q1ak !=$q1a1){
    $new_q1a2=$q1ak;
    $new_q1a1=$q1a1;
  }elseif($new_q1ak != $q1a2){
    $new_q1a1=$q1ak;
    $new_q1a2=$q1a2;
  }
} else {
    $new_q1ak = $q1ak;
    $new_q1a2=$q1a2;
    $new_q1a1=$q1a1;
}

if (mysqli_real_escape_string($conn, $_POST['new_q3ak']) != $q3ak) {
  $new_q3ak = mysqli_real_escape_string($conn, $_POST['new_q3ak']);
  if($new_q3ak !=$q3a1){
    $new_q3a2=$q3ak;
    $new_q3a1=$q3a1;
  }elseif($new_q3ak != $q3a2){
    $new_q3a1=$q3ak;
    $new_q3a2=$q3a2;
  }
} else {
    $new_q3ak = $q3ak;
    $new_q3a2=$q3a2;
    $new_q3a1=$q3a1;
}

if ( mysqli_real_escape_string($conn, $_POST['new_q2ak']) != $q2ak) {
  $new_q2ak = mysqli_real_escape_string($conn, $_POST['new_q2ak']);
  if($new_q2ak !=$q2a1){
    $new_q2a2=$q2ak;
    $new_q2a1=$q2a1;
  }elseif($new_q2ak != $q2a2){
    $new_q2a1=$q2ak;
    $new_q2a2=$q2a2;
  }
} else {
    $new_q2ak = $q2ak;
    $new_q2a2=$q2a2;
    $new_q2a1=$q2a1;
}



$sql = "UPDATE books SET Name='$new_Name', writer='$new_writer', img='$new_img', url='$new_url', q1='$new_q1', q1a1='$new_q1a1', q1a2='$new_q1a2', q2='$new_q2', q2a1='$new_q2a1', q2a2='$new_q2a2', q3='$new_q3', q3a1='$new_q3a1', q3a2='$new_q3a2', q1ak='$new_q1ak', q2ak='$new_q2ak', q3ak='$new_q3ak' WHERE id='$id' AND stage='$stage' AND school='$code'";
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>





  



<link rel="stylesheet" href="../../css/style.css" />
</body>
</html>