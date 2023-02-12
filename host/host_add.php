<!DOCTYPE html>
<html>
<head>
<style>
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .label {
    margin-top: 20px;
    text-align: right;
  }

  .form-control,.div {
    width: 80%;
    margin-top: 10px;
    padding: 10px;
  }

  input[type="submit"] {
    margin-top: 20px;
    width: 80%;
  }

  .question {
    display: flex;
    align-items: center;
  }

  .question label {
    margin-right: 10px;
  }

  input[type="radio"] {
    margin-right: 10px;
  }
  .label12 {
  display: block;
  font-size: 16px;
  font-weight: bold;
  color: #333;
  text-align: right;
  padding: 10px;
  background-color: #E6E6E6;
  width: 200px;
  height: 40px;
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
            $table_name = $code . "_" . $stage . "_books";
          } elseif (strpos($titlecompleter, "2") !== false) {
         echo '<title>حساب مشرف المستوي الثاني '.$name.'</title>'; 
         $stage = 2;
         $table_name = $code . "_" . $stage . "_books";
       } elseif (strpos($titlecompleter, "3") !== false) {
        echo '<title>حساب مشرف المستوي الثالث '.$name.'</title>';
        $stage = 3;
        $table_name = $code . "_" . $stage . "_books";
    } else {
    echo '<center><a href="login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }
    } else {
    echo '<center><a href="login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }
    } else {
    echo '<center><a href="login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }
    } else {
    echo '<center><a href="login.php"><h1>404 يرجى المحاولة مرة اخري</h1></a></center>';
    $s = 1;
    }


?>

</head>

<body>
<center>
<?php
  if($s != 1){
    
    require_once '../connect.php';
            // Retrieve all books from the table
$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);

// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
          $id = rand(100000000, 999999999);
           $id_book = $row["id"];
           if($id_book = $id){
            $id = rand(100000000, 999999999);
            if($id_book = $id){
                $id = rand(100000000, 999999999);
            }
           }

    }
            $new_Name = "";
            $new_writer = "";
            $new_img = "";
            $new_url = "";
            $new_q1 = "";
            $new_q2 = "";
            $new_q3 = "";
            $new_q1 = "";
            $new_q2 = "";
            $new_q3 = "";
            $new_q1ak ="";
            $new_q1a1= "";
            $new_q1a2= "";
            $new_q2ak = "";
            $new_q2a1= "";
            $new_q2a2= "";
            $new_q3ak = "";
            $new_q3a1= "";
            $new_q3a2= "";
            $q1a1= "";
            $q1a2= "";
            $q1ak= "";
            $q2a1= "";
            $q2a2= "";
            $q2ak= "";
            $q3a1= "";
            $q3a2= "";
            $q3ak= "";

            echo '
            <a href="host_edit.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'">رجوع</a>
            <form method="POST" class="container">
            <div class="div" style="background-color: #f7f7f7;">
            <input type="hidden" name="id" value="'.$id.'" />
            <label class="label">اسم الكتاب</label>
            <input type="text" name="new_Name" class="form-control"  />
          </div>
          <div class="div" style="background-color: #f7f7f7;">
            <label class="label">اسم المؤلف</label>
            <input type="text" name="new_writer" class="form-control"  />
            </div>
            <div class="div" style="background-color: #f7f7f7;">
            <label class="label">رابط الصورة</label>
            <input type="text" name="new_img" class="form-control"  />
            </div>
            <div class="div" style="background-color: #f7f7f7;">
            <label class="label">رابط الكتاب</label>
            <input type="text" name="new_url" class="form-control"  />
            </div>

            <div class="div" style="background-color: #f7f7f7;">
            <label class="label">سؤال الأول</label>
            <input type="text" name="new_q1" class="form-control" />
          
            <div class="question">
              <input type="radio" id="q1a1" name="new_q1ak">
              <input for="q1a1" type="text" name="new_q1a1">
            </div>
          
            <div class="question">
              <input type="radio" id="q1a2" name="new_q1ak">
              <input for="q1a2" type="text" name="new_q1a2">
            </div>
          
            <div class="question">
              <input type="radio" id="q1a3" name="new_q1ak" >
              <input for="q1a3" type="text" name="new_q1a3">
            </div>
          </div>

            <div class="div" style="background-color: #f7f7f7;">
            <label class="label">سؤال الثاني</label>
            <input type="text" name="new_q2" class="form-control"  />
            <div class="question">
              <input type="radio" id="q2a1" name="new_q2ak" >
              <input for="q2a1" type="text" name="new_q2a1">
            </div>
          
            <div class="question">
              <input type="radio" id="q2a2" name="new_q2ak" >
              <input for="q2a2" type="text" name="new_q2a2">
            </div>
          
            <div class="question">
              <input type="radio" id="q2a3" name="new_q2ak" >
              <input for="q2a3" type="text" name="new_q2a3">
            </div>
            </div>

            <div class="div" style="background-color: #f7f7f7;">
            <label class="label">سؤال الثالث</label>
            <input type="text" name="new_q3" class="form-control" />
            <div class="question">
              <input type="radio" id="q3a1" name="new_q3ak" >
              <input for="q3a1" type="text" name="new_q3a1">
            </div>
          
            <div class="question">
              <input type="radio" id="q3a2" name="new_q3ak" >
              <input for="q3a2" type="text" name="new_q3a2">
            </div>
          
            <div class="question">
              <input type="radio" id="q3a3" name="new_q3ak" >
              <input for="q3a3" type="text" name="new_q3a3">
            </div>
            </div>
            
            <input type="submit" name="add" value="إضافة" class="btn btn-primary mt-2">
            
          </form>
          ';
}



