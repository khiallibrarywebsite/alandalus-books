<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
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
    $stmt = $conn->prepare("SELECT * FROM `supervisor_$code` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $titlecompleter, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful, and only continue if it was
    if ($result && mysqli_num_rows($result) > 0) {
      // Use the fetch_assoc() method only once to retrieve the name
      $row = $result->fetch_assoc();
      $name = $row['name'];

      // Use elseif to reduce redundant code and improve readability
        echo '<title>حساب مشرف مدارس الأندلس فرع '.$code.'</title>';

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
    <p>اهلا بك حضرت المشرف</p>
    <p>'.$name.'</p> 
    </center>
    }

  </div>
  <div class="nav-right">
    <a href="index.php">من نحن</a>
  </div>
      <a href="../login.php"><button>login out</button></a>

</nav>


<div>
 <a href="supervisor_see_host/host_users_see.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'"> <div class="square" style= "width: 100px; height: 100px; background-color: lightblue; float: center; text-align: center; margin-left: 15%; line-height: 100px;">عرض الطلاب</div></a>

 <a href="supervisor_add_suggestion/supervisor_add_suggestion.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'"> <div class="square" style= "width: 100px; height: 100px; background-color: lightblue; float: center; text-align: center; margin-right: 15%; line-height: 100px;">إضافة كتاب</div></a>
  
 <a href="host_edit/host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'"> <div class="square" style= "width: 100px; height: 100px; background-color: lightblue; float: center; text-align: center; margin-right: 30%; line-height: 100px;">تعديل الكتب</div></a>

  </div>
  ';





}
?>
</body>
</html>