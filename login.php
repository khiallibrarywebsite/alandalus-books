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
<style>
      /* apply some basic styling */
body {
  background-color: #f8f9fa;
  color: #343a40;
}

.container {
  margin-top: 50px;
  max-width: 400px;
  padding: 20px;
  border: 1px solid #dee2e6;
  border-radius: 5px;
  background-color: #fff;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ced4da;
  border-radius: 5px;
}

input[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0069d9;
}

#error {
  color: red;
  margin-top: 10px;
}

/* center the form vertically and horizontally */
html, body {
  height: 100%;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
}

/* hide the bullet points for unordered lists */
ul {
  list-style-type: none;
}

</style>

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