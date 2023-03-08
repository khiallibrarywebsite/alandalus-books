require_once '../../connect.php';


// Retrieve all books from the table
$sql = "SELECT * FROM books wHERE school = '$code' AND stage = '$stage';";
$result = mysqli_query($conn, $sql);
$go = sprintf("../host.php?user=%s&school_code=%s&pass=%s", $titlecompleter, $code, $password);
echo "<a href='$go'>رجوع</a>";
// Generate a form for each book
if (mysqli_num_rows($result) > 0) {
  echo "<center><div class ='container-sm'><div  class ='row-cols-3'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["id"];
        $edit_link = sprintf("edit_host.php?user=%s&school_code=%s&pass=%s&id=%s", $titlecompleter, $code, $password, $book_id);
        $book_name = $row["Name"];
        $book_author = $row["writer"];
        $book_img = $row["img"];
        echo "<form method='post' class ='card'><center>";
        echo "<img src='$book_img' style='width:118px; height: 179px' class='card-img' id='book-img' alt='Not Found' onerror='this.src=\"../../img/A.png\"'>";
        echo "<h4>$book_name</h4>";
        echo "<h5>$book_author</h5>";
        echo "<input type='hidden' name='book_id' value='$book_id'>";
        echo "<a href='$edit_link'  class ='card-button'>edit</a>";
        echo "<br><br>";
        echo "<input type='submit' name='delete' value='Delete' class ='card-button'>";
        echo "<br><br><br><br><br>";
        echo "</center></form>";
    }
    echo "</div></div></center>";
} else {
    echo "No books found in the table.";
}

// Handle form submission
if (isset($_POST["delete"])) {
    $book_id = $_POST["book_id"];
    $sql = "DELETE FROM $books WHERE id=$book_id AND school = $code AND stage = $stage ";
    if (mysqli_query($conn, $sql)) {
        echo "Book deleted successfully.";
        header("Refresh: 0");
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);