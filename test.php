<!DOCTYPE html>
<html>
<head>
	<title>Form Example</title>
<style>
body {
  font-family: Arial, sans-serif;
  color: #FFF;
  background-color: #000ff0;
}

form {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  background-color: #FFF;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  transition: all 0.3s ease;
}

form:hover {
  transform: scale(1.02);
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 18px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background-color: #F2F2F2;
  transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  outline: none;
  box-shadow: 0 0 5px rgba(33, 150, 243, 0.5);
}

input[type="radio"] {
  margin-right: 5px;
}

button[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #2196F3;
  color: #FFF;
  font-size: 18px;
  cursor: pointer;
  transition: all 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0a73cc;
}


</style>
</head>
<body>
<button name = ziad >z</button>
<button name = ziad >x</button>
<?php
// Get the current date and time
$current_date = date('Y-m-d H:i:s');

// Display the current date and time
echo "The current date and time is: " . $current_date;
?>
</body>
</html>
