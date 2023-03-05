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
    <style>
      /* Center all content */
      body {
  font-family: Arial, sans-serif;
  color:  #D8D8D8;
  background-color:  #D8D8D8;
}
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
  background-color: #3c8dbc;
			border-radius: 5px;
			color: #fff;
			font-size: 18px;
			font-weight: bold;
			text-align: center;
			cursor: pointer;
			transition: transform 0.5s ease-in-out;
}
/* Style all links */
a {
  color: #007bff;
  text-decoration: none;
  cursor: pointer;
}

/* Style the page title */
h1 {
  font-size: 36px;
  font-weight: bold;
}

/* Style the center content */
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin: 0 auto;
  max-width: 960px;
  padding: 0 15px;
}

/* Style the form */
form {
  display: flex;
  flex-direction: column;
  margin: 0 auto;
  max-width: 500px;
  padding: 20px;
  background-color: #f8f9fa;
  border: 1px solid #ced4da;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style the form labels */
label {
  margin-bottom: 5px;
}

/* Style the form input fields */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ced4da;
  border-radius: 5px;
}

/* Style the form submit button */
input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Style the error message */
.error {
  color: red;
  margin-top: 10px;
  font-size: 14px;
}

/* Style the success message */
.success {
  color: green;
  margin-top: 10px;
  font-size: 14px;
}

/* Hide the form */
.hidden {
  display: none;
}

/* Style the table */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

/* Style the table headers */
th {
  text-align: left;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
}

/* Style the table cells */
td {
  text-align: left;
  padding: 10px;
  border: 1px solid #ced4da;
}

/* Style the book image */
.book-img {
  max-width: 100%;
  height: auto;
  margin-bottom: 10px;
}

/* Style the book title */
.book-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 5px;
}

/* Style the book author */
.book-author {
  font-size: 16px;
  margin-bottom: 10px;
}

/* Style the book description */
.book-description {
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 10px;
}
    </style>
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
       elseif ($stage == "2") {
        echo '<title>حساب مشرف المستوي الثاني '.$name.'</title>'; 
      }
      elseif ($stage == "3" ) {
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
 
  <center>
  <?php
  if($s != 1){
    echo'
    <center>
           <nav>
      <div class="nav-left">
        <a href="#">
          <img src="../../img/img.png" alt="Logo">
        </a>
      </div>
      <div class="nav-center">
    
    <center>
        <p> اهلا بك استاذ</p>
        <p>'.$name.'</p> 
        </center>
        
    
      </div>
      <div class="nav-right">
        <a href="../host.php">الصفحة الرئيسية </a>
      </div>
          <a href="../../login.php"><button>login out</button></a>
    
    </nav>';

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
