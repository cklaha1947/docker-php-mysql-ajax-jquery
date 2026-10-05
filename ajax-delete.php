<?php 
$student_id = $_POST["id"];
//$conn = mysqli_connect("localhost", "root", "", "ajaxcrud") or die("Connection Failed");
include "db.php";

// Step 1: Get image filename
$sql1 = "SELECT * FROM students WHERE id = {$student_id}";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $image_path = "image_folder/" . $row['stdimg'];

    // Step 2: Delete the image file if it exists
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    // Step 3: Delete the record from database
    $sql2 = "DELETE FROM students WHERE id = {$student_id}";
    if (mysqli_query($conn, $sql2)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0; // Record not found
}
?>
