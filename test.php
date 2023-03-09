<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="../css/style.css" /> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../css/styleme.css" />
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
/* Define styles for the navigation bar */
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
  color: #000ff0;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
button {
  font-size: 18px;
  color: #fff;
  background-color: #000;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

form {
  display: inline-block;
  text-align: center;
  margin: 20px;
}

img {
  display: block;
  margin: 0 auto;
}

h4, h5 {
  margin: 0;
  padding: 5px;
}

a {
  font-size: 18px;
  color: #000;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #000;
  padding: 10px 20px;
  display: inline-block;
  margin: 10px 0;
  transition: all 0.3s ease;
}

a:hover {
  color: #fff;
  background-color: #000;
}
</style>
<script>
$(document).ready(function() {
  $("nav").animate({backgroundColor: "#fff", color: "#000"}, 2000);
});
</script>

    <meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php 
require_once '../connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];

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
<?php
if($s != 1){
    require_once '../connect.php';
  echo'
<center>
       <nav>
  <div class="nav-left">
    <a href="#">
      <img src="../img/img.png" alt="Logo">
    </a>
  </div>
  <div class="nav-center">

<center>
    <p>أهلا بك</p>
    <p>'.$name.'</p> 
    </center>


  </div>
  <div class="nav-right">
    <a href="index.php">من نحن</a>
  </div>
      <a href="../login.php"><button>login out</button></a>

</nav>';
// Retrieve all books from the table
$sql = "SELECT * FROM books where stage = '$stage' and school = '$code'";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        $see_answers = sprintf("see_book/see_answers.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
        $see_book = sprintf("see_book/see_book.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
        $stmt = $conn->prepare("SELECT id_readed_added_books FROM `users` WHERE `username` = ? AND `password` = ? AND `stage` = '$stage' AND `school` = '$code'");
        $stmt->bind_param("ss", $titlecompleter, $password);
        $stmt->execute();
        $result = $stmt->get_result();
            // Check if the query was successful, and only continue if it was
            if ($result && $result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $id_readed_books = $row['id_readed_added_books'];
              if (strpos($id_readed_books, ",".$book_id.":") === false) {
                echo "<form>";
                echo "<img src=$book_img style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../img/A.png\"'>";
                echo "<h4>$book_name</h4>";
                echo "<h5>$book_author</h5>";
                echo "<a href='$see_book'>مشاهدة الكتاب</a>";
                echo "</form>";

              } else {
                echo "<form>";
                echo "<img src=$book_img style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../img/A.png\"'>";
                echo "<h4>$book_name</h4>";
                echo "<h5>$book_author</h5>";
                echo "<h4 style='display: inline-block; background-color: #00FF00; padding: 5px; margin: 5px;'>لقد قرأت هذا الكتاب من قبل</h4>";
                echo "<BR></BR><a href='$see_answers'>مشاهدة إجاباتك</a>";
                echo "</form>";
              }
            }

    }
} else {
    echo "No books found in the table.";
}
}
?>

</body>
</html>