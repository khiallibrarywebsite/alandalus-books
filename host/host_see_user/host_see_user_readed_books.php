<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
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
    <?php 
require_once '../../connect.php';
$s=0;
if (isset($_GET['user'],$_GET['school_code'],$_GET['pass'])) {
  if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass'])) {
    $password = $_GET['pass'];
    $titlecompleter = $_GET['user'];
    $code=$_GET['school_code'];

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
       elseif ($titlecompleter == "2") {
        echo '<title>حساب مشرف المستوي الثاني '.$name.'</title>'; 
      }
      elseif ($titlecompleter == "3" ) {
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
  <center>
  <?php
  if($s != 1){


// Connect to database
require_once '../../connect.php';
$go = sprintf("host_users_see.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
$number=0;
// Retrieve all books from the table
// Prepare the SQL query with placeholders for the bound parameters
$sql = "SELECT * FROM `users` WHERE `stage` = '$stage' AND school = '$code'  AND type = 'user' ORDER BY `readedbooks` ASC";

$result = mysqli_query($conn, $sql);
// Use the result set as needed
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_readed_books = $row["id_readed_added_books"];
}
} else {
    echo "يرجي المحاولة مرة اخري";
}



$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    echo "<a href='$go'>رجوع</a>";

    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        // Check if the book ID is already in the list of read books
        if (strpos($id_readed_books, ",".$book_id.":") !== false) {

            echo "<img src='$book_img' style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../../img/A.png\"'>";
            echo "<h4>$book_name</h4>";
            echo "<h5>$book_author</h5>";
            $number=$number+1;
        }
        
    }
} else {
    echo "يرجي المحاولة مرة اخري";
}
if ($number == 0) {
    echo "<h1>الطالب لم يقرأ اي كتاب</h1>";
}




mysqli_stmt_close($stmt);
}

  
?>
  </center>
</body>

</html>
