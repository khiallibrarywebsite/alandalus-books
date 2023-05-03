<?php include '../config.php';?><!DOCTYPE html>
<html>
    <head>
    <title>تحميل</title>
    </head>

  <body>  <div id="loading-spinner">
      <div class="spinner"></div>
    </div>


<?php
         require_once '../connect.php';
         
         
         // Retrieve all books from the table
         $sql = "SELECT * FROM tables_index";
         $result = mysqli_query($conn, $sql);
         // Generate a form for each book
         if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
              $code = $row["name"];
              echo"'$code'";
             }
            }


?>
<link rel='stylesheet' href='../css/cssalandalus.css?v=33' /> <script src='../js/jsalandalus.js?v=33'></script>

</body>
</html>