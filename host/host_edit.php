<!DOCTYPE html>
<html>
<head>

   <meta charset="UTF-8" />   
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    require_once '../connect.php';

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
<?php

require_once '../connect.php';

try {
    // Pagination System
    $getData = $conn->prepare("SELECT * FROM $table");
    $getData->execute();

    foreach ($getData as $data) {
        $name = $data['name'];
        echo '
        <form method="POST" class="card bg-light m-1" style="width: 16.5rem;">
        <a class="btn btn-warning" style="margin: 0.25rem 0.25rem 0 0.25rem;" href="edit_host.php?bookname='.$name.'&user='.$titleCompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.'"><span class="badge mb-1 text-bg-primary">Edit</span></a>
        <button name="delete" class="btn btn-info m-1" value="'.$name.'"><span class="badge text-bg-danger">Delete</span></button>
            <div class="card-body">
            <p class="bg-light card-text">'.$name.'</p>
            </div>
        </form>
        ';
    }
    
    if (isset($_POST['delete'])) {
        $nameToDelete = $_POST['delete'];
        $delete = $conn->prepare("DELETE FROM $table WHERE name = :name");
        $delete->execute(array(":name" => $nameToDelete));
         if ($delete->execute()) {
         echo "<script>location.assign('host_edit.php?user='.$titleCompleter.'&school_code='.$code.'&pass='.$password.'&stage='.$stage.');</script>";
        } else {
            throw new Exception("Unable to delete record from the database");
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
</body>

</html>
