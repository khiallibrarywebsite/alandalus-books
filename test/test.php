<!DOCTYPE html>
<html>
  <head>
    <title>Upload file to Google Drive with JavaScript</title>
    <script src="https://apis.google.com/js/api.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="test.js"></script>

    <?php
        echo '
        <form method="post" class = "form" enctype="multipart/form-data">
        <center>

        
        <label class="form-label">تحميل الكتاب</label>
        <label for="file">Upload file:</label>
        <input type="file" id="file" name="file">

        <input type="submit" name="add" value="إضافة" class="btn btn-primary mt-2">
        </center>
      </form>
      ';



// Handle form submissions

if (isset($_POST['add'])) {

  // Set the upload directory and file path
  $file_name = $_FILES['file']['name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];
  $file_path = $_FILES['file']['tmp_name'];

        $url = "http://127.0.0.1:8000/upload";
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
         $new_img = "https://drive.google.com/thumbnail?id=" .  $result;
         $new_url = "https://drive.google.com/file/d/".$result;
         echo"$new_img . $new_url";
        }
      }
        
?>
  </head>
    <body>  <div id="loading-spinner">
      <div class="spinner"></div>
    </div>

    

  </body>
</html>
