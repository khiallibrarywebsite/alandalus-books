<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/styleme.css" />

    <style>*{font-family: 'Tajawal' , sans-serif; list-style-type: none;} </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<script>
  const nav = document.querySelector('nav');
let color = 0;

function animateNav() {
  color = (color + 1) % 255;
  nav.style.backgroundColor = `rgb(${color}, ${255 - color}, ${255})`;
  window.requestAnimationFrame(animateNav);
}

animateNav();
</script>
<style>
  /* Change font size and color of navbar links */

nav {
  background-color: #000ff0;
  color: #fff;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;

}

/* Styles for the logo */
nav img {
  height: 40px;
}

/* Styles for the center content */
.nav-center {
  text-align: center;
}

.nav-center p {
  margin:  0 20px;
  font-size: 18px;
  font-size: 20px;

}

/* Styles for the right content */
.nav-right {
  margin-left: auto;
}

.nav-right a {
  color: #fff;
  text-decoration: none;
}

/* Styles for the login button */
.nav-right button {
  background-color: #fff;
  color: #333;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
    .square {
      width: 100px;
      height: 100px;
      background-color: lightblue;
      float: left;
      margin-right: 20px;
      text-align: center;
      line-height: 100px;
    }
    

nav a {
  font-size: 20px;
  color: #000ff0;
}

/* Add margin to the login button */
nav button {
  margin-left: 10px;
}

/* Center the content */
center {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

/* Add some spacing between the containers */
.container {
  margin: 20px 0;
}

/* Set a maximum width for the images */
.images img {
  max-width: 100%;
  height: auto;
}

/* Style the book count button */
.images button {
  font-size: 16px;
  color: #fff;
  background-color: #000ff0;
  border: none;
  padding: 10px;
  margin-top: 10px;
}
</style>
<script>
  const container = document.querySelector("#container");
  container.classList.add("animate__animated", "animate__fadeInUp");
</script>
<script>
  function animateBackground() {
    var body = document.getElementById("my-body");
    if (body.style.backgroundColor === "white") {
      body.style.backgroundColor = "lightblue";
    } else {
      body.style.backgroundColor = "white";
    }
  }
  
  setInterval(animateBackground, 2000);
</script>

        <link rel="stylesheet" href="css/style.css" />
<title>الصفحة الرئيسية</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body id="my-body">
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
echo '<div>';
if (mysqli_num_rows($result) > 0) {
  
    while ($row = mysqli_fetch_assoc($result)) {
      $id_table = $row["id"];
      $ql = "SELECT COUNT(*) AS total_books FROM books WHERE school = '$id_table'"; 
      $re = mysqli_query($conn, $ql);
      if (mysqli_num_rows($re) > 0) {
        $ro = mysqli_fetch_assoc($re);
        $total_books = $ro["total_books"];
        echo '
        <div id="container"  class="animate__animated animate__fadeInUp">
        <div class="images"  class="animate__animated animate__fadeInUp">
        <a href="login.php">
        <img src="img/img'.$id_table.'.jpg" alt="Image" style="width: 200%; height: auto;">
        </a>
        <a href="login.php"><button style="flex: 1; width: 100%;">' . $total_books . '</button><a>
        </div></div>';
      } else {
      $total_books = 0;
      echo '
      <div id="container" class="animate__animated animate__fadeInUp">
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