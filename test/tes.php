<input type="file" id="fileInput">
<button onclick="readFile()">Read File</button>

<script>
function readFile() {
  const fileInput = document.getElementById('fileInput');
  const file = fileInput.files[0];
  const reader = new FileReader();
  reader.onload = function(event) {
    const contents = event.target.result;
    console.log(contents);
    // Do something with the file contents
  };
  reader.readAsText(file);
}
</script>