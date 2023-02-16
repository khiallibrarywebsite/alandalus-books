<html>
<head>

<title>تسجيل دخول</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<center>
  <?php
  echo'
  <form method="POST" class="container">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" >
    <br><br>
    <input type="submit" name="login" value="تسجيل دخول" class="btn btn-primary mt-2">
    </form>
    <div id="error"></div>
    ';
    require_once 'connect.php';

    if (isset($_POST['login'])) {
      // Check if all form fields are set
      $requiredFields = [
        'password',
        'username'
      ];
      
      foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
          echo "الرجاء ادخال كلمة السر و اسم المستخدم";
          return;
        }
      }
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      if(strpos($username, ".") !== false){
        $parts = explode(".", $username);
        $code = end($parts);
        $query = "SELECT * FROM host_$code WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          header("Location: host/host.php?user={$username}&school_code={$code}&pass={$password}");
        }else{
  
          $query = "SELECT * FROM user_$code WHERE username='$username' AND password='$password'";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            header("Location: user/user.php?user={$username}&school_code={$code}&pass={$password}");
          }else{
            echo"<p>الرجاء ادخال كلمة سر و اسم مستخدم صحيحين</p>";
          }
        }
  
      }else{
        echo"<p>الرجاء ادخال كلمة سر و اسم مستخدم صحيحين</p>";
      }




    }
    ?>
</center>
</body>

</html>