// Handle form submissions
if(isset($_POST['add'])){
  if(!isset($_POST['new_q1ak']) 
  || !isset($_POST['new_q2ak']) 
  || !isset($_POST['new_q3ak']) 
  || !isset($_POST['new_q3a1']) 
  || !isset($_POST['new_q3a2']) 
  || !isset($_POST['new_q3a3']) 
  || !isset($_POST['new_q2a1']) 
  || !isset($_POST['new_q2a2']) 
  || !isset($_POST['new_q2a3']) 
  || !isset($_POST['new_q1a1']) 
  || !isset($_POST['new_q1a2']) 
  || !isset($_POST['new_q1a3']) 
  || !isset($_POST['new_Name']) 
  || !isset($_POST['new_writer']) 
  || !isset($_POST['new_img']) 
  || !isset($_POST['new_url']) 
  || !isset($_POST['new_q1']) 
  || !isset($_POST['new_q2']) 
  || !isset($_POST['new_q3'])){
    echo "الرجاء ملئ حميع الخانات والإختيار الجابات الصحيحة للأسئلة المكتوبة";
  }else{

$id = $id;
$new_Name = mysqli_real_escape_string($conn, $_POST['new_Name']);
$new_writer = mysqli_real_escape_string($conn, $_POST['new_writer']);
$new_img = mysqli_real_escape_string($conn, $_POST['new_img']);
$new_url = mysqli_real_escape_string($conn, $_POST['new_url']);
$new_q1 = mysqli_real_escape_string($conn, $_POST['new_q1']);
$new_q1a1 = mysqli_real_escape_string($conn, $_POST['new_q1a1']);
$new_q1a2 = mysqli_real_escape_string($conn, $_POST['new_q1a2']);
$new_q1a3 = mysqli_real_escape_string($conn, $_POST['new_q1a3']);
$new_q1ak = mysqli_real_escape_string($conn, $_POST['new_q1ak']);
$new_q2 = mysqli_real_escape_string($conn, $_POST['new_q2']);
$new_q2a1 = mysqli_real_escape_string($conn, $_POST['new_q2a1']);
$new_q2a2 = mysqli_real_escape_string($conn, $_POST['new_q2a2']);
$new_q2a3 = mysqli_real_escape_string($conn, $_POST['new_q2a3']);
$new_q2ak = mysqli_real_escape_string($conn, $_POST['new_q2ak']);
$new_q3 = mysqli_real_escape_string($conn, $_POST['new_q3']);
$new_q3a1 = mysqli_real_escape_string($conn, $_POST['new_q3a1']);
$new_q3a2 = mysqli_real_escape_string($conn, $_POST['new_q3a2']);
$new_q3a3 = mysqli_real_escape_string($conn, $_POST['new_q3a3']);
$new_q3ak = mysqli_real_escape_string($conn, $_POST['new_q3ak']);
if ($new_q1ak == $new_q1a3) {
    $q1ak = $new_q1ak;
    $q1a2 = $new_q1a2;
    $q1a1 = $new_q1a1;
  } elseif ($new_q1ak == $new_q1a2) {
    $q1ak = $new_q1ak;
    $q1a2 = $new_q1a3;
    $q1a1 = $new_q1a1;
  } elseif ($new_q1ak == $new_q1a1) {
    $q1ak = $new_q1ak;
    $q1a2 = $new_q1a2;
    $q1a1 = $new_q1a3;
  }else{
    echo "Error adding record: $new_q1ak";

  }

  if ($new_q2ak == $new_q2a3) {
    $q2ak = $new_q2ak;
    $q2a2 = $new_q2a2;
    $q2a1 = $new_q2a1;
  } elseif ($new_q2ak == $new_q2a2) {
    $q2ak = $new_q2ak;
    $q2a2 = $new_q2a3;
    $q2a1 = $new_q2a1;
  } elseif ($new_q2ak == $new_q2a1) {
    $q2ak = $new_q2ak;
    $q2a2 = $new_q2a2;
    $q2a1 = $new_q2a3;
  }else{
    echo "Error adding record: '.$new_q2ak.'";

  }

  if ($new_q3ak == $new_q3a3) {
    $q3ak = $new_q3ak;
    $q3a2 = $new_q3a2;
    $q3a1 = $new_q3a1;
  } elseif ($new_q3ak == $new_q3a2) {
    $q3ak = $new_q3ak;
    $q3a2 = $new_q3a3;
    $q3a1 = $new_q3a1;
  } elseif ($new_q3ak == $new_q3a1) {
    $q3ak = $new_q3ak;
    $q3a2 = $new_q3a2;
    $q3a1 = $new_q3a3;
  }else{
    echo "Error adding record: $new_q3a3";

  }

  //$sql = "INSERT INTO $table_name (id, Name, writer, img, url, q1, q1ak, q1a2, q1a1, q2, q2ak, q2a2, q2a1, q3, q3ak, q3a2, q3a1)
  //VALUES ('$id', '$new_Name', '$new_writer', '$new_img', '$new_url', '$new_q1', '$q1ak', '$q1a2', '$q1a1', '$new_q2', '$q2ak', '$q2a2', '$q2a1', '$new_q3', '$q3ak', '$q3a2', '$q3a1')";
  
//if (mysqli_query($conn, $sql)) {
 ///// echo "Record added successfully";
//} else {
 // echo "Error adding record: " . mysqli_error($conn);
//}

//mysqli_close($conn);
}
}
}
?>





  




</center>
</body>
</html>