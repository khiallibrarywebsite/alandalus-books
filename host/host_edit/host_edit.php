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
        $stmt = $conn->prepare("SELECT * FROM `host_$code` WHERE `username` = ? AND `password` = ?");
        $stmt->bind_param("ss", $titlecompleter, $password);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Check if the query was successful, and only continue if it was
        if ($result && mysqli_num_rows($result) > 0) {
          // Use the fetch_assoc() method only once to retrieve the name
          $row = $result->fetch_assoc();
          $name = $row['name'];
    
          // Use elseif to reduce redundant code and improve readability
          if (strpos($titlecompleter, "1") !== false) {
            echo '<title>حساب مشرف المستوي الأول '.$name.'</title>';
            $stage = 1;
          } elseif (strpos($titlecompleter, "2") !== false) {
         echo '<title>حساب مشرف المستوي الثاني '.$name.'</title>'; 
         $stage = 2;
       } elseif (strpos($titlecompleter, "3") !== false) {
        echo '<title>حساب مشرف المستوي الثالث '.$name.'</title>';
        $stage = 3;
    } else {
    echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }
    } else {
    echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }
    } else {
    echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }
    } else {
    echo '<center><a href="../../login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }


?>

</head>

<body>
  <center>
  <?php
  if($s != 1){


$table_name = $code . "_" . $stage . "_books";

// Connect to database
require_once '../../connect.php';


// Retrieve all books from the table
$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);
$go = sprintf("../host.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
echo "<a href='$go'>رجوع</a>";
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $edit_link = sprintf("edit_host.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        echo "<form action='' method='post'>";

        echo "<img src='$book_img' style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../../img/A.png\"'>";
        echo "<h4>$book_name</h4>";
        echo "<h5>$book_author</h5>";
        echo "<input type='hidden' name='book_id' value='$book_id'>";
        echo "<a href='$edit_link'>edit</a>";
        echo "<br><br>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "<br><br><br><br><br>";
        echo "</form>";
    }
} else {
    echo "No books found in the table.";
}

// Handle form submission
if (isset($_POST["delete"])) {
    $book_id = $_POST["book_id"];
    $sql = "DELETE FROM $table_name WHERE id=$book_id";
    if (mysqli_query($conn, $sql)) {
        echo "Book deleted successfully.";
        header("Refresh: 0");
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
  }
?>
  </center>
</body>

</html>
