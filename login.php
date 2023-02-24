<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/styleme.css" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9483470310411729" crossorigin="anonymous"></script>
   <link rel="icon" type="image/x-icon" href="https://softr-prod.imgix.net/applications/96c4ff09-6593-407c-a5af-810a1fa0ca2f/assets/b9e0692f-6ae8-4fba-a2eb-6f09ef2bb618.png?rnd=1649807422200" />
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

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $type = $row["type"];
            $school = $row["school"];

          header("Location: $type/$type.php?user={$username}&school_code={$school}&pass={$password}");
          }
        }  

  
      }else{
        echo"<p>الرجاء ادخال كلمة سر و اسم مستخدم صحيحين</p>";
      }




    
    ?>
</center>
</body>

</html>