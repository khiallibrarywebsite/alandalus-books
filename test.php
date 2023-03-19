<?php
// Check if the form was submitted
if (isset($_POST['add'])) {
    // Set the file path
    $file_path = 'Math Grade-6.pdf';
    $output = array();
    exec("python up.py $file_path", $output);

    // Output the response from the Flask server
    echo implode('<br>', $output);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload to Google Drive</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="submit" name="add" value="Upload" class="btn btn-primary mt-2">
    </form>
</body>
</html>




