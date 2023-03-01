<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/> -->
     <link rel="stylesheet" href="css/style.css"/>

    <style>*{font-family: 'Tajawal' , sans-serif; list-style-type: none;} </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
  
  .col-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 {
    margin: 20px 0;
    cursor: pointer;
  } 
  .card {
  background-color: #000ff0;
  color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  position: relative;
  overflow: hidden;
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  max-width: 100%;
}

.card img {
  display: block;
  width: 100%;
  height: auto;
  border-radius: 10px 10px 0 0;
  transition: transform 0.3s ease-out;
}

.card img:hover {
  transform: scale(1.1);
}

.card h2 {
  margin-top: 0;
}

.card button {
  display: block;
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #fff;
  color: #000ff0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease-out, color 0.2s ease-out, transform 0.3s ease-out;
}

.card button:hover {
  background-color: #000ff0;
  color: #fff;
  transform: translateY(-5px);
}

.card:before {
  content: '';
  position: absolute;
  top: -100%;
  left: -100%;
  width: 200%;
  height: 200%;
  background-color: rgba(255, 255, 255, 0.2);
  transform: rotate(45deg);
  transition: transform 1s ease-out;
  z-index: -1;
}

.card:hover:before {
  transform: translateX(200%) translateY(200%) rotate(45deg);
}
.row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
  margin-top: 15px;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  
}

.card {
  margin-right: 20px;
}

</style>
        <link rel="stylesheet" href="css/style.css" />
<title>الصفحة الرئيسية</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body id="my-body">
    <!-- <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery-3.6.3.min.js"></script>
    <script src="bootstrap/js/popper.min"></script> -->
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

  echo '<div class = "row">';
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
        <img calss="card-img-top" src="img/img'.$id_table.'.jpg" alt="Image" >
        </a>
        <div class= "acrd-body">
        <a href="login.php"><button  class="btn btn-primary">عدد الكتب' . $total_books . '</button><a>
        </div></div></div>';
      } else {
      $total_books = 0;
      echo '
      <div class="card">
      <div id="container" class="col-1 col-sm-12 col-md-6 col-lg-4 col-xl-3">
      <a href="login.php">
      <img  calss="card-img-top" src="img/img'.$id_table.'.jpg" alt="Image" >
      </a><div class= "acrd-body">
      <a href="login.php"><button class="btn btn-primary">عدد الكتب' . $total_books . '</button><a>
      </div></div></div>';
    }

    }
    echo '</div>';
  }


mysqli_close($conn);
?>

</center>
</body>
</html>