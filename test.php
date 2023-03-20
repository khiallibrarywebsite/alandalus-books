<html>
<body>

<form action="test.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

<?php
if (isset($_POST["submit"])) {
    $file_path = 'Math Grade-6.pdf';


// Define the URL of the Flask app
$url = 'http://127.0.0.1:5000/upload';

// Define the request body
$data = array('file_path' => $file_path);

// Send a POST request to the Flask app
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Error calling upload function";
} else {
    echo $result;
}
}
?>

</body>
</html>