<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
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
<style>
  body {
  font-family: Arial, sans-serif;
  color:  #D8D8D8;
  background-color:  #D8D8D8;
}</style>
   <meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
    ob_start(); // start output buffering

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

<?php
  if($s != 1){
    echo'
    <nav class="nav">
    <div class="nav-left">
      <a href="#">
        <img src="../img/img.png" alt="Logo" class="nav-img">
      </a>
    </div>
    <div class="nav-center">
  
  <center>
      <p class="nav-center-p"> اهلا بك استاذ</p>
      <p class="nav-center-p">'.$name.'</p> 
      </center>
      
  
    </div>
    <div class="nav-right">
      <a href="index.php" class="nav-right-a">من نحن</a>
    </div>
        <a href="../login.php"><button class="nav-button">login out</button></a>
  
  </nav>
  <center>
';

    require_once '../../connect.php';

    // Retrieve all books from the table
    $sql = "SELECT * FROM books";
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
            <form method="POST" class="form">
            
            <input type="hidden" name="id" value="'.$id.'" />
            <label class="form-label">اسم الكتاب</label>
            <input type="text" name="new_Name" class="form-control"  />
          
         
            <label class="form-label">اسم المؤلف</label>
            <input type="text" name="new_writer" class="form-control"  />
            
            
            <label class="form-label">رابط الكتاب</label>
            <input type="text" name="new_url" class="form-control"  placeholder="https://drive.google.com/file/d/1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI/view?usp=share_link"/>
            <p>قم برفع الكتاب علي <a href="https://drive.google.com/">جوجل درايف</a> وبعدها قم بعمل مشاركة للكتاب وجعل صلاحية الدخول لكل من يحمل الرابط <a href="'.$go_link.'" target="_blank">معرفة المزيد</a></p>
 

            <label class="form-label">id الكتاب</label>
            <input type="text" name="new_img" class="form-control"   placeholder="1B8m0jvypiNelJuG-W5V_QmVx5fX8tAGI"/>
            <p>بعد الحصول علي رابط الكتاب قم  <a href="'.$go_link.'" target="_blank">باخذ الرقم الأخير</a> في الرابط وضعه هنا</p>
           
            
            
            <label class="form-label">سؤال الأول</label>
            <input type="text" name="new_q1" class="form-control" />
            <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q1a1" name="new_q1ak" value = "q1a1" class="form-radio-input">
              <label for="q1a1"><input type="text" class= "form-text" placeholder="الإجابة الأولي " name="new_q1a1"  id="new_q1a1"></label>
            </div>
</div>
<br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q1a2" name="new_q1ak" value = "q1a2" class="form-radio-input">
              <label for="q1a2"><input type="text" class= "form-text"  placeholder="الإجابة الثانية "name="new_q1a2" id="new_q1a2"></label>
            </div>
</div>
            <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q1a3" name="new_q1ak" value = "q1a3" class="form-radio-input">
              <label for="q1a3" ><input type="text" class= "form-text" placeholder="الإجابة الثالثة " name="new_q1a3" id="new_q1a3"></label>
            </div>
</div>
            
            <br>
        
          
            <label class="form-label">سؤال الثاني</label>
            <input type="text" name="new_q2" class="form-control" />
            <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q2a1" name="new_q2ak" value = "q2a1" class="form-radio-input">
              <label for="q2a1"><input type="text" class= "form-text" placeholder="الإجابة الأولي " name="new_q2a1"  id="new_q2a1"></label>
              
            </div>
</div>
            <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q2a2" name="new_q2ak" value = "q2a2" class="form-radio-input">
              <label for="q2a2"><input type="text" class= "form-text" placeholder="الإجابة الثانية " name="new_q2a2"  id="new_q2a2"></label>
            </div>
</div>
              <br>
              <div class="container">            <div class="form-row">
              <input type="radio" id="q2a3" name="new_q2ak" value = "q2a3" class="form-radio-input">
                <label for="q2a3" ><input type="text" class= "form-text" placeholder="الإجابة الثالثة " name="new_q2a3" id="new_q2a3"></label>
            </div>
</div>
              <br>
         
        
            <label class="form-label">سؤال الثالث</label>
            <input type="text" name="new_q3" class="form-control" />
            <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q3a1" name="new_q3ak" value = "q3a1" class="form-radio-input">
              <label for="q3a1"><input type="text" class= "form-text" placeholder="الإجابة الأولي " name="new_q3a1"  id="new_q3a1"></label>
            </div>
</div>
            <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q3a2" name="new_q3ak" value = "q3a2" class="form-radio-input">
              <label for="q3a2"><input type="text" class= "form-text" placeholder="الإجابة الثانية " name="new_q3a2"  id="new_q3a2"></label>
            </div>
</div>
              <br>
            <div class="container">            <div class="form-row">
            <input type="radio" id="q3a3" name="new_q3ak" value = "q3a3" class="form-radio-input">
            <label for="q3a3"><input type="text" class= "form-text" placeholder="الإجابة الثالثة " name="new_q3a3"  id="new_q3a3"></label>
            </div>
</div>
            <br>
            
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
        $sql = "INSERT INTO books (id, Name, writer, img, url, q1, q1ak, q1a2, q1a1, q2, q2ak, q2a2, q2a1, q3, q3ak, q3a2, q3a1, school, stage)
        VALUES ('$id', '$new_Name', '$new_writer', '$new_img', '$new_url', '$new_q1', '$q1ak', '$q1a2', '$q1a1', '$new_q2', '$q2ak', '$q2a2', '$q2a1', '$new_q3', '$q3ak', '$q3a2', '$q3a1', '$code', '$stage')";
      
        if (mysqli_query($conn, $sql)) {
            echo "Record added successfully";
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
            $stmt->bind_param("ss", $titlecompleter, $password);
            $stmt->execute();
            $result = $stmt->get_result();
        $xw=0;
            // Check if the query was successful, and only continue if it was

            // Assuming that the SQL query result is stored in a variable called $result
            if ($result && $result->num_rows > 0) {
              // Loop through each row
              while ($row = $result->fetch_assoc()) {
                // Extract the id_readed_added_books and scoore columns from the users table
                $id_readed_added_books = $row["id_readed_added_books"];
                $scoore = $row["scoore"];
            
                // Update the id_readed_added_books column in the users table
                $new_id_readed_added_books = $id_readed_added_books . $id. ",";
                $update_id_readed_added_books_query = "UPDATE users SET id_readed_added_books='$new_id_readed_added_books' WHERE `username`='$titlecompleter'";
                $conn->query($update_id_readed_added_books_query);
            
                // Update the scoore column in the users table
                $new_scoore = $scoore + 30;
                $update_scoore_query = "UPDATE users SET scoore='$new_scoore' WHERE `username`='$titlecompleter'";
                $conn->query($update_scoore_query);
            
                // Update the readedbooks column in the users table
                $update_readedbooks_query = "UPDATE users SET readedbooks=readedbooks+1 WHERE `username`='$titlecompleter'";
                $conn->query($update_readedbooks_query);
                $xw = 12;
              }
            
              // Check if $xw is equal to 12
              if ($xw == 12) {
                $finish == 0;
                // Construct the redirect URL
                $redirect_url = "../host.php?user=$titlecompleter&school_code=$code&pass=$password";
            
                // Redirect the user to the URL
                header("Location: $redirect_url");
                exit();
              }
            }
        } else {
            echo "Error adding record: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
    ob_end_flush(); // flush the output buffer

}
  
?>





  




</center>
<link rel="stylesheet" href="../../css/style.css" />
</body>
</html>