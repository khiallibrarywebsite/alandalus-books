<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and JavaScript Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
//                         // Load necessary modules
//                         const { google } = require('googleapis');
//         const os = require('os');
//         const path = require('path');
//         const fs = require('fs');

//         // Replace with the ID of your folder in Google Drive
//         const folderId = '1gg7xzkQTBe-7qccd_EL3H2HNFGQKNG8Z';

//         // Define the scopes for the Drive API
//         const scopes = ['https://www.googleapis.com/auth/drive'];

//         // Define the path to the credentials file
//         const credentialsFile = 'token.json';

//         // Function to upload file to Google Drive
//         async function uploadFileToDrive(filePath) {
            
//             try {

//                  alert('ziad js2');
//                 // Authenticate with the Google Drive API
//                 const credentials = require(credentialsFile);
//                 const auth = await google.auth.getClient({
//                     credentials,
//                     scopes,
//                 });

//                 // Build the Drive API client
//                 const drive = google.drive({ version: 'v3', auth });

//                 // Create file metadata
//                 const fileMetadata = {
//                     name: path.basename(filePath),
//                     parents: [folderId],
//                 };

//                 // Use the client to upload the file to Drive
//                 const media = {
//                     mimeType: 'application/octet-stream',
//                     body: fs.createReadStream(filePath),
//                 };
//                 const { data } = await drive.files.create({
//                     requestBody: fileMetadata,
//                     media,
//                     fields: 'id,webViewLink',
//                 });

//                 // Set sharing permissions
//                 await drive.permissions.create({
//                     fileId: data.id,
//                     requestBody: {
//                         type: 'anyone',
//                         role: 'reader',
//                         allowFileDiscovery: false,
//                         sendNotificationEmail: false,
//                     },
//                 });

//                 // Return the ID and URL of the uploaded file
//                 return { id: data.id};
//             } catch (err) {
// alert('ero js2');
//             }
//         }
const fs = require('fs');
const { google } = require('googleapis');
const { OAuth2 } = google.auth;

async function uploadFileToDrive(filePath, folderId, credentialsPath, tokenPath) {
  // Define the scopes for the Drive API
  const SCOPES = ['https://www.googleapis.com/auth/drive'];

  // Load client secrets from a local file
  const credentials = JSON.parse(fs.readFileSync(credentialsPath));

  const oAuth2Client = new OAuth2(
    credentials.installed.client_id,
    credentials.installed.client_secret,
    credentials.installed.redirect_uris[0]
  );

  // Check if we have previously stored a token
  if (fs.existsSync(tokenPath)) {
    const token = fs.readFileSync(tokenPath);
    oAuth2Client.setCredentials(JSON.parse(token));
  }

  const drive = google.drive({ version: 'v3', auth: oAuth2Client });

  // Create file metadata
  const fileMetadata = {
    name: filePath.split('/').pop(),
    parents: [folderId],
  };

  // Use the client to upload the file to Drive
  const media = {
    mimeType: 'application/octet-stream',
    body: fs.createReadStream(filePath),
  };

  const file = await drive.files.create({
    requestBody: fileMetadata,
    media,
    fields: 'id,webViewLink',
  });

  // Set sharing permissions
  await drive.permissions.create({
    fileId: file.data.id,
    requestBody: {
      type: 'anyone',
      role: 'reader',
      allowFileDiscovery: false,
      sendNotificationEmail: false,
    },
  });

  // Return the ID and URL of the uploaded file
  return { id: file.data.id, webViewLink: file.data.webViewLink };
}



//         // Function to handle form submission
       function handleFormSubmit() {
            // Call the JavaScript function to upload file to Google Drive
            let result =     // Example usage
uploadFileToDrive('Math Grade-6.pdf', '1gg7xzkQTBe-7qccd_EL3H2HNFGQKNG8Z', 'cr.json', 'token.json')
  .then(result => console.log(result))
  .catch(error => console.error(error));
            alert('ziad js');

            // // Send the result to the PHP script using AJAX
            // $.ajax({
            //     url: "process.php",
            //     method: "POST",
            //     data: { result: result },
            //     success: function(response) {
            //         console.log(response); // Handle the response from the PHP script
            //     },
            //     error: function(jqXHR, textStatus, errorThrown) {
            //         console.error("Error: " + textStatus + " " + errorThrown);
            //     }
            // });
        }
    </script>
</head>
<body>
    <?php 
        echo '<form method="post" class="form" enctype="multipart/form-data">
                <input type="submit" name="add" value="إضافة" class="btn btn-primary mt-2">
            </form>'; 
        
        // Handle form submissions
        if (isset($_POST['add'])) {
            echo 'add post';
            echo '<script>
                    // Call the function to handle form submission
                    handleFormSubmit();
                </script>';
                
                    if (isset($_POST["result"])) {
                        $result = $_POST["result"];
                        echo "JavaScript function returned: " . htmlspecialchars($result);
                    } else {
                        echo "No result received.";
                    }
        }
    ?>
</body>
</html>