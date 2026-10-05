<?php
//$conn = new mysqli("localhost", "root", "", "ajaxcrud");
include "db.php";

// Collect text inputs
$name = $_POST['name'];
$gender = $_POST['gender'];
$stream = $_POST['stream'];
$subject = isset($_POST['sub']) ? implode(",", $_POST['sub']) : "";

//image upload
$filename = $_FILES['simg']['name'];
$extension = pathinfo($filename,PATHINFO_EXTENSION);
$valid_extension = array("jpg","jpeg","png","gif");
if (in_array($extension,$valid_extension)) {
    $file_new_name = time().".".$extension;
    $path = "image_folder/" . $file_new_name;
    move_uploaded_file($_FILES['simg']['tmp_name'],$path);
}

$sql = "INSERT INTO students(name,gender,stream,subject,stdimg) VALUES ('{$name}','{$gender}','{$stream}','{$subject}','{$file_new_name}')";

if (mysqli_query($conn,$sql)) {
    echo "Record inserted successfully!";
} else {
    echo "Error";
}


?>