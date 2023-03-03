<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/> -->
     <link rel="stylesheet" href="css/style.css"/>

    <style>*{font-family: 'Tajawal' , sans-serif; list-style-type: none;} </style>
    <title>الصفحة الرئيسية</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body id="my-body">

    <nav class="nav">
  <div class="nav-left">
    <a href="#">
      <img src="img/logo.png" alt="Logo" calss = "nav-img">
    </a>
  </div>
  <div class="nav-center">
  </div>
  <div class="nav-right">
    <a href="index.php" class="nav-right-a">من نحن</a>
  </div>
      <a href="login.php" class="nav-right-a"><button class="nav-right-button">تسجيل دخول</button></a>

</nav>


  <center>

    <div class ="schools">
<h1>SCHOOLS</h1>
<p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
<?php
require_once 'connect.php';

$sql = "SELECT * FROM tables_index";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
echo '<div>';
if (mysqli_num_rows($result) > 0) {

  echo '<div class = "card-row">';
    while ($row = mysqli_fetch_assoc($result)) {
      $id_table = $row["id"];

      $ql = "SELECT COUNT(*) AS total_books FROM books WHERE school = '$id_table'"; 
      $re = mysqli_query($conn, $ql);
      if (mysqli_num_rows($re) > 0) {
        $ro = mysqli_fetch_assoc($re);
        $total_books = $ro["total_books"];
        echo '
        <div class="card">
        <div id="container"  class="col-1 col-sm-12 col-md-6 col-lg-4 col-xl-3">
        <a href="login.php">
        <img calss="card-img" src="img/img'.$id_table.'.jpg" alt="Image" >
        </a>
        
        <a href="login.php"><button  class="card-button">عدد الكتب' . $total_books . '</button><a>
        </div></div>';
      } else {
      $total_books = 0;
      echo '
      <div class="card">
      <div id="container" class="col-1 col-sm-12 col-md-6 col-lg-4 col-xl-3">
      <a href="login.php">
      <img  calss="card-img" src="img/img'.$id_table.'.jpg" alt="Image" >
      </a><div class= "acrd-body">
      <a href="login.php"><button class="card-button">عدد الكتب' . $total_books . '</button><a>
      </div></div>';
    }

    }
    echo '</div>';
  }
?>
</div>




</center>
</body>
</html>