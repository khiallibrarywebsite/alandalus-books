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
<script>
 window.onload = function() {
   const inputText1 = document.getElementById("new_q1a1");
   const radioInput1 = document.getElementById("q1a1");
                 
   inputText1.addEventListener("input", function() {
     radioInput1.value = inputText1.value;
   });

   const inputText2 = document.getElementById("new_q1a2");
   const radioInput2 = document.getElementById("q1a2");
             
   inputText2.addEventListener("input", function() {
     radioInput2.value = inputText2.value;
   });

   const inputText3 = document.getElementById("new_q1a3");
   const radioInput3 = document.getElementById("q1a3");
             
   inputText3.addEventListener("input", function() {
     radioInput3.value = inputText3.value;
   });

   const inputText4 = document.getElementById("new_q2a1");
   const radioInput4 = document.getElementById("q2a1");
             
   inputText4.addEventListener("input", function() {
     radioInput4.value = inputText4.value;
   });

   const inputText5 = document.getElementById("new_q2a2");
   const radioInput5 = document.getElementById("q2a2");
             
   inputText5.addEventListener("input", function() {
     radioInput5.value = inputText5.value;
   });

   const inputText6 = document.getElementById("new_q2a3");
   const radioInput6 = document.getElementById("q2a3");
             
   inputText6.addEventListener("input", function() {
     radioInput6.value = inputText6.value;
   });

   const inputText7 = document.getElementById("new_q3a1");
   const radioInput7 = document.getElementById("q3a1");
             
   inputText7.addEventListener("input", function() {
     radioInput7.value = inputText7.value;
   });

   const inputText8 = document.getElementById("new_q3a2");
   const radioInput8 = document.getElementById("q3a2");
             
   inputText8.addEventListener("input", function() {
     radioInput8.value = inputText8.value;
   });

   const inputText9 = document.getElementById("new_q3a3");
   const radioInput9 = document.getElementById("q3a3");
             
   inputText9.addEventListener("input", function() {
     radioInput9.value = inputText9.value;
   });
 };
</script>

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
    
    require_once '../../connect.php';

    // Retrieve all books from the table
    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Generate a form for each book
        while ($row = mysqli_fetch_assoc($result)) {
            $id = rand(100000000, 999999999);
            $id_book = $row["id"];
            while ($id_book == $id) {
                $id = rand(100000000, 999999999);
            }
        }
    } else {
        // Table is empty, generate a new ID directly
        $id = rand(100000000, 999999999);
    }
    $finish=0;
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
            $new_q1a3 = "";
            $new_q2ak = "";
            $new_q2a1= "";
            $new_q2a2= "";
            $new_q2a3 = "";
            $new_q3ak = "";
            $new_q3a1= "";
            $new_q3a2= "";
            $new_q3a3 = "";
            $q1a1= "";
            $q1a2= "";
            $q1ak= "";
            $q2a1= "";
            $q2a2= "";
            $q2ak= "";
            $q3a1= "";
            $q3a2= "";
            $q3ak= "";
            $go_link = sprintf("host_how_add.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
            echo '
            <a href="../host.php?user='.$titlecompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'">رجوع</a>
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
            <label class="label">رابط الكتاب</label>
            <input type="text" name="new_url" class="form-control"  placeholder="https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link"/>
            <p>قم برفع الكتاب علي <a href="https://drive.google.com/">جوجل درايف</a> وبعدها قم بعمل مشاركة للكتاب وجعل صلاحية الدخول لكل من يحمل الرابط <a href="'.$go_link.'" target="_blank">معرفة المزيد</a></p>
            </div>
            <div class="div" style="background-color: #f7f7f7;">
            <label class="label">id الكتاب</label>
            <input type="text" name="new_img" class="form-control"   placeholder="1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI"/>
            <p>بعد الحصول علي رابط الكتاب قم  <a href="'.$go_link.'" target="_blank">باخذ الرقم الأخير</a> في الرابط وضعه هنا</p>
           
            </div>
            <div class="div" style="background-color: #f7f7f7;">

            <label class="label">سؤال الأول</label>
            <input type="text" name="new_q1" class="form-control" />
            <br>
            <div class="question">
            <input type="radio" id="q1a1" name="new_q1ak" value = "q1a1">
              <label for="q1a1"><input type="text" name="new_q1a1"  id="new_q1a1"></label>
            </div>
<br>
            <div class="question">
            <input type="radio" id="q1a2" name="new_q1ak" value = "q1a2">
              <label for="q1a2"><input type="text" name="new_q1a2" id="new_q1a2"></label>
            </div>
            <br>
            <div class="question">
            <input type="radio" id="q1a3" name="new_q1ak" value = "q1a3">
              <label for="q1a3"><input type="text" name="new_q1a3" id="new_q1a3"></label>
            </div>
            <br>
          </div>
        
          <div class="div" style="background-color: #f7f7f7;">
            <label class="label">سؤال الثاني</label>
            <input type="text" name="new_q2" class="form-control" />
            <br>
            <div class="question">
            <input type="radio" id="q2a1" name="new_q2ak" value = "q2a1">
              <label for="q2a1"><input type="text" name="new_q2a1"  id="new_q2a1"></label>
              
            </div>
            <br>
            <div class="question">
            <input type="radio" id="q2a2" name="new_q2ak" value = "q2a2">
              <label for="q2a2"><input type="text" name="new_q2a2"  id="new_q2a2"></label>
              </div>
              <br>
              <div class="question">
              <input type="radio" id="q2a3" name="new_q2ak" value = "q2a3">
                <label for="q2a3" ><input type="text" name="new_q2a3" id="new_q2a3"></label>
              </div>
              <br>
          </div>
        
          <div class="div" style="background-color: #f7f7f7;">
            <label class="label">سؤال الثالث</label>
            <input type="text" name="new_q3" class="form-control" />
            <br>
            <div class="question">
            <input type="radio" id="q3a1" name="new_q3ak" value = "q3a1">
              <label for="q3a1"><input type="text" name="new_q3a1"  id="new_q3a1"></label>
            </div>
            <br>
            <div class="question">
            <input type="radio" id="q3a2" name="new_q3ak" value = "q3a2">
              <label for="q3a2"><input type="text" name="new_q3a2"  id="new_q3a2"></label>
              </div>
              <br>
            <div class="question">
            <input type="radio" id="q3a3" name="new_q3ak" value = "q3a3">
            <label for="q3a3"><input type="text" name="new_q3a3"  id="new_q3a3"></label>
            </div>
            <br>
            </div>

            <input type="submit" name="add" value="إضافة" class="btn btn-primary mt-2">
            
          </form>
          ';
}


