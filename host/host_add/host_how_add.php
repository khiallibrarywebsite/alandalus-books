<?php include '../../config.php';?>
<!DOCTYPE html>
<html>    <head>
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

$conn->close();
?>


    </head>
<body>
	<!-- Loading screen -->
	<div id="loading-screen">
  <img src="../../img/loading.gif" alt="Loading...">
	</div>
    <center>
<p>قم بتحميل الكتاب بصيغة بيدي اف علي جوجل درايف وبعد التحميل قم باختيار الكتاب</p>
<img src="../../img/1.png" height="500px" width="700px">
<p>بعدها قم بالضغط علي الحصول علي الرابط</p>
<img src="../../img/2.png" height="500px" width="700px">
<p>بعدها قم بالضغط علي الحصول علي الرابط</p>
<p>وقم باختيار وصول عام اي شخص لديه الرابط لديه حق المشاهدة</p>
<img src="../../img/3.png" height="500px" width="700px">
<p>بعد ذلك قم بنسخ الرابط ووضعه في انة رابط الكتاب في صفحة اضافة الكتاب</p>
<p>للحصول علي الايدي الخاص بالكتاب قم بنسخ الرقم الذي يوجد في اخر الرابط</p>
</center>
</body>
</html>
