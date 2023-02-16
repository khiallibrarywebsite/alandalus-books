<!DOCTYPE html>
<html>
<head>

   <meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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


$table_name =  "user_" .$code;

// Connect to database
require_once '../../connect.php';


// Retrieve all books from the table
$sql = "SELECT * FROM `$table_name` WHERE `stage` = $stage ORDER BY `readedbooks` ASC";

$result = mysqli_query($conn, $sql);
$go = sprintf("../host.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
$go_to = sprintf("/host_see_user_readed_books.php?user=%s&school_code=%s&pass=%s&user_name=%s", $titlecompleter, $code, $password, $username);
echo "<a href='$go'>رجوع</a>";
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user_name = $row["name"];
        $scoore = $row["scoore"];
        $readedbooks = $row["readedbooks"];
        $username = $row["username"];
        echo "<form>";
        echo "<img src='../../img/img.png' style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../img/A.png\"'>";
        echo "<h4>الطالب :$user_name</h4>";
        echo "<h5>عدد النقاط :$scoore</h5>";
        echo "<h5>عدد الكتب المقروئة :$readedbooks</h5>";
        echo "<a href=$go_to><button>عرض الكتب المقروئة</button></a>";
        echo "</form>";
    }
} else {
    echo "No books found in the table.";
}


  }
?>
  </center>
</body>

</html>
