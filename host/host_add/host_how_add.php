<!DOCTYPE html>
<html>
    <head>
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
            echo '<title>كيفية رفع ملفات جوجل درايف</title>';
            $stage = 1;
            $table_name = $code . "_" . $stage . "_books";
          } elseif (strpos($titlecompleter, "2") !== false) {
         echo '<title>كيفية رفع ملفات جوجل درايف</title>'; 
         $stage = 2;
         $table_name = $code . "_" . $stage . "_books";
       } elseif (strpos($titlecompleter, "3") !== false) {
        echo '<title>كيفية رفع ملفات جوجل درايف</title>';
        $stage = 3;
        $table_name = $code . "_" . $stage . "_books";
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
