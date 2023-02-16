<html>
<head>
<style>
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
    .square {
      width: 100px;
      height: 100px;
      background-color: lightblue;
      float: left;
      margin-right: 20px;
      text-align: center;
      line-height: 100px;
    }
</style>
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
$table_name= $code.'_'.$stage.'_books';
// Retrieve all books from the table
$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        $see_book = sprintf("see_book/see_book.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
       
        echo "<form>";
        echo "<img src=$book_img style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../img/A.png\"'>";
        echo "<h4>$book_name</h4>";
        echo "<h5>$book_author</h5>";
        echo "<a href='$see_book'>مشاهدة الكتاب</a>";
        echo "</form>";
    }
} else {
    echo "No books found in the table.";
}
}
?>

</body>
</html>