// Handle form submissions

if (isset($_POST['add'])) {
    // Check if all form fields are set
    $requiredFields = [
      'new_q1ak',
      'new_q2ak',
      'new_q3ak',
      'new_q3a1',
      'new_q3a2',
      'new_q3a3',
      'new_q2a1',
      'new_q2a2',
      'new_q2a3',
      'new_q1a1',
      'new_q1a2',
      'new_q1a3',
      'new_Name',
      'new_writer',
      'new_img',
      'new_url',
      'new_q1',
      'new_q2',
      'new_q3'
    ];
    
    foreach ($requiredFields as $field) {
      if (!isset($_POST[$field])) {
        echo "Please fill out all form fields and select the correct answers for the questions";
        return;
      }
    }

    // Escape input
    $id = $id;
    $new_Name = mysqli_real_escape_string($conn, $_POST['new_Name']);
    $new_writer = mysqli_real_escape_string($conn, $_POST['new_writer']);
    $new_img = "https://drive.google.com/thumbnail?id=" . mysqli_real_escape_string($conn, $_POST['new_img']);
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
    $finish=1;
  } elseif ($new_q1ak == $new_q1a2) {
    $q1ak = $new_q1ak;
    $q1a2 = $new_q1a3;
    $q1a1 = $new_q1a1;
    $finish=1;
  } elseif ($new_q1ak == $new_q1a1) {
    $q1ak = $new_q1ak;
    $q1a2 = $new_q1a2;
    $q1a1 = $new_q1a3;
    $finish=1;
  }else{
    echo "Error adding record: $new_q1ak";

  }
  if ($new_q2ak == $new_q2a3) {
    $q2ak = $new_q2ak;
    $q2a2 = $new_q2a2;
    $q2a1 = $new_q2a1;
    $finish=1;
  } elseif ($new_q2ak == $new_q2a2) {
    $q2ak = $new_q2ak;
    $q2a2 = $new_q2a3;
    $q2a1 = $new_q2a1;
    $finish=1;
  } elseif ($new_q2ak == $new_q2a1) {
    $q2ak = $new_q2ak;
    $q2a2 = $new_q2a2;
    $q2a1 = $new_q2a3;
    $finish=1;
  }else{
    echo "Error adding record:$new_q2ak" ;

  }

  if ($new_q3ak == $new_q3a3) {
    $q3ak = $new_q3ak;
    $q3a2 = $new_q3a2;
    $q3a1 = $new_q3a1;    
    $finish=1;
  } elseif ($new_q3ak == $new_q3a2) {
    $q3ak = $new_q3ak;
    $q3a2 = $new_q3a3;
    $q3a1 = $new_q3a1;
    $finish=1;
  } elseif ($new_q3ak == $new_q3a1) {
    $q3ak = $new_q3ak;
    $q3a2 = $new_q3a2;
    $q3a1 = $new_q3a3;
    $finish=1;
  }else{
    echo "Error adding record: $new_q3ak";
  }


    if ($finish == 1) {
        $sql = "INSERT INTO $table_name (id, Name, writer, img, url, q1, q1ak, q1a2, q1a1, q2, q2ak, q2a2, q2a1, q3, q3ak, q3a2, q3a1)
        VALUES ('$id', '$new_Name', '$new_writer', '$new_img', '$new_url', '$new_q1', '$q1ak', '$q1a2', '$q1a1', '$new_q2', '$q2ak', '$q2a2', '$q2a1', '$new_q3', '$q3ak', '$q3a2', '$q3a1')";
      
        if (mysqli_query($conn, $sql)) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }

}
  
?>





  




</center>
</body>
</html>