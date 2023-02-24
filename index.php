<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/styleme.css" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9483470310411729" crossorigin="anonymous"></script>
   <link rel="icon" type="image/x-icon" href="https://softr-prod.imgix.net/applications/96c4ff09-6593-407c-a5af-810a1fa0ca2f/assets/b9e0692f-6ae8-4fba-a2eb-6f09ef2bb618.png?rnd=1649807422200" />
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

        <link rel="stylesheet" href="css/style.css" />
<title>الصفحة الرئيسية</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <nav>
  <div class="nav-left">
    <a href="#">
      <img src="img/logo.png" alt="Logo">
    </a>
  </div>
  <div class="nav-center">
    <p>مدارس الأندلس الأهلية</p>
  </div>
  <div class="nav-right">
    <a href="#">من نحن</a>
  </div>
      <a href="login.php"><button>login</button></a>

</nav>
        <center>

<?php
require_once 'connect.php';

$sql = "SELECT * FROM tables_index";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id_table = $row["id"];
      $ql = "SELECT COUNT(*) AS total_books FROM books WHERE school = '$id_table'"; 
      $re = mysqli_query($conn, $ql);
      if (mysqli_num_rows($re) > 0) {
        $ro = mysqli_fetch_assoc($re);
        $total_books = $ro["total_books"];
        echo '
        <div class="container">
        <div class="images">
        <a href="login.php">
        <img src="img/img'.$id_table.'.jpg" alt="Image" style="width: 200%; height: auto;">
        </a>
        <a href="login.php"><button style="flex: 1; width: 100%;">' . $total_books . '</button><a>
        </div></div>';
      } else {
      $total_books = 0;
      echo '
      <div class="container">
      <div class="images">
      <a href="login.php">
      <img src="img/img'.$id_table.'.jpg" alt="Image" style="width: 200%; height: auto;">
      </a>
      <a href="login.php"><button style="flex: 1; width: 100%;">' . $total_books . '</button><a>
      </div></div>';
    }

    }
  }


mysqli_close($conn);
?>

</center>
</body>
</html>