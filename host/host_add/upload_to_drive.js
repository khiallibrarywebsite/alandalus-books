// document.addEventListener('DOMContentLoaded', () => {
//     const fileInput = document.getElementById('file');
//     fileInput.addEventListener('change', async function(event) {
//       const file = '../../a.pdf';
//       uploadFile(file);
//     });
//   });
  
//   async function uploadFile(file) {
//     const folderId = '1gg7xzkQTBe-7qccd_EL3H2HNFGQKNG8Z';
  
//     const metadata = {
//       name: file.name,
//       parents: [folderId],
//       mimeType: 'application/pdf', // set the MIME type of the PDF document
//       convert: false // Disable conversion to Google Drive format
//     };
  
//     const reader = new FileReader();
//     // reader.readAsArrayBuffer(file);
//     // reader.onload = async function(e) {
//       const fileData = file;
  
//       const tokenUrl = 'https://oauth2.googleapis.com/token';
//       const clientId = '830136243075-rohl6it7i48rpgnm9c0f8jmvafrbgbsl.apps.googleusercontent.com';
//       const clientSecret = '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';
//       const refreshToken = '1//0318WeNH4ztrrCgYIARAAGAMSNwF-L9IrGNIY7QLRUBZuEoNUy1jsxrDOPyi07z6LIYLtrVEBJm9fPjj9p-Ms_HP53bQVkm3r2K8';
  
//       const payload = {
//         grant_type: 'refresh_token',
//         client_id: clientId,
//         client_secret: clientSecret,
//         refresh_token: refreshToken
//       };
  
//       try {
//         const response = await fetch(tokenUrl, {
//           method: 'POST',
//           headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//           },
//           body: new URLSearchParams(payload)
//         });
//         if (response.ok) {
//           const data = await response.json();
//           const newAccessToken = data.access_token;
//           console.log(`New access token:${newAccessToken}`);
  
//           const tokenType = "Bearer";
//           const xhr = new XMLHttpRequest();
//           xhr.open('POST', 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart');
//           xhr.setRequestHeader('Authorization', `${tokenType} ${newAccessToken}`);
//           xhr.setRequestHeader('Content-Type', 'multipart/related; boundary=foo_bar_baz');
//           xhr.onload = function() {
//             const response = JSON.parse(xhr.responseText);
//             if (response && response.id) {
//               console.log(`File ID: ${response.id}`);
//               const upid = document.getElementById("upid");
//               upid.value = response.id;
//             } else {
//               console.error('Error creating file:', response);
//             }
//           };
//           xhr.onerror = function() {
//             console.error('Error uploading file.');
//           };
//           xhr.send([
//             '--foo_bar_baz',
//             'Content-Type: application/json; charset=UTF-8',
//             '',
//             JSON.stringify(metadata),
//             '',
//             '--foo_bar_baz',
//             'Content-Type: ' + file.type,
//             '',
//             new Blob([fileData], { type: file.type }), // Send fileData ArrayBuffer as a Blob
//             '',
//             '--foo_bar_baz--',
//           ].join('\r\n'));
//         };
  
//       } catch (error) {
//         console.error(error.message);
//       }
//     };
// //   }