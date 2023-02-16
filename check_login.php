<?php
require_once 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$parts = explode(".", $username);
$code = end($parts);

// Check if the username contains "egyand"
/**if (strpos($username, 'egyand') !== false) {
    $school_code = 'egyand';
    $user_table = 'user_egyand';
    $host_table = 'host_egyand';
}
// Check if the username contains "ksaand"
elseif (strpos($username, 'ksaand') !== false) {
    $school_code = 'ksaand';
    $user_table = 'user_ksaand';
    $host_table = 'host_ksaand';
}
// Check if the username contains "entand"
elseif (strpos($username, 'entand') !== false) {
    $school_code = 'entand';
    $user_table = 'user_entand';
    $host_table = 'host_entand';
}
// If the username does not contain any of the specified strings, show an error message
else {
      http_response_code(400); 
    exit();
}**/
// Check if the username and password are in the host_table
$query = "SELECT * FROM 'host_$code WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
        if ($school_code == "egyand") {
      http_response_code(500);    
       exit();
}
        if ($school_code == "ksaand") {
      http_response_code(501); 
          exit();

}      
  if ($school_code == "entand") {
      http_response_code(502); 
          exit();
}
}

// Check if the username and password are in the user_table
$query = "SELECT * FROM $user_table WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    if ($school_code == "egyand") {
      http_response_code(200);    
       exit();
}
        if ($school_code == "ksaand") {
      http_response_code(201); 
          exit();

}      
  if ($school_code == "entand") {
      http_response_code(202); 
          exit();
}
}



// If the username and password are not found in either table, show an error message
      http_response_code(400); 

// Close the database connection
mysqli_close($conn);

?>