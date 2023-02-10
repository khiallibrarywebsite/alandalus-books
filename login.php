<html>
<head>

<title>تسجيل دخول</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  
 const getValues = () => {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "check_login.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      switch (xhr.status) {
        case 200:
          window.location.href = `user/user.php?user=${username}&school_code=egyand&pass=${password}`;
          break;
        case 201:
          window.location.href = `user/user.php?user=${username}&school_code=ksaand&pass=${password}`;
          break;
        case 202:
          window.location.href = `user/user.php?user=${username}&school_code=entand&pass=${password}`;
          break;
        case 400:
          document.querySelector("#error").textContent = "Incorrect username or password";
          break;
        case 500:
          window.location.href = `host/host.php?user=${username}&school_code=egyand&pass=${password}`;
          break;
        case 501:
          window.location.href = `host/host.php?user=${username}&school_code=ksaand&pass=${password}`;
          break;
        case 502:
          window.location.href = `host/host.php?user=${username}&school_code=entand&pass=${password}`;
          break;
        default:
          console.error(`Unexpected status code: ${xhr.status}`);
      }
    }
  };
  xhr.send(`username=${username}&password=${password}`);
};

  </script>
    


</head>
<body>
<center>
  <form>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="button" value="Submit" onclick="getValues()">
  </form>
    <div id="error"></div>
</center>
</body>

</html>