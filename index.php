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


$sql = "SELECT (
  (SELECT COUNT(*) FROM egyand_1_books) +
  (SELECT COUNT(*) FROM egyand_2_books) +
  (SELECT COUNT(*) FROM egyand_3_books)
) AS total_books1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_books1 = $row["total_books1"];
} else {
    $total_books1 = 0;
}

$sql = "SELECT (
  (SELECT COUNT(*) FROM entand_1_books) +
  (SELECT COUNT(*) FROM entand_2_books) +
  (SELECT COUNT(*) FROM entand_3_books)
) AS total_books2";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_books2 = $row["total_books2"];
} else {
    $total_books2 = 0;
}

$sql = "SELECT (
  (SELECT COUNT(*) FROM ksaand_1_books) +
  (SELECT COUNT(*) FROM ksaand_2_books) +
  (SELECT COUNT(*) FROM ksaand_3_books)
) AS total_books3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $total_books3 = $row["total_books3"];
} else {
    $total_books3 = 0;
}

echo '
<div class="container">
<div class="images">
<a href="login.php">
<img src="img/imgegy.jpg" alt="Image" style="width: 200%; height: auto;">
</a>

  <a href="login.php"><button style="flex: 1; width: 100%;">' . $total_books1 . '</button><a>
  
  <a href="login.php">
  <img src="img/imgen.jpg" alt="Image" style="width: 150%; height: auto;">
</a>
  <a href="login.php"><button style="flex: 1; width: 100%;">' . $total_books2 . '</button><a>
  <a href="login.php">
  <img src="img/imgksa.jpg" alt="Image" style="width: 150%; height: auto;">
</a>
  <a href="login.php"><button style="flex: 1; width: 100%;">' . $total_books3 . '</button><a>

</div>
</div>';

mysqli_close($conn);
?>

</center>
</body>
</html>