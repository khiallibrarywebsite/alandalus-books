<html>
    <head>
    <style>

    body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

  .images a {
    flex: 1;
    text-align: center;
  }
  .images img {
    width: 100%;
    height: auto;
    border: 2px solid black;
  }
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.images {
  display: flex;
  justify-content: space-between;
  width: 80%;
}

.images a img {
  border: 2px solid black;
  flex: 1;
}

.buttons {
  display: flex;
  justify-content: space-between;
  width: 80%;
  margin-top: 20px;
}

.buttons a button {
  background-color: white;
  border: 2px solid black;
  padding: 10px 20px;
  font-size: 18px;
  flex: 1;
  text-align: center;
}
  nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }
  .nav-left, .nav-center, .nav-right {
    display: flex;
    align-items: center;
  }
  .nav-left img {
    height: 40px;
    margin-right: 20px;
  }
  .nav-center p {
    font-size: 20px;
    margin: 0 20px;
  }
  @media (max-width: 767px) {
    .nav-center {
      display: none;
    }
  }
    .images button {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 10px;
}
    .container .images a {
  display: inline-block;
}
    .container {
  display: flex;
  justify-content: center;
}

.images a {
  display: flex;
  margin: 10px;
  align-items: center;
  justify-content: center;
}

.images img {
  height: 100px;
  width: 100px;
  object-fit: cover;
}
    </style>
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