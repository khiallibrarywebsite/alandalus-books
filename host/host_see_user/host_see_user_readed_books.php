<!DOCTYPE html>
<html>
<head>

   <meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    require_once '../../connect.php';
    $s=0;
    if (isset($_GET['user'],$_GET['user_name'],$_GET['school_code'],$_GET['pass'])) {
      if (!empty($_GET['user']) && !empty($_GET['school_code']) && !empty($_GET['pass'])&& !empty($_GET['user_name'])) {
        $user_name = $_GET['user_name'];
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


$table_name =  "user_" .$code;

// Connect to database
require_once '../../connect.php';
$go = sprintf("../host.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
echo "<a href='$go'>رجوع</a>";
$number=0;
// Retrieve all books from the table
// Prepare the SQL query with placeholders for the bound parameters
$sql = "SELECT * FROM `$table_name` WHERE `stage` = ? AND `username` = ?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameters to the placeholders
mysqli_stmt_bind_param($stmt, "is", $stage, $user_name);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result set
$result = mysqli_stmt_get_result($stmt);



// Use the result set as needed
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_readed_books = $row["id_readed_books"];
}
} else {
    echo "يرجي المحاولة مرة اخري";
}

$table_name =  $code . "_" . $stage . "_books";

$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        // Check if the book ID is already in the list of read books
        if (strpos($id_readed_books, $book_id) !== false) {

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
