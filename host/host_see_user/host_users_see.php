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
    <style>/* Set default font to Tajawal */
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
* {
  font-family: 'Tajawal', sans-serif;
  list-style-type: none;
}

/* Style for the book image */
#book-img {
  width: 118px;
  height: 179px;
}

/* Style for the book form */
form {
  margin-bottom: 20px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

/* Style for the back button */
a {
  display: block;
  margin-bottom: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-align: center;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.2s ease-in-out;
}

a:hover {
  background-color: #0069d9;
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
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? ");
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


// Retrieve all books from the table
$sql = "SELECT * FROM `users` WHERE `stage` = '$stage' AND school = '$code'   AND type = 'user' ORDER BY `readedbooks` ASC";

$result = mysqli_query($conn, $sql);
$go = sprintf("../host.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
echo "<a href='$go'>رجوع</a>";
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users_name = $row["name"];
        $scoore = $row["scoore"];
        $readedbooks = $row["readedbooks"];
        $username1 = $row["username"];
        $go_to = sprintf("host_see_user_readed_books.php?user=%s&school_code=%s&pass=%s&user_name=%s", $titlecompleter, $code, $password, $username1);
        echo "<form>";
        echo "<img src='../../img/img.png' style='width:118px; height: 179px' class='img-fluid img-thumbnail shadow' id='book-img' alt='Not Found' onerror='this.src=\"../img/A.png\"'>";
        echo "<h4>الطالب :$users_name</h4>";
        echo "<h5>عدد النقاط :$scoore</h5>";
        echo "<h5>عدد الكتب المقروئة :$readedbooks</h5>";
        echo "<a href=$go_to>عرض الكتب المقروئة</a>";
